<!-- Main Content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah
        <?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
          echo $nama_pengajuan;}?></h3>
    </div>
    
        <?php
        echo form_open_multipart('surat_rekomendasi/input','class="form-horizontal"');
        ?>

        <div class="box-body">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <div class="col-lg-10">
              <h3 class="widget-user-username">Detail Tempat Praktik</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
              </div>
              <div class="col-sm-1">
              <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#detailPraktik" aria-expanded="false" aria-controls="detailPraktik">Show/Hide</button>
              </div>
            </div>
            <div class="box-body collapse multi-collapse" id="detailPraktik" >
              <?php
              $data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
              echo '
              <div class="form-group">
              <h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>
              <div class="col-sm-4">';
              echo '<select class="select form-control" name="id_wilayah">';
              if($this->session->userdata('id_jenis_warga') != 2)
              {
                  echo'<option value="1">PUSAT</option>';
                  foreach($data_wilayah as $dwilayah)
                  {
                    if($dwilayah->id_wilayah!="1")
                    {
                        if($dwilayah->id_role_wilayah=="2")
                        {
                          $nama_wilayah=strtoupper("Provinsi ".$dwilayah->nama_wilayah);
                        }
                        else {
                          $nama_wilayah=strtoupper($dwilayah->nama_wilayah);
                        }
                        echo'<option value="'.$dwilayah->id_wilayah.'">'.$nama_wilayah.'</option>';    
                    }
                  }
              }
              else
              {
                    echo'<option value="1">PUSAT</option>';
              }
              echo '</select></div></div>';

              ?>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">Nama Tempat Praktik/Pelayanan/Ambulatori/Klinik Hewan/RSH</h4>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="nama_tempat_praktik" required>
                </div>
              </div>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">Alamat</h4>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="alamat_tempat_praktik" required>
                </div>
              </div>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">Provinsi</h4>
                <div class="col-sm-4">
                <?php $data_provinsi=$this->Model_surat_rekomendasi->get_provinsi(); ?>
                <select name="provinsi_tempat_praktik" class="select form-control">
                <?php
                if($this->session->userdata('id_jenis_warga') != 2)
                {
                    echo'<option selected>Pilih Provinsi</option>';
                    foreach($data_provinsi as $dprovinsi)
                    {
                      if($dprovinsi->id_provinsi!="1")
                      {
                          if($dprovinsi->id_role_wilayah=="2")
                          {
                            $nama_provinsi=strtoupper("Provinsi ".$dprovinsi->nama);
                          }
                          else {
                            $nama_provinsi=strtoupper($dprovinsi->nama);
                          }
                          echo'<option value="'.$dprovinsi->nama.'">'.$nama_provinsi.'</option>';    
                      }
                    }
                }
                else
                {
                      echo'<option value="1">PUSAT</option>';
                }
                ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">Kota/Kabupaten</h4>
                <div class="col-sm-4">
                <?php $data_kabupaten=$this->Model_surat_rekomendasi->get_kabupaten(); ?>
                <select name="kabupaten_tempat_praktik" class="select form-control">
                <?php
                if($this->session->userdata('id_jenis_warga') != 2)
                {
                    echo'<option selected>Pilih Kota/Kabupaten</option>';
                    foreach($data_kabupaten as $dkabupaten)
                    {
                      if($dkabupaten->id_kabupaten!="1")
                      {
                          if($dkabupaten->id_role_wilayah=="3")
                          {
                            $nama_kabupaten=strtoupper($dkabupaten->nama);
                          }
                          else {
                            $nama_kabupaten=strtoupper($dkabupaten->nama);
                          }
                          echo'<option value="'.$dkabupaten->nama.'">'.$nama_kabupaten.'</option>';    
                      }
                    }
                }
                else
                {
                      echo'<option value="1">PUSAT</option>';
                }
                ?>
                </select>
                </div>
              </div>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">No Telepon</h4>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="telp_hp_tempat_praktik" Required>
                </div>
              </div>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">No Fax</h4>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="fax_tempat_praktik" Required>
                </div>
              </div>
              <div class="form-group">
                <h4 class="col-sm-3" style="margin-left:14px;">Alamat Email</h4>
                <div class="col-sm-4">
                <input type="email" class="form-control" name="email_tempat_praktik" Required>
                </div>
              </div>
          </div>
          </div>
          <!-- start data penanggung jawab -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <div class="col-lg-10">
              <h3 class="widget-user-username">Detail Data Penanggung Jawab</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
              </div>
              <div class="col-sm-1">
              <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#detailPenanggungJawab" aria-expanded="false" aria-controls="detailPraktik">Show/Hide</button>
              </div>
            </div>
            <div class="box-body collapse multi-collapse" id="detailPenanggungJawab">
            <div class="form-group">
              <h4 class="col-sm-3" style="margin-left:14px;">No KTP/Identitas</h4>
              <div class="col-sm-4">
              <input type="text" class="form-control" name="nomor_ktp_pj" required>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-3" style="margin-left:14px;">Nama Lengkap</h4>
              <div class="col-sm-4">
              <input type="text" class="form-control" name="nama_lengkap_pj" required>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-3" style="margin-left:14px;">Alamat Penanggung Jawab</h4>
              <div class="col-sm-4">
              <input type="text" class="form-control" name="alamat_pj" required>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-3" style="margin-left:14px;">No Telepon</h4>
              <div class="col-sm-4">
              <input type="text" class="form-control" name="telp_hp_pj" required>
              </div>
            </div>
            <div class="form-group">
              <h4 class="col-sm-3" style="margin-left:14px;">Alamat Email</h4>
              <div class="col-sm-4">
              <input type="email" class="form-control" name="email_pj" required>
              </div>
            </div>
            </div>
          </div>
          <!-- end data penanggung jawab -->
        <div class="box box-widget widget-user">  
          <div class="widget-user-header bg-blue-active">
            <div class="col-lg-10">
            <h3 class="widget-user-username">Upload Berkas Pemohon</h3>
            <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="col-sm-1">
            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#detailBerkas" aria-expanded="false" aria-controls="detailPraktik">Show/Hide</button>
            </div>
          </div>
          <div class="box-body collapse multi-collapse" id="detailBerkas">
          <div class="form-group">
            <h4 class="col-sm-3" style="margin-left:14px;">Upload Surat Permohonan</h4>
            <div class="col-sm-4">
            <input type="file" class="form-control-file" name="surat_permohonan">
            </div>
          </div>
          <div class="form-group">
            <h4 class="col-sm-3" style="margin-left:14px;">Upload KTP Pemohon</h4>
            <div class="col-sm-4">
            <input type="file" class="form-control-file" name="scan_ktp">
            </div>
          </div>
          <div class="form-group">
            <h4 class="col-sm-3" style="margin-left:14px;">Upload Bukti Pembayaran</h4>
            <div class="col-sm-4">
            <input type="file" class="form-control-file" name="bukti_pembayaran">
            </div>
          </div>
          <span>*Masing-masing berkas Maksimal 1 Mb</span> <br>
          <span>*lakukan pembayaran sebelum mengisi bagian upload berkas</span>
          </div>
        </div>
          <!-- start data peralatan -->
		    <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <div class="col-lg-10">
              <h3 class="widget-user-username">Detail Peralatan</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
              </div>
              <div class="col-sm-1">
              <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#detailPeralatan" aria-expanded="false" aria-controls="detailPraktik">Show/Hide</button>
              </div>
            </div>
            <div class="box-body collapse multi-collapse" id="detailPeralatan">
              <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>">
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
                     echo '<li>'.ucwords($syarat->nama_peralatan).
                     '<div class="staticParent"><br><b><text style="margin-left:30px; font-size:13.5px;">Jumlah : </text></b>

                       <input type="text" class="child" style="width:150px; padding:5px; font-size:14px;" name="'.$syarat->id_jenis_peralatan.'">
							
							
							<label class="radio-inline"><input type="radio" name="status_peralatan'.$syarat->id_jenis_peralatan.'" value="1" >Ada</label>
							<label class="radio-inline"><input type="radio" name="status_peralatan'.$syarat->id_jenis_peralatan.'" value="2" checked>Tidak Ada</label>
					
					 
					 </div>
                     </li>';
                    } 
                                                /*pada radio button ditanti name */
                   echo '</ul></li>';

                 }
                 else
                 {
                  foreach($this->Model_surat_rekomendasi->get_persyaratan($id_jenis_pengajuan,$dkat->id_kategori_jenis_peralatan,$dsub->id_sub_kategori_jenis_peralatan) as $syarat)
                  {
                    echo '<li>'.ucwords($syarat->nama_peralatan).
                    '<div class="staticParent"><br><b><text style="margin-left:30px; font-size:13.5px;">Jumlah : </text></b>

                    <input type="text" class="staticParent child" style="width:150px; padding:5px; font-size:14px;" name="'.$syarat->id_jenis_peralatan.'">
                    
					
					<label class="radio-inline"><input type="radio" name="status_peralatan'.$syarat->id_jenis_peralatan.'" value="1">Ada</label>
					<label class="radio-inline"><input type="radio" name="status_peralatan'.$syarat->id_jenis_peralatan.'" value="2" checked>Tidak Ada</label>
					 
					
					</div>
                    </li>';
                                                    /*pada radio button ditanti name */
                  }
                }
              }
              echo '</ol></li></br>';
            }
          echo '</ol>';?>

        </div>
      </div>

    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-info pull-right" name="submit">Submit</button>
    </div>
  </form>
</div>
</div>

<!-- <input type="input" id="edit1" />-->
<script>
  $(document).ready(function(){
    $('[id^=edit]').keypress(validateNumber);
  });

  function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
      return true;
    } else if ( key < 48 || key > 57 ) {
      return false;
    } else {
     return true;
   }
 };
</script>