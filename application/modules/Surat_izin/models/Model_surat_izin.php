<?php
class Model_surat_izin extends CI_Model
{
  function get_persyaratan_form($id_jenis_pengajuan=0)
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
  
  
  

  function get_id_wilayah_pengajuan($id_pengajuan)
  {
    $sql="SELECT * FROM tb_list_pengajuan_surat_izin WHERE id_pengajuan=$id_pengajuan";
    $result=$this->db->query($sql)->result();
    foreach($result as $data)
    {
      return $data->id_wilayah;
    }
  }

  function get_list_izin()
  {
    $id_jenis_pengajuan=$this->uri->segment(3);
    $sql="SELECT tb_jenis_pengajuan.*, tb_list_member.*,tb_list_pengajuan_surat_izin.id_jenis_pengajuan as id_jenis_pengajuan,tb_list_pengajuan_surat_izin.tgl_dibuat as tgl, tb_list_pengajuan_surat_izin.id_pengajuan,tb_list_pengajuan_surat_izin.id_status_pengajuan as st_pengajuan, tb_status_pengajuan.*,tb_wilayah.*,tb_data_member.* FROM tb_list_pengajuan_surat_izin inner join tb_jenis_pengajuan ON tb_list_pengajuan_surat_izin.id_jenis_pengajuan=tb_jenis_pengajuan.id_jenis_pengajuan inner join tb_list_member ON tb_list_pengajuan_surat_izin.id_member=tb_list_member.id_member inner join tb_status_pengajuan ON tb_list_pengajuan_surat_izin.id_status_pengajuan=tb_status_pengajuan.id_status_pengajuan inner join tb_wilayah ON tb_list_pengajuan_surat_izin.id_wilayah=tb_wilayah.id_wilayah inner join tb_data_member ON tb_list_pengajuan_surat_izin.id_member=tb_data_member.id_member WHERE tb_list_pengajuan_surat_izin.id_member=".$this->session->userdata('id_member')." AND tb_list_member.id_member=".$this->session->userdata('id_member')." AND (tb_data_member.id_biodata_member=1 OR tb_data_member.id_biodata_member=10) AND tb_list_pengajuan_surat_izin.id_jenis_pengajuan=$id_jenis_pengajuan ";
    $result_query=$this->db->query($sql);
    return $result_query->result();

    // $this->db->select("*");
    // $this->db->from("tb_list_pengajuan_surat_izin");
    // return $this->db->get()->result();
  }

  function get_list_surat_izin($id_pengajuan=0)
  {
    $this->db->select("*");
    $this->db->from("tb_list_pengajuan_surat_izin");
    if($id_pengajuan!=0)
    {
      $this->db->where("id_pengajuan",$id_pengajuan);
    }
    return $this->db->get()->result();
  }

  function get_list_pengajuan()
  {
    $this->db->select("*");
    $this->db->from("tb_list_pengajuan_surat_izin");
    return $this->db->get();
  }

  function update_list_pengajuan()
  {
    $data_pengajuan=$this->get_list_pengajuan_izin();
      foreach($data_pengajuan as $dpengajuan)
      {
        $sql = "UPDATE `tb_list_pengajuan_surat_izin` SET `id_status_pengajuan`=2 WHERE `tb_list_pengajuan_surat_izin`.`id_pengajuan`=".$dpengajuan->id_pengajuan."";
    $this->db->query($sql);
    }
  }

  function get_persyaratan_pengajuan()
  {
	$sql="SELECT DISTINCT a.id_jenis_pengajuan,b.nama_jenis_pengajuan FROM tb_persyaratan_pengajuan a INNER JOIN tb_jenis_pengajuan b ON b.id_jenis_pengajuan=a.id_jenis_pengajuan
	 ORDER BY a.id_jenis_pengajuan ASC";
    $result_query=$this->db->query($sql);
    return $result_query->result();
  }

  function get_member_by_id($id_member=0)
  {
    $sql="SELECT a.*,b.* FROM tb_data_member a
    INNER JOIN tb_jenis_biodata b ON a.id_biodata_member=b.id_jenis_biodata AND a.id_member=$id_member";
    return $this->db->query($sql)->result();
  }

