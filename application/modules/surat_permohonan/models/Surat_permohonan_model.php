<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    /**
    * 
    */
    class Surat_permohonan_model extends CI_Model
    {
    	function get_sip_drh_wni()
    	{

    	}

    	function get_nama()
    	{             
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '1');
            $data = $this->db->get();
            return $data->result();       
    	}

        function get_alamat()
        {         
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '2');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_no_tlp()
        {            
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '3');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_tempat()
        {       
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '5');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_tgl_lahir()
        {  
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '6');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_jenis_kelamin()
        {  
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '7');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_pendidikan()
        {     
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '8');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_tahun_lulus()
        {      
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '9');
            $data = $this->db->get();
            return $data->result();      
        }

    	function get_no_ktp()
        {  
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '12');
            $data = $this->db->get();
            return $data->result();      
        }

    	function get_no_npwp()
        {       
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '13');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_foto()
        {       
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '17');
            $data = $this->db->get();
            return $data->result();      
        }

        function get_status_kerja()
        {       
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_data_member');
            $this->db->where('id_member',$id_member);
            $this->db->where('id_biodata_member', '18');
            $data = $this->db->get();
            return $data->result();      
        }

        function no_surat_sipp_atr()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','7');
            $data = $this->db->get();
            return $data->result();  
        }

        function no_surat_sipp_pkb()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','8');
            $data = $this->db->get();
            return $data->result();  
        }

        function no_surat_sipp_inseminator()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','9');
            $data = $this->db->get();
            return $data->result();  
        }

        function no_surat_sipp_keswan()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','10');
            $data = $this->db->get();
            return $data->result();  
        }

        function no_surat_sip_drh()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','1');
            $data = $this->db->get();
            return $data->result();  
        }

        function no_surat_sip_konsultasi()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','3');
            $data = $this->db->get();
            return $data->result();  
        }

        function no_surat_sip_kuda()
        { 
            $this->db->select('count(id_jenis_pengajuan) AS jumlah');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_jenis_pengajuan','5');
            $data = $this->db->get();
            return $data->result();  
        }

        function get_wilayah()
        {
            $id_member = $this->session->userdata('id_member');
            $this->db->select('*');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->where('id_member',$id_member);
            $this->db->group_by('id_wilayah');
            $data = $this->db->get();
            return $data->result();
        }

        function get_daerah()
        {

        }

        function get_kabkota()
        {

        }

        function get_alamat_praktik()
        {

        }

    }