<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepala_dinas_otovet_kabupaten_atau_kota_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_pengajuan_role_operator($id_role){
        $query = "SELECT DISTINCT id_jenis_pengajuan, id_role_operator FROM tb_pengajuan_role_operator WHERE id_role_operator = $id_role";
        return $this->db->query($query)->result();
    }
    public function get_list_surat($role, $jenis_surat){
    	//cek jenis surat
    	if($jenis_surat == 'surat_izin'){
    		$tb_surat = 'tb_list_pengajuan_surat_izin';
    	}else{
    		$tb_surat = 'tb_list_pengajuan_surat_rekomendasi';
    	}
    	$role = strtolower($role);
    	$role = str_replace('_', ' ', $role);

    	//Ambil Data id_jenis_pengajuan
    	$query_jenis_pengajuan = "SELECT id_jenis_pengajuan FROM tb_jenis_pengajuan WHERE nama_jenis_pengajuan = '$role'";
    	$query_pengajuan = $this->db->query($query_jenis_pengajuan)->row();
    	$id_jenis_pengajuan = $query_pengajuan->id_jenis_pengajuan;
    	
    	//Ambil data status pengajuan
    	$id_status = array();
    	$id_role_operator = $this->session->userdata('id_role_operator');
    	$id_wilayah_operator = $this->session->userdata('id_wilayah_operator');
    	$query_status_pengajuan = "SELECT id_status_pengajuan FROM tb_pengajuan_role_operator WHERE id_jenis_pengajuan = $id_jenis_pengajuan AND id_role_operator = $id_role_operator";
    	$query_status = $this->db->query($query_status_pengajuan)->result();
    	$no = 0;
    	foreach ($query_status as $status) {
    		$id_status[$no] = $status->id_status_pengajuan;
    		$no++;
    	}
    	$id_pengajuan_in = implode(',', $id_status);

    	//Ambil data list surat izin 
    	$query = 
			"SELECT $tb_surat.id_member, $tb_surat.tgl_dibuat, tb_jenis_pengajuan.nama_jenis_pengajuan, tb_wilayah.nama_wilayah, tb_status_pengajuan.status_pengajuan
    		FROM $tb_surat
    		INNER JOIN tb_jenis_pengajuan ON $tb_surat.id_jenis_pengajuan = tb_jenis_pengajuan.id_jenis_pengajuan
    		INNER JOIN tb_wilayah ON $tb_surat.id_wilayah = tb_wilayah.id_wilayah
    		INNER JOIN tb_status_pengajuan ON $tb_surat.id_status_pengajuan = tb_status_pengajuan.id_status_pengajuan
    		WHERE $tb_surat.id_jenis_pengajuan = $id_jenis_pengajuan
    		AND $tb_surat.id_wilayah = $id_wilayah_operator
    		AND $tb_surat.id_status_pengajuan IN($id_pengajuan_in)";

    	return $this->db->query($query)->result();
    }

    public function cek_page($role){
    	//Ambil Data id_jenis_pengajuan
    	$role = strtolower($role);
    	$role = str_replace('_', ' ', $role);
    	$id_role = $this->session->userdata('id_role_operator');
    	$query_jenis_pengajuan = "SELECT id_jenis_pengajuan FROM tb_jenis_pengajuan WHERE nama_jenis_pengajuan = '$role'";
    	$query_pengajuan = $this->db->query($query_jenis_pengajuan)->row();
    	
    	$cek_page = "SELECT DISTINCT id_jenis_pengajuan, id_role_operator FROM tb_pengajuan_role_operator WHERE id_role_operator = $id_role AND id_jenis_pengajuan = $query_pengajuan->id_jenis_pengajuan";
    	$cek_page = $this->db->query($cek_page);
    	if($cek_page->num_rows() > 0){
    		return true;
    	}else{
    		return false;
    	}
    }

}

/* End of file Kategori_jenis_peralatan_model.php */
/* Location: ./application/models/Kategori_jenis_peralatan_model.php */