<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_ptsp_pusat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kepala_ptsp_pusat_model');

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
		$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
		$data = array(
			'title' => 'Kepala PTSP Pusat',
			'menu' => $menu
		);
		$this->template->load('templates/template_role','home',$data);
	}

	//==================================Surat Izin=================================
	//SIP DRH WNI
	public function sip_drh_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIP DRH WNA
	public function sip_drh_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIP DRH Konsultasi WNI
	public function sip_drh_konsultasi_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Konsultasi WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIP DRH Konsultasi WNA
	public function sip_drh_konsultasi_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Konsultasi WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIP DRH Kuda WNI
	public function sip_drh_kuda_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Kuda WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIP DRH Kuda WNA
	public function sip_drh_kuda_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIP DRH Kuda WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP ATR
	public function sipp_atr(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP ATR',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP PKb
	public function sipp_pkb(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Pkb',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP Inseminator
	public function sipp_inseminator(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Inseminator',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}
	//SIPP Keswan
	public function sipp_keswan(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIPP Keswan',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//====================================SIVET=====================================

	//SIVET Ambulatori WNI
	public function sivet_ambulatori_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET Ambulatori WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Sivet Klinik WNI
	public function sivet_klinik_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET Klinik WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET HK WNI
	public function sivet_hk_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET HK WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET RSH WNI
	public function sivet_rsh_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET RSH WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Ambulatori WNA
	public function sivet_ambulatori_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET Ambulatori WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Klinik WNA
	public function sivet_klinik_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET Klinik WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET HK WNA
	public function sivet_hk_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET HK WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//SIVET Keswan WNA
	public function sivet_rsh_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data SIVET RSH WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_izin',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_izin')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//======================================Surat Rekomendasi==============================

	//Surat Rekomendasi SIVET Ambulatori WNI
	public function surat_rekomendasi_sivet_ambulatori_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET Ambulatori WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Klinik WNI
	public function surat_rekomendasi_sivet_klinik_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET Klinik WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET HK WNI
	public function surat_rekomendasi_sivet_hk_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET HK WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET RSH WNI
	public function surat_rekomendasi_sivet_rsh_wni(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET RSH WNI',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Ambulatori WNA
	public function surat_rekomendasi_sivet_ambulatori_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET Ambulatori WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET Klinik WNA
	public function surat_rekomendasi_sivet_klinik_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET Klinik WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET HK WNA
	public function surat_rekomendasi_sivet_hk_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET HK WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Surat Rekomendasi SIVET RSH WNA
	public function surat_rekomendasi_sivet_rsh_wna(){
		$role = $this->uri->segment(2);
		$cek_page = $this->Kepala_ptsp_pusat_model->cek_page($role);
		if($cek_page == false){
			redirect($this->uri->segment(1).'/home');
			break;
		}else{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			
			$data = array(
				'title' => 'List Data Surat Rekomendasi SIVET RSH WNA',
				'menu' => $menu,
				'detail' => 'detail_surat_rekomendasi',
				'data_surat_izin' => $this->Kepala_ptsp_pusat_model->get_list_surat($role, 'surat_rekomendasi')
			);
			$this->template->load('templates/template_role','surat',$data);
		}
	}

	//Detail Surat Izin dan Rekomendasi
	public function detail_surat_izin(){
		if(!isset($_POST['submit']))
		{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			$data['menu'] = $menu;
			$data['title'] = 'Detail Surat Izin';
			$id_jenis_pengajuan=$this->uri->segment(3);
			$id_pengajuan=$this->uri->segment(4);
			$data['id_member']=$this->Kepala_ptsp_pusat_model->get_member_by_pengajuan($id_pengajuan, 'izin');
			$data['data_pengajuan']=$this->Kepala_ptsp_pusat_model->get_jenis_pengajuan($id_jenis_pengajuan);
			$data['id_jenis_pengajuan']=$id_jenis_pengajuan;
			$data['id_pengajuan']=$id_pengajuan;
			$data['data_pesyaratan']=$this->Kepala_ptsp_pusat_model->get_persyaratan_form($id_jenis_pengajuan);
			$this->template->load('templates/template_role','detail',$data);

		}
		else
		{
			$this->Kepala_ptsp_pusat_model->input_detail_surat_izin();
		}
	}

	public function detail_surat_rekomendasi()
	{
		if(!isset($_POST['submit']))
		{
			$id_role = $this->session->userdata('id_role_operator');
			$menu = $this->Kepala_ptsp_pusat_model->get_pengajuan_role_operator($id_role);
			$data['menu'] = $menu;
			$data['title'] = 'Detail Surat Rekomendasi';
			$data['content_view'] = "surat_rekomendasi/detail";
			$id_jenis_pengajuan=$this->uri->segment(3);
			$id_pengajuan=$this->uri->segment(4);
			$data['id_member']=$this->Kepala_ptsp_pusat_model->get_member_by_pengajuan($id_pengajuan,'rekomendasi');

			$data['data_pengajuan']=$this->Kepala_ptsp_pusat_model->get_jenis_pengajuan($id_jenis_pengajuan);
			$data['id_jenis_pengajuan']=$id_jenis_pengajuan;
			$data['id_pengajuan']=$id_pengajuan;
			$data['data_kat_pesyaratan']=$this->Kepala_ptsp_pusat_model->get_kat_persyaratan($id_jenis_pengajuan);
			$this->template->load('templates/template_role','detail_rekomendasi',$data);
		}
		else
		{
			// $this->db->trans_begin();
			$this->Kepala_ptsp_pusat_model->input_detail_surat_rekomendasi();
		}
	}

	public function disposisi_surat(){
		$this->Kepala_ptsp_pusat_model->update_status_pengajuan();
		redirect($this->uri->segment(1).'/home');
	}
}

/* End of file Tes.php */
/* Location: ./application/modules/tes/controllers/Tes.php */