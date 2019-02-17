<!-- Main Content -->
<div class="content">
<div class="container-fluid">  
<div class="row">
<div class="col-md-12">
<div class="card">

    <div class="card-header card-header-tabs card-header-primary">
	<div class="nav-tabs-navigation">
    <div class="nav-tabs-wrapper">
		<h3 class="box-title">Form Surat Izin
			<?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
			echo $nama_pengajuan;}?>
		</h3>
					<div class="card-footer"></div>  
						<ul class="nav nav-tabs" data-tabs="tabs">
						<li class="nav-item">
                          <a class="nav-link active" href="#Detail1" data-toggle="tab" >
                            <i class="material-icons">assignment</i> Detail Tempat Praktik
							<div class="ripple-container"></div>
                          </a>
                        </li>
						
						<li class="nav-item">
						<a class="nav-link">
                         <i class="material-icons">arrow_right_alt</i>
						</a> 
						</li>
						
						<li class="nav-item">
                          <a class="nav-link" href="#Detail2"  data-toggle="tab">
                            <i class="material-icons">assignment_ind</i> Detail Data Penanggung Jawab
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        
						<li class="nav-item">
						<a class="nav-link">
                         <i class="material-icons">arrow_right_alt</i>
						</a> 
						</li>
						
						<li class="nav-item">
                          <a class="nav-link" href="#Detail3" data-toggle="tab">
                            <i class="material-icons">assignment_returned</i> Upload Berkas Pemohon
                            <div class="ripple-container"></div>
                          </a>
                        </li>
						
						<li class="nav-item">
						<a class="nav-link">
                         <i class="material-icons">arrow_right_alt</i>
						</a> 
						</li>
						
						<li class="nav-item">
                          <a class="nav-link" href="#Detail4" data-toggle="tab">
                            <i class="material-icons">assignment_turned_in</i> Detail Peralatan
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
	</div>
	</div>
	</div>
    
        <?php
        echo form_open_multipart('surat_rekomendasi/input','class="form-horizontal"');
        ?>

    <div class="card-body">
	<div class="tab-content">
        
            <!-- Add the bg color to the header using any of the bg-* classes -->
	
			<div class="tab-pane active" id="Detail1">
			<table class="table">
			<tbody>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Wilayah Pengajuan</label>
									  <select class="form-control" name="id_wilayah">
											<?php
											$data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
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
											?>
										</select>
									</div>
								  </div>  
								</div>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Nama Tempat Praktik/Pelayanan/Ambulatori/Klinik Hewan/RSH</label>
									  <input type="text" class="form-control" name="nama_tempat_praktik" required>
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">alamat</label>
									  <input type="text" class="form-control" name="alamat_tempat_praktik" required>
									</div>
								  </div>
								</div>
								
								
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Provinsi</label>
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
								
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Kota/Kabupaten</label>
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
								</div>
								
								<div class="row">
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="bmd-label-floating">No Telepon</label>
									  <input type="text" class="form-control" name="telp_hp_tempat_praktik" Required>
									</div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="bmd-label-floating">No Fax</label>
									  <input type="text" class="form-control" name="fax_tempat_praktik" Required>
									</div>
								  </div>
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="bmd-label-floating">Alamat Email</label>
									  <input type="email" class="form-control" name="email_tempat_praktik" Required>
									</div>
								  </div>
								</div>
								<div class="clearfix"></div>
								<br>
            </tbody>
			</table> 			
			</div>
		  
        
		
		
          
        
            <!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="tab-pane" id="Detail2">
						<table class="table">
							<tbody>
							<form>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">No KTP/Identitas</label>
									  <input type="text" class="form-control" name="nomor_ktp_pj" required>
									</div>
								  </div>
								</div>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Nama Lengkap</label>
									  <input type="text" class="form-control" name="nama_lengkap_pj" required>
									</div>
								  </div>
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Alamat Penanggung Jawab</label>
									  <input type="text" class="form-control" name="alamat_pj" required>
									</div>
								  </div>
								</div>
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">No Telepon</label>
									  <input type="text" class="form-control" name="telp_hp_pj" required>
									</div>
								  </div>
								
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="bmd-label-floating">Alamat Email</label>
									  <input type="email" class="form-control" name="email_pj" required>
									</div>
								  </div>
								</div>
								
								
								
								<div class="clearfix"></div>
								<br>
							  </form>							
							</tbody>	
						  </table>
					</div>            
       
		  
          <!-- end data penanggung jawab -->
         
        <div class="tab-pane" id="Detail3">
          <div class="card-footer">
            <h4 class="col-sm-3" style="margin-left:14px;">Surat Permohonan</h4>
            <input type="hidden" class="form-control-file" name="id_gambar[]" value="45">
            <input type="file" class="form-control-file" name="userfile[]">
          </div>
          <div class="card-footer">
            <h4 class="col-sm-3" style="margin-left:14px;">Upload KTP Pemohon</h4>
            <input type="hidden" class="form-control-file" name="id_gambar[]" value="18">
            <input type="file" class="form-control-file" name="userfile[]">
          </div>
          <div class="card-footer">
            <h4 class="col-sm-3" style="margin-left:14px;">Upload Bukti Pembayaran</h4>
            <input type="hidden" class="form-control-file" name="id_gambar[]" value="41">
            <input type="file" class="form-control-file" name="userfile[]">
          </div>
		  	<br><b>
		<text style="margin-left:45px;">*Masing-masing berkas Maksimal 1 Mb</text></b>
		<br>
		<text style="margin-left:45px;">*lakukan pembayaran sebelum mengisi bagian upload berkas</text>
	  
        </div>
        
         
		 <!-- start data peralatan -->
		    
            <!-- Add the bg color to the header using any of the bg-* classes -->
            
		<div class="tab-pane" id="Detail4">
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
                     '<div class="staticParent"><br>
					  <b><text style="margin-left:30px; font-size:13.5px;">Jumlah : </text></b>

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
			<div class="box-footer">
			  <button type="submit" class="btn btn-info pull-right" name="submit">Submit</button>
			</div>
        </div>
      
    </div>
    </div>


</div>
</div>
</div>
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