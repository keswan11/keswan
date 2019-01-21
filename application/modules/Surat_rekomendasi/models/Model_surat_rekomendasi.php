<?php

class Model_surat_rekomendasi extends CI_Model
{

  function get_wilayah($id_wilayah=0)
  {
    $sql="SELECT * FROM tb_wilayah a
    INNER JOIN tb_role_wilayah b ON a.id_role_wilayah=b.id_role_wilayah";
    if($id_wilayah!=0)
    {
      $sql.=" AND a.id_wilayah=$id_wilayah";
    }
    $sql.=" ORDER BY a.id_role_wilayah ASC";
    return $this->db->query($sql)->result();
  }
  
  function update_status()
  {
    $id_pengajuan=$this->uri->segment(3);
    $id_status=$this->uri->segment(4);
    $id_jenis_pengajuan=$this->uri->segment(5);
    $return_page=str_replace('//','/',urldecode($this->uri->segment(6)));
    
    $sql="UPDATE tb_list_pengajuan_surat_rekomendasi SET id_status_pengajuan=$id_status
    WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);
    echo "<script>
    alert('Status berhasil dirubah !');
   window.location.href='".$return_page."';
    </script>";
  }


  function get_list_surat_rekomendasi()
  {
      $id_jenis_pengajuan=$this->uri->segment(3);
    $sql="SELECT tb_jenis_pengajuan.*, tb_list_member.*,tb_list_pengajuan_surat_rekomendasi.tgl_dibuat as tgl, tb_list_pengajuan_surat_rekomendasi.id_pengajuan,tb_list_pengajuan_surat_rekomendasi.id_status_pengajuan as st_pengajuan, tb_status_pengajuan.*,tb_wilayah.*,tb_data_member.* FROM tb_list_pengajuan_surat_rekomendasi inner join tb_jenis_pengajuan ON tb_list_pengajuan_surat_rekomendasi.id_jenis_pengajuan=tb_jenis_pengajuan.id_jenis_pengajuan inner join tb_list_member ON tb_list_pengajuan_surat_rekomendasi.id_member=tb_list_member.id_member inner join tb_status_pengajuan ON tb_list_pengajuan_surat_rekomendasi.id_status_pengajuan=tb_status_pengajuan.id_status_pengajuan inner join tb_wilayah ON tb_list_pengajuan_surat_rekomendasi.id_wilayah=tb_wilayah.id_wilayah inner join tb_data_member ON tb_list_pengajuan_surat_rekomendasi.id_member=tb_data_member.id_member
    WHERE tb_list_pengajuan_surat_rekomendasi.id_member=".$this->session->userdata('id_member').
    " AND tb_list_member.id_member=".$this->session->userdata('id_member').
    " AND (tb_data_member.id_biodata_member=10) AND tb_list_pengajuan_surat_rekomendasi.id_jenis_pengajuan=$id_jenis_pengajuan";
    $result_query=$this->db->query($sql);
    return $result_query->result();

    // $this->db->select("*");
    // $this->db->from("tb_list_pengajuan_surat_izin");
    // return $this->db->get()->result();
  }

  function get_pengajuan_peralatan()
  {
		$sql="SELECT DISTINCT a.id_jenis_pengajuan,b.nama_jenis_pengajuan FROM tb_pengajuan_peralatan a
		INNER JOIN tb_jenis_pengajuan b ON b.id_jenis_pengajuan=a.id_jenis_pengajuan
	 	ORDER BY a.id_jenis_pengajuan ASC";
    $result_query=$this->db->query($sql);
    return $result_query->result();
  }

  function get_jenis_pengajuan($id_jenis_pengajuan=0)
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

  function get_persyaratan_by_jenis_pengajuan($id_jenis_pengajuan=0)
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
    return $this->db->query($sql)->result();
  }

  function get_kat_persyaratan($id_jenis_pengajuan=0)
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

  function get_subkat_persyaratan($id_jenis_pengajuan=0,$id_kategori_jenis_peralatan=0)
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


  function get_persyaratan($id_jenis_pengajuan=0,$id_kategori_jenis_peralatan=0,$id_sub_kategori_jenis_peralatan=0)
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

  function get_jumlah_persyaratan($id_jenis_pengajuan=0,$id_pengajuan=0,$id_jenis_peralatan=0)
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
  
  function get_list_pengajuan_rekomendasi($id_pengajuan="")
  {
    if($id_pengajuan!="")
    {
      $query=$this->db->query("SELECT a.*,b.* FROM tb_list_pengajuan_surat_rekomendasi a INNER JOIN tb_jenis_pengajuan b ON a.id_jenis_pengajuan=b.id_jenis_pengajuan AND a.id_pengajuan=$id_pengajuan");

    }
    else
    {
      $query=$this->db->query("SELECT a.*,b.* FROM tb_list_pengajuan_surat_rekomendasi a INNER JOIN tb_jenis_pengajuan b ON a.id_jenis_pengajuan=b.id_jenis_pengajuan");
    }
    return $query->result();
  }

  function get_member_by_id($id_member=0)
  {
    $sql="SELECT a.*,b.* FROM tb_data_member a
    INNER JOIN tb_jenis_biodata b ON a.id_biodata_member=b.id_jenis_biodata AND a.id_member=$id_member
    ORDER BY b.id_jenis_biodata ASC";
    return $this->db->query($sql)->result();
  }

  function get_member_by_pengajuan($id_pengajuan)
  {
    $this->db->select("id_member");
    $this->db->from("tb_list_pengajuan_surat_rekomendasi");
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

  function get_id_wilayah_pengajuan($id_pengajuan)
  {
    $sql="SELECT * FROM tb_list_pengajuan_surat_rekomendasi WHERE id_pengajuan=$id_pengajuan";
    $result=$this->db->query($sql)->result();
    foreach($result as $data)
    {
      return $data->id_wilayah;
    }
  }

  function get_data_pengajuan_rekomendasi($id_pengajuan="")
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

  function get_list_rekomendasi($id_pengajuan=0)
  {
    $this->db->select("*");
    $this->db->from("tb_list_pengajuan_surat_rekomendasi");
    if($id_pengajuan!=0)
    {
      $this->db->where("id_pengajuan",$id_pengajuan);
    }
    return $this->db->get()->result();
  }

  function get_status_rekomendasi($id_pengajuan)
  {
    $this->db->select("id_status_pengajuan");
    $this->db->from("tb_list_pengajuan_surat_rekomendasi");
    $this->db->where("id_pengajuan",$id_pengajuan);
    $result=$this->db->get()->result();
    foreach($result as $data)
    {
      return $data->id_status_pengajuan;
    }


  }

  function get_keterangan_peralatan($id_jenis_pengajuan=0,$id_pengajuan=0,$id_jenis_peralatan=0)
  {
    $sql="SELECT * FROM tb_data_pengajuan_surat_rekomendasi a
    INNER JOIN tb_list_pengajuan_surat_rekomendasi b ON a.id_pengajuan=b.id_pengajuan
    AND a.id_pengajuan=$id_pengajuan
    AND a.id_jenis_peralatan=$id_jenis_peralatan
    AND b.id_jenis_pengajuan=$id_jenis_pengajuan";
    return $this->db->query($sql)->result();
  }


	function input_surat_rekomendasi()
	{
		$id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
		$id_member=$this->session->userdata('id_member');
		$id_wilayah=$this->input->post('id_wilayah');
		$id_status_pengajuan=1;
    $detail_wilayah=$this->input->post('detail_wilayah');
    //$id_jenis_peralatan=$this->get_keterangan_persyaratan($id_jenis_peralatan); //tambahan
		$dpengajuan=$this->get_persyaratan_by_jenis_pengajuan($id_jenis_pengajuan);

		$data_list_surat_rekomendasi=array(
			"id_member"=>$id_member,
			"id_jenis_pengajuan"=>$id_jenis_pengajuan,
			"id_wilayah"=>$id_wilayah,
      "detail_wilayah"=>$detail_wilayah,
			"id_status_pengajuan"=>$id_status_pengajuan
		);
		$this->db->insert("tb_list_pengajuan_surat_rekomendasi",$data_list_surat_rekomendasi);

		$id_pengajuan=0;
		$sql="SELECT * FROM tb_list_pengajuan_surat_rekomendasi ORDER BY id_pengajuan DESC LIMIT 1";
		$result=$this->db->query($sql)->result();
		foreach($result as $data_terakhir)
		{
			$id_pengajuan=$data_terakhir->id_pengajuan;
		}

		$sql="INSERT INTO tb_data_pengajuan_surat_rekomendasi (id_pengajuan,id_jenis_peralatan,jumlah_jenis_peralatan,id_status_peralatan)
		VALUES"; //ditambah id_status_peralatan 
		$i=0;
		foreach($dpengajuan as $data)
		{
			$jumlah=$this->input->post($data->id_jenis_peralatan);
      $id_status_peralatan=$this->input->post('status_peralatan'.$data->id_jenis_peralatan); //tambahan
			if($jumlah=="" || $jumlah==null)
			{
				$jumlah=0;
			}

			if($i!=0)
			{
				$sql.=" ,";
			}
			$sql.=" (".$id_pengajuan.",".$data->id_jenis_peralatan.",".$jumlah.",".$id_status_peralatan.")";
			$i+=1;
		}
		$sql.=";";
		$this->db->query($sql);

		echo "<script>
          alert('Data Berhasil Di Tambahkan !');
           window.location.href='".base_url()."surat_rekomendasi/list_surat_rekomendasi/".$id_jenis_pengajuan."';
          </script>";
	}

  function input_detail_surat_rekomendasi($id_operator=0)
	{
		$id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
		$id_member=$this->input->post('id_member');
    $id_pengajuan=$this->input->post('id_pengajuan');
		$id_wilayah=$this->input->post('id_wilayah');
		$operator='';
        if($id_operator!=0)
        {
          foreach($this->Model_surat_izin->get_operator($id_operator) as $op)
          {
            if(strpos($op->nama_role_operator,"Administrasi")!==false)
            {
              $opertor="Administrasi";
              $id_status_pengajuan=3;
            }
            else if (strpos($op->nama_role_operator,"Lapangan")!==false)
            {
              $opertor="Lapangan";
              $id_status_pengajuan=4;
            }
          }
        }

    $data_pengajuan=$this->get_data_pengajuan_rekomendasi($id_pengajuan);
    foreach($data_pengajuan as $dpengajuan)
    {
      $id=$dpengajuan->id_jenis_peralatan;
      $ket_adm=$this->input->post($id.'_adm');
      $ket_lap=$this->input->post($id.'_lap');
      if($id_status_pengajuan==3)
      {
        $sql="UPDATE tb_data_pengajuan_surat_rekomendasi SET ket_adm='$ket_adm'
        WHERE id_pengajuan=$id_pengajuan AND id_jenis_peralatan=$id";
      }
      else if ($id_status_pengajuan==4)
      {
        $sql="UPDATE tb_data_pengajuan_surat_rekomendasi SET ket_lap='$ket_lap'
        WHERE id_pengajuan=$id_pengajuan AND id_jenis_peralatan=$id";
      }
  	  $this->db->query($sql);
    }

    $sql="UPDATE tb_list_pengajuan_surat_rekomendasi
    SET id_status_pengajuan=$id_status_pengajuan,id_operator=$id_operator
    WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);

		echo "<script>
          alert('Detail Berhasil Di Ubah !');
          window.location.href='".base_url()."surat_rekomendasi/detail/".$id_jenis_pengajuan."/".$id_pengajuan."';
          </script>";
	}

  

}
