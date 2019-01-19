<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek($username, $password)
	{
		// SELECT
		// tb_jenis_biodata.*,
		// tb_jenis_member.*,
		// tb_jenis_input.*
		// FROM tb_biodata_jenis_member
		// INNER JOIN tb_jenis_biodata ON tb_jenis_biodata.id_jenis_biodata = tb_biodata_jenis_member.id_jenis_biodata
		// INNER JOIN tb_jenis_member ON tb_jenis_member.id_jenis_member = tb_biodata_jenis_member.id_jenis_member
		// INNER JOIN tb_jenis_input ON tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata

		$this->db->select('tb_jenis_member.*, tb_jenis_warga.*, tb_list_member.*');
		$this->db->from('tb_list_member');
		$this->db->join('tb_jenis_member', 'tb_jenis_member.id_jenis_member = tb_list_member.id_jenis_member');
		$this->db->join('tb_jenis_warga', 'tb_jenis_warga.id_jenis_warga = tb_list_member.id_jenis_warga');
		$this->db->where('tb_list_member.username', $username);
		$this->db->where('tb_list_member.password', $password);
	//	$this->db->where('tb_list_member.status', 'Aktif');
		return $this->db->get();
	}
	
	function foto($id)
	{
		$this->db->select('*');
		$this->db->from('tb_data_member');
		$this->db->where('id_member', $id);
		$this->db->where('id_biodata_member', 30);
		return $this->db->get();
	}
	
	function user_image($username)
	{
		$query = "SELECT * FROM tb_list_member, tb_data_member where tb_list_member.id_member = tb_data_member.id_member AND tb_list_member.username = '$username' AND tb_data_member.id_biodata_member = '30'";

		return $this->db->query($query);
	}

	function fullname($username)
	{
		$query = "SELECT * FROM tb_list_member, tb_data_member where tb_list_member.id_member = tb_data_member.id_member AND tb_list_member.username = '$username' AND tb_data_member.id_biodata_member = '1'";

		return $this->db->query($query);
	}
	
	function penanggung_jawab($username)
	{
		$query = "SELECT * FROM tb_list_member, tb_data_member where tb_list_member.id_member = tb_data_member.id_member AND tb_list_member.username = '$username' AND tb_data_member.id_biodata_member = '10'";

		return $this->db->query($query);
	}

}

/* End of file Login_model.php */
/* Location: ./application/modules/member/models/Login_model.php */