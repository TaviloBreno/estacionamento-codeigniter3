<?php
defined('BASEPATH') or exit('Acesso restrito!');

class Mensalidades extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}
		$this->load->model('mensalidades_model');
	}

	public function index()
	{
		$data = [
			'titulo' => 'Mensalidades Cadastradas',
			'subtitulo' => 'Listando todas as mensalidades cadastradas',
			'icone_view' => 'ik ik-calendar',
			'styles' => [
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
			],
			'scripts' => [
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net/js/estacionamento.js',
			],
			'mensalidades' => $this->mensalidades_model->get_all()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('mensalidades/index');
		$this->load->view('layout/footer');
	}
}
