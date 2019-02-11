	<style type="text/css">
	label{
		font-weight: bold;
	}
	.diisi {
		font-style: italic;
		color:  red;
	}
</style>
<div class="container-fluid">
	<form action="<?php echo base_url() ?>daftar/daftar_action" method="post" enctype="multipart/form-data">
		<div class="box-body">
			<div class="row">
				<?php 
				echo "<div class='col-sm-12'>";
				echo "<div class='form-group'>";
				echo "<label>Pilih Warga Negara <i class='diisi'>*</i></label>";
				echo "<select name='id_jenis_warga' class='form-control'>";
				foreach ($warga_negara as $wg) {
					if ($wg->nama_jenis_warga == "WNI") {
						$negara = "Warga Negara Indonesia";
					} else {
						$negara = "Warga Negara Asing";
					}
					echo "<option value='$wg->id_jenis_warga'>$negara</option>";
				}
				echo "</select>";
				echo "</div>";
				echo "</div>";
				foreach ($biodata as $bio) {
					$nama = ucwords(str_replace("_", " ", $bio->nama_jenis_biodata));
					if ($nama == "Nomor Ktp") {
						$nama = "Nomor KTP/Identitas";
					} else if ($nama == "Nomor Npwp") {
						$nama = "Nomor NPWP";
					} else if ($nama == "Scan Ktp") {
						$nama = "Scan KTP";
					}
					if ($nama == "Status Kepegawaian") {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i class='diisi'>*</i></label>";
						echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
						echo "<select name='isi_biodata_member[]' class='form-control'>";
						echo "<option value='ASN'>ASN</option>";
						echo "<option value='Mandiri'>Mandiri</option>";
						echo "</select>";
						echo "</div>";
						echo "</div>";
					} else if ($nama == "Jenis Kelamin") {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i class='diisi'>*</i></label>";
						echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
						echo "<select name='isi_biodata_member[]' class='form-control'>";
						echo "<option value='Laki - laki'>Laki - laki</option>";
						echo "<option value='Perempuan'>Perempuan</option>";
						echo "</select>";
						echo "</div>";
						echo "</div>";
					}
					if ($bio->nama_jenis_input == "text" && $bio->nama_jenis_biodata != 'status' && $bio->nama_jenis_biodata != 'username' && $bio->nama_jenis_biodata != 'status_kepegawaian' && $bio->nama_jenis_biodata != 'jenis_kelamin') {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i class='diisi'>*</i></label>";
						echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";

						echo "<input type='$bio->nama_jenis_input' id='$bio->nama_jenis_biodata' name='isi_biodata_member[]' class='form-control' placeholder='$nama' required>";

						echo "</div>";
						echo "</div>";
					} else if ($bio->nama_jenis_input == "textarea") {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i class='diisi'>*</i></label>";
						echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
						echo "<textarea name='isi_biodata_member[]' class='form-control' rows='3' placeholder='$nama' required></textarea>";
						echo "</div>";
						echo "</div>";
					} else if ($bio->nama_jenis_input == "file") {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i class='diisi'>* format jpeg/jpg</i></label>";
						echo "<input type='hidden' name='id_gambar[]' value='$bio->id_jenis_biodata'>";
						echo "<input type='$bio->nama_jenis_input' id='$bio->nama_jenis_biodata' name='userfile[]' class='form-control' placeholder='$nama' accept='image/jpeg' required>";
						echo "</div>";
						echo "</div>";
					} else if ($bio->nama_jenis_input == "date") {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i class='diisi'>*</i></label>";
						echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
						echo "<input type='text' name='isi_biodata_member[]' class='form-control datepicker' placeholder='$nama'  required>";
						echo "</div>";
						echo "</div>";
					} else if ($bio->nama_jenis_input == "email") {
						echo "<div class='col-sm-6'>";
						echo "<div class='form-group'>";
						echo validation_errors();
						echo "<label for='$bio->nama_jenis_biodata'>$nama <i id='message'></i> <i class='diisi'>*</i> </label>";
						echo "<span id='loading'><img src='".base_url('assets/loader.gif')."' alt='Ajax Indicator' /></span>";
						echo "<input type='hidden' name='id_email' value='$bio->id_jenis_biodata'>";
						echo "<input type='email' name='email' class='form-control' placeholder='$nama' id='email' required>";
						echo "</div>";
						echo "</div>";
					} 
					if ($bio->nama_jenis_biodata == "status") {
						echo "<input type='hidden' name='id_status' value='$bio->id_jenis_biodata'>";
						echo "<input type='hidden' name='status' value='Tidak Aktif'>";
					}
				}
				if ($this->uri->segment(2) == "perorangan") {
					echo '<input type="hidden" name="id_jenis_member" value="1">';
					echo '<input type="hidden" name="jenis_member" value="perorangan">';
				} else if ($this->uri->segment(2) == "instansi") {
					echo '<input type="hidden" name="id_jenis_member" value="2">';
					echo '<input type="hidden" name="jenis_member" value="instansi">';
				}

				echo "<div class='col-sm-6'>";
				echo "<div class='form-group'>";
				echo "<label>Password <i class='diisi'>*</i></label>";
				echo "<input type='password' name='password' class='form-control' placeholder='Password' required>";
				echo "</div>";
				echo "</div>";
				?>
				
			</div>
			<?php if ($this->uri->segment(2) == "perorangan"): ?>
				<hr>
				<div class="row">
					<?php
					foreach ($passport as $p) {
						$nama = ucwords(str_replace("_", " ", $p->nama_jenis_biodata));
						if ($p->nama_jenis_input == "text") {
							echo "<div class='col-sm-6'>";
							echo "<div class='form-group'>";
							echo "<label for='$p->nama_jenis_biodata'>$nama </label>";
							echo "<input type='hidden' name='id_biodata_member[]' value='$p->id_jenis_biodata'>";

							echo "<input type='$p->nama_jenis_input' id='$p->nama_jenis_biodata' name='isi_biodata_member[]' class='form-control' placeholder='$nama' value='-' required>";

							echo "</div>";
							echo "</div>";
						} else if ($p->nama_jenis_input == "file") {
							echo "<div class='col-sm-6'>";
							echo "<div class='form-group'>";
							echo "<label for='$p->nama_jenis_biodata'>$nama</label>";
							echo "<input type='hidden' name='id_gambar[]' value='$p->id_jenis_biodata'>";
							echo "<input type='$p->nama_jenis_input' id='$p->nama_jenis_biodata' name='userfile[]' class='form-control' placeholder='$nama' accept='image/jpeg'>";
							echo "</div>";
							echo "</div>";
						} else if ($p->nama_jenis_input == "date") {
							echo "<div class='col-sm-6'>";
							echo "<div class='form-group'>";
							echo "<label for='$p->nama_jenis_biodata'>$nama</label>";
							echo "<input type='hidden' name='id_biodata_member[]' value='$p->id_jenis_biodata'>";
							echo "<input type='text' name='isi_biodata_member[]' class='form-control datepicker' placeholder='$nama' value='-' required>";
							echo "</div>";
							echo "</div>";
						}
					} 
					?>
				</div>
			<?php endif ?>
			<div class="row">
				<div class="col-sm-12">
					<p style="font-style: italic; color: red;"><b>* Seluruh keterangan wajib diisi</b></p>
				</div>
			</div>

		</div>
		<div class="box-footer">
			<div class="row pull-right">
				<!--<?php echo validation_errors(); ?>-->
				<button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
				<!--<label id="message"></label>-->
				<!--<span id="loading"><img src="<?php echo base_url('assets/loader.gif'); ?>" alt="Ajax Indicator" /></span>-->
			</div>
		</div>
	</form>
</div>
<!--<input type='text' onkeypress='validate(event)' />-->
<!-- <script type="text/javascript">
	function validate(evt) {
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode( key );
		var regex = /[0-9]|\./;
		if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
		}
	}
</script> -->