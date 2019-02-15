<!-- Main Content -->
<div class="content">
<div class="container-fluid">  
<div class="row">
<div class="col-md-12">
	<div class="card">

		<div class="card-header card-header-tabs card-header-primary">
		<div class="nav-tabs-navigation">
		<div class="nav-tabs-wrapper">
			<h3 class="box-title">Detail
				<?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
				echo $nama_pengajuan;}?>
			</h3>
		</div>
		</div>
		</div>

		<?php
		  echo form_open('surat_rekomendasi/detail','class="form-horizontal"');
		  ?>

		<div class="card-body">
		
		
			<div class="row">

			  <?php
			  $data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
			  $get_id_wilayah=$this->Model_surat_rekomendasi->get_id_wilayah_pengajuan($id_pengajuan);
			  $get_tempat_praktik=$this->Model_surat_rekomendasi->get_tempat_praktik($id_pengajuan);
			  $get_data_pj=$this->Model_surat_rekomendasi->get_data_penanggung_jawab($id_pengajuan);
			  $get_data_berkas=$this->Model_surat_rekomendasi->get_data_berkas($id_pengajuan);
			  $data_member=$this->Model_surat_rekomendasi->get_member_by_id($id_pengajuan);
			  ?>
			  
			  <?php
			  echo '
			  
			  <h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>';
			  foreach($data_wilayah as $dwilayah)
			  {
				if($get_id_wilayah==$dwilayah->id_wilayah)
				{
				  echo '<h4 class="col-sm-6" style="margin-left:14px;"> : '.$dwilayah->nama_wilayah.'</h4>';
				}
			  }
			  
			  ?>
			</div>
			
			<div class="row">
			  <?php foreach($get_tempat_praktik as $dtempat)
			  {?>
				  <?php if($dtempat->nama_jenis_biodata == "nama_lengkap"){ ?>
					<h4 class="col-sm-3" style="margin-left:14px;">Nama Tempat Praktik/Pelayanan/Ambulatori/Klinik Hewan/RSH</h4><br>
					<h4 class="col-sm-6" style="margin-left:14px;"> : <?php echo $dtempat->isi_biodata_tempat_praktik ?> <br><br></h4>
				  <?php  }else { ?>
					<h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dtempat->nama_jenis_biodata))?></h4>
					<h4 class="col-sm-6" style="margin-left:14px;"> : <?php echo $dtempat->isi_biodata_tempat_praktik ?> </h4>
				  <?php  } ?>
			   <?php   }?>
			</div>  
			  <?php
			  //$stat_pengajuan=$this->Model_surat_rekomendasi->get_status_rekomendasi($id_pengajuan);
			  //$status=array("Diajukan","Terdisposisi","Terverifikasi Dokumen","Terverifikasi Lapangan","Diterbitkan");

			  /*echo '
			  <div class="row">
			  <div class="col-md-3">
			  <br><h4 style="margin-left:14px;">Status Pengajuan<h4>
			  </div>
			  <div>
			  <select style="margin-top:16px; width:280px;" class="form-control" name="id_status_pengajuan">';
			  for($i=0;$i<count($status);$i++)
			  {
				if($i+1==$stat_pengajuan)
				{
				  $select='selected=""';
				}
				else
				{
				  $select="";
				}
				echo ' <option value="'.($i+1).'"'.$select.'>'.$status[$i].'</option>';
			  }
			  echo '</select></div></div><br>';*/
			   ?>
		
		
		
		
		</div>
	</div>	

		<div class="card">
             <!-- Add the bg color to the header using any of the bg-* classes -->
             <div class="card-header card-header-tabs card-header-primary">
               <h3 class="widget-user-username">Detail Penanggung Jawab</h3>
               <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
             </div>
            
			<div class="card-body">
			<div class="row">
              
              <?php foreach($get_data_pj as $dpj)
              {?>
                  <?php if($dpj->nama_jenis_biodata == "nomor_ktp"){ ?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> Nomor KTP</h4>
                    <h4 class="col-sm-6" style="margin-left:14px;"> : <?php echo $dpj->isi_biodata_penanggung_jawab ?></h4>
                  <?php  }else { ?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dpj->nama_jenis_biodata))?></h4>
                    <h4 class="col-sm-6" style="margin-left:14px;"> : <?php echo $dpj->isi_biodata_penanggung_jawab ?> </h4>
                  <?php  } ?>
              <?php   }?>
              
            </div>
            </div>
		</div>

	
    <div class="card">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="card-header card-header-tabs card-header-primary">
              <h3 class="widget-user-username">Detail Pemohon</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
			
            <div class="card-body">
			<div class="row">
              <?php foreach($data_member as $dmember)
              {?>
                  <?php if($dmember->nama_jenis_biodata == "scan_ktp"){ ?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata))?></h4>
                    <img width="300px" height="auto" style="margin-left:28px;" src="<?php echo base_url()."images/".$dmember->isi_biodata_member;?>">
                  <?php }else{ ?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata))?></h4>
                    <h4 class="col-sm-6" style="margin-left:14px;"> : <?php echo $dmember->isi_biodata_member ?> </h4>
                  <?php } ?>
              <?php   }?>
			</div>
			</div>
	</div>
              <!-- /.row -->
    
	<div class="card">
             <!-- Add the bg color to the header using any of the bg-* classes -->
             <div class="card-header card-header-tabs card-header-primary">
               <h3 class="widget-user-username">Berkas Pemohon</h3>
               <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
             </div>
             
			<div class="card-body">
			<div class="row">
              
              <?php foreach($get_data_berkas as $dberkas)
              {?>
                  <div class="col-md-4">
                    <h3 class="title" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dberkas->nama_jenis_biodata))?></h3>
                    <img width="300px" height="auto" src="<?php echo base_url()."images/".$dberkas->isi_biodata_berkas;?>">
                  </div>
                <?php   }?>
              
            </div>
            </div>
       </div>
	   
    <div class="card">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="card-header card-header-tabs card-header-primary">
              <h3 class="widget-user-username">Detail Peralatan</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            
			<div class="card-body">
              <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
              <input type="text" name="id_pengajuan" hidden="true" value="<?php echo $id_pengajuan; ?>"></input>
              <input type="text" name="id_member" hidden="true" value="<?php echo $id_member; ?>"></input>

              <?php echo '<ol type="1">';
              foreach($data_kat_pesyaratan as $dkat)
              {
                
                echo '<li style="font-size:20px;"><text style="font-size:20px;">'.$dkat->nama_kategori_jenis_peralatan.'</text>';
                echo '<ol style="font-size:16px;" type="a">';
                foreach($this->Model_surat_rekomendasi->get_subkat_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan) as $dsub)
                {
                  
                  if($dsub->id_sub_kategori_jenis_peralatan!=1)
                  {
                    echo '<li>'.$dsub->nama_sub_kategori_jenis_peralatan;
                    echo '<ul type="square">';
                    foreach($this->Model_surat_rekomendasi->get_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan,$dsub->id_sub_kategori_jenis_peralatan) as $syarat)
                    {
                      $data_keterangan=$this->Model_surat_rekomendasi->get_keterangan_peralatan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan);
                      foreach($data_keterangan as $dket)
                      {
                        foreach($data_operator as $op)
                        {
                          foreach($this->Model_surat_rekomendasi->get_list_pengajuan_rekomendasi($id_pengajuan) as $data)
                          {
                            $is_verifikasi=false;
                            foreach ($data_operator as $op)
                            {
                              if (strpos($op->nama_role_operator,"Administrasi")!==false)
                              {
                                        if($data->id_status_pengajuan==3)
                                        {
                                            $is_verifikasi=false;
                                          }
                                          else
                                          {
                                            $is_verifikasi=true;
                                          }
                                        }
                                        
                                        if(strpos($op->nama_role_operator,"Lapangan")!==false)
                                        {
                                          if($data->id_status_pengajuan==4)
                                        {
                                            $is_verifikasi=false;
                                          }
                                          else
                                          {
                                            $is_verifikasi=true;
                                          } 
                                        }
                                        
                                      }
                                    }
                                    foreach($this->Model_surat_rekomendasi->get_list_pengajuan_rekomendasi($id_pengajuan) as $data)
                                    {
                                      if(strpos($op->nama_role_operator,"Kepala")!==false|| ($data->id_status_pengajuan==6 || $data->id_status_pengajuan==5) || $is_verifikasi==false)
                                      {
                                        echo '<li>'.ucwords($syarat->nama_peralatan).
                                        '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Model_surat_rekomendasi->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b>
                                        <br>
                                   <b><text style="margin-left:30px; font-size:14px;">Status Barang:&nbsp;  '.$dket->nama_status_peralatan.'</text></b><br>
                                   <b><text style="margin-left:30px; font-size:14px;">Status Lapangan:&nbsp; '.$dket->nama_status_kesesuaian.' </text></b>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                                    <textarea disabled style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                                    </div>
                                    
                                    <div class="col-md-6">
                                    <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                    <textarea disabled style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                    <br>
                                    </div>
                                    
                                    </div>
                                    
                                    </li>';  
                                  }
                                  else
                                  {
                                    echo '<li>'.ucwords($syarat->nama_peralatan).
                                    '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Model_surat_rekomendasi->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b>
                                    <br>
                                <b><text style="margin-left:30px; font-size:14px;">Status Barang:&nbsp;  '.$dket->nama_status_peralatan.'</text></b><br>
                                
                                    <div class="row">';
                                    
                                    if(strpos($op->nama_role_operator,"Administrasi")!==false)
                                    {
                                      echo '
                                      <div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                                      <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                                      </div>';  
                                    }
                                    
                                    if(strpos($op->nama_role_operator,"Lapangan")!==false)
                                    {
                                      foreach($this->Model_surat_rekomendasi->get_status_lapangan($id_pengajuan, $syarat->id_jenis_peralatan) as $geting){
                                      $baru=$geting->id_status_kesesuaian;
                                      if($baru==1){
                                      echo '<div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                      <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                      <br>
                                      </div>
                                      <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="1" checked>Sesuai</label>
                                      <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="2" >Tidak Sesuai</label>';
                                        }else if($baru==2){
                                          echo '<div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                      <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                      <br>
                                      </div>
                                      <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="1" >Sesuai</label>
                                      <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="2" checked>Tidak Sesuai</label>';
                                        }else if($baru==0){
                                      echo '<div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                      <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                      <br>
                                      </div>
                                      <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="1" >Sesuai</label>
                                      <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="2" >Tidak Sesuai</label>';
                                        }
                                      }
                                    }
                                    
                                    
                                    echo '
                                    
                                    </div>
                                    
                                    </li>';    
                                  } 
                                }
                                
                                
                              }
                              
                            }
                          }
                    echo '</ul></li>';
                    
                  }
                  else
                  {
                    foreach($this->Model_surat_rekomendasi->get_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan,$dsub->id_sub_kategori_jenis_peralatan) as $syarat)
                    {
                      $data_keterangan=$this->Model_surat_rekomendasi->get_keterangan_peralatan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan);
                      foreach($data_keterangan as $dket)
                      {
                        foreach($data_operator as $op)
                        {
                              foreach($this->Model_surat_rekomendasi->get_list_pengajuan_rekomendasi($id_pengajuan) as $data)
                              {
                                $is_verifikasi=false;
                                foreach ($data_operator as $op)
                                {
                                  if (strpos($op->nama_role_operator,"Administrasi")!==false)
                                  {
                                    if($data->id_status_pengajuan==3)
                                    {
                                      $is_verifikasi=false;
                                    }
                                    else
                                    {
                                      $is_verifikasi=true;
                                    }
                                  }
                                  
                                  if(strpos($op->nama_role_operator,"Lapangan")!==false)
                                  {
                                        if($data->id_status_pengajuan==4)
                                        {
                                            $is_verifikasi=false;
                                        }
                                        else
                                        {
                                          $is_verifikasi=true;
                                        } 
                                      }
                                      
                                    }
                                  }
                                  
                                  
                                  foreach($this->Model_surat_rekomendasi->get_list_pengajuan_rekomendasi($id_pengajuan) as $data)
                                  {
                                    if(strpos($op->nama_role_operator,"Kepala")!==false|| ($data->id_status_pengajuan==6 || $data->id_status_pengajuan==5) || $is_verifikasi==false)
                              {
                                echo '<li>'.ucwords($syarat->nama_peralatan).
                                '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Model_surat_rekomendasi->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b>
                                <br>
                                <b><text style="margin-left:30px; font-size:14px;">Status Barang:&nbsp;  '.$dket->nama_status_peralatan.'</text></b><br>
                                <b><text style="margin-left:30px; font-size:14px;">Status Lapangan:&nbsp; '.$dket->nama_status_kesesuaian.' </text></b>
                                <div class="row">
                                <div class="col-md-6">
                                <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                                <textarea disabled style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                                </div>
                                
                                <div class="col-md-6">
                                <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                <textarea disabled style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                <br>
                                </div>
                                
                                </div>
                                
                                </li>';  
                              }
                              else
                              {
                                echo '<li>'.ucwords($syarat->nama_peralatan).
                                '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Model_surat_rekomendasi->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b> 
                                <br>
                                <b><text style="margin-left:30px; font-size:14px;">Status Barang:&nbsp;  '.$dket->nama_status_peralatan.'</text></b><br>
                                
                                <div class="row">';
                                
                                 if(strpos($op->nama_role_operator,"Administrasi")!==false)
                                    {
                                      echo ' <div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                                    <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                                    </div>';
                                  }
                                  
                                  if(strpos($op->nama_role_operator,"Lapangan")!==false)
                                  {
                                    foreach($this->Model_surat_rekomendasi->get_status_lapangan($id_pengajuan, $syarat->id_jenis_peralatan) as $geting){
                                    $baru=$geting->id_status_kesesuaian;
                                    if($baru==1){
                                    echo '<div class="col-md-6">
                                    <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                    <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                    <br>
                                    </div>
                                    <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="1" checked>Sesuai</label>
                                    <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="2" >Tidak Sesuai</label>'; 
                                      }else if($baru==2){
                                    echo '<div class="col-md-6">
                                    <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                    <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                    <br>
                                    </div>
                                    <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="1" >Sesuai</label>
                                    <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="2" checked>Tidak Sesuai</label>'; 
                                      }else if($baru==0){
                                    echo '<div class="col-md-6">
                                    <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                    <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                    <br>
                                    </div>
                                    <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="1" >Sesuai</label>
                                    <label class="radio-inline"><input type="radio" name="'.$syarat->id_jenis_peralatan.'_sesuai" value="2" >Tidak Sesuai</label>';                                       
                                      }
                                    }
                                  }
                                  
                                  echo ' </div>
                                  
                                  </li>'; 
                                }  
                              }
                              
                            }
                            
                          }
                        }
                      }
                    }
                    echo '</ol></li></br>';
                  }
                  echo '</ol>';?>
            </div>
              <!-- /.row -->
    
	
     <?php
     foreach($data_operator as $op)
     {
       if(strpos($op->nama_role_operator,"Kepala")!==false)
       {
         
      }
      else
      {
        foreach($this->Model_surat_rekomendasi->get_list_pengajuan_rekomendasi($id_pengajuan) as $data)
        {
          if($data->id_status_pengajuan!=6 && $data->id_status_pengajuan!=5)
          {
                 if($is_verifikasi==true)
                {
                  $onclick_submit="return confirm('Anda yakin ingin menyimpan data ini ?')";
                 $onclick_tolak="return confirm('Anda yakin ingin menolak surat permohonan ini ?')";
                 
                    echo '
                      <div class="card-footer">
                      <button  style="margin-left: 650px" type="submit" onclick="'.$onclick_submit.'" class="btn btn-success pull-right" name="submit">Verfikasi</button>
            
                      <a onclick="'.$onclick_tolak.'" class="btn btn-danger pull-right" href="'.base_url().'surat_rekomendasi/tolak_surat/'.$id_jenis_pengajuan.'/'.$id_pengajuan.'">
                      Tolak Surat Rekomendasi
                      </a>
                      </div>';  
                }
                
            }
            else 
            {
                echo '<h3 style="padding:10px;">Surat Sudah Di Tolak Atau Di Terbitkan !</h3>';
            }
        }     
        }
        }
     ?>
    
	</div>
          <!-- /.widget-user -->

    
  

</div>
</div>
</div>
</div>
