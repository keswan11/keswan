<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_operator extends CI_Model {

	function cek($username, $password){
		$this->db->where('username_operator', $username);
		$this->db->where('password_operator', $password);
		$this->db->where('status', 'Aktif');
		return $this->db->get('tb_operator');
	}

	public function role_operator()
	{
		return $this->db->get('tb_role_operator');
	}

	public function operator()
	{
		$query = "
		SELECT 
		tb_operator.*,
		tb_provinsi.*,
		tb_kabupaten.*,
		tb_provinsi.nama AS nama_wilayah,
		tb_kabupaten.nama AS kab_kota,
		tb_role_operator.*
		FROM
		tb_operator
		LEFT JOIN tb_provinsi ON tb_operator.id_wilayah_operator = tb_provinsi.id_provinsi
		LEFT JOIN tb_kabupaten ON tb_operator.id_wilayah_operator = tb_kabupaten.id_kabupaten
		LEFT JOIN tb_role_operator ON tb_operator.id_role_operator = tb_role_operator.id_role_operator
		LEFT JOIN tb_role_wilayah ON tb_provinsi.id_role_wilayah = tb_role_wilayah.id_role_wilayah
		";
		if ($this->uri->segment(2) == "operator_pusat") {
			$query .=" WHERE tb_operator.id_wilayah_operator = 1";
		} else if ($this->uri->segment(2) == "operator_provinsi") {
			$query .= "WHERE tb_operator.id_wilayah_operator != 1 AND tb_provinsi.id_role_wilayah = 2";
		} else if ($this->uri->segment(2) == "operator_kab_kota") {
			$query .= "WHERE tb_operator.id_wilayah_operator != 1 AND tb_kabupaten.id_role_wilayah = 3";
		}
		return $this->db->query($query);
	}

	public function operator_tambah()
	{
		$id_role_operator = $this->input->post('id_role_operator');
		
		$query = $this->db->query("SELECT username_role FROM tb_role_operator WHERE id_role_operator = $id_role_operator");
		$row = $query->row_array();

		$username = $row['username_role']."_".$this->input->post('id_wilayah_operator');
		$data = array(
			'username_operator'   => $username,
			'password_operator'   => md5($this->input->post('password_operator')),
			'id_wilayah_operator' => $this->input->post('id_wilayah_operator'),
			'id_role_operator'    => $this->input->post('id_role_operator'),
			'status'			  => $this->input->post('status')
		);
		$this->db->insert('tb_operator', $data);
	}

	public function get_operator($id)
	{
		$query = "
		SELECT 
		tb_operator.*,
		tb_provinsi.*,
		tb_kabupaten.*,
		tb_provinsi.nama AS nama_wilayah,
		tb_kabupaten.nama AS kab_kota,
		tb_role_operator.*
		FROM
		tb_operator
		LEFT JOIN tb_provinsi ON tb_operator.id_wilayah_operator = tb_provinsi.id_provinsi
		LEFT JOIN tb_kabupaten ON tb_operator.id_wilayah_operator = tb_kabupaten.id_kabupaten
		LEFT JOIN tb_role_operator ON tb_operator.id_role_operator = tb_role_operator.id_role_operator
		LEFT JOIN tb_role_wilayah ON tb_provinsi.id_role_wilayah = tb_role_wilayah.id_role_wilayah
		WHERE tb_operator.id_operator = $id
		";
		return $this->db->query($query);
	}

	public function operator_edit()
	{
		$id = $this->input->post('id_operator');
		
		$id_role_operator = $this->input->post('id_role_operator');
		
		$query = $this->db->query("SELECT username_role FROM tb_role_operator WHERE id_role_operator = $id_role_operator");
		$row = $query->row_array();

		$username = $row['username_role']."_".$this->input->post('id_wilayah_operator');

		if ($this->input->post('password_operator' == NULL)) {
			$data = array(
				'username_operator'   => $username,
				'id_wilayah_operator' => $this->input->post('id_wilayah_operator'),
				'id_role_operator'    => $this->input->post('id_role_operator'),
				'status'			  => $this->input->post('status')
			);
		} else {
			$data = array(
				'username_operator'   => $username,
				'password_operator'   => md5($this->input->post('password_operator')),
				'id_wilayah_operator' => $this->input->post('id_wilayah_operator'),
				'id_role_operator'    => $this->input->post('id_role_operator'),
				'status'			  => $this->input->post('status')
			);
		}
		$this->db->where('id_operator', $id);
		$this->db->update('tb_operator', $data);
	}

	public function role_operator_tambah()
	{
		$data = array(
			'nama_role_operator' => $this->input->post('nama_role_operator'),
			'username_role' 	 => $this->input->post('username_role')
		);
		$this->db->insert('tb_role_operator', $data);
	}

	public function role_operator_edit()
	{
		$id = $this->input->post('id_role_operator');
		$data = array(
			'nama_role_operator' => $this->input->post('nama_role_operator'),
			'username_role' 	 => $this->input->post('username_role')
		);
		$this->db->where('id_role_operator', $id);
		$this->db->update('tb_role_operator', $data);
	}

	public function get_role_operator($id)
	{
		$this->db->where('id_role_operator', $id);
		return $this->db->get('tb_role_operator');
	}

}

/* End of file Model_operator.php */
/* Location: ./application/models/Model_operator.php */