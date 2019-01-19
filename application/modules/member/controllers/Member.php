<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('MyPHPMailer');
	}

	public function index()
	{

		if($this->session->userdata('is_logged_in'))
		{
			redirect('halaman_member');
		} else {
			$data = array(
				'title' 		=> 'Ditjen Keswan',
				'judul'			=> 'Login member',
			);
			$this->template->load('templates/daftar_template','login',$data);
		}

	}

	function lupa_password()
	{
		if (isset($_POST['submit'])) {

			// SELECT tb_jenis_member.*, tb_jenis_warga.*, tb_list_member.*, tb_data_member.*
			// from tb_list_member
			// INNER join tb_jenis_member ON tb_jenis_member.id_jenis_member = tb_list_member.id_jenis_member
			// INNER join tb_jenis_warga ON tb_jenis_warga.id_jenis_warga = tb_list_member.id_jenis_warga
			// INNER JOIN tb_data_member ON tb_data_member.id_member = tb_list_member.id_member
			// where tb_data_member.id_biodata_member = 4
			// and tb_data_member.isi_biodata_member = "fajarsurahman3@gmail.com"

			$this->db->select('tb_jenis_member.*, tb_jenis_warga.*, tb_list_member.*, tb_data_member.*');
			$this->db->from('tb_list_member');
			$this->db->join('tb_jenis_member', 'tb_jenis_member.id_jenis_member = tb_list_member.id_jenis_member');
			$this->db->join('tb_jenis_warga', 'tb_jenis_warga.id_jenis_warga = tb_list_member.id_jenis_warga');
			$this->db->join('tb_data_member', 'tb_data_member.id_member = tb_list_member.id_member');
			$this->db->where('tb_data_member.id_biodata_member', 4);
			$this->db->where('tb_data_member.isi_biodata_member', $this->input->post('email'));
			$query = $this->db->get();
			$row   = $query->row();


			$this->db->select('*');
			$this->db->from('tb_konfig_email');
			$this->db->where('id', 1);
			$ma_il = $this->db->get();
			$rm	   = $ma_il->row();

			$fromEmail = $rm->email; 

			$mail = new PHPMailer();

			$mail->IsSMTP();   
			$mail->SMTPAuth   = true; 
			$mail->SMTPSecure = "tls";
		// $mail->SMTPDebug  = 2;
			$mail->Host       = $rm->host; 
			$mail->Port       = $rm->port; 
			$mail->Username   = $rm->user;  
			$mail->Password   = $rm->pass;
			$mail->CharSet    = 'iso-8859-1';
			$mail->SetFrom($rm->email, 'noreply');  
			$mail->Subject    = "Lupa password"; 
			$isiEmail = "
			<div style='background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:20px;font-family:'Helvetica Neue',Arial,sans-serif;text-align:left;''>
			<center>
			<table style='width:550px;'>
			<tbody>
			<tr>
			<td style='padding:0 0 20px 0;border-bottom:1px solid #e9edee;text-align:center;'>
			<a href='#' style='display:block; margin:0 auto;' target='_blank'>
			<img src='http://keswan.pancakaryawijaya.com/assets/logo.png' style='border: 0px;' width='20%'>
			</a>
			</td>
			</tr>
			<tr>
			<td colspan='2' style='padding:30px 0;'>
			<p style='color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;'>Berikut ini kami kirimkan link untuk pembaruan password anda</p>
			<p style='margin:0 10px 10px 10px;padding:0;'>
			<br>
			Tautan ini hanya bisa digunakan sekali saja <br>
			<p>
			<a style='display:inline-block;text-decoration:none;padding:15px 20px;background-color:#2baaed;border:1px solid #2baaed;border-radius:3px;color:#FFF;font-weight:bold;' href='".site_url('member/update_password/'.$row->token)."' target='_blank'>Klik disini</a>
			</p>
			</p>
			</td>
			</tr>
			<tr>
			<td colspan='2' style='padding:30px 0 0 0;border-top:1px solid #e9edee;color:#9b9fa5'>
			Copyright &copy; 2017
			</td>
			</tr>
			</tbody>
			</table>
			</center>
			</div>
			";
			$mail->Body = $isiEmail;
			$mail->IsHTML(true);
			$toEmail = $this->input->post('email'); 
			$mail->AddAddress($this->input->post('email'));

			if(!$mail->Send()) {
				$this->session->set_flashdata('pesan', 'Email gagal terkirim, silahkan coba lagi.');
				redirect('member/lupa_password');
			} else {
				$this->session->set_flashdata('message', 'Email terikirim, silahkan cek email(kotak masuk/spam).');
				redirect('member');
			}
		} else {
			$data = array(
				'title' 		=> 'Ditjen Keswan',
				'judul'			=> 'Lupa password',
			);
			$this->template->load('templates/daftar_template','lupa_password',$data);
		}
	}

	function update_password()
	{
		$get_key = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM tb_list_member WHERE token = '$get_key'");
		if ($query->num_rows() > 0) {
			$data = array(
				'title' 		=> 'Ditjen Keswan',
				'judul'			=> 'Ganti password',
			);
			$this->template->load('templates/daftar_template','ganti_password',$data);
		} else {
			echo "<script type='text/javascript'>alert('Halaman kadarluasa');
			window.location=('".base_url()."')</script>";
		}
	}

	function update_password_action()
	{
		$key = $this->input->post('key');
		$token  = substr(sha1(rand()), 0, 30);
		$data = array(
			'password' => md5($this->input->post('password')), 
			'token'	   => $token
		);
		$this->db->where('token', $key);
		$this->db->update('tb_list_member', $data);
		$this->session->set_flashdata('message', 'Password berhasil diganti silahkan login');
		redirect('member');
	}

	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->Login_model->cek($username, md5($password));
		$user_image = $this->Login_model->user_image($username);
		$fullname 	= $this->Login_model->fullname($username);
		$penanggung_jawab = $this->Login_model->penanggung_jawab($username);

		if($cek->num_rows() > 0)
		{
			foreach($cek->result() as $data){
				$data = array(
					'id_member' 		=> $data->id_member,
					'id_jenis_member' 	=> $data->id_jenis_member,
					'id_jenis_warga' 	=> $data->id_jenis_warga,
					'username' 			=> $data->username,
					'status' 			=> $data->status,
					'is_logged_in' 		=> TRUE);
				$this->session->set_userdata($data);
			}

			foreach ($user_image->result() as $u_image) 
			{
				$u_image = array(
					'user_image' => $u_image->isi_biodata_member, );
				$this->session->set_userdata($u_image);
			}

			foreach ($fullname->result() as $fn) 
			{
				$fn = array(
					'fullname' => $fn->isi_biodata_member, );
				$this->session->set_userdata($fn);
			}
			
			foreach ($penanggung_jawab->result() as $pj) 
			{
				$pj = array(
					'penanggung_jawab' => $pj->isi_biodata_member, );
				$this->session->set_userdata($pj);
			}


			if($this->session->userdata('status') == 'Aktif')
			{
				redirect('halaman_member');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'Akun belum diaktifasi');
				redirect('member');
			}
		} 
		else
		{
			$this->session->set_flashdata('pesan', 'Kombinasi username dan password salah');
			redirect($this->agent->referrer());
		}
	}
	
	function ganti_foto()
	{
		if($this->session->userdata('is_logged_in') <> TRUE)
		{
			redirect('member');
		}
		$id =  $this->session->userdata('id_member');
		$foto_cek = $this->Login_model->foto($id)->row_array();
		$data = array(
			'title' 		=> 'Ditjen Keswan',
			'judul'			=> 'Ganti Foto',
			'foto'			=> $foto_cek
		);
		$this->template->load('templates/template','ganti_foto',$data);
	}
	
	function ganti_foto_action()
	{
		$id =  $this->session->userdata('id_member');
		$config['upload_path']    = './images/';
		$config['allowed_types']  = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload();

		$hasil  = $this->upload->data();
		$data = array(
			'isi_biodata_member' => $hasil['file_name']
		);
		$this->db->where('id_member', $id);
		$this->db->where('id_biodata_member', 30);
		$this->db->update('tb_data_member', $data);
		$this->session->set_flashdata('message', 'Foto berhasil diganti');
		redirect('member/ganti_foto','refresh');
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('member');
	}

}

/* End of file Member.php */
/* Location: ./application/modules/member/controllers/Member.php */