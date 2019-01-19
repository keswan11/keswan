<html><head>
	<title>
		<?php echo $title;?>
	</title>

	<style type="text/css">
	.font10{
		font-size: 10pt;
		font-family: : Times;
	}

	.font14{
		font-size: 14pt;
		font-family: : Times;
	}
	.font6{
		font-size: 8pt;
		font-family: : Times;
	}
	.font11{
		font-size: 11pt;
		font-family: : Times;
	}

	</style>
	<p class="font10" align="center"><b></b></p><br><br><br><br><hr>
</head><body>
<table width="100%" align="center" class="font10">
	<?php if (!empty($cetak)) {
			foreach ($cetak as $r) : ?>
			<?php 
			//Get Pekerjaan Member
			$query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 18";
			$pekerjaan = $this->db->query($query)->row();

			//Count No Surat 
			$query = "SELECT COUNT(id_jenis_pengajuan) AS jlm FROM tb_list_pengajuan_surat_izin WHERE id_jenis_pengajuan = $r->id_jenis_pengajuan";
			$hasil = $this->db->query($query)->row();
			$d = $hasil->jlm+1;

			//Get Nama Wilayah
			$query = "SELECT tb_list_pengajuan_surat_izin.id_wilayah, 
							 tb_wilayah.id_wilayah,
							 tb_wilayah.id_wilayah AS id_wilayah,
				   		 	 tb_wilayah.nama_wilayah AS nama_wilayah
							 FROM tb_list_pengajuan_surat_izin
							 JOIN tb_wilayah ON tb_list_pengajuan_surat_izin.id_wilayah = tb_wilayah.id_wilayah
							 WHERE tb_list_pengajuan_surat_izin.id_wilayah = $r->id_wilayah";
			$n_wilayah = $this->db->query($query)->row();

			//Get Provinsi
			$id_wilayah =  $r->id_wilayah;
			$hitung 	= strlen($id_wilayah); 
			$get_id_prov = substr($id_wilayah,0,2);
				if($hitung >= 3){
					$query = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				$nama_provinsi = $this->db->query($query)->row();
				}else{
					echo "";
				}

				$query = "SELECT * FROM tb_data_sipp WHERE id_pengajuan = $r->id_pengajuan";
				$data_sipp = $this->db->query($query)->row();
			
			?>
			<?php if ($r->id_jenis_pengajuan == 7){
					echo'
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN<br>
				PARAMEDIK VETERINER PELAYANAN ASISTEN TEKNIK REPRODUKSI (SIPP-ATR)<br>
			Nomor: SIPP-ATR / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr>';
		echo '
	<tr>
		<td><p class="font10" align="center">Berdasarkan Peraturan Menteri Pertanian Nomor: '.$data_sipp->nomor_peraturan.'
				
				 tentang '.$data_sipp->tentang.', yang bertanda tangan di bawah ini Kepala Dinas ';echo $data_sipp->kepala_dinas;
				if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query1 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query1)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}
		echo ' memberikan IZIN PELAYANAN TEKNIK REPRODUKSI kepada :<br><br></p>';
		$query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		elseif ($r->id_jenis_pengajuan == 8){
					echo'
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN<br>
				PARAMEDIK VETERINER PELAYANAN PEMERIKSA KEBUNTINGAN (SIPP-PK)B<br>
			Nomor: SIPP-PKB / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr>';
		echo '
	<tr>
		<td><p class="font10" align="center">Berdasarkan Peraturan Menteri Pertanian Nomor: '.$data_sipp->nomor_peraturan.'
				
				 tentang '.$data_sipp->tentang.', yang bertanda tangan di bawah ini Kepala Dinas ';echo $data_sipp->kepala_dinas;
				if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query1 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query1)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}
		echo ' memberikan IZIN PELAYANAN PEMERIKSAAN KEBUNTINGAN kepada :<br><br></p>';
		$query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		elseif ($r->id_jenis_pengajuan == 9){
					echo'
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN<br>
				PARAMEDIK VETERINER PELAYANAN INSEMINATOR (SIPP INSEMINATOR)<br>
			Nomor: SIPP-PKB / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr>';
		echo '
	<tr>
		<td><p class="font10" align="center">Berdasarkan Peraturan Menteri Pertanian Nomor: '.$data_sipp->nomor_peraturan.'
				
				 tentang '.$data_sipp->tentang.', yang bertanda tangan di bawah ini Kepala Dinas ';echo $data_sipp->kepala_dinas;
				if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query1 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query1)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}
		echo ' memberikan  IZIN PELAYANAN INSEMINASI BUATAN kepada :<br><br></p>';
		$query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		elseif ($r->id_jenis_pengajuan == 10){
					echo'
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN<br>
				PARAMEDIK VETERINER PELAYANAN KESEHATAN HEWAN (SIPP-KESWAN)<br>
			Nomor: SIPP-PKB / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr>';
		echo '
	<tr>
		<td><p class="font10" align="center">Berdasarkan Peraturan Menteri Pertanian Nomor: '.$data_sipp->nomor_peraturan.'
				
				 tentang '.$data_sipp->tentang.', yang bertanda tangan di bawah ini Kepala Dinas ';echo $data_sipp->kepala_dinas;
				if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query1 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query1)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}
		echo ' memberikan  IZIN PELAYANAN PARAMEDIK VETERINER KESEHATAN HEWAN kepada:<br><br></p>';
		$query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		?>
