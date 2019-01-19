	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Daftar extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->library('MyPHPMailer');
			$this->load->model('jenis_biodata/Jenis_biodata_model');
			$this->load->model('jenis_warga/Jenis_warga_model');
		}

		public function index()
		{
			$data = array(
				'title' 		=> 'Ditjen Keswan',
				'judul'			=> 'Pilih Jenis Member',
			);
			$this->template->load('templates/daftar_template','pilih_jenis_member',$data);
		}


		public function perorangan()
		{
			$data = array(
				'title' 		=> 'Ditjen Keswan', 
				'judul' 		=> 'Pendaftaran Member Perorangan',
				'warga_negara'  => $this->Jenis_warga_model->get_all(),
				'biodata' 		=> $this->Jenis_biodata_model->perorangan(),
				'passport'		=> $this->Jenis_biodata_model->passport(),
			);
			$this->template->load('templates/daftar_template','daftar_view',$data);
		}

		public function instansi()
		{
			$data = array(
				'title' 		=> 'Ditjen Keswan', 
				'judul' 		=> 'Pendaftaran Member Instansi',
				'warga_negara'  => $this->Jenis_warga_model->get_all(),
				'biodata' 		=> $this->Jenis_biodata_model->instansi(),
			);
			$this->template->load('templates/daftar_template','daftar_view',$data);
		}

		function active($key)
		{
			$token  = bin2hex(openssl_random_pseudo_bytes(30));
			$query = $this->db->query("SELECT * FROM tb_list_member WHERE token = '$key'");
			if ($query->num_rows() > 0) {
				// $this->model_user->aktif_by_email($key);
				$data = array(
					'status' => 'Aktif',
					'token'	 => $token 
				);
				$this->db->where('token', $key);
				$this->db->update('tb_list_member', $data);

				echo "<script type='text/javascript'>alert('Akun telah tervalidasi dan aktif, Silahkan Login untuk masuk ke sistem');
				window.location=('".base_url('member')."')</script>";
			} else {
				echo "<script type='text/javascript'>alert('Halaman kadarluasa');
				window.location=('".base_url('member')."')</script>";
			}
		}

// 		public function email_check()
// 		{  
// 			if($this->input->is_ajax_request()) {
// 				$email = $this->input->post('email');
// 				$this->db->where('isi_biodata_member', $email);
// 				$num_rows = $this->db->count_all_results('tb_data_member');
// 				if($num_rows > 0) {
// 					$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<p style="color: red;">Email sudah terdaftar! <br> Silahkan gunakan email lain</p>')));
// 				} else {
// 					$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<p style="color: green;">Email belum terdaftar</p><br>
// 						<button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
// 						')));
// 				}
// 			}
// 		}

		public function email_check()
		{  
			if($this->input->is_ajax_request()) {
				$email = $this->input->post('email');
				$this->db->where('isi_biodata_member', $email);
				$num_rows = $this->db->count_all_results('tb_data_member');
				if($num_rows > 0) {
					$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i style="color: red;">Email sudah terdaftar! Silahkan gunakan email lain</i>')));
				} else {
					$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '<i style="color: green;">Email belum terdaftar</i>
						')));
				}
			}
		}

		public function daftar_action()
		{
			$this->db->select('*');
			$this->db->from('tb_data_member');
			$this->db->where('isi_biodata_member', $this->input->post('email'));
			$query_mail = $this->db->get();
			$row_mail = $query_mail->row();
			if ($row_mail->isi_biodata_member == $this->input->post('email')) {
				echo "<script type='text/javascript'>alert('Pendaftaran gagal! Email telah digunakan, silahkan gunakan email lain');
				window.location=('".base_url('daftar')."')</script>";
			} else {			
				$token  = bin2hex(openssl_random_pseudo_bytes(30));
				$kirim_email  = $this->input->post('email');
				$parts 			= explode("@", $kirim_email);
				$username 		= $parts[0];
				
				$this->db->select('MAX(id_member) AS id_terakhir');
				$this->db->from('tb_list_member');
				$query_user = $this->db->get();
				$ru = $query_user->row();
				$username_id 	= $username."_".$ru->id_terakhir;


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
				$mail->Subject    = "Verifikasi dan Validasi Pendaftaran"; 
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
				<p style='color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;'>Terima kasih telah mendaftar di diAplikasi pelayanan jasa medik veteriner. Anda sekarang bisa masuk log dengan mengklik tautan dibawah ini atau salin dan tempel ke peramban Anda:</p>
				<p style='margin:0 10px 10px 10px;padding:0;'>
				<br>
				Nama Pengguna : <b>".$username_id."</b> <br>
				Sandi : <b><i>Kata sandi anda</i></b> <br>
				Tautan ini hanya bisa digunakan sekali saja <br>
				<p>
				<a style='display:inline-block;text-decoration:none;padding:15px 20px;background-color:#2baaed;border:1px solid #2baaed;border-radius:3px;color:#FFF;font-weight:bold;' href='".site_url('daftar/active/'.$token)."' target='_blank'>Klik disini</a>
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
				$toEmail = $kirim_email; 
				$mail->AddAddress($this->input->post('email'));

				if(!$mail->Send()) {
				// echo "Error : ".$mail->ErrorInfo;
				} else {
					$isi = $this->input->post('isi_biodata_member');
					$gambar = $_FILES['userfile']['name'];
					$ug = array();
					$tgl = substr(md5(date('Y-m-d HH:mm:ss')), 0, 5);
					$result = array();

					if ($this->input->post('jenis_member') == "perorangan") {
						$this->db->select('MAX(id_member) AS id_terakhir');
						$this->db->from('tb_list_member');
						$query = $this->db->get();
						$row = $query->row();

						$idRow = $row->id_terakhir;
						$data_list_member = array(
							'id_member'		  => $idRow + 1,
							'id_jenis_member' => $this->input->post('id_jenis_member'),
							'id_jenis_warga'  => $this->input->post('id_jenis_warga'),
							'username'		  => $username_id,
							'password'		  => md5($this->input->post('password')),
							'status'		  => 'Tidak Aktif',
							'token'		  	  => $token
						);
						$this->db->insert('tb_list_member', $data_list_member);
						foreach ($isi as $key => $val) {
							$result[] = array(
								'id_member' 		 => $idRow + 1,
								'id_biodata_member'	 => $_POST['id_biodata_member'][$key],
								'isi_biodata_member' => $_POST['isi_biodata_member'][$key]
							);
						}
						foreach($gambar AS $key => $val){
							$ext = explode('.', basename($_FILES['userfile']['name'][$key]));

							$path = $tgl."_".$key ."." . $ext[count($ext)-1];

							move_uploaded_file($_FILES['userfile']['tmp_name'][$key], './images/'.$path);

							$ug[] = array(
								'id_member'  			=> $idRow + 1,
								'id_biodata_member' 	=> $_POST['id_gambar'][$key],
								'isi_biodata_member'  	=> $path
							);
						}
						$input = array(
							'id_member'		  		=> $idRow + 1,
							'id_biodata_member' 	=> $this->input->post('id_email'),
							'isi_biodata_member'  	=> $this->input->post('email')
						);
						$this->db->insert('tb_data_member', $input);
						$this->db->insert_batch('tb_data_member', $result);
						$this->db->insert_batch('tb_data_member', $ug);
						
					} else if ($this->input->post('jenis_member') == "instansi") {
						$this->db->select('MAX(id_member) AS id_terakhir');
						$this->db->from('tb_list_member');
						$query = $this->db->get();
						$row = $query->row();

						$idRow = $row->id_terakhir;
						$data_list_member = array(
							'id_member'		  => $idRow + 1,
							'id_jenis_member' => $this->input->post('id_jenis_member'),
							'id_jenis_warga'  => $this->input->post('id_jenis_warga'),
							'username'		  => $username_id,
							'password'		  => md5($this->input->post('password')),
							'status'		  => 'Tidak Aktif',
							'token'		  	  => $token
						);
						$this->db->insert('tb_list_member', $data_list_member);
						foreach ($isi as $key => $val) {
							$result[] = array(
								'id_member' 		 => $idRow + 1,
								'id_biodata_member'	 => $_POST['id_biodata_member'][$key],
								'isi_biodata_member' => $_POST['isi_biodata_member'][$key]
							);
						}
						foreach($gambar AS $key => $val){
							$ext = explode('.', basename($_FILES['userfile']['name'][$key]));

							$path = $tgl."_".$key ."." . $ext[count($ext)-1];

							move_uploaded_file($_FILES['userfile']['tmp_name'][$key], './images/'.$path);

							$ug[] = array(
								'id_member'  			=> $idRow + 1,
								'id_biodata_member' 	=> $_POST['id_gambar'][$key],
								"isi_biodata_member"  	=> $path
							);
						}
						$input = array(
							'id_member'		  		=> $idRow + 1,
							'id_biodata_member' 	=> $this->input->post('id_email'),
							'isi_biodata_member'  	=> $this->input->post('email')
						);
						$this->db->insert('tb_data_member', $input);
						$this->db->insert_batch('tb_data_member', $result);
						$this->db->insert_batch('tb_data_member', $ug);
						
					}
					$this->session->set_flashdata('message', 'Pendaftaran berhasil, silahkan cek email (kotak masuk / spam) untuk langkah selanjutnya');
					redirect(site_url('member'));
				}	
			}
		}

	}
	/* End of file Daftar.php */
	/* Location: ./application/modules/daftar/controllers/Daftar.php */