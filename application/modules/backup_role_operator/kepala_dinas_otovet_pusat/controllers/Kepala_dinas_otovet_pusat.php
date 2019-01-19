<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_dinas_otovet_pusat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kepala_dinas_otovet_pusat_model');

		if($this->session->userdata('status') <> 'Aktif')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$this->home();
	}
	public function home(){
		$id_role = $this->session->userdata('id_role_operator');
		$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
		$data = array(
			'title' => 'Kepala Dinas Otovet Pusat',
			'menu' => $menu
		);
		$this->template->load('templates/template_role','home',$data);
	}

	//==================================Surat Izin=================================
	//SIP DRH WNI
	public function sip_drh_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIP DRH WNA
	public function sip_drh_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIP DRH Konsultasi WNI
	public function sip_drh_konsultasi_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Konsultasi WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIP DRH Konsultasi WNA
	public function sip_drh_konsultasi_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Konsultasi WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIP DRH Kuda WNI
	public function sip_drh_kuda_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Kuda WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIP DRH Kuda WNA
	public function sip_drh_kuda_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Kuda WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP ATR
	public function sipp_atr(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP ATR',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP PKb
	public function sipp_pkb(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Pkb',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP Inseminator
	public function sipp_inseminator(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Inseminator',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP Keswan
	public function sipp_keswan(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Keswan',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET PKb WNI
	public function sivet_pkb_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet PKb WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Sivet ATR WNI
	public function sivet_atr_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Keswan',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Inseminator WNI
	public function sivet_inseminator_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet Inseminator WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Keswan WNI
	public function sivet_keswan_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet Keswan WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET ATR WNA
	public function sivet_atr_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet ATR WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET PKb WNA
	public function sivet_pkb_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet PKb WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Inseminator WNA
	public function sivet_inseminator_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet Inseminator WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Keswan WNA
	public function sivet_keswan_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Sivet Keswan WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//======================================Surat Rekomendasi==============================

	//Surat Rekomendasi SIVET ATR WNI
	public function surat_rekomendasi_sivet_atr_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet ATR WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET PKb WNI
	public function surat_rekomendasi_sivet_pkb_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet Pkb WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Inseminator WNI
	public function surat_rekomendasi_sivet_inseminator_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet Inseminator WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Keswan WNI
	public function surat_rekomendasi_sivet_keswan_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet Keswan WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET ATR WNA
	public function surat_rekomendasi_sivet_atr_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet ATR WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET PKb WNA
	public function surat_rekomendasi_sivet_pkb_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet PKb WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Inseminator WNA
	public function surat_rekomendasi_sivet_inseminator_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet Inseminator WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Keswan WNA
	public function surat_rekomendasi_sivet_keswan_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_dinas_otovet_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect('kepala_dinas_otovet_pusat/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_dinas_otovet_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi Sivet Keswan WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_dinas_otovet_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
}

/* End of file Tes.php */
/* Location: ./application/modules/tes/controllers/Tes.php */