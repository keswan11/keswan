<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_operator');
		$this->load->model('wilayah/model_wilayah');
	}

	public function index()
	{
		$data['title'] = "Manajemen Operator";
		$this->template->load('templates/template','tes',$data);
	}
	
	

	public function operator_pusat()
	{
		$data['title'] = "Manajemen Operator Pusat";
		$data['operator'] = $this->model_operator->operator()->result();
		$this->template->load('templates/template','lihat_data',$data);
	}

	public function operator_pusat_tambah()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->operator_tambah();
			$this->session->set_flashdata('pesan', 'Operator berhasil ditambah');
			redirect('operator/operator_pusat','refresh');
		} else {
			$data['title'] 			= "Tambah Operator Pusat";
			$data['role_operator']	= $this->model_operator->role_operator()->result();
			$this->template->load('templates/template','tambah_data',$data);
		}
	}

	public function operator_pusat_edit()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->operator_edit();
			$this->session->set_flashdata('pesan', 'Operator berhasil diperbarui');
			redirect('operator/operator_pusat','refresh');
		} else {
			$id = $this->uri->segment(3);
			$data['title'] 			= "Perbarui Operator Pusat";
			$data['operator']		= $this->model_operator->get_operator($id)->row_array();
			$data['role_operator']	= $this->model_operator->role_operator()->result();
			$this->template->load('templates/template','ubah_data',$data);
		}
	}

	public function operator_provinsi()
	{
		$data['title'] = "Manajemen Operator Provinsi";
		$data['operator'] = $this->model_operator->operator()->result();
		$this->template->load('templates/template','lihat_data',$data);
	}

	public function operator_provinsi_tambah()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->operator_tambah();
			$this->session->set_flashdata('pesan', 'Operator berhasil ditambah');
			redirect('operator/operator_provinsi','refresh');
		} else {
			$data['title'] 			= "Tambah Operator Provinsi";
			$data['role_operator']	= $this->model_operator->role_operator()->result();
			$data['provinsi']		= $this->model_wilayah->provinsi()->result();
			$this->template->load('templates/template','tambah_data',$data);
		}
	}

	public function operator_provinsi_edit()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->operator_edit();
			$this->session->set_flashdata('pesan', 'Operator berhasil diperbarui');
			redirect('operator/operator_provinsi','refresh');
		} else {
			$id = $this->uri->segment(3);
			$data['title'] 			= "Perbarui Operator Provinsi";
			$data['operator']		= $this->model_operator->get_operator($id)->row_array();
			$data['role_operator']	= $this->model_operator->role_operator()->result();
			$data['provinsi']		= $this->model_wilayah->provinsi()->result();
			$this->template->load('templates/template','ubah_data',$data);
		}
	}

	public function operator_kab_kota()
	{
		$data['title'] = "Manajemen Operator Kabupaten / Kota";
		$data['operator'] = $this->model_operator->operator()->result();
		$this->template->load('templates/template','lihat_data',$data);
	}

	public function operator_kab_kota_tambah()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->operator_tambah();
			$this->session->set_flashdata('pesan', 'Operator berhasil ditambah');
			redirect('operator/operator_kab_kota','refresh');
		} else {
			$data['title'] 			= "Tambah Operator Provinsi";
			$data['role_operator']	= $this->model_operator->role_operator()->result();
			$data['kab_kota']		= $this->model_wilayah->kab_kota()->result();
			$this->template->load('templates/template','tambah_data',$data);
		}
	}

	public function operator_kab_kota_edit()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->operator_edit();
			$this->session->set_flashdata('pesan', 'Operator berhasil diperbarui');
			redirect('operator/operator_kab_kota','refresh');
		} else {
			$id = $this->uri->segment(3);
			$data['title'] 			= "Perbarui Operator Kabupaten / Kota";
			$data['operator']		= $this->model_operator->get_operator($id)->row_array();
			$data['role_operator']	= $this->model_operator->role_operator()->result();
			$data['kab_kota']		= $this->model_wilayah->kab_kota()->result();
			$this->template->load('templates/template','ubah_data',$data);
		}
	}

	public function role_operator()
	{
		$data['title'] = "Role Operator";
		$data['role']  = $this->model_operator->role_operator()->result();
		$this->template->load('templates/template','role_operator_view',$data);
	}

	public function role_operator_tambah()
	{
		$this->model_operator->role_operator_tambah();
		$this->session->set_flashdata('pesan', 'Role operator berhasil ditambah');
		redirect('operator/role_operator','refresh');
	}

	public function role_operator_edit()
	{
		if (isset($_POST['submit'])) {
			$this->model_operator->role_operator_edit();
			$this->session->set_flashdata('pesan', 'Role operator berhasil diperbarui');
			redirect('operator/role_operator','refresh');
		} else {
			$id = $this->uri->segment(3);
			$data['title'] = "Edit role operator";
			$data['role']  = $this->model_operator->get_role_operator($id)->row_array();
			$this->template->load('templates/template','role_operator_edit',$data);
		} 
	}

	public function role_operator_hapus()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id_role_operator', $id);
		$hapus = $this->db->delete('tb_role_operator');
		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Role operator berhasil dihapus');
		} else {
			$this->session->set_flashdata('pesan', 'Role operator gagal dihapus');
		}
		redirect('operator/role_operator','refresh');
	}

	public function operator_hapus()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id_operator', $id);
		$hapus = $this->db->delete('tb_operator');
		if ($hapus) {
			$this->session->set_flashdata('pesan', 'Operator berhasil dihapus');
		} else {
			$this->session->set_flashdata('pesan', 'Operator gagal dihapus');
		}
		redirect($this->agent->referrer());
		
	}

}

/* End of file Operator.php */
/* Location: ./application/controllers/Operator.php */