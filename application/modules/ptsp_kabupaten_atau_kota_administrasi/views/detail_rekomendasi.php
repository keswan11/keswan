<!-- Main Content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Detail
        <?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
        echo $nama_pengajuan;}?></h3>
    </div>
    <?php
      //Cek apakah dia bagian administrasi atau lapangan
            $id_role = $this->session->userdata('id_role_operator');
            $query = $this->db->query("SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id_role")->row();
            $get_adm_lap = explode(' ', $query->nama_role_operator);
            $end_adm_lap = end($get_adm_lap);
    ?>     
        <button class="btn btn-success pull-right" onClick="goBack()">Kembali</button>
      
        <script>
          function goBack(){
            window.history.back();
          }
        </script>
    <?php
      echo form_open($this->uri->segment(1).'/detail_surat_rekomendasi','class="form-horizontal"');
      ?>

    <div class="box-body">
      <?php
      $data_wilayah=$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_wilayah();
      $get_id_wilayah=$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_id_wilayah_pengajuan($id_pengajuan, 'rekomendasi');
      echo '
      <div class="form-group">
        <h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>
      <div class="col-sm-4">';
      echo '<select class="select2 form-control" name="id_wilayah">';
      foreach($data_wilayah as $dwilayah)
      {

        if($dwilayah->id_role_wilayah=="2")
        {
          $nama_wilayah=strtoupper("Provinsi ".$dwilayah->nama_wilayah);
        }
        else
        {
          $nama_wilayah=strtoupper($dwilayah->nama_wilayah);
        }

        if($get_id_wilayah==$dwilayah->id_wilayah)
        {
          $selected='selected=""';
        }
        else
        {
          $selected='';
        }
        echo'<option '.$selected.' value="'.$dwilayah->id_wilayah.'">'.$nama_wilayah.'</option>';

      }
      echo '</select></div></div>';
      ?>
      <?php
      //$stat_pengajuan=$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_status_rekomendasi($id_pengajuan);
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
              <h3 class="widget-user-username">Detail Pemohon</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan ?></h5>
            </div>
            <div class="box-body">

              <?php
              $data_member=$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_member_by_id($id_member);
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
                    if($dmember->nama_jenis_biodata!="gambar")
                    {
                      echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
                       <td><b>:</b> '.$dmember->isi_biodata_member.'</td></tr>';
                    }
                    else {
                      echo '<tr><td><b>Foto<b></td>
                       <td><b>:</b> <a target="blank" href="'.base_url().'images/'.$dmember->isi_biodata_member.'"><img width="50px" height="auto" src="'.base_url().'images/'.$dmember->isi_biodata_member.'"></a> </td></tr>';
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
              <h3 class="widget-user-username">Detail Peralatan</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="box-body">
              <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
              <input type="text" name="id_pengajuan" hidden="true" value="<?php echo $id_pengajuan; ?>"></input>
              <input type="text" name="id_member" hidden="true" value="<?php echo $id_member; ?>"></input>

              <?php
              //Disabled text area
              $disable_adm = 'readonly';
              $disable_lap = 'readonly';

              if($end_adm_lap == 'Administrasi'){
                
                $disable_lap = 'readonly';
                $disable_adm = '';

              }else if($end_adm_lap == 'Lapangan'){
                
                $disable_lap = '';
                $disable_adm = 'readonly';

              }
              echo '<ol type="1">';
              foreach($data_kat_pesyaratan as $dkat)
              {
                echo '<li style="font-size:20px;"><text style="font-size:20px;">'.$dkat->nama_kategori_jenis_peralatan.'</text>';
                echo '<ol style="font-size:16px;" type="a">';
                foreach($this->Ptsp_kabupaten_atau_kota_administrasi_model->get_subkat_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan) as $dsub)
                {
                  if($dsub->id_sub_kategori_jenis_peralatan!=1)
                  {
                    echo '<li>'.$dsub->nama_sub_kategori_jenis_peralatan;
                    echo '<ul type="square">';
                    foreach($this->Ptsp_kabupaten_atau_kota_administrasi_model->get_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan,$dsub->id_sub_kategori_jenis_peralatan) as $syarat)
                    {
                      $data_keterangan=$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_keterangan_peralatan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan);
                      foreach($data_keterangan as $dket)
                      {
                        echo '<li>'.ucwords($syarat->nama_peralatan).
                 			  '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b>

                        <div class="row">
                        <div class="col-md-6">
                        <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                        <textarea '.$disable_adm.' style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                        </div>

                        <div class="col-md-6">
                        <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                        <textarea '.$disable_lap.' style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                        <br>
                        </div>

                        </div>

                        </li>';
                      }
                     }
                    echo '</ul></li>';

                  }
                  else
                  {
                    foreach($this->Ptsp_kabupaten_atau_kota_administrasi_model->get_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan,$dsub->id_sub_kategori_jenis_peralatan) as $syarat)
                    {
                      $data_keterangan=$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_keterangan_peralatan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan);
                      foreach($data_keterangan as $dket)
                      {
                        echo '<li>'.ucwords($syarat->nama_peralatan).
                 			  '<br><b><text style="margin-left:30px; font-size:14px;">Jumlah '.$this->Ptsp_kabupaten_atau_kota_administrasi_model->get_jumlah_persyaratan($id_jenis_pengajuan,$id_pengajuan,$syarat->id_jenis_peralatan).'</text></b>

                        <div class="row">
                        <div class="col-md-6">
                        <b><text style="margin-left:30px; font-size:12px;">Keterangan Administrasi<text></b>
                        <textarea '.$disable_adm.' style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_adm">'.$dket->ket_adm.'</textarea>
                        </div>

                        <div class="col-md-6">
                        <b><text style="margin-left:30px; font-size:12px;">Keterangan Operator Lapangan<text></b>
                        <textarea '.$disable_lap.' style="margin-left:30px; font-size:13.5px; width:300px;" class="form-control" rows="4" name="'.$syarat->id_jenis_peralatan.'_lap">'.$dket->ket_lap.'</textarea>
                        <br>
                        </div>

                        </div>

                        </li>';
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
          <!-- /.widget-user -->

    <?php if ($end_adm_lap == 'Administrasi' || $end_adm_lap == 'Lapangan'): ?>
      <div class="box-footer">
       <button type="submit" class="btn btn-info pull-right" name="submit">Submit Detail</button>
      </div>
      <?php endif ?> 
  </form>
</div>
</div>
