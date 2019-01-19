<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') <> 'Aktif')
		{
			redirect('member');
		}
		$this->load->model('member/Login_model');
	}

	public function index()
	{
	    $data['user_image'] = $this->Login_model->user_image()->row();
		$data['fullname'] = $this->Login_model->fullname();
		$data['title'] = "Halaman member";
		$this->template->load('templates/template','home_member', $data);
	}

}

/* End of file Halaman_member.php */
/* Location: ./application/modules/member/controllers/Halaman_member.php */