<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') <> 'Aktif')
		{
			redirect('member');
		}
		$this->load->model('jenis_biodata/Jenis_biodata_model');
		$this->load->helper('update_batch');
	}

	public function index()
	{
		$data['title'] 	 = "Profil member";
		if ($this->session->userdata('id_jenis_member') == 1) {
			$data['biodata'] = $this->Jenis_biodata_model->get_biodata()->result(); 
			$data['passport'] = $this->Jenis_biodata_model->get_passport()->result(); 
			$data['ktp'] = $this->Jenis_biodata_model->get_ktp()->result(); 
			$this->template->load('templates/template','lihat_data',$data);
		} else if ($this->session->userdata('id_jenis_member') == 2) {
			$data['biodata'] = $this->Jenis_biodata_model->get_biodata()->result(); 
			$data['ktp'] = $this->Jenis_biodata_model->get_ktp()->result(); 
			$this->template->load('templates/template','lihat_data',$data);
		}
	}

	function update_action()
	{
		$isi = $this->input->post('isi_biodata_member');
		$result = array();

		foreach ($isi as $key => $val) {
			$result[] = array(
				// 'id_member'	 		 => $_POST['id_member'][$key],
				'id_biodata_member'	 => $_POST['id_biodata_member'][$key],
				'isi_biodata_member' => $_POST['isi_biodata_member'][$key]
			);
		}

		// update_batch($this->db, 'tb_data_member', $result, 'id_member', 'isi_biodata_member');
		$this->db->where('id_member', $this->input->post('id_member'));
		$this->db->update_batch('tb_data_member', $result, 'id_biodata_member');
		if ($this->input->post('password') != NULL) {
			$data = array('password' => md5($this->input->post('password')));
			$this->db->where('id_member', $this->session->userdata('id_member'));
			$this->db->update('tb_list_member', $data);
		}
		$this->session->set_flashdata('message', 'Profil berhasil diperbarui');
		redirect(site_url('profil_member'));
	}
	function update_passport()
	{
		$id =  $this->session->userdata('id_member');
		$isi = $this->input->post('isi_biodata_member');
		$result = array();
		foreach ($isi as $key => $val) {
			$result[] = array(
				'id_biodata_member'	 => $_POST['id_biodata_member'][$key],
				'isi_biodata_member' => $_POST['isi_biodata_member'][$key]
			);
		}
		$this->db->where('id_member', $id);
		$this->db->update_batch('tb_data_member', $result, 'id_biodata_member');

		if ($_FILES['userfile']['name'] != NULL) {
			
			$config['upload_path']    = './images/';
			$config['allowed_types']  = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			$hasil  = $this->upload->data();
			$data = array(
				'isi_biodata_member' => $hasil['file_name']
			);
			$this->db->where('id_member', $id);
			$this->db->where('id_biodata_member', 24);
			$this->db->update('tb_data_member', $data);
		}
		$this->session->set_flashdata('message', 'Data passport berhasil diperbarui');
		redirect(site_url('profil_member'));
	}
	function update_ktp()
	{
		$id =  $this->session->userdata('id_member');
		$isi = $this->input->post('isi_biodata_member');
		$result = array();
		foreach ($isi as $key => $val) {
			$result[] = array(
				'id_biodata_member'	 => $_POST['id_biodata_member'][$key],
				'isi_biodata_member' => $_POST['isi_biodata_member'][$key]
			);
		}
		$this->db->where('id_member', $id);
		$this->db->update_batch('tb_data_member', $result, 'id_biodata_member');

		if ($_FILES['userfile']['name'] != NULL) {
			
			$config['upload_path']    = './images/';
			$config['allowed_types']  = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->do_upload();

			$hasil  = $this->upload->data();
			$data = array(
				'isi_biodata_member' => $hasil['file_name']
			);
			$this->db->where('id_member', $id);
			$this->db->where('id_biodata_member', 17);
			$this->db->update('tb_data_member', $data);
		}
		$this->session->set_flashdata('message', 'Data KTP berhasil diperbarui');
		redirect(site_url('profil_member'));
	}
}

/* End of file Profil_member.php */
/* Location: ./application/modules/profil_member/controllers/Profil_member.php*/