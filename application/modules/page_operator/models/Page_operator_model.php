<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_operator_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function get_pengajuan_role_operator($id_role){
        
        $query = "
            SELECT DISTINCT id_jenis_pengajuan, id_role_operator
            FROM tb_pengajuan_role_operator
            WHERE id_role_operator = $id_role
        ";
        
        return $this->db->query($query)->result();
    }
    public function get_menu($id){
        $query = $this->db->query("
            SELECT nama_jenis_pengajuan
            FROM tb_jenis_pengajuan
            WHERE id_jenis_pengajuan = $id
        ");
        
        return $query->row();
    }
    public function get_jenis_warga($id){
       $query = "SELECT tb_jenis_warga.nama_jenis_warga FROM tb_list_member INNER JOIN tb_jenis_warga ON tb_jenis_warga.id_jenis_warga = tb_list_member.id_jenis_warga WHERE tb_list_member.id_member = $id ";
        return $this->db->query($query)->row();
    }
    public function get_role_name(){
        $id = $this->session->userdata('id_role_operator');
        $query = "SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id";
        return $this->db->query($query);
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
            "SELECT $tb_surat.*, tb_jenis_pengajuan.nama_jenis_pengajuan, tb_wilayah.nama_wilayah, tb_status_pengajuan.status_pengajuan
            FROM $tb_surat
            INNER JOIN tb_jenis_pengajuan ON $tb_surat.id_jenis_pengajuan = tb_jenis_pengajuan.id_jenis_pengajuan
            INNER JOIN tb_wilayah ON $tb_surat.id_wilayah = tb_wilayah.id_wilayah
            INNER JOIN tb_status_pengajuan ON $tb_surat.id_status_pengajuan = tb_status_pengajuan.id_status_pengajuan
            WHERE $tb_surat.id_jenis_pengajuan = $id_jenis_pengajuan
            AND $tb_surat.id_wilayah = $id_wilayah_operator
            AND $tb_surat.id_status_pengajuan IN($id_pengajuan_in)";

        return $this->db->query($query)->result();
    }
    public function cek_page($pengajuan){
        //Ambil Data id_jenis_pengajuan
        $pengajuan = strtolower($pengajuan);
        $pengajuan = str_replace('_', ' ',$pengajuan);
        $id_role = $this->session->userdata('id_role_operator');
        $query_jenis_pengajuan = "SELECT id_jenis_pengajuan FROM tb_jenis_pengajuan WHERE nama_jenis_pengajuan = '$pengajuan'";

        $query_pengajuan = $this->db->query($query_jenis_pengajuan)->row();
        $query_row = $this->db->query($query_jenis_pengajuan)->num_rows();

        if($query_row > 0 ){
          $cek_page = "SELECT DISTINCT id_jenis_pengajuan, id_role_operator FROM tb_pengajuan_role_operator WHERE id_role_operator = $id_role AND id_jenis_pengajuan = $query_pengajuan->id_jenis_pengajuan";
          $cek_page = $this->db->query($cek_page);
          if($cek_page->num_rows() > 0){
              return true;
          }else{
              return false;
          }
        }else{
          $nama_role = $this->Page_operator_model->get_role_name($id_role)->row();
          redirect('page_operator/index/'.str_replace(' ', '_', strtolower($nama_role->nama_role_operator)));
        }
    }
   
 ////////////////// INPUT ////////////////////////////   
    
    function input_sipp()
    {
        $id_pengajuan                   = $this->input->post('id_pengajuan');
        $id_member                      = $this->input->post('id_member');
        $id_jenis_pengajuan             = $this->input->post('id_jenis_pengajuan');
        $nomor_peraturan                = $this->input->post('nomor_peraturan');
        $tentang                        = $this->input->post('tentang');
        $kepala_dinas                   = $this->input->post('kepala_dinas');
        $nama_pos_ib                    = $this->input->post('nama_pos_ib');
        $alamat_pos_ib                  = $this->input->post('alamat_pos_ib');
        $nama_dokter_hewan_penyelia     = $this->input->post('nama_dokter_hewan_penyelia');
        $no_sip_dokter_hewan_penyelia   = $this->input->post('no_sip_dokter_hewan_penyelia');
        $masa_berlaku_kontrak_penyelia  = $this->input->post('masa_berlaku_kontrak_penyelia');
        $masa_brelaku_sipp              = $this->input->post('masa_brelaku_sipp');
        $wilayah_kerja                  = $this->input->post('wilayah_kerja');
        $waktu_pelayanan                = $this->input->post('waktu_pelayanan');
        $nip                            = $this->input->post('nip');

        $data  = array( 'id_pengajuan' => $id_pengajuan, 
                        'id_member' => $id_member , 
                        'id_jenis_pengajuan' => $id_jenis_pengajuan ,
                        'nomor_peraturan' => $nomor_peraturan ,
                        'tentang' => $tentang ,
                        'kepala_dinas' => $kepala_dinas ,
                        'nama_pos_ib' => $nama_pos_ib ,
                        'alamat_pos_ib' => $alamat_pos_ib ,
                        'nama_dokter_hewan_penyelia' => $nama_dokter_hewan_penyelia ,
                        'no_sip_dokter_hewan_penyelia' => $no_sip_dokter_hewan_penyelia ,
                        'masa_berlaku_kontrak_penyelia' => $masa_berlaku_kontrak_penyelia ,
                        'masa_brelaku_sipp' => $masa_brelaku_sipp ,
                        'wilayah_kerja' => $wilayah_kerja ,
                        'waktu_pelayanan' => $waktu_pelayanan ,
                        'nip' => $nip 
                        );
        $this->db->insert('tb_data_sipp',$data);
    }
    
    function input_sip_drh_kuda()
    {
        $id_pengajuan                   = $this->input->post('id_pengajuan');
        $id_member                      = $this->input->post('id_member');
        $id_jenis_pengajuan             = $this->input->post('id_jenis_pengajuan');
        $nomor_peraturan                = $this->input->post('nomor_peraturan');
        $tentang                        = $this->input->post('tentang');
        $kepala_dinas                   = $this->input->post('kepala_dinas');
        $nama_pos_ib                    = $this->input->post('nama_pos_ib');
        $alamat_pos_ib                  = $this->input->post('alamat_pos_ib');
        $no_sip_dokter_hewan_penyelia   = $this->input->post('no_sip_dokter_hewan_penyelia');
        $masa_berlaku_kontrak_penyelia  = $this->input->post('masa_berlaku_kontrak_penyelia');
        $wilayah_kerja                  = $this->input->post('wilayah_kerja');
        $waktu_pelayanan                = $this->input->post('waktu_pelayanan');
        $nip                            = $this->input->post('nip');

        $data  = array( 'id_pengajuan' => $id_pengajuan, 
                        'id_member' => $id_member , 
                        'id_jenis_pengajuan' => $id_jenis_pengajuan ,
                        'nomor_peraturan' => $nomor_peraturan ,
                        'tentang' => $tentang ,
                        'kepala_dinas' => $kepala_dinas ,
                        'nama_pos_ib' => $nama_pos_ib ,
                        'alamat_pos_ib' => $alamat_pos_ib ,
                        'no_sip_dokter_hewan_penyelia' => $no_sip_dokter_hewan_penyelia ,
                        'masa_berlaku_kontrak_penyelia' => $masa_berlaku_kontrak_penyelia ,
                        'wilayah_kerja' => $wilayah_kerja ,
                        'waktu_pelayanan' => $waktu_pelayanan ,
                        'nip' => $nip 
                        );
        $this->db->insert('tb_data_sipp',$data);
    }
    
    function input_sip_drhk()
    {
        $id_pengajuan                   = $this->input->post('id_pengajuan');
        $id_member                      = $this->input->post('id_member');
        $id_jenis_pengajuan             = $this->input->post('id_jenis_pengajuan');
        $nomor_peraturan                = $this->input->post('nomor_peraturan');
        $tentang                        = $this->input->post('tentang');
        $kepala_dinas                   = $this->input->post('kepala_dinas');
        $nama_pos_ib                    = $this->input->post('nama_pos_ib');
        $alamat_pos_ib                  = $this->input->post('alamat_pos_ib');
        $nama_dokter_hewan_penyelia     = $this->input->post('nama_dokter_hewan_penyelia');
        $no_sip_dokter_hewan_penyelia   = $this->input->post('no_sip_dokter_hewan_penyelia');
        $masa_berlaku_kontrak_penyelia  = $this->input->post('masa_berlaku_kontrak_penyelia');
        $wilayah_kerja                  = $this->input->post('wilayah_kerja');
        $waktu_pelayanan                = $this->input->post('waktu_pelayanan');
        $nip                            = $this->input->post('nip');

        $data  = array( 'id_pengajuan' => $id_pengajuan, 
                        'id_member' => $id_member , 
                        'id_jenis_pengajuan' => $id_jenis_pengajuan ,
                        'nomor_peraturan' => $nomor_peraturan ,
                        'tentang' => $tentang ,
                        'kepala_dinas' => $kepala_dinas ,
                        'nama_pos_ib' => $nama_pos_ib ,
                        'alamat_pos_ib' => $alamat_pos_ib ,
                        'nama_dokter_hewan_penyelia' => $nama_dokter_hewan_penyelia ,
                        'no_sip_dokter_hewan_penyelia' => $no_sip_dokter_hewan_penyelia ,
                        'masa_berlaku_kontrak_penyelia' => $masa_berlaku_kontrak_penyelia ,
                        'wilayah_kerja' => $wilayah_kerja ,
                        'waktu_pelayanan' => $waktu_pelayanan ,
                        'nip' => $nip 
                        );
        $this->db->insert('tb_data_sipp',$data);
    }
    
    function input_sivet()
    {
        $id_pengajuan           = $this->input->post('id_pengajuan'); 
        $id_jenis_pengajuan     = $this->input->post('id_jenis_pengajuan'); 
        $id_member              = $this->input->post('id_member'); 
        $nomor_peraturan        = $this->input->post('nomor_peraturan'); 
        $tentang                = $this->input->post('tentang'); 
        $ttl                    = $this->input->post('ttl'); 
        $nama_perusahaan        = $this->input->post('nama_perusahaan'); 
        $alamat_dokter          = $this->input->post('alamat_dokter'); 
        $no_npwp_dokter         = $this->input->post('no_npwp_dokter'); 
        $dokter_perusahaan      = $this->input->post('dokter_perusahaan'); 

        $data  = array( 'id_pengajuan' => $id_pengajuan, 
                        'id_member' => $id_member , 
                        'id_jenis_pengajuan' => $id_jenis_pengajuan ,
                        'nomor_peraturan' => $nomor_peraturan ,
                        'tentang' => $tentang ,
                        'ttl' => $ttl ,
                        'nama_perusahaan' => $nama_perusahaan ,
                        'alamat_dokter' => $alamat_dokter ,
                        'no_npwp_dokter' => $no_npwp_dokter ,
                        'dokter_perusahaan' => $dokter_perusahaan
                        );
        $this->db->insert('tb_data_sip',$data);
    }
//////////////////////// CETAK / GET DATA ///////////////////////////////

    function get_data_sip($id_pengajuan)
    {
        $this->db->select('*');
        $this->db->from('tb_list_pengajuan_surat_izin');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $data = $this->db->get();
        return $data->result();
    }
    
    function cetak($id_pengajuan)
    {
        $this->db->select('*');
        $this->db->from('tb_list_pengajuan_surat_izin');
        $this->db->join('tb_operator','tb_operator.id_operator = tb_list_pengajuan_surat_izin.id_operator','left');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $data = $this->db->get();
        return $data->result();
    }
    
    function cetak_drhk($id_pengajuan)
    {
        $this->db->select('*');
        $this->db->from('tb_list_pengajuan_surat_izin');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $data = $this->db->get();
        return $data->result();
    }
    
    function cetak_sip_drh_kuda($id_pengajuan)
    {
       $this->db->select('*');
        $this->db->from('tb_list_pengajuan_surat_izin');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $data = $this->db->get();
        return $data->result(); 
    }
    
    function cetak_sip_drh($id_pengajuan)
    {
        $this->db->select('*');
        $this->db->from('tb_list_pengajuan_surat_izin');
        $this->db->where('id_pengajuan',$id_pengajuan);
        $data = $this->db->get();
        return $data->result();
        
    }

    //Get Data For Print
  function get_sivet($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_list_pengajuan_surat_izin');
    $this->db->where('id_pengajuan' , $id_pengajuan);
    $this->db->join('tb_wilayah','tb_wilayah.id_wilayah = tb_list_pengajuan_surat_izin.id_wilayah');
    $data = $this->db->get();
    return $data->result();
  }
  
  function get_cetak($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_list_pengajuan_surat_izin');
    $this->db->where('id_pengajuan' , $id_pengajuan);
    $this->db->join('tb_wilayah','tb_wilayah.id_wilayah = tb_list_pengajuan_surat_izin.id_wilayah');
    $data = $this->db->get();
    return $data->result();
  }

    function cetak_rekomendasi($id_pengajuan)
    {
        $this->db->select('*');
        $this->db->from('tb_list_pengajuan_surat_rekomendasi');
        $this->db->where('id_pengajuan', $id_pengajuan);
        $data = $this->db->get();
        return $data->result();
    }
    
    function cetak_excel($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_data_pengajuan_surat_rekomendasi');
    $this->db->where('id_pengajuan' , $id_pengajuan);
    $this->db->join('tb_jenis_peralatan','tb_jenis_peralatan.id_jenis_peralatan = tb_data_pengajuan_surat_rekomendasi.id_jenis_peralatan');
    $this->db->join('tb_kategori_jenis_peralatan','tb_kategori_jenis_peralatan.id_kategori_jenis_peralatan = tb_jenis_peralatan.id_kategori_peralatan');
    $this->db->join('tb_sub_kategori_jenis_peralatan','tb_sub_kategori_jenis_peralatan.id_sub_kategori_jenis_peralatan = tb_jenis_peralatan.id_sub_kategori_peralatan');
    $this->db->join('tb_status_peralatan','tb_status_peralatan.id_status_peralatan = tb_data_pengajuan_surat_rekomendasi.id_status_peralatan');
   /*$this->db->join('tb_list_pengajuan_surat_rekomendasi','tb_list_pengajuan_surat_rekomendasi.id_pengajuan = tb_data_pengajuan_surat_rekomendasi.id_pengajuan');*/
    /*$this->db->join('tb_jenis_pengajuan','tb_jenis_pengajuan.id_jenis_pengajuan = tb_list_pengajuan_surat_rekomendasi.id_jenis_pengajuan');*/
    $data = $this->db->get();
    return $data->result();
  }
function cetak_excel_header($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_list_pengajuan_surat_rekomendasi');
    $this->db->where('id_pengajuan' , $id_pengajuan);
   
   /*$this->db->join('tb_list_pengajuan_surat_rekomendasi','tb_list_pengajuan_surat_rekomendasi.id_pengajuan = tb_data_pengajuan_surat_rekomendasi.id_pengajuan');*/
    $this->db->join('tb_jenis_pengajuan','tb_jenis_pengajuan.id_jenis_pengajuan = tb_list_pengajuan_surat_rekomendasi.id_jenis_pengajuan');
    $data = $this->db->get();
    return $data->result();
  }
}
