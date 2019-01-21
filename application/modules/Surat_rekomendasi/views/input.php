<!-- Main Content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah
        <?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
          echo $nama_pengajuan;}?></h3>
        </div>
        <?php
        echo form_open('surat_rekomendasi/input','class="form-horizontal"');
        ?>

        <div class="box-body">
          <?php
          $data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
          echo '
          <div class="form-group">
          <h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>
          <div class="col-sm-4">';
          echo '<select class="select2 form-control" name="id_wilayah">';
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

          echo '
          <div class="form-group">
          <h4 class="col-sm-3" style="margin-left:14px;">Detail Wilayah</h4>
          <div class="col-sm-4">
          <textarea style="font-size:13.5px; width:310px; height:100px;" class="form-control" type="text" name="detail_wilayah" placeholder="Apabila anda mengisi Wilayah Pengajuan Provinsi Jawa Barat isikan Detail dengan contoh Kota Bandung, Kota Bogor"></textarea>';
          echo '</div></div>';
          ?>
          
		  
		  
		  <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue-active">
              <h3 class="widget-user-username">Detail Peralatan</h3>
              <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
            </div>
            <div class="box-body">
              <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
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
							<label class="radio-inline"><input type="radio" name="status_peralatan'.$syarat->id_jenis_peralatan.'" value="2" >Tidak Ada</label>
					
					 
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
					<label class="radio-inline"><input type="radio" name="status_peralatan'.$syarat->id_jenis_peralatan.'" value="2" >Tidak Ada</label>
					 
					
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
