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

		} else {
			if (!$this->ion_auth->user($usuario_id)->row()) {
				$this->session->set_flashdata('error', 'Usuário não encontrado');
				redirect('usuarios');
			} else {

				$perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();

				$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[5]|max_length[20]');
				$this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|min_length[5]|max_length[20]');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]|callback_email_check');
				$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[5]|max_length[45]|callback_username_check');
				$this->form_validation->set_rules('phone', 'Telefone', 'trim|max_length[15]');
				$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[6]');
				$this->form_validation->set_rules('confirm_password', 'Confirmação de senha', 'matches[password]');



				if ($this->form_validation->run()) {
					$data = elements(
						array(
							'first_name',
							'last_name',
							'email',
							'username',
							'phone',
							'password',
							'active',
						),
						$this->input->post()
					);

					$password = $this->input->post('password');

					if(!$password) {
						unset($data['password']);
					}

					if($this->ion_auth->update($usuario_id, $data)) {

						$perfil_post = $this->input->post('perfil_acesso');

						if($perfil_atual->id != $perfil_post) {
							$this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
							$this->ion_auth->add_to_group($perfil_post, $usuario_id);
						}

						$this->session->set_flashdata('sucesso', 'Usuário atualizado com sucesso');
					} else {
						$this->session->set_flashdata('error', 'Erro ao atualizar usuário');
					}

					redirect($this->router->fetch_class());
				} else {
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
