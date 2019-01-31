<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_operator extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Page_operator_model');
        $this->load->library('pdf');
    if($this->session->userdata('status') <> 'Aktif')
    {
      redirect('login');
    }
  }
  public function index(){
    /*
      ID role operator
      Nama role operator
      Nama jenis surat pengajuan
      Buat title dari nama role operator
      buat title dari nama jenis pengajuan
      Ambil menu list
    */
    $id_role = $this->session->userdata('id_role_operator');
    $role = $this->uri->segment(3);
    $pengajuan = $this->uri->segment(4);
    $title_role = ucwords(str_replace('_', ' ', $role));
    $title_pengajuan = strtoupper(str_replace('_', ' ', $pengajuan));
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);

    $data = array();
    $data += array(
      'menu' => $menu_list
    );

    //Cek apakah jenis pengajuan adalah surat izin atau rekomendasi
    $jenis_pengajuan = strpos($pengajuan, 'fasilitas');
    $surat = 'surat_izin';
    $jenis_surat = 'izin'; 

    //Jika dia rekomendasi
    if($jenis_pengajuan > 0){
      $surat = 'surat_rekomendasi';
      $jenis_surat = 'rekomendasi';
    }

    //Cek jika halaman home
    if($pengajuan == false){
      
      $data += array(
        'title' => $title_role,
      );
      $template = "home";
    
    }else{

      //Cek apakah role yeng berkaitan boleh akses halaman surat pengajuan
      $cek = $this->Page_operator_model->cek_page($pengajuan);
      if($cek){
        $template = "surat";
        $data += array(
          'title' => $title_pengajuan,
          'jenis_surat' => $jenis_surat,
          'data_list_surat' => $this->Page_operator_model->get_list_surat($pengajuan, $surat)
        );
      }else{
        $nama_role = $this->Page_operator_model->get_role_name($id_role)->row();
        redirect('page_operator/index/'.str_replace(' ', '_', strtolower($nama_role->nama_role_operator)));
      }
    
    }

    $this->template->load('templates/template', $template, $data);
  }
  
  ////////////////////////////////////FORM MELENGKAPI////////////////////////////
  
  function form_sip_drh($id_pengajuan)
  {
      $title_pengajuan = "SIP DRH";
      $id_role = $this->session->userdata('id_role_operator');
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    $data = array(
        'title' => $title_pengajuan,
      'menu' => $menu_list
    );
      $data['data_sip'] = $this->Page_operator_model->get_data_sip($id_pengajuan);
      $this->template->load('templates/template_role', 'form_sip', $data);
  }
  
  function form_sip_drh_kuda($id_pengajuan)
  {
      $title_pengajuan = "SIP DRH KUDA";
      $id_role = $this->session->userdata('id_role_operator');
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    $data = array(
        'title' => $title_pengajuan,
      'menu' => $menu_list
    );
      $data['data_sip'] = $this->Page_operator_model->get_data_sip($id_pengajuan);
      $this->template->load('templates/template_role', 'form_sip_drh_kuda', $data);
  }
  
  function form_sipp($id_pengajuan)
  {
      $title_pengajuan = "FORM SIPP";
      $id_role = $this->session->userdata('id_role_operator');
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    $data = array(
        'title' => $title_pengajuan,
      'menu' => $menu_list
    );
      $data['data_sipp'] = $this->Page_operator_model->cetak($id_pengajuan);
      $this->template->load('templates/template_role', 'form_sipp', $data);
  }
  
  function form_drhk($id_pengajuan)
  {
     $title_pengajuan = "FORM DRH KONSULTASI";
      $id_role = $this->session->userdata('id_role_operator');
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    $data = array(
        'title' => $title_pengajuan,
      'menu' => $menu_list
    );
      $data['data_drhk'] = $this->Page_operator_model->get_data_sip($id_pengajuan);
      $this->template->load('templates/template_role', 'form_sip_drhk.php', $data); 
  }

  function form_sip_drh_spesialis($id_pengajuan)
  {
      $title_pengajuan = "SIP DRH SPESIALIS";
      $id_role = $this->session->userdata('id_role_operator');
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    $data = array(
        'title' => $title_pengajuan,
      'menu' => $menu_list
    );
      $data['data_sip'] = $this->Page_operator_model->get_data_sip($id_pengajuan);
      $this->template->load('templates/template_role', 'form_sip_drh_spesialis', $data);
  }

  function form_sivet($id_pengajuan)
  {
      $title_pengajuan = "SIVET";
      $id_role = $this->session->userdata('id_role_operator');
    $menu_list = $this->Page_operator_model->get_pengajuan_role_operator($id_role);
    $data = array(
        'title' => $title_pengajuan,
      'menu' => $menu_list
    );
      $data['sivet'] = $this->Page_operator_model->get_sivet($id_pengajuan);
      $this->template->load('templates/template_role', 'form_sivet', $data);
  }
  
  //////////////////// INPUT DATA DARI FORM PMELENGKAPI ////////////////////////////
  
  function input()
  {
      $this->Page_operator_model->input_sipp();
      redirect('page_operator');
  }
  
  function input_sip_drh_kuda()
  {
      $this->Page_operator_model->input_sip_drh_kuda();
      redirect('page_operator');
  }
  
  function input_sip_drhk()
  {
      $this->Page_operator_model->input_sip_drhk();
      redirect('page_operator');
  }

  function input_sivet()
  {
      $this->Page_operator_model->input_sivet();
      redirect('page_operator');
  }
  
  ////////////////////// Cetak SURAT //////////////////////
  
  function cetak($id_pengajuan)
  {
      $data['cetak'] = $this->Page_operator_model->cetak($id_pengajuan);
      //$this->load->view('sipp',$data);
    $data['title'] = "Cetak";
    $nama_file = " SIPP ".longdate_indo('Y-m-d');
      $this->pdf->view_download('sipp',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return false;
  }
  
  function cetak_lampiran_1()
  {
    $data['title'] = "Cetak";
    $nama_file = " Lampiran ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_lampiran_1',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
    //$this->load->view('cetak_lampiran_4');
  }

  function cetak_lampiran_2()
  {
    $data['title'] = "Cetak";
    $nama_file = " Lampiran ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_lampiran_2',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
    //$this->load->view('cetak_lampiran_4');
  }

  function cetak_lampiran_3()
  {
    $data['title'] = "Cetak";
    $nama_file = " Lampiran ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_lampiran_3',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
    //$this->load->view('cetak_lampiran_4');
  }

  function cetak_lampiran_4()
  {
    $data['title'] = "Cetak";
    $nama_file = " Lampiran ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_lampiran_4',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
    //$this->load->view('cetak_lampiran_4');
  }
  function cetak_excell($id_pengajuan){
     /*$data = array( 'title' => 'Laporan.xls','data_booking' => $this->Page_operator_model->cetak_excel($id_pengajuan),'data_baru' => $this->Page_operator_model->cetak_excel_header($id_pengajuan));
     $this->load->view('vw_laporan_excel',$data);*/
     $data['title'] = " Lampiran";
     $data['data_booking'] = $this->Page_operator_model->cetak_excel($id_pengajuan);
     $data['data_baru'] = $this->Page_operator_model->cetak_excel_header($id_pengajuan);
     $this->load->view('vw_laporan_excel',$data);
  }
   function cetak_excell_1($id_pengajuan){
     /*$data = array( 'title' => 'Laporan.xls','data_booking' => $this->Page_operator_model->cetak_excel($id_pengajuan),'data_baru' => $this->Page_operator_model->cetak_excel_header($id_pengajuan));
     $this->load->view('vw_laporan_excel',$data);*/
     $data['title'] = " Lampiran";
     $data['data_booking'] = $this->Page_operator_model->cetak_excel($id_pengajuan);
     $data['data_baru'] = $this->Page_operator_model->cetak_excel_header($id_pengajuan);
     $this->load->view('vw_laporan_excel',$data);
  }
  function cetak_excell_2($id_pengajuan){
     /*$data = array( 'title' => 'Laporan.xls','data_booking' => $this->Page_operator_model->cetak_excel($id_pengajuan),'data_baru' => $this->Page_operator_model->cetak_excel_header($id_pengajuan));
     $this->load->view('vw_laporan_excel',$data);*/
     $data['title'] = " Lampiran";
     $data['data_booking'] = $this->Page_operator_model->cetak_excel($id_pengajuan);
     $data['data_baru'] = $this->Page_operator_model->cetak_excel_header($id_pengajuan);
     $this->load->view('vw_laporan_excel',$data);
  }
  function cetak_excell_3($id_pengajuan){
     /*$data = array( 'title' => 'Laporan.xls','data_booking' => $this->Page_operator_model->cetak_excel($id_pengajuan),'data_baru' => $this->Page_operator_model->cetak_excel_header($id_pengajuan));
     $this->load->view('vw_laporan_excel',$data);*/
     $data['title'] = " Lampiran";
     $data['data_booking'] = $this->Page_operator_model->cetak_excel($id_pengajuan);
     $data['data_baru'] = $this->Page_operator_model->cetak_excel_header($id_pengajuan);
     $this->load->view('vw_laporan_excel',$data);
  }
  function cetak_drhk($id_pengajuan)
  {
      $data['title'] = "Cetak";
      $data['data_drhk'] = $this->Page_operator_model->cetak_drhk($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_drhk',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
    //$this->load->view('cetak_lampiran_4');
  }
  
  function cetak_sip_drh_kuda($id_pengajuan)
  {
      $data['title'] = "Cetak";
      $data['cetak_sip_drh_kuda'] = $this->Page_operator_model->cetak_sip_drh_kuda($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_sip_drh_kuda',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
    //$this->load->view('cetak_lampiran_4');
  }
  
  function cetak_sip_drh($id_pengajuan)
  {
      $data['title'] = "Cetak";
      $data['cetak_sip_drh'] = $this->Page_operator_model->cetak_sip_drh($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_sip_drh',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
       //$this->load->view('cetak_sip_drh',$data);
  }
  
  function cetak_sip_drh_spesialis($id_pengajuan)
  {
      $data['title'] = "Cetak";
      $data['cetak_sip_drh'] = $this->Page_operator_model->cetak_sip_drh($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('cetak_sip_drh_spesialis',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      return flase;
       //$this->load->view('cetak_sip_drh_spesialis',$data);
  }
  
  //cetak surat izin
  function cetak_sivet($id_pengajuan)
  {
      $data['title'] = "SURAT IZIN";
    $data['sivet'] = $this->Page_operator_model->get_sivet($id_pengajuan);
    $nama_file = " SIVET ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
      $this->pdf->view_download('sivet',$data);
      $this->pdf->render();
      $this->pdf->stream($nama_file,array('Attachment'=>0));
      //$this->load->view('sivet',$data);
  }
  
  function cetak_rekomendasi($id_pengajuan)
  {   
    $data['title'] = "Surat";
    $data['jenis_warga'] = $this->session->set_userdata('jenis_warga');
    $data['cetak'] = $this->Page_operator_model->cetak_rekomendasi($id_pengajuan);
    $nama_file = " SIP ".longdate_indo('Y-m-d');
    $this->load->library('pdf');
    $this->pdf->view_download('cetak_rekomendasi',$data);
    $this->pdf->render();
    $this->pdf->stream($nama_file,array('Attachment'=>0));
  }
  
  
}

/* End of file Tes.php */
/* Location: ./application/modules/tes/controllers/Page_operator.php */