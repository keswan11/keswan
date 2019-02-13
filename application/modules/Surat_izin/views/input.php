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
		<br>
	</div>
	</div>
	</div>

		<?php
		  echo form_open_multipart('surat_izin/input','class="form-horizontal"');
		?>

		<div class="card-body">
		<div class="tab-content">
		
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
				<div class="col-md-12">
					<div class="form-group">
						
						<label class="bmd-label-floating"> Detail Wilayah*</label>
						<textarea class="form-control" rows="2" name="detail_wilayah"  required=""></textarea>
						
					</div>
				</div>
			</div>
			
			 
			<div class="row">
				<div class="col-md-9">
					
						
					  <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>

					  <?php foreach($data_pesyaratan as $syarat)
					  {
						if($syarat->nama_jenis_input!="file")
						{
						 $name='name="'.$syarat->kode_jenis_persyaratan.'"';
						 $ket_file=null;
						}
						else
						{
							if(strpos($syarat->kode_jenis_persyaratan,"foto")!==false)
							{
							  $name='name="'.$syarat->kode_jenis_persyaratan.'"'.' accept="image/*,.pdf"';
							 $ket_file=' <label style="font-style:italic;color:red;font-size:12px;">file gambar atau .pdf</label>';
							}
							else
							{
							  $name='name="'.$syarat->kode_jenis_persyaratan.'"'.' accept=".pdf"';

							  $ket_file=' <label style="font-style:italic;color:red;font-size:12px;">file .pdf</label>';
							}
						}



						if($syarat->id_jenis_persyaratan=='63' || $syarat->id_jenis_persyaratan=='64')
						{
						  $required='';
						  $mandatory='';
						}
						else
						{
						  $required=' required';
						  $mandatory='*';
						}
						//$name='name="'.$syarat->kode_jenis_persyaratan.'"';
						echo '
						<div class="card-footer" >
						  <label class="col-sm-4 control-label">'.$syarat->nama_jenis_persyaratan.$mandatory.'</br>'.$ket_file.'</label>

						  <div class="col-sm-4">
							<input type="'.$syarat->nama_jenis_input.'" class="form-control" '.$name.'"
							 placeholder="'.$syarat->nama_jenis_persyaratan.'" '.$required.'><span id="errmsg"></span>
						  </div>
						</div>';
					  }
					  ?>
					
				</div>
			</div>
		</div>
		</div>

		<br><b><text style="margin-left:50px;">Keterangan :</text></b>
		<br>
		<text style="margin-left:50px;">*) Wajib Di isi</text>
		<div class="box-footer">
		  <button type="submit" onclick="return confirm('Anda yakin ingin menyimpan data ini ?')" class="btn btn-success pull-right" name="submit">Simpan</button>
		  <button style="margin-right:10px;" type="reset" onclick="return confirm('Anda yakin ingin megosongkan seluruh isi form ?')" class="btn btn-warning pull-right" name="reset">Kosongkan Form</button>
		</div>
  
	
</div>
</div>
</div>
</div>
</div>
