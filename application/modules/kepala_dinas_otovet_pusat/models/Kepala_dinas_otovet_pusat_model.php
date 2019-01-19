<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepala_dinas_otovet_pusat_model extends CI_Model
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

    public function get_data_pengajuan_izin($id_pengajuan="")
      {
        if($id_pengajuan!="")
        {
          $query=$this->db->query("SELECT * FROM tb_data_pengajuan_surat_izin WHERE id_pengajuan=$id_pengajuan");

        }
        else
        {
          $query=$this->db->query("SELECT * FROM tb_data_pengajuan_surat_izin");
        }
        return $query->result();
      }

    public function get_member_by_pengajuan($id_pengajuan, $jenis_surat)
  {
    if($jenis_surat == 'izin'){
      $table = "tb_list_pengajuan_surat_izin";
    }else{
      $table = "tb_list_pengajuan_surat_rekomendasi";
    }
    $this->db->select("id_member");
    $this->db->from($table);
    $this->db->where("id_pengajuan",$id_pengajuan);
    $result=$this->db->get()->result();
    if(count($result)!=0)
    {
      foreach($result as $data)
      {
        return $data->id_member;
      }
    }
    else {
      return 0;
    }
  }

  public function get_jenis_pengajuan($id_jenis_pengajuan=0)
  {
    $this->db->select('*');
    $this->db->from('tb_jenis_pengajuan');
    if($id_jenis_pengajuan!=0)
    {
      $this->db->where("id_jenis_pengajuan",$id_jenis_pengajuan);
    }
    $sql_result=$this->db->get();

      return $sql_result->result();
  }
  public function get_persyaratan_form($id_jenis_pengajuan=0)
  {
    $sql="SELECT a.*,c.*,b.*,d.* FROM tb_persyaratan_pengajuan a
          INNER JOIN tb_jenis_persyaratan b ON a.id_jenis_persyaratan=b.id_jenis_persyaratan
          INNER JOIN tb_jenis_pengajuan c ON a.id_jenis_pengajuan=c.id_jenis_pengajuan
          INNER JOIN tb_jenis_input d ON d.id_jenis_input=b.tipe_jenis_persyaratan";
    if($id_jenis_pengajuan!=0)
    {
      $sql.=" AND a.id_jenis_pengajuan=$id_jenis_pengajuan";
    }
     $sql.=" ORDER BY b.id_jenis_persyaratan ASC";
    $result_query=$this->db->query($sql);
    return $result_query->result();

  }

  public function get_wilayah($id_wilayah=0)
  {
    $sql="SELECT * FROM tb_wilayah a
    INNER JOIN tb_role_wilayah b ON a.id_role_wilayah=b.id_role_wilayah";
    if($id_wilayah!=0)
    {
      $sql.=" AND a.id_wilayah=$id_wilayah";
    }
    return $this->db->query($sql)->result();
  }

  public function get_id_wilayah_pengajuan($id_pengajuan, $jenis_surat)
  {
    if($jenis_surat == 'izin'){
      $table = "tb_list_pengajuan_surat_izin";
    }else{
      $table = "tb_list_pengajuan_surat_rekomendasi";
    }
    $sql="SELECT * FROM $table WHERE id_pengajuan=$id_pengajuan";
    $result=$this->db->query($sql)->result();
    foreach($result as $data)
    {
      return $data->id_wilayah;
    }
  }

  public function get_member_by_id($id_member=0)
  {
    $sql="SELECT a.id_member,b.nama_jenis_biodata,a.isi_biodata_member FROM tb_data_member a
    INNER JOIN tb_jenis_biodata b ON a.id_biodata_member=b.id_jenis_biodata AND a.id_member=$id_member";
    return $this->db->query($sql)->result();
  }
  public function get_isi_persyaratan($id_pengajuan,$id_jenis_persyaratan)
  {
    $sql="SELECT a.*, b.*, c.nama_jenis_input FROM tb_data_pengajuan_surat_izin a
INNER JOIN tb_jenis_persyaratan b ON a.id_jenis_persyaratan=b.id_jenis_persyaratan
INNER JOIN tb_jenis_input c ON c.id_jenis_input=b.tipe_jenis_persyaratan
AND a.id_pengajuan=$id_pengajuan
AND a.id_jenis_persyaratan=$id_jenis_persyaratan";
  return $this->db->query($sql)->result();
  }

  public function input_detail_surat_izin()
    {
        $id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
        $id_member=$this->input->post('id_member');
        $id_pengajuan=$this->input->post('id_pengajuan');
        $id_wilayah=$this->input->post('id_wilayah');
            //Cek apakah dia bagian administrasi atau lapangan
            $id_role = $this->session->userdata('id_role_operator');
            $query = $this->db->query("SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id_role")->row();
            $get_adm_lap = explode(' ', $query->nama_role_operator);
            $end_adm_lap = end($get_adm_lap);
            if($end_adm_lap == 'Administrasi'){
                $id_status_pengajuan=3;    
            }else{
                $id_status_pengajuan=4;
            }
            

      $data_pengajuan=$this->get_data_pengajuan_izin($id_pengajuan);
      foreach($data_pengajuan as $dpengajuan)
      {
        $id=$dpengajuan->id_jenis_persyaratan;
        $ket_adm=$this->input->post($id.'_adm');
        $ket_lap=$this->input->post($id.'_lap');
        $sql="UPDATE tb_data_pengajuan_surat_izin SET ket_adm='$ket_adm',ket_lap='$ket_lap'
        WHERE id_pengajuan=$id_pengajuan AND id_jenis_persyaratan=$id";
            $this->db->query($sql);
      }

      $sql="UPDATE tb_list_pengajuan_surat_izin SET id_status_pengajuan=$id_status_pengajuan,id_wilayah=$id_wilayah WHERE id_pengajuan=$id_pengajuan";
      $this->db->query($sql);
        $this->session->set_flashdata('message', 'Berhasil submit data pengajuan.');
        echo "<script>
            alert('Detail Berhasil Di Ubah !');
            window.location.href='".base_url()."kepala_dinas_otovet_pusat';
            </script>";
    }

    public function get_kat_persyaratan($id_jenis_pengajuan=0)
  {
    $sql="SELECT DISTINCT a.* FROM tb_kategori_jenis_peralatan a
    INNER JOIN tb_jenis_peralatan b ON a.id_kategori_jenis_peralatan=b.id_kategori_peralatan
    INNER JOIN tb_sub_kategori_jenis_peralatan c ON c.id_sub_kategori_jenis_peralatan=b.id_sub_kategori_peralatan
    INNER JOIN tb_pengajuan_peralatan d ON d.id_jenis_peralatan= b.id_jenis_peralatan
    INNER JOIN tb_jenis_pengajuan e ON e.id_jenis_pengajuan=d.id_jenis_pengajuan";
    if($id_jenis_pengajuan!=0)
    {
      $sql.=" AND d.id_jenis_pengajuan=$id_jenis_pengajuan";
    }
    return $this->db->query($sql)->result();
  }

  public function get_subkat_persyaratan($id_jenis_pengajuan=0,$id_kategori_jenis_peralatan=0)
  {
    $sql="SELECT DISTINCT c.id_sub_kategori_jenis_peralatan,c.nama_sub_kategori_jenis_peralatan FROM tb_kategori_jenis_peralatan a
    INNER JOIN tb_jenis_peralatan b ON a.id_kategori_jenis_peralatan=b.id_kategori_peralatan
    INNER JOIN tb_sub_kategori_jenis_peralatan c ON c.id_sub_kategori_jenis_peralatan=b.id_sub_kategori_peralatan
    INNER JOIN tb_pengajuan_peralatan d ON d.id_jenis_peralatan= b.id_jenis_peralatan
    INNER JOIN tb_jenis_pengajuan e ON e.id_jenis_pengajuan=d.id_jenis_pengajuan";
    if($id_jenis_pengajuan!=0)
    {
      $sql.=" AND d.id_jenis_pengajuan=$id_jenis_pengajuan";
    }
    if($id_kategori_jenis_peralatan!=0)
    {
      $sql.=" AND a.id_kategori_jenis_peralatan=$id_kategori_jenis_peralatan";
    }
    return $this->db->query($sql)->result();
  }

  public function get_persyaratan($id_jenis_pengajuan=0,$id_kategori_jenis_peralatan=0,$id_sub_kategori_jenis_peralatan=0)
  {
    $sql="SELECT * FROM tb_kategori_jenis_peralatan a
    INNER JOIN tb_jenis_peralatan b ON a.id_kategori_jenis_peralatan=b.id_kategori_peralatan
    INNER JOIN tb_sub_kategori_jenis_peralatan c ON c.id_sub_kategori_jenis_peralatan=b.id_sub_kategori_peralatan
    INNER JOIN tb_pengajuan_peralatan d ON d.id_jenis_peralatan= b.id_jenis_peralatan
    INNER JOIN tb_jenis_pengajuan e ON e.id_jenis_pengajuan=d.id_jenis_pengajuan";
      if($id_jenis_pengajuan!=0)
      {
        $sql.=" AND d.id_jenis_pengajuan=$id_jenis_pengajuan";
      }
      if($id_kategori_jenis_peralatan!=0)
      {
        $sql.=" AND a.id_kategori_jenis_peralatan=$id_kategori_jenis_peralatan";
      }
      if($id_sub_kategori_jenis_peralatan!=0)
      {
        $sql.=" AND c.id_sub_kategori_jenis_peralatan=$id_sub_kategori_jenis_peralatan";
      }
      return $this->db->query($sql)->result();
  }

  public function get_keterangan_peralatan($id_jenis_pengajuan=0,$id_pengajuan=0,$id_jenis_peralatan=0)
  {
    $sql="SELECT * FROM tb_data_pengajuan_surat_rekomendasi a
    INNER JOIN tb_list_pengajuan_surat_rekomendasi b ON a.id_pengajuan=b.id_pengajuan
    AND a.id_pengajuan=$id_pengajuan
    AND a.id_jenis_peralatan=$id_jenis_peralatan
    AND b.id_jenis_pengajuan=$id_jenis_pengajuan";
    return $this->db->query($sql)->result();
  }

  public function get_jumlah_persyaratan($id_jenis_pengajuan=0,$id_pengajuan=0,$id_jenis_peralatan=0)
  {
    $sql="SELECT b.jumlah_jenis_peralatan FROM tb_list_pengajuan_surat_rekomendasi a
INNER JOIN tb_data_pengajuan_surat_rekomendasi b ON a.id_pengajuan=b.id_pengajuan
AND b.id_pengajuan=$id_pengajuan AND b.id_jenis_peralatan=$id_jenis_peralatan
AND a.id_jenis_pengajuan=$id_jenis_pengajuan";
    $result=$this->db->query($sql)->result();
    foreach($result as $data)
    {
      return $data->jumlah_jenis_peralatan;
    }
  }

    public function update_status_pengajuan(){
        $jenis_status = $this->uri->segment(3);
        if($jenis_status == 'izin'){
            $table = 'tb_list_pengajuan_surat_izin';
        }else{
            $table = 'tb_list_pengajuan_surat_rekomendasi';
        }
        $id_pengajuan = $this->uri->segment(4);
        $query = "UPDATE $table SET id_status_pengajuan = id_status_pengajuan + 1 WHERE id_pengajuan = $id_pengajuan";
        $this->db->query($query);
        $this->session->set_flashdata('message', 'Status sukses diupdate.');
    }

    public function get_data_pengajuan_rekomendasi($id_pengajuan="")
  {
    if($id_pengajuan!="")
    {
      $query=$this->db->query("SELECT * FROM tb_data_pengajuan_surat_rekomendasi WHERE id_pengajuan=$id_pengajuan");

    }
    else
    {
      $query=$this->db->query("SELECT * FROM tb_data_pengajuan_surat_rekomendasi");
    }
    return $query->result();
  }

    public function input_detail_surat_rekomendasi()
  {
    $id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
    $id_member=$this->input->post('id_member');
    $id_pengajuan=$this->input->post('id_pengajuan');
    $id_wilayah=$this->input->post('id_wilayah');
    //Cek apakah dia bagian administrasi atau lapangan
            $id_role = $this->session->userdata('id_role_operator');
            $query = $this->db->query("SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id_role")->row();
            $get_adm_lap = explode(' ', $query->nama_role_operator);
            $end_adm_lap = end($get_adm_lap);
            if($end_adm_lap == 'Administrasi'){
                $id_status_pengajuan=3;    
            }else{
                $id_status_pengajuan=4;
            }

    $data_pengajuan=$this->get_data_pengajuan_rekomendasi($id_pengajuan);
    foreach($data_pengajuan as $dpengajuan)
    {
      $id=$dpengajuan->id_jenis_peralatan;
      $ket_adm=$this->input->post($id.'_adm');
      $ket_lap=$this->input->post($id.'_lap');
      $sql="UPDATE tb_data_pengajuan_surat_rekomendasi SET ket_adm='$ket_adm',ket_lap='$ket_lap'
      WHERE id_pengajuan=$id_pengajuan AND id_jenis_peralatan=$id";
      $this->db->query($sql);
    }

    $sql="UPDATE tb_list_pengajuan_surat_rekomendasi SET id_status_pengajuan=$id_status_pengajuan,id_wilayah=$id_wilayah WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);
    $this->session->set_flashdata('message', 'Berhasil submit data pengajuan.');
    echo "<script>
            alert('Detail Berhasil Di Ubah !');
            window.location.href='".base_url()."kepala_dinas_otovet_pusat';
            </script>";
  }

}

/* End of file Kategori_jenis_peralatan_model.php */
/* Location: ./application/models/Kategori_jenis_peralatan_model.php */