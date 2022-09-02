<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
	}

	public function index()
	{
		if ($this->ion_auth->in_group("pelanggan")) {
			redirect('frontend_pelanggan');
		} else {
			$data['title'] = 'Dashboard';
			$data['subtitle'] = '';
			$data['crumb'] = [
				'Dashboard' => '',
			];
			//$this->layout->set_privilege(1);
			$data['page'] = 'Dashboard/Index';
			$this->load->view('template/backend', $data);
		}
	}
}
