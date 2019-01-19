<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') <> 'Aktif')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = 'Tes View';
		$this->template->load('templates/template_tes','tes_view',$data);
	}

}

/* End of file Tes.php */
/* Location: ./application/modules/tes/controllers/Tes.php */