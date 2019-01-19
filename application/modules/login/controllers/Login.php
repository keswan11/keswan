<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index(){
		$d['title'] = 'Ditjen Keswan';
		$this->load->view('login_view', $d);
	}

	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->Login_model->cek($username, md5($password));
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$data = array(
					'id_operator' 			=> $data->id_operator,
					'id_wilayah_operator' 	=> $data->id_wilayah_operator,
					'id_role_operator' 		=> $data->id_role_operator,
					'username' 				=> $data->username_operator,
					'nama_role_operator' 	=> $data->nama_role_operator,
					'nama_provinsi' 		=> $data->nama_provinsi,
					'nama_kabupaten' 		=> $data->nama_kabupaten,
					'status' 				=> $data->status,
					'level' 				=> $data->level,
					'is_logged_in' 			=> TRUE);
				$this->session->set_userdata($data);
			}

			if($this->session->userdata('level') == 'Operator' && $this->session->userdata('status') == "Aktif")
			{
				$role = $this->session->userdata('id_role_operator');
				$link = $this->Login_model->get_role_name($role)->row();
				$str =  str_replace(' ', '_', strtolower($link->nama_role_operator));

				redirect("page_operator/index/".$str);
			} 
			else if ($this->session->userdata('level') == 'Admin' && $this->session->userdata('status') == "Aktif")
			{
			    redirect('menu_management');
			}
			else
			{
				redirect('login');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dan password salah.');
			redirect($this->agent->referrer());
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */