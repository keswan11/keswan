<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wilayah extends CI_Model {

	public function provinsi()
	{
		$this->db->where('nama !=', 'Pusat');
		return $this->db->get('tb_provinsi');
	}

	public function kab_kota()
	{
		return $this->db->get('tb_kabupaten');
	}

}

/* End of file Model_wilayah.php */
/* Location: ./application/models/Model_wilayah.php */