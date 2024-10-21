<?php
defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller
{
	public function index()
	{
		$data = array(
			'titulo' => 'Usuários Cadastrados',
			'subtitulo' => 'Listagem de usuários cadastrados no sistema',
			'styles' => array(
				'assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
				'assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
			),
			'scripts' => array(
				'assets/plugins/datatables.net/js/jquery.dataTables.min.js',
				'assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
				'assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'assets/plugins/list.js/dist/list.min.js',
				'assets/js/pages/usuarios.js',
			),
			'usuarios' => $this->ion_auth->users()->result(),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');
	}
}
