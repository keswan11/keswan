<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_izin extends CI_Controller {
  function __construct()
    {
        parent::__construct();
        
    $this->load->library('MyPHPMailer');
        $this->load->model('surat_rekomendasi/Model_surat_rekomendasi');
        $this->load->model('Model_surat_izin');
        $this->load->model('page_operator/Page_operator_model');
      $this->load->library('form_validation');
      
      
    }
    
    function tolak_surat()
    {
        $id_pengajuan=$this->uri->segment(4);
        $id_jenis_pengajuan=$this->uri->segment(3);
        $id_status=6;

    $sql="UPDATE tb_list_pengajuan_surat_izin SET id_status_pengajuan=$id_status
    WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);
    
  foreach($this->Model_surat_izin->get_list_pengajuan_izin($id_pengajuan) as $dpengajuan)
  {
    foreach($this->Model_surat_izin->get_member_by_id($dpengajuan->id_member) as $dmember)
      {
          if($dmember->id_jenis_biodata==4)
          {
              $email_pengguna=$dmember->isi_biodata_member;
          }
          if($dmember->id_jenis_biodata==1)
          {
              $nama_pengguna=$dmember->isi_biodata_member;
          }
          else if($dmember->id_jenis_biodata==10)
          {
              $nama_pengguna=$dmember->isi_biodata_member;
          }
      }
      $tanggal_surat=$dpengajuan->tgl_dibuat;
      $nama_surat=$dpengajuan->nama_jenis_pengajuan;
  }
      
    
            //$token  = substr(sha1(rand()), 0, 30);
      $kirim_email  = $email_pengguna;
      /*$parts      = explode("@", $kirim_email);
      $username     = $parts[0];
      
      $this->db->select('MAX(id_member) AS id_terakhir');
      $this->db->from('tb_list_member');
      $query_user = $this->db->get();
      $ru = $query_user->row();
      $username_id  = $username."_".$ru->id_terakhir;*/


      $this->db->select('*');
      $this->db->from('tb_konfig_email');
      $this->db->where('id', 1);
      $ma_il = $this->db->get();
      $rm    = $ma_il->row();

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
      $mail->Subject    = "Verifikasi dan Validasi Surat Izin"; 
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
              <p style='color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;'>Terima kasih telah mengajukan ".$nama_surat.", 
              Mohon maaf permintaan Anda tidak dapat diperoses, 
              silahkan login dan lihat rincian data berikut :</p>
              <p style='margin:0 10px 10px 10px;padding:0;'>
              <br>
              Nama Pengguna : ".$nama_pengguna."<b></b> <br>
              Jenis Surat Pengajuan : ".$nama_surat." <br>
              Tanggal Surat : ".tgl_indo_timestamp($tanggal_surat)."<br>
              
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
      $mail->AddAddress($kirim_email);

      if(!$mail->Send()) {
          echo $kirim_email;
          
      }
      else
      {
                echo "<script>
                alert('Surat berhasil di tolak !');
                window.location.href='".base_url()."surat_izin/detail/".$id_jenis_pengajuan."/".$id_pengajuan."';
                </script>";
      }
    }
    
    function terbitkan_surat()
    {
        $id_pengajuan=$this->uri->segment(4);
        $id_jenis_pengajuan=$this->uri->segment(3);
        $id_status=5;
        $return_page=str_replace('//','/',urldecode($this->uri->segment(5)));

    $sql="UPDATE tb_list_pengajuan_surat_izin SET id_status_pengajuan=$id_status
    WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);
    
  foreach($this->Model_surat_izin->get_list_pengajuan_izin($id_pengajuan) as $dpengajuan)
  {
    foreach($this->Model_surat_izin->get_member_by_id($dpengajuan->id_member) as $dmember)
      {
          if($dmember->id_jenis_biodata==4)
          {
              $email_pengguna=$dmember->isi_biodata_member;
          }
          if($dmember->id_jenis_biodata==1)
          {
              $nama_pengguna=$dmember->isi_biodata_member;
          }
          else if($dmember->id_jenis_biodata==10)
          {
              $nama_pengguna=$dmember->isi_biodata_member;
          }
      }
      $tanggal_surat=$dpengajuan->tgl_dibuat;
      $nama_surat=$dpengajuan->nama_jenis_pengajuan;
  }
      
    
            //$token  = substr(sha1(rand()), 0, 30);
      $kirim_email  = $email_pengguna;
      /*$parts      = explode("@", $kirim_email);
      $username     = $parts[0];
      
      $this->db->select('MAX(id_member) AS id_terakhir');
      $this->db->from('tb_list_member');
      $query_user = $this->db->get();
      $ru = $query_user->row();
      $username_id  = $username."_".$ru->id_terakhir;*/


      $this->db->select('*');
      $this->db->from('tb_konfig_email');
      $this->db->where('id', 1);
      $ma_il = $this->db->get();
      $rm    = $ma_il->row();

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
      $mail->Subject    = "Verifikasi dan Validasi Surat Izin"; 
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
              <p style='color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;'>Terima kasih telah mengajukan ".$nama_surat.", 
              Selamat permintaan anda sudah diterbitkan, 
              silahkan login dan lihat rincian data berikut :</p>
              <p style='margin:0 10px 10px 10px;padding:0;'>
              <br>
              Nama Pengguna : ".$nama_pengguna."<b></b> <br>
              Jenis Surat Pengajuan : ".$nama_surat." <br>
              Tanggal Surat : ".tgl_indo_timestamp($tanggal_surat)."<br>
              
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
      $mail->AddAddress($kirim_email);

      if(!$mail->Send()) {
          echo $kirim_email;
          
      }
      else
      {
                echo "<script>
                alert('Surat berhasil di terbitkan !');
                window.location.href='".$return_page."';
                </script>";
      }
    }

  public function index()
  {
    $data['title'] = 'Form Surat Izin';
    $data['data_surat_izin']=$this->Model_surat_izin->get_persyaratan_pengajuan();
    $data['data_list_surat_izin']=$this->Model_surat_izin->get_list_izin();
    $this->template->load('templates/template','surat_izin_list.php',$data);
  }

  public function input()
  {
    $id_jenis_pengajuan=$this->uri->segment(3);
    if(!isset($_POST['submit']))
    {
      $data['title'] = 'Form Surat Izin';
      $data['data_pengajuan']=$this->Model_surat_rekomendasi->get_jenis_pengajuan($id_jenis_pengajuan);
      $data['id_jenis_pengajuan']=$id_jenis_pengajuan;
      $data['data_pesyaratan']=$this->Model_surat_izin->get_persyaratan_form($id_jenis_pengajuan);
      $this->template->load('templates/template','input.php',$data);

    }
    else
    {
      $this->Model_surat_izin->input_surat_izin();
    }

  }

  function update_status()
  {
    $this->Model_surat_izin->update_status();
  }


  public function list_surat_izin()
  {
    if(!isset($_POST['submit']))
    {
      $data['title'] = 'Detail Surat Izin';
      $id_jenis_pengajuan=$this->uri->segment(3);
      $id_pengajuan=$this->uri->segment(4);
      $data['data_surat_izin']=$this->Model_surat_izin->get_persyaratan_pengajuan();
      $data['data_list_surat_izin']=$this->Model_surat_izin->get_list_izin();
      $data['id_member']=$this->Model_surat_izin->get_member_by_pengajuan($id_pengajuan);
      $data['data_pengajuan']=$this->Model_surat_rekomendasi->get_jenis_pengajuan($id_jenis_pengajuan);
      $data['id_jenis_pengajuan']=$id_jenis_pengajuan;
      $data['id_pengajuan']=$id_pengajuan;
      $data['data_list_surat_izin']=$this->Model_surat_izin->get_list_izin();
      $data['data_pesyaratan']=$this->Model_surat_izin->get_persyaratan_form($id_jenis_pengajuan);

      $this->template->load('templates/template','view_surat_izin.php',$data);
    }
    else
    {
      $this->Model_surat_izin->list_detail_surat_izin();
    }
  }

  public function update()
  {
    $this->Model_surat_izin->update_list_pengajuan();
    redirect('surat_izin/list_surat_izin','refresh');
  }

  public function detail()
  {
    
        
    if($this->session->userdata('id_operator')!=NULL)
    {
        $id_role = $this->session->userdata('id_role_operator');
        $id_operator=$this->session->userdata('id_operator');
        
          $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    }
    else
    {
        $id_operator=1;
    }
      
    if(!isset($_POST['submit']))
    {
      $data['title'] = 'Detail Surat Izin';
      $id_jenis_pengajuan=$this->uri->segment(3);
      $id_pengajuan=$this->uri->segment(4);
      $data['id_member']=$this->Model_surat_izin->get_member_by_pengajuan($id_pengajuan);
      $data['data_pengajuan']=$this->Model_surat_rekomendasi->get_jenis_pengajuan($id_jenis_pengajuan);
      $data['id_jenis_pengajuan']=$id_jenis_pengajuan;
      $data['id_pengajuan']=$id_pengajuan;
      $data['data_list_surat_izin']=$this->Model_surat_izin->get_list_surat_izin($id_pengajuan);
      $data['data_pesyaratan']=$this->Model_surat_izin->get_persyaratan_form($id_jenis_pengajuan);
        $data['data_operator']=$this->Model_surat_izin->get_operator($id_operator);
        if($this->session->userdata('id_operator')!=NULL)
        { 
          $data['menu'] = $menu_list;
        }
      $this->template->load('templates/template','detail.php',$data);

    }
    else
    {
      if($id_operator!=NULL || $id_operator!='')
      {
        $this->Model_surat_izin->input_detail_surat_izin($id_operator);
      }
      else
      {
        $this->Model_surat_izin->input_detail_surat_izin();
      }
    }

  }

  public function edit()
  {

    if(!isset($_POST['submit']))
    {
      $data['title'] = 'Edit Surat Izin';
      $id_jenis_pengajuan=$this->uri->segment(3);
      $id_pengajuan=$this->uri->segment(4);
      $data['id_member']=$this->Model_surat_izin->get_member_by_pengajuan($id_pengajuan);
      $data['data_pengajuan']=$this->Model_surat_rekomendasi->get_jenis_pengajuan($id_jenis_pengajuan);
      $data['id_jenis_pengajuan']=$id_jenis_pengajuan;
      $data['id_pengajuan']=$id_pengajuan;
      $data['data_list_surat_izin']=$this->Model_surat_izin->get_list_surat_izin($id_pengajuan);
      $data['data_pesyaratan']=$this->Model_surat_izin->get_persyaratan_form($id_jenis_pengajuan);
      $this->template->load('templates/template','edit.php',$data);
    }
    else
    {
      $this->Model_surat_izin->edit_surat_izin();
    }

  }
  
  function cetak($id_pengajuan)
  {   
    $data['title'] = "Surat";
    $data['jenis_warga'] = $this->session->set_userdata('jenis_warga');
    $data['cetak'] = $this->Model_surat_izin->get_cetak($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
    $this->pdf->view_download('cetak',$data);
    $this->pdf->render();
    $this->pdf->stream($nama_file,array('Attachment'=>0));
  }

  function cetak_sip_drh($id_pengajuan)
  {  
    $data['title'] = "Surat";
    $data['jenis_warga'] = $this->session->set_userdata('jenis_warga');
    $data['cetak'] = $this->Model_surat_izin->get_cetak($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
    $this->pdf->view_download('cetak_sip_drh',$data);
    $this->pdf->render();
    $this->pdf->stream($nama_file,array('Attachment'=>0));
  }
  
  function cetak_sip_drh_konsultasi($id_pengajuan)
  { 
    $data['title'] = "Surat";
    $data['jenis_warga'] = $this->session->set_userdata('jenis_warga');
    $data['cetak'] = $this->Model_surat_izin->get_cetak_konsultasi($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
    $this->pdf->view_download('cetak_sip_drh_konsultasi',$data);
    $this->pdf->render();
    $this->pdf->stream($nama_file,array('Attachment'=>0));
  }
  
  function lengkapi_drh_konsultasi($id_pengajuan)
  {
      $data['title'] = "FORM SIP DRH";
      $data['cetak'] = $this->Model_surat_izin->get_cetak($id_pengajuan); 
      $this->template->load('templates/template','lengkapi_drh_konsultasi.php',$data);
  }
  
  function input_sip_drh_konsultasi()
  {
      $this->Model_surat_izin->input_sip_drh_konsultasi();
  }
  
  function cetak_sivet($id_pengajuan)
  {
      $data['title'] = "SURAT IZIN";
    $data['sivet'] = $this->Model_surat_izin->get_sivet($id_pengajuan);
    $nama_file = " SIVET ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('sivet',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      //$this->load->view('sivet',$data);
  }

}
