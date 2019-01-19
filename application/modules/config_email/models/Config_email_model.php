<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_email_model extends CI_Model {

	function tampilkan_data()
	{
		return $this->db->get('tb_konfig_email');
	}
	
	function update()
	{
		if ($this->input->post('pass') != NULL) {
			$data = array(
				'email' => $this->input->post('email'), 
				'host' => $this->input->post('host'), 
				'port' => $this->input->post('port'), 
				'timeout' => $this->input->post('timeout'), 
				'user' => $this->input->post('email'), 
				'pass' => $this->input->post('pass')
			);
		} else {
			$data = array(
				'email' => $this->input->post('email'), 
				'host' => $this->input->post('host'), 
				'port' => $this->input->post('port'), 
				'timeout' => $this->input->post('timeout'), 
				'user' => $this->input->post('email'), 
			);
		}
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_konfig_email', $data);
	}

}

/* End of file Config_email_model.php */
/* Location: ./application/modules/config_email/models/Config_email_model.php */