<?php 

/**
* 
*/
class Sipp_model extends CI_Model
{
	
	function get_data_pengajuan()
	{
		$this->db->select('*');
		$this->db->from('tb_list_pengajuan_surat_izin');
		$this->db->join('tb_data_member', 'tb_data_member.id_member = tb_list_pengajuan_surat_izin.id_member');
		$this->db->join('tb_jenis_pengajuan', 'tb_jenis_pengajuan.id_jenis_pengajuan = tb_list_pengajuan_surat_izin.id_jenis_pengajuan');
		$this->db->join('tb_wilayah' , 'tb_wilayah.id_wilayah = tb_list_pengajuan_surat_izin.id_wilayah');
		$this->db->join('tb_status_pengajuan' , 'tb_status_pengajuan.id_status_pengajuan = tb_list_pengajuan_surat_izin.id_status_pengajuan');
		$this->db->where('id_biodata_member',1);
		$data = $this->db->get();
		return $data->result();
	}

	//Get Data Cetak SIPP

        function get_detail($id_pengajuan)
        {
            $this->db->select('*');
            $this->db->from('tb_list_pengajuan_surat_izin');
            $this->db->join('tb_operator','tb_operator.id_operator = tb_list_pengajuan_surat_izin.id_operator');
            $this->db->where('id_pengajuan',$id_pengajuan);
            $data = $this->db->get();
            return $data->result();
        }

	 //Insert Data SIPP
       function input_data_sipp()
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
			"SELECT $tb_surat.id_member,$tb_surat.id_jenis_pengajuan,$tb_surat.id_pengajuan, $tb_surat.tgl_dibuat, tb_jenis_pengajuan.nama_jenis_pengajuan, tb_wilayah.nama_wilayah, tb_status_pengajuan.status_pengajuan
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

 ?>