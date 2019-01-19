<?php 
/**
* 
*/
class Sipp extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model('Sipp_model');

	}

	function index()
	{
		$data['data_pengajuan'] = $this->Sipp_model->get_data_pengajuan();
		$this->load->view('daftar_pengajuan',$data);
	}

	function sipp()
	{
		$this->load->view('sipp');
	}

	function detail($id_pengajuan)
	{
		$id_role = 11; //$this->session->userdata('id_role_operator');
		$data['wilayah_operator'] =11; //$this->session->userdata('id_wilayah_operator');
		$data['title'] = "FORM SIPP";
		$data['detail'] = $this->Sipp_model->get_detail($id_pengajuan);
		$data['menu'] =  $this->Sipp_model->get_pengajuan_role_operator($id_role);	
		$this->load->view('detail',$data);
	}

	//Form SIPP
	function form_sipp($id_pengajuan)
	{
		$id_role = $this->session->userdata('id_role_operator');
		$data['wilayah_operator'] = $this->session->userdata('id_wilayah_operator');
		$data['title'] = "FORM SIPP";
		$data['detail'] = $this->Sipp_model->get_detail($id_pengajuan);
		$data['menu'] =  $this->Sipp_model->get_pengajuan_role_operator($id_role);		
		$this->template->load('templates/template_role','form_sipp',$data);
		
	}

	function input_data_sipp()
	{
		$this->Sipp_model->input_data_sipp();
		redirect('Sipp');
	}

	function cetak($id_pengajuan)
	{
		$id_role =11;// $this->session->userdata('id_role_operator');
		$data['detail'] = $this->Sipp_model->get_detail($id_pengajuan);
		$data['title'] = "Cetak";
		//$this->load->view('cetak_sipp',$data);
		$nama_file = " SIPP ".longdate_indo('Y-m-d');
		$this->load->library('pdf');
  		$this->pdf->view_download('cetak_sipp',$data);
  		$this->pdf->render();
  		$this->pdf->stream($nama_file,array('Attachment'=>0));
  		return flase;
	}
}

 