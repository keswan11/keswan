<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_operator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_operator/Page_operator_model');
	}

	public function index()
	{
		if($this->session->userdata('level') == "Operator")
		{
			$id_role = $this->session->userdata('id_role_operator');
			$id_operator=$this->session->userdata('id_operator');

			$menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
		}
		if($this->session->userdata('level') == "Operator")
        { 
          $data['menu'] = $menu_list;
        }
		$data['title'] = "Perbarui Password";
		$this->template->load('templates/template','ubah_password',$data);
	}
	
	function update_action()
	{
		$data = array('password_operator' => md5($this->input->post('password')));
		$this->db->where('id_operator', $this->input->post('id_operator'));
		$this->db->update('tb_operator', $data);
		$this->session->set_flashdata('message', 'Password berhasil diperbarui');
		redirect(site_url('profil_operator'));
	}
	
	

}