<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	// SELECT
	// tb_operator.id_role_operator,
	// tb_role_operator.id_role_operator,
	// tb_role_operator.nama_role_operator,
	// tb_provinsi.id_provinsi,
	// tb_provinsi.nama AS nama_provinsi,
	// tb_kabupaten.id_kabupaten,
	// tb_kabupaten.nama AS nama_kabupaten
	// FROM 
	// tb_operator
	// LEFT JOIN tb_role_operator ON tb_role_operator.id_role_operator = tb_operator.id_role_operator
	// LEFT JOIN tb_provinsi ON tb_provinsi.id_provinsi = tb_operator.id_wilayah_operator
	// LEFT JOIN tb_kabupaten ON tb_kabupaten.id_kabupaten = tb_operator.id_wilayah_operator

	public function cek($username, $password)
	{
		$this->db->select('
		tb_operator.id_operator,
			tb_operator.id_role_operator,
			tb_operator.username_operator,
			tb_operator.password_operator,
			tb_operator.status,
			tb_operator.level,
			tb_role_operator.id_role_operator,
			tb_role_operator.nama_role_operator,
			tb_provinsi.id_provinsi,
			tb_provinsi.nama AS nama_provinsi,
			tb_kabupaten.id_kabupaten,
			tb_kabupaten.nama AS nama_kabupaten,
			tb_operator.id_wilayah_operator
			');
		$this->db->from('tb_operator');
		$this->db->join('tb_role_operator', 'tb_role_operator.id_role_operator = tb_operator.id_role_operator', 'left');
		$this->db->join('tb_provinsi', 'tb_provinsi.id_provinsi = tb_operator.id_wilayah_operator', 'left');
		$this->db->join('tb_kabupaten', 'tb_kabupaten.id_kabupaten = tb_operator.id_wilayah_operator', 'left');
		$this->db->where('tb_operator.username_operator', $username);
		$this->db->where('tb_operator.password_operator', $password);
		$this->db->where('tb_operator.status', 'Aktif');
		//echo this->db->last_query();
		return $this->db->get();
	}
	
	public function get_role_name($id){
		$query = "SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id";
		return $this->db->query($query);
	}

}

/* End of file Login_model.php */
/* Location: ./application/modules/login/models/Login_model.php */