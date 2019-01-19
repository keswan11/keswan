<!-- Main Content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Surat Izin
        <?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
        echo $nama_pengajuan;}?></h3>
      </div>
    
    
    <?php
      echo form_open_multipart('surat_izin/detail','class="form-horizontal"');
    ?>

    <div class="box-body">
    
    

      <?php
      $data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
      $get_id_wilayah=$this->Model_surat_izin->get_id_wilayah_pengajuan($id_pengajuan);
      echo '
      <div class="form-group">
        <h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>';
      foreach($data_wilayah as $dwilayah)
      {
        if($get_id_wilayah==$dwilayah->id_wilayah)
        {
          echo '<h4 class="col-sm-6" > : '.$dwilayah->nama_wilayah.'</h4>';
        }
      }
      echo '</div>';
      ?>
      
      <?php foreach($data_list_surat_izin as $dlist)
      {
        if($dlist->detail_wilayah!=NULL || $dlist->detail_wilayah!='')
        {
          $detail_wilayah='<h4 class="col-sm-6"> : '.$dlist->detail_wilayah.'</h4>';
          echo '
          <div class="form-group">
            <h4 class="col-sm-3" style="margin-left:14px;">Detail Wilayah</h4>
            '.$detail_wilayah.'
          </div>';
        }
      }?>
      <?php
      /*$stat_pengajuan=$this->Model_surat_izin->get_status_izin($id_pengajuan);
      $status=array("Diajukan","Terdisposisi","Terverifikasi Dokumen","Terverifikasi Lapangan","Diterbitkan");

      echo '
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
        else {
          $select="";
        }
        echo ' <option value="'.($i+1).'"'.$select.'>'.$status[$i].'</option>';
      }
      echo '</select></div></div><br>';*/
       ?>

        <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
        <input type="text" name="id_pengajuan" hidden="true" value="<?php echo $id_pengajuan; ?>"></input>
        <input type="text" name="id_member" hidden="true" value="<?php echo $id_member; ?>"></input>

      <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <h3 class="widget-user-username">Detail Pemohon</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="box-body">

              <?php
              $data_member=$this->Model_surat_izin->get_member_by_id($id_member);
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
            </div>
              <!-- /.row -->
    </div>

    <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-blue-active">
            <h3 class="widget-user-username">Detail Surat Izin</h3>
            <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
          </div>
          <div class="box-body">
            <?php foreach($data_pesyaratan as $syarat)
            {
              $isi_data=$this->Model_surat_izin->get_isi_persyaratan($id_pengajuan,$syarat->id_jenis_persyaratan);
              foreach($isi_data as $isi)
              {
                foreach($this->Model_surat_izin->get_list_pengajuan_izin($id_pengajuan) as $data)
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
                
                foreach ($data_operator as $op)
                {
                    
                   
                    
                    foreach($this->Model_surat_izin->get_list_pengajuan_izin($id_pengajuan) as $data)
                  {
                      if(strpos($op->nama_role_operator,"Kepala")!==false ||($data->id_status_pengajuan==6 || $data->id_status_pengajuan==5) || $is_verifikasi==false)
                  {

                      if($isi->nama_jenis_input!="file")
                      {
                        $isi_data_persyaratan=$isi->isi_jenis_persyaratan;
                        echo '
                          <div class="form-group">
                           <label class="col-sm-4">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                           <div class="col-sm-4">
                           <text class="form-control">'.$isi_data_persyaratan.'</text>
                        </div>
                        </div>';
                      }
                      else
                      {
                        $isi_data_persyaratan=base_url()."dokumen/".$nama_pengajuan."/".md5($id_pengajuan)."/".$isi->isi_jenis_persyaratan;
                        if(strpos($isi_data_persyaratan,'File kosong')!==false)
                        {
                          echo '
                            <div class="form-group">
                             <label class="col-sm-4">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                             <div class="col-sm-4">
                             <text class="form-control">File kosong atau tidak terupload</text>
                          </div>
                          </div>';
                        }
                        else
                        {
                          echo '
                          
                            <div class="form-group">
                             <label class="col-sm-4">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                             <div class="col-sm-4">
                             <a class="form-control" target="blank" href="'.$isi_data_persyaratan.'"> <i class="fa fa-download"> Unduh file</i></a>
                          </div>
                          </div>';
                          
                        }

                      }
                      
                      echo '
                        <div class="row">
                         <div class="col-sm-4">
                         Keterangan Administrasi <br>
                         <textarea readonly width:300px;" class="form-control" rows="2" name="'.$syarat->id_jenis_persyaratan.'_adm">'.$isi->ket_adm.'</textarea>
                         </div>';
                         
                      echo '
                         <div class="col-sm-4">
                         Keterangan Operator Lapangan <br>
                         <textarea readonly width:300px;" class="form-control" rows="2" name="'.$syarat->id_jenis_persyaratan.'_lap">'.$isi->ket_lap.'</textarea>
                         </div>
                         
                        <div class="col-sm-3" ></div>';

                      echo '</div><br><br>';
                  }
                  else
                  {
                      if($isi->nama_jenis_input!="file")
                      {
                        $isi_data_persyaratan=$isi->isi_jenis_persyaratan;
                        echo '
                        <div class="row" style="margin-left:50px;">
                           <label class="col-sm-6">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                           <div>
                           <text >: '.$isi_data_persyaratan.'</text>
                           </div>
                        </div>';
                      }
                      else
                      {
                        $isi_data_persyaratan=base_url()."dokumen/".$nama_pengajuan."/".md5($id_pengajuan)."/".$isi->isi_jenis_persyaratan;
                        echo '
                        <div class="row" style="margin-left:50px;">
                           <label class="col-sm-6">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                           <div>
                           : <a target="blank" href="'.$isi_data_persyaratan.'"> <i class="fa fa-download"> Unduh file</i></a>
                           </div>
                        </div>';
                      }
                      
                      echo '<div class="row" style="margin-left:60px;">';
                      if(strpos($op->nama_role_operator,"Administrasi")!==false)
                      {
                        echo'<div class="col-md-6">
                        <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                        <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_persyaratan.'_adm">'.$isi->ket_adm.'</textarea>
                        </div>';
                      }
                      
                      if (strpos($op->nama_role_operator,"Lapangan")!==false)
                      {
                        echo '
                        <div class="col-md-6">
                        <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                        <textarea style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_persyaratan.'_lap">'.$isi->ket_lap.'</textarea>
                        <br>
                        </div>';
                      }
                      echo '</div><br><br>';
                  
                  }
                  }
                  

                }

              }
            }?>
          </div>

          </div>
    </div>

    <?php
    foreach ($data_operator as $op)
    {
      if(strpos($op->nama_role_operator,"Kepala")!==false)
      {
      }
      else 
      {
        foreach($this->Model_surat_izin->get_list_pengajuan_izin($id_pengajuan) as $data)
        {
            if($data->id_status_pengajuan!=6 && $data->id_status_pengajuan!=5)
            {
                if($is_verifikasi==true)
                {
                    $onclick_submit="return confirm('Anda yakin ingin menyimpan data ini ?')";
                  $onclick_tolak="return confirm('Anda yakin ingin menolak surat permohonan ini ?')";
                  echo '
                  <div class="box-footer">
                  <button style="margin-left:10px;" type="submit" onclick="'.$onclick_submit.'" class="btn btn-success pull-right" name="submit">Verifikasi</button>
        
                  <a onclick="'.$onclick_tolak.'" class="btn btn-danger pull-right" href="'.base_url().'surat_izin/tolak_surat/'.$id_jenis_pengajuan.'/'.$id_pengajuan.'">
                  Tolak Surat Izin
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

  </form>
</div>
</div>
