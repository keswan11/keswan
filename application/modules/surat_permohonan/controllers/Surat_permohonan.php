<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
* 
*/
class Surat_permohonan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
        $this->load->model('surat_permohonan_model');
	}

	function index()
	{
		$this->load->view('button');
	}

	function sip_drh_wni()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');
		$data['title'] = "SIP DRH WNI ".longdate_indo('Y-m-d');
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['no_tlp'] = $this->surat_permohonan_model->get_no_tlp();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['jenis_kelamin'] = $this->surat_permohonan_model->get_jenis_kelamin();
		$data['pendidikan'] = $this->surat_permohonan_model->get_pendidikan();
		$data['tahun_lulus'] = $this->surat_permohonan_model->get_tahun_lulus();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['daerah'] = $this->surat_permohonan_model->get_daerah();
		$data['kabkota'] = $this->surat_permohonan_model->get_kabkota();
		$data['alamat_praktik'] = $this->surat_permohonan_model->get_alamat_praktik();
		$nama_file = $nama." SIP DRH WNI ".longdate_indo('Y-m-d');
  		$this->pdf->view_download('sip_drh_wni',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}

	function sipp_drh_wni()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');
		$data['title'] = "SIPP DRH WNI ".longdate_indo('Y-m-d');
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['no_tlp'] = $this->surat_permohonan_model->get_no_tlp();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['jenis_kelamin'] = $this->surat_permohonan_model->get_jenis_kelamin();
		$data['pendidikan'] = $this->surat_permohonan_model->get_pendidikan();
		$data['tahun_lulus'] = $this->surat_permohonan_model->get_tahun_lulus();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['daerah'] = $this->surat_permohonan_model->get_daerah();
		$data['kabkota'] = $this->surat_permohonan_model->get_kabkota();
		$data['alamat_praktik'] = $this->surat_permohonan_model->get_alamat_praktik();
		$nama_file = $nama." SIPP DRH WNI ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sipp_drh_wni',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}

	function sivet()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');
		$data['title'] = "SIVET";
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['no_ktp'] = $this->surat_permohonan_model->get_no_ktp();
		$data['no_npwp'] = $this->surat_permohonan_model->get_no_npwp();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['daerah'] = $this->surat_permohonan_model->get_daerah();
		$data['kabkota'] = $this->surat_permohonan_model->get_kabkota();
		$nama_file = $nama."SIVET ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sivet',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}

	function sipp_atr()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['foto'] = $this->surat_permohonan_model->get_foto();
		$data['no_surat_sipp_atr'] = $this->surat_permohonan_model->no_surat_sipp_atr();
		$data['title'] = $nama." SIPP ATR ".longdate_indo('Y-m-d');
		$nama_file = $nama." SIPP ATR ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sipp_atr',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}

	function sipp_pkb()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['no_surat_sipp_pkb'] = $this->surat_permohonan_model->no_surat_sipp_pkb();
		$data['foto'] = $this->surat_permohonan_model->get_foto();
		$data['title'] = $nama." SIPP PKB ".longdate_indo('Y-m-d');
		$nama_file = $nama."SIPP PKB ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sipp_pkb',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}

	function sipp_inseminator()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['no_surat_sipp_inseminator'] = $this->surat_permohonan_model->no_surat_sipp_inseminator();
		$data['foto'] = $this->surat_permohonan_model->get_foto();
		$data['title'] = $nama."SIPP INSEMINATOR ".longdate_indo('Y-m-d');
		$nama_file = $nama." SIPP INSEMINATOR ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sipp_inseminator',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}

	function sipp_keswan()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['no_surat_sipp_keswan'] = $this->surat_permohonan_model->no_surat_sipp_keswan();
		$data['foto'] = $this->surat_permohonan_model->get_foto();
		$data['title'] = $nama." SIPP KESWAN ".longdate_indo('Y-m-d');
		$nama_file = $nama." SIPP  KESWAN ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sipp_keswan',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}
	function sip_drh()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['no_surat_sip_drh'] = $this->surat_permohonan_model->no_surat_sip_drh();
		$data['foto'] = $this->surat_permohonan_model->get_foto();
		$data['title'] = $nama." SIP DRH ".longdate_indo('Y-m-d');
		$nama_file = $nama." SIP DRH ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sip_drh',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}
	function sip_konsultasi()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['no_surat_sip_konsultasi'] = $this->surat_permohonan_model->no_surat_sip_konsultasi();
		$data['title'] = $nama." SIP KONSULTASI ".longdate_indo('Y-m-d');
		$nama_file = $nama." SIP KONSULTASI ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sip_konsultasi',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}
	function sip_keterangan_konsultasi()
	{
	    $nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$nama_file = " SIP KETERANGAN KONSULTASI ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sip_keterangan_konsultasi');
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
	}
	function sip_kuda()
	{
		$nama = $this->session->userdata('username');
		$id_member = $this->session->userdata('id_member');	
		$data['nama'] = $this->surat_permohonan_model->get_nama();
		$data['alamat'] = $this->surat_permohonan_model->get_alamat();
		$data['tempat'] = $this->surat_permohonan_model->get_tempat();
		$data['tgl_lahir'] = $this->surat_permohonan_model->get_tgl_lahir();
		$data['wilayah'] = $this->surat_permohonan_model->get_wilayah();
		$data['status_kerja'] = $this->surat_permohonan_model->get_status_kerja();
		$data['no_surat_sip_kuda'] = $this->surat_permohonan_model->no_surat_sip_kuda();
		$data['title'] = $nama." SIP KUDA ".longdate_indo('Y-m-d');
		$nama_file = $nama." SIP KUDA ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('sip_kuda',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		redirect("index");
		 
	}





}