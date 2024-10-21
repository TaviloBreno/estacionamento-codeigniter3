<?php
defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{
	public function index()
	{
		$data = array(
			'titulo' => 'Usuários Cadastrados',
			'subtitulo' => 'Listagem de usuários cadastrados no sistema',
			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
				'plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
			),
			'scripts' => array(
				'plugins/datatables.net/js/estacionamento.js',
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
			),
			'usuarios' => $this->ion_auth->users()->result(),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');
	}

	public function core($usuario_id = null)
	{
		if (!$usuario_id) {
			// Validações para novo usuário
			$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]|is_unique[users.email]');
			$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[5]|max_length[45]|is_unique[users.username]');
			$this->form_validation->set_rules('phone', 'Telefone', 'trim|max_length[15]');
			$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('confirm_password', 'Confirmação de senha', 'matches[password]');

			if ($this->form_validation->run()) {
				$username = html_escape($this->input->post('username'));
				$password = html_escape($this->input->post('password'));
				$email = html_escape($this->input->post('email'));
				$additional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'active' => $this->input->post('active'),
				);
				$group = array($this->input->post('perfil_acesso'));

				if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
					$this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso');
				} else {
					$this->session->set_flashdata('error', 'Erro ao cadastrar usuário');
				}

				redirect($this->router->fetch_class());
			} else {
				$data = array(
					'titulo' => 'Cadastrar Usuário',
					'subtitulo' => 'Novo usuário',
				);

				$this->load->view('layout/header', $data);
				$this->load->view('usuarios/core');
				$this->load->view('layout/footer');
			}
		} else {
			// Verifica se o usuário existe
			if (!$this->ion_auth->user($usuario_id)->row()) {
				$this->session->set_flashdata('error', 'Usuário não encontrado');
				redirect('usuarios');
			} else {
				$perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

				// Validações do formulário
				$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[5]|max_length[20]');
				$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|min_length[5]|max_length[20]');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]|callback_email_check');
				$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[5]|max_length[45]|callback_username_check');
				$this->form_validation->set_rules('phone', 'Telefone', 'trim|max_length[15]');

				// Se a senha for fornecida, adicione as validações
				$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[6]');
				$this->form_validation->set_rules('confirm_password', 'Confirmação de senha', 'matches[password]');

				if ($this->form_validation->run()) {
					// Coleta os dados do formulário
					$data = elements(
						array(
							'first_name',
							'last_name',
							'email',
							'username',
							'phone',
							'active', // Se necessário
						),
						$this->input->post()
					);

					$password = $this->input->post('password');

					// Verifica se a senha foi fornecida e a adiciona se não estiver vazia
					if ($password) {
						$data['password'] = $password; // Adiciona a senha ao array de dados
					} else {
						unset($data['password']); // Remove a senha se não foi fornecida
					}

					// Tente atualizar o usuário
					if ($this->ion_auth->update($usuario_id, $data)) {
						$perfil_post = $this->input->post('perfil_acesso');

						// Atualiza o perfil de acesso se necessário
						if ($perfil_atual->id != $perfil_post) {
							$this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
							$this->ion_auth->add_to_group($perfil_post, $usuario_id);
						}

						$this->session->set_flashdata('sucesso', 'Usuário atualizado com sucesso');
					} else {
						// Captura o erro específico
						$error = $this->ion_auth->errors();
						log_message('error', 'Erro ao atualizar usuário: ' . $error);
						$this->session->set_flashdata('error', 'Erro ao atualizar usuário: ' . $error);
					}

					redirect($this->router->fetch_class());
				} else {
					// Carrega a view para edição
					$data = array(
						'titulo' => 'Editar Usuário',
						'subtitulo' => 'Edição de usuário',
						'usuario' => $this->ion_auth->user($usuario_id)->row(),
						'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
					);

					$this->load->view('layout/header', $data);
					$this->load->view('usuarios/core');
					$this->load->view('layout/footer');
				}
			}
		}
	}

	public function del($usuario_id = null)
	{
		if(!$usuario_id || !$this->core_model->get_by_id('users', array('id' => $usuario_id))) {
			$this->session->set_flashdata('error', 'Usuário não encontrado');
			redirect('usuarios');
		}else{
			if($this->ion_auth->is_admin($usuario_id)) {
				$this->session->set_flashdata('error', 'Não é possível excluir um administrador');
				redirect('usuarios');
			}

			if($this->ion_auth->delete_user($usuario_id)) {
				$this->session->set_flashdata('sucesso', 'Usuário excluído com sucesso');
			}else{
				$this->session->set_flashdata('error', 'Erro ao excluir usuário');
			}

			redirect($this->router->fetch_class());
		}
	}


	public function username_check($username = null)
	{
		$usuario_id = $this->input->post('usuario_id');

		if($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
			$this->form_validation->set_message('username_check', 'Esse usuário já existe');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function email_check($email = null)
	{
		$usuario_id = $this->input->post('usuario_id');

		if($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
			$this->form_validation->set_message('email_check', 'Esse e-mail já existe');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
