<section class="content-header">
  <h1>
    List Surat Rekomendasi
  </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <small>

        <?php

        echo anchor('surat_rekomendasi/input/'.$id_jenis_pengajuan,'<i class="glyphicon glyphicon-plus"></i> Pengajuan','class="btn bg-green"');

        ?>

      </small>
        </div>
        <div class="box-body">
          <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
        <input type="text" name="id_pengajuan" hidden="true" value="<?php echo $id_pengajuan; ?>"></input>
        <input type="text" name="id_member" hidden="true" value="<?php echo $id_member; ?>"></input>
         <?php
      //echo form_open_multipart('surat_rekomendasi/update','class="form-horizontal"');
    ?>
          <table id="tabel" class="table table-bordered">
            <thead>
              <tr>
                <td>Nama Member</td>
                <td>Jenis Pengajuan</td>
                <td>Wilayah</td>
                <td>Status Pengajuan</td>
                <td>Tanggal Dibuat</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
                  
                    <?php
                    $i=1;
                    // <a href="'.base_url().'surat_izin/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">'.$i.'. Data ID '.$i.'</a>
                    foreach($data_list_surat_rekomendasi as $dsurat){
                      if ($dsurat->st_pengajuan == 0) {
                        $a = "Tersimpan";
                      }
                      elseif ($dsurat->st_pengajuan ==1) {
                        $a = "Terkirim";
                      }
                      elseif ($dsurat->st_pengajuan ==2) {
                        $a = "Terdisposisi";
                      }
                      elseif ($dsurat->st_pengajuan ==3) {
                        $a = "Terverifikasi Administrasi";
                      }
                      elseif ($dsurat->st_pengajuan ==4) {
                        $a = "Terverifikasi Lapangan";
                      }
                      elseif ($dsurat->st_pengajuan ==5) {
                        $a = "Diterbitkan";
                      }
                      elseif ($dsurat->st_pengajuan ==6) {
                        $a = "Ditolak";
                      }

                      if ($dsurat->id_status_pengajuan <=6) {
                        $status = '<a href="'.base_url().'surat_rekomendasi/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'"><button class="btn btn-success">Detail</button></a> &nbsp';
                      }
                      elseif($dsurat->id_status_pengajuan >= 8)
                      {
                        $status = '<button class="btn btn-default" disabled>submitted</button> &nbsp;'.anchor(site_url($this->uri->segment(1).'/cetak/'.$dsurat->id_pengajuan.''), "Cetak", array("class" => "btn  btn-primary"));
                      }
                    echo '<tr>
                    <td>'.$dsurat->isi_biodata_member.'</td>
                    <td>'.$dsurat->nama_jenis_pengajuan.'</td>
                    <td>'.$dsurat->nama_wilayah.'</td>
                    <td>'.$a.'</td>
                     <td>'.$dsurat->tgl.'</td>
                     <td>'.$status.'</td>
                    </tr>';
                  $i++;}?>
                  
              <!-- anchor(site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$id_pengajuan), "Submit", array("class" => "btn  btn-success")).'
                     '.anchor(site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$id_pengajuan), "Cetak", array("class" => "btn  btn-primary")) -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

      