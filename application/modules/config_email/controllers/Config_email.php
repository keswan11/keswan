<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_email extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('config_email_model');
    }

	function index()
	{
		$data['title'] = "Konfigurasi Email";
		$data['email'] = $this->config_email_model->tampilkan_data()->row_array();
		$this->template->load('templates/template','lihat_data', $data);
	}
	
	function update_action()
	{
		$this->config_email_model->update();
		$this->session->set_flashdata('message', 'Konfigurasi berhasil disimpan');
		redirect(site_url('config_email'));
	}
	

}

/* End of file Config_email.php */
/* Location: ./application/modules/config_email/controllers/Config_email.php */