  function get_member_by_pengajuan($id_pengajuan)
  {
    $this->db->select("id_member");
    $this->db->from("tb_list_pengajuan_surat_izin");
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

  function get_isi_persyaratan($id_pengajuan,$id_jenis_persyaratan)
  {
    $sql="SELECT a.*, b.*, c.nama_jenis_input FROM tb_data_pengajuan_surat_izin a
INNER JOIN tb_jenis_persyaratan b ON a.id_jenis_persyaratan=b.id_jenis_persyaratan
INNER JOIN tb_jenis_input c ON c.id_jenis_input=b.tipe_jenis_persyaratan
AND a.id_pengajuan=$id_pengajuan
AND a.id_jenis_persyaratan=$id_jenis_persyaratan";
  return $this->db->query($sql)->result();
  }

  function get_status_izin($id_pengajuan)
  {
    $this->db->select("id_status_pengajuan");
    $this->db->from("tb_list_pengajuan_surat_izin");
    $this->db->where("id_pengajuan",$id_pengajuan);
    $result=$this->db->get()->result();
    foreach($result as $data)
    {
      return $data->id_status_pengajuan;
    }
  }

  function get_data_pengajuan_izin($id_pengajuan="")
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

  function get_list_pengajuan_izin($id_pengajuan="")
  {
    if($id_pengajuan!="")
    {
      $query=$this->db->query("SELECT a.*,b.* FROM tb_list_pengajuan_surat_izin a INNER JOIN tb_jenis_pengajuan b ON a.id_jenis_pengajuan=b.id_jenis_pengajuan AND a.id_pengajuan=$id_pengajuan");

    }
    else
    {
      $query=$this->db->query("SELECT a.*,b.* FROM tb_list_pengajuan_surat_izin a INNER JOIN tb_jenis_pengajuan b ON a.id_jenis_pengajuan=b.id_jenis_pengajuan");
    }
    return $query->result();
  }

  function get_operator($id_operator=0)
  {
    $sql="SELECT a.*,b.* FROM tb_operator a
    INNER JOIN tb_role_operator b ON a.id_role_operator=b.id_role_operator
    ";
    if($id_operator!=0)
    {
      $sql.=" AND a.id_operator=$id_operator";
    }
    return $this->db->query($sql)->result();
  }



  function input_detail_surat_izin($id_operator=0)
  {
  	$id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
  	$id_member=$this->input->post('id_member');
    $id_pengajuan=$this->input->post('id_pengajuan');
    $operator='';
    if($id_operator!=0)
    {
      foreach($this->get_operator($id_operator) as $op)
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

    $data_pengajuan=$this->get_data_pengajuan_izin($id_pengajuan);
    foreach($data_pengajuan as $dpengajuan)
    {
      $id=$dpengajuan->id_jenis_persyaratan;
      $ket_adm=$this->input->post($id.'_adm');
      $ket_lap=$this->input->post($id.'_lap');
      if($id_status_pengajuan==3)
      {
        $sql="UPDATE tb_data_pengajuan_surat_izin SET ket_adm='$ket_adm'
        WHERE id_pengajuan=$id_pengajuan AND id_jenis_persyaratan=$id";
      }
      else if ($id_status_pengajuan==4)
      {
        $sql="UPDATE tb_data_pengajuan_surat_izin SET ket_lap='$ket_lap'
        WHERE id_pengajuan=$id_pengajuan AND id_jenis_persyaratan=$id";
      }
    	$this->db->query($sql);
    }

    $sql="UPDATE tb_list_pengajuan_surat_izin SET id_status_pengajuan=$id_status_pengajuan,id_operator=$id_operator WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);

  	echo "<script>
          alert('Detail Berhasil Di Ubah !');
          window.location.href='".base_url()."surat_izin/detail/".$id_jenis_pengajuan."/".$id_pengajuan."';
          </script>";
  	}

  function update_status()
  {
    $id_pengajuan=$this->uri->segment(3);
    $id_status=$this->uri->segment(4);
    $id_jenis_pengajuan=$this->uri->segment(5);
    $return_page=str_replace('//','/',urldecode($this->uri->segment(6)));

    $sql="UPDATE tb_list_pengajuan_surat_izin SET id_status_pengajuan=$id_status
    WHERE id_pengajuan=$id_pengajuan";
    $this->db->query($sql);
    echo "<script>
    alert('Status berhasil dirubah !');
    window.location.href='".$return_page."'
    </script>";
  }

  function input_surat_izin()
  {
    $id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
		$id_member=$this->session->userdata('id_member');
    $id_wilayah=$this->input->post('id_wilayah');
		$detail_wilayah=$this->input->post('detail_wilayah');
    $id_status_pengajuan=0;
		$dpengajuan=$this->get_persyaratan_form($id_jenis_pengajuan);

    $data_list_surat_izin=array(
      "id_member"=>$id_member,
      "id_jenis_pengajuan"=>$id_jenis_pengajuan,
      "id_wilayah"=>$id_wilayah,
      "detail_wilayah"=>$detail_wilayah,
      "id_status_pengajuan"=>$id_status_pengajuan
    );
    $this->db->insert("tb_list_pengajuan_surat_izin",$data_list_surat_izin);

    $id_pengajuan_surat_izin=0;
		$sql="SELECT * FROM tb_list_pengajuan_surat_izin ORDER BY id_pengajuan DESC LIMIT 1";
		$result=$this->db->query($sql)->result();
		foreach($result as $data_terakhir)
		{
			$id_pengajuan_surat_izin=$data_terakhir->id_pengajuan;
		}

    $sql="INSERT INTO tb_data_pengajuan_surat_izin (id_pengajuan,id_jenis_persyaratan,isi_jenis_persyaratan)
		VALUES";
		$i=0;
  	foreach($dpengajuan as $data)
  	{
        if($i==0)
        {
          $path=FCPATH."dokumen/".$data->nama_jenis_pengajuan."/".md5($id_pengajuan_surat_izin);
          if(is_dir($path)==false)
          {
            mkdir($path,0777,true);
          }

          $config['upload_path']=$path;
          $config['allowed_types']="*";
          $this->load->library('upload',$config);
        }


        if($data->nama_jenis_input=="file")
        {
          $this->upload->do_upload($data->kode_jenis_persyaratan);
          $file_uploaded=$this->upload->data();

          if(is_file($path."/".$file_uploaded['file_name'])!=1)
          {
            $isi="File kosong atau tidak terupload !";
          }
          else
          {
            $file_url=$path."/".$file_uploaded['file_name'];
            $file_ext= explode('.',$file_uploaded['file_name']);
            $renamed_file=$data->kode_jenis_persyaratan.'.'.$file_ext[1];
            $file_rename=$path."/".$renamed_file;
            rename($file_url,$file_rename);
            $isi=$renamed_file;
          }
        }
        else
        {
          $isi=$this->input->post($data->kode_jenis_persyaratan);
        }

  			if($i!=0)
  			{
  				$sql.=" ,";
  			}
  			$sql.=" (".$id_pengajuan_surat_izin.",".$data->id_jenis_persyaratan.",'".$isi."')";
  			$i+=1;
  		}
		  $sql.=";";
		  $this->db->query($sql);

		  echo "<script>
          alert('Data Berhasil Di Tambahkan !');
           window.location.href='".base_url()."surat_izin/list_surat_izin/".$id_jenis_pengajuan."';
          </script>";
  }

  function edit_surat_izin()
  {
  	$id_jenis_pengajuan=$this->input->post('id_jenis_pengajuan');
  	$id_member=$this->input->post('id_member');
    $id_pengajuan=$this->input->post('id_pengajuan');
    $nama_pengajuan=$this->input->post('nama_pengajuan');

    $path=FCPATH."dokumen/".$nama_pengajuan."/".md5($id_pengajuan);
    if(is_dir($path)==false)
    {
      mkdir($path,0777,true);
    }

    $config['upload_path']=$path;
    $config['allowed_types']="*";
    $this->load->library('upload',$config);

    $data_pengajuan=$this->get_data_pengajuan_izin($id_pengajuan);
    foreach($data_pengajuan as $dpengajuan)
    {
      $id=$dpengajuan->id_jenis_persyaratan;
      if($id==63)
      {
        if(strpos($dpengajuan->isi_jenis_persyaratan,'File kosong')!==false)
        {
            if($_FILES['file_lam_su_per']['size']==0)
            {
                $isi="File kosong atau tidak terupload !";
            }
            else
            {
                if($id==64)
                {
                  $this->upload->do_upload('file_lam_su_rek');
                }
                else
                {
                  $this->upload->do_upload('file_lam_su_per');
                }
                
                $file_uploaded=$this->upload->data();
                $file_url=$path."/".$file_uploaded['file_name'];
                $file_ext= explode('.',$file_uploaded['file_name']);
                if($id==64)
                {
        
                  $renamed_file='file_lam_su_rek.'.$file_ext[1];
                }
                else {
                  $renamed_file='file_lam_su_per.'.$file_ext[1];
                }
                $file_rename=$path."/".$renamed_file;
                rename($file_url,$file_rename);
                $isi=$renamed_file;
            }
            
        }
        else
        {
            if($_FILES['file_lam_su_per']['size']==0)
            {
                $isi="File kosong atau tidak terupload !";
            }
            else
            {
                $files=FCPATH."dokumen/".$nama_pengajuan."/".md5($id_pengajuan)."/file_lam_su_per.pdf";
           if(file_exists($files)!=1)
           {
             $isi="File kosong atau tidak terupload !";
           }
           else
           {
              
            unlink($files);
            if($id==64)
            {
              $this->upload->do_upload('file_lam_su_rek');
            }
            else
            {
              $this->upload->do_upload('file_lam_su_per');
            }
            
            $file_uploaded=$this->upload->data();
            $file_url=$path."/".$file_uploaded['file_name'];
            $file_ext= explode('.',$file_uploaded['file_name']);
            if($id==64)
            {
    
              $renamed_file='file_lam_su_rek.'.$file_ext[1];
            }
            else {
              $renamed_file='file_lam_su_per.'.$file_ext[1];
            }
            $file_rename=$path."/".$renamed_file;
            rename($file_url,$file_rename);
            $isi=$renamed_file;
          }
            }
           
        }

        $sql="UPDATE tb_data_pengajuan_surat_izin SET isi_jenis_persyaratan='$isi'
        WHERE id_pengajuan=$id_pengajuan AND id_jenis_persyaratan=$id";
      	$this->db->query($sql);
      }
      
    }
    $sql="UPDATE tb_list_pengajuan_surat_izin SET id_status_pengajuan='1'
        WHERE id_pengajuan=$id_pengajuan";
      	$this->db->query($sql);

  	echo "<script>
          alert('Data Berhasil Di Submit !');
           window.location.href='".base_url()."surat_izin/list_surat_izin/".$id_jenis_pengajuan."';
          </script>";
  	}
  	
  	function get_cetak($id_pengajuan)
  	{
  	    $this->db->select('*');
  	    $this->db->from('tb_list_pengajuan_surat_izin');
  	    $this->db->where('id_pengajuan', $id_pengajuan);
  	    $data = $this->db->get();
  	    return $data->result();
  	}
  	
  	function get_cetak_konsultasi($id_pengajuan)
  	{
  	    $this->db->select('*');
  	    $this->db->from('tb_data_sip');
  	    $this->db->where('id_pengajuan',$id_pengajuan);
  	    $data = $this->db->get();
  	    return $data->result();
  	}
  	
  	function input_sip_drh_konsultasi()
  	
  	
  	{
  	    $id_pengajuan         		= $this->input->post('id_pengajuan');
  	    $id_jenis_pengajuan			= $this->input->post('id_jenis_pengajuan');
  	    $id_member					= $this->input->post('id_member');
  	    $this->db->select('*');
  	    $this->db->from('tb_data_sip');
  	    $this->db->where('id_pengajuan',$id_pengajuan);
  	    $this->db->where('id_jenis_pengajuan',$id_jenis_pengajuan);
  	    $this->db->where('id_member',$id_member);
  	    $data = $this->db->get();
  	    
  	    if($data->num_rows() == 0)
  	    {
  	    $id_pengajuan         		= $this->input->post('id_pengajuan');
  	    $id_jenis_pengajuan			= $this->input->post('id_jenis_pengajuan');
  	    $id_member					= $this->input->post('id_member');
  	    $nomor_peraturan			= $this->input->post('nomor_peraturan');
  	    $tentang					= $this->input->post('tentang');
  	    $nama_pemimpin_perusahaan	= $this->input->post('nama_pemimpin_perusahaan');
  	    $jabatan					= $this->input->post('jabatan');
  	    $nama_perusahaan 			= $this->input->post('nama_perusahaan');
  	    $alamat_perusahaan			= $this->input->post('alamat_perusahaan');
  	    $nama_dokter				= $this->input->post('nama_dokter');
  	    $ttl						= $this->input->post('ttl');
  	    $jenis_kelamin				= $this->input->post('jenis_kelamin');
  	    $alamat_dokter				= $this->input->post('alamat_dokter');
  	    $no_npwp_dokter				= $this->input->post('no_npwp_dokter');
  	    $dokter_perusahaan			= $this->input->post('dokter_perusahaan');

  	    $data = array(  'id_pengajuan' => $id_pengajuan,
  	    				'id_jenis_pengajuan' => $id_jenis_pengajuan,
  	    				'id_member' => $id_member,
  	    				'nomor_peraturan' => $nomor_peraturan,
  	    				'tentang' => $tentang,
  	    				'nama_pemimpin_perusahaan' => $nama_pemimpin_perusahaan,
  	    				'jabatan' => $jabatan,
  	    				'nama_perusahaan' => $nama_perusahaan,
  	    				'alamat_perusahaan' => $alamat_perusahaan,
  	    				'nama_dokter' => $nama_dokter,
  	    				'ttl' => $ttl,
  	    				'jenis_kelamin' => $jenis_kelamin,
  	    				'alamat_dokter' => $alamat_dokter,
  	    				'no_npwp_dokter' => $no_npwp_dokter,
  	    				'dokter_perusahaan' => $dokter_perusahaan
  	    				);
  	    $this->db->insert('tb_data_sip',$data);
  	    }
  	    else
  	    {
  	        redirect('surat_izin');
  	    }
  	}
  	
  	function get_sivet($id_pengajuan)
  {
    $this->db->select('*');
    $this->db->from('tb_list_pengajuan_surat_izin');
    $this->db->where('id_pengajuan' , $id_pengajuan);
    $this->db->join('tb_wilayah','tb_wilayah.id_wilayah = tb_list_pengajuan_surat_izin.id_wilayah');
    $data = $this->db->get();
    return $data->result();
  }
}