</table>

<table width="100%" class="font10">
	<tr>
		<td width="30%">Tempat dan Tanggal Lahir</td>
		<td> : 
			<?php $query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
			$data = $this->db->query($query)->row();
			echo $data->isi_biodata_member;
			?>,
			<?php $query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
			$data = $this->db->query($query)->row();
			echo $data->isi_biodata_member;
			?>				
			</td>
	</tr>
	<tr>
		<td>Alamat Tempat Tinggal</td>
			<td> : 
			<?php $query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
			$data = $this->db->query($query)->row();
			echo $data->isi_biodata_member;
			?>
		</td>
			</td>
	</tr>
	<tr>
		<td>Nama Pos IB</td>
		<td> : <?php echo $data_sipp->nama_pos_ib;?></td>
	</tr>
	<tr>
		<td>Alamat Pos IB</td>
		<td> : <?php echo $data_sipp->alamat_pos_ib;?></td>
	</tr>
	<tr>
		<td>Dokter Hewan Penyelia</td>
		<td> : <?php echo $data_sipp->nama_dokter_hewan_penyelia;?></td>
	</tr>
	<tr>
		<td>Nomor SIP Dokter Hewan Penyelia</td>
		<td> : <?php echo $data_sipp->no_sip_dokter_hewan_penyelia;?></td>
	</tr>
	<tr>
		<td>Masa Berlaku Kontrak Penyeliaan</td>
		<td> : <?php echo $data_sipp->masa_berlaku_kontrak_penyelia;?> </td>
	</tr>
	<tr>
		<td><?php if ($r->id_jenis_pengajuan == 7){
				echo "Masa Berlaku SIPP-ATR1) ";
			}elseif ($r->id_jenis->pengajuan == 8) {
				echo " Masa Berlaku SIPP PKb1) ";
			}elseif ($r->id_jenis->pengajuan == 9) {
				echo "Masa Berlaku SIPP Inseminator";
			}elseif ($r->id_jenis->pengajuan == 10) {
				echo "Masa Berlaku SIPP-Keswan";
			}
			?></td>
		<td> : <?php echo $data_sipp->masa_brelaku_sipp;?></td>
	</tr>
	<tr>
		<td>Untuk Pelayanan</td>
		<td> : <?php if ($r->id_jenis_pengajuan == 7){
				echo "Inseminasi Buatan, Pemeriksaan Kebuntingan dan Teknik Reproduksi";
			}elseif ($r->id_jenis->pengajuan == 8) {
				echo " Inseminasi Buatan dan Pemeriksaan Kebuntingan";
			}elseif ($r->id_jenis->pengajuan == 9) {
				echo "Inseminasi Buatan";
			}elseif ($r->id_jenis->pengajuan == 10) {
				echo "Paramedik Kesehatan Hewan";
			}
			?></td>
	</tr>
	<tr>
		<td>Wilayah Kerja </td>
		<td> : <?php echo $data_sipp->wilayah_kerja;?></td>
	</tr>
	<tr>
		<td>Waktu Pelayanan </td>
		<td> : <?php echo $data_sipp->waktu_pelayanan;?> </td>
	</tr>
</table>
<br><br><br>
<table width="100%" border="0">
	<tr>
		<td width="40%"></td>
		<td width="20%"><table border="0" align="center">
			<tr>
				<td width="80px" height="120px">
					<?php $query = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 30";
						$gambar = $this->db->query($query)->row();
			?>
					<img src="<?php echo "./images/".$gambar->isi_biodata_member ?>" width="80px" height="120px">
				</td>
			</tr>
		</table></td>
		<td width="40%">
			<table>
				<tr class="font10">
					<td>Ditetapkan di</td>
					<td> : <?php if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query1 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query1)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}?></td>
				</tr>
				<tr class="font10">
					<td>Pada Tanggal</td>
					<td> : <?php echo longdate_indo('Y-m-d');?></td>
				</tr>
				<tr>
					<td colspan="2"><p class="font10">Kepala Dinas<br></p>
						</td>
				</tr>
				<tr>
					<td colspan="2"><br><p align="center">  <br>
						NIP : <?php echo $data_sipp->nip;?>
					</p></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table class="font10">
	<tr>
		<td>
			<?php if ($r->id_jenis_pengajuan == 7){
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	ATR: Asisten Teknik Reproduksi<br>
				2)	Harus sama dengan masa berlaku kontrak penyelia';
			}elseif ($r->id_jenis->pengajuan == 8) {
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	PKb: Pemeriksa Kebuntingan<br>
				2)  Harus sama dengan masa berlaku kontrak penyelia';
			}elseif ($r->id_jenis->pengajuan == 9) {
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	Harus sama dengan masa berlaku kontrak penyelia';
			}elseif ($r->id_jenis->pengajuan == 10) {
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	ATR: Asisten Teknik Reproduksi<br>
				2)	Harus sama dengan masa berlaku kontrak penyelia';
			}
			?>
		</td>
	</tr>

		<?php endforeach;} ?>

</table>


</body></html>