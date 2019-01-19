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
	}

	public function index()
	{
		$data['title'] = "Home Member";
		$this->template->load('templates/template','home_member', $data);
	}

}

/* End of file Halaman_member.php */
/* Location: ./application/modules/member/controllers/Halaman_member.php */