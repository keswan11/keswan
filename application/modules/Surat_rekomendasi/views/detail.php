<!-- Main Content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Detail
        <?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
        echo $nama_pengajuan;}?></h3>
    </div>
    <?php
      echo form_open('surat_rekomendasi/detail','class="form-horizontal"');
      ?>

    <div class="box-body">
      <?php
      $data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
      $get_id_wilayah=$this->Model_surat_rekomendasi->get_id_wilayah_pengajuan($id_pengajuan);
      $get_tempat_praktik=$this->Model_surat_rekomendasi->get_tempat_praktik($id_pengajuan);
      $get_data_pj=$this->Model_surat_rekomendasi->get_data_penanggung_jawab($id_pengajuan);
      $get_data_berkas=$this->Model_surat_rekomendasi->get_data_berkas($id_pengajuan);
      ?>
      <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <h3 class="widget-user-username">Detail Tempat Praktik</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="box-body">

      <?php
      echo '
      <div class="form-group">
      <h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>';
      foreach($data_wilayah as $dwilayah)
      {
        if($get_id_wilayah==$dwilayah->id_wilayah)
        {
          echo '<h4 class="col-sm-6" style="margin-left:14px;"> : '.$dwilayah->nama_wilayah.'</h4>';
        }
      }
      echo '</div>';
      ?>
      
      <div class="form-group">
      <?php foreach($get_tempat_praktik as $dtempat)
      {?>
          <?php if($dtempat->nama_jenis_biodata == "nama_lengkap"){ ?>
            <h4 class="col-sm-3" style="margin-left:14px;">Nama Tempat Praktik/Pelayanan/Ambulatori/Klinik Hewan/RSH</h4>
            <h4 class="col-sm-6" style="margin-left:14px;"> <?php echo $dtempat->isi_biodata_tempat_praktik ?> <br><br></h4>
          <?php  }else { ?>
            <h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dtempat->nama_jenis_biodata))?></h4>
            <h4 class="col-sm-6" style="margin-left:14px;"> <?php echo $dtempat->isi_biodata_tempat_praktik ?> </h4>
          <?php  } ?>
       <?php   }?>
      </div>
      </div>
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
       <div class="box box-widget widget-user">
             <!-- Add the bg color to the header using any of the bg-* classes -->
             <div class="widget-user-header bg-blue-active">
               <h3 class="widget-user-username">Detail Penanggung Jawab</h3>
               <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
             </div>
             <div class="box-body">
       
              <div class="form-group">
              <?php foreach($get_data_pj as $dpj)
              {?>
                  <?php if($dpj->nama_jenis_biodata == "nomor_ktp"){ ?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> Nomor KTP</h4>
                    <h4 class="col-sm-6" style="margin-left:14px;"> <?php echo $dpj->isi_biodata_penanggung_jawab ?></h4>
                  <?php  }else { ?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dpj->nama_jenis_biodata))?></h4>
                    <h4 class="col-sm-6" style="margin-left:14px;"> <?php echo $dpj->isi_biodata_penanggung_jawab ?> </h4>
                  <?php  } ?>
                <?php   }?>
              </div>
            </div>
       </div>

      <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <h3 class="widget-user-username">Detail Pemohon</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="box-body">

              <?php
              $data_member=$this->Model_surat_rekomendasi->get_member_by_id($id_member);
              if(count($data_member!=0))
              {
                echo '<style="margin-left:30px;" div class="row">';
                $i=1;
                foreach($data_member as $dmember)
                {
                  if($i==1 || $i==8)
                  {
                    echo '<div class="col-md-6"><table width="100%">';
                    echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
                     <td><b>:</b> '.$dmember->isi_biodata_member.'</td></tr>';
                  }
                  else {
                    if(strpos($dmember->isi_biodata_member,".jpg")!==false)
                    {
                      echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
                       <td><b>:</b> <a target="blank" href="'.base_url().'images/'.$dmember->isi_biodata_member.'"><img width="50px" height="auto" src="'.base_url().'images/'.$dmember->isi_biodata_member.'"></a> </td></tr>';

                    }
                    else
                    {
                      echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
                       <td><b>:</b> '.$dmember->isi_biodata_member.'</td></tr>';
                    }
                  }

                  if($i==7)
                  {
                    echo '</table></div>';
                  }

                   $i++;
                }
                echo '</div></table></div>';

              }
              ?>
              
       <div class="box box-widget widget-user">
             <!-- Add the bg color to the header using any of the bg-* classes -->
             <div class="widget-user-header bg-blue-active">
               <h3 class="widget-user-username">Berkas Pemohon</h3>
               <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
             </div>
             <div class="box-body">
       
              <div class="form-group">
              <?php foreach($get_data_berkas as $dberkas)
              {?>
                    <h4 class="col-sm-3" style="margin-left:14px;"> <?php echo ucwords(str_replace("_"," ",$dberkas->nama_jenis_biodata))?></h4>
                    <img src="<?php base_url().'images/'.$dberkas->isi_biodata_berkas?>" alt="">
                <?php   }?>
              </div>
            </div>
       </div>

      <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <h3 class="widget-user-username">Detail Peralatan</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="box-body">
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
                                      echo '<div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                      <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                      <br>
                                      </div>';
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
                                '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Model_surat_rekomendasi->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b> <div class="row">';
                                
                                 if(strpos($op->nama_role_operator,"Administrasi")!==false)
                                    {
                                      echo ' <div class="col-md-6">
                                      <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                                    <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                                    </div>';
                                  }
                                  
                                  if(strpos($op->nama_role_operator,"Lapangan")!==false)
                                  {
                                    echo '<div class="col-md-6">
                                    <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                                    <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                                    <br>
                                    </div>'; 
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
    </div>
    </div>
    </div>
          <!-- /.widget-user -->

    <div class="box-footer">
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
                      <div class="box-footer">
                      <button style="margin-left:10px;" type="submit" onclick="'.$onclick_submit.'" class="btn btn-success pull-right" name="submit">Verfikasi</button>
            
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
  </form>
</div>
</div>
