<section class="content">
	<form action="<?php echo base_url();?>page_operator/input" method="post">
	<div class="box box-info">

	<div class="box-body">
	<table class="table table-bordered table-hover" align="center" width="100%">
		
		<?php if ($data_sipp != NULL) {
			foreach ($data_sipp as $r) : ?>
			<?php 
			//Get Pekerjaan Member
			$query1 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 18";
			$pekerjaan = $this->db->query($query1)->row();

			//Count No Surat 
			$query2 = "SELECT COUNT(id_jenis_pengajuan) AS jlm FROM tb_list_pengajuan_surat_izin WHERE id_jenis_pengajuan = $r->id_jenis_pengajuan";
			$hasil = $this->db->query($query2)->row();
			$d = $hasil->jlm+1;

			//Get Nama Wilayah
			$query3 = "SELECT tb_list_pengajuan_surat_izin.id_wilayah, 
							 tb_wilayah.id_wilayah,
							 tb_wilayah.id_wilayah AS id_wilayah,
				   		 	 tb_wilayah.nama_wilayah AS nama_wilayah
							 FROM tb_list_pengajuan_surat_izin
							 JOIN tb_wilayah ON tb_list_pengajuan_surat_izin.id_wilayah = tb_wilayah.id_wilayah
							 WHERE tb_list_pengajuan_surat_izin.id_wilayah = $r->id_wilayah";
			$n_wilayah = $this->db->query($query3)->row();

			//Get Provinsi
			$id_wilayah =  $r->id_wilayah;
			$hitung 	= strlen($id_wilayah); 
			$get_id_prov = substr($id_wilayah,0,2);
				if($hitung >= 3){
					$query4 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				$nama_provinsi = $this->db->query($query4)->row();
				}else{
					echo "";
				}
			
			?>
				<?php if ($r->id_jenis_pengajuan == 7){
					echo'<tr>
		<td colspan="3">
		<p align="center">
		SURAT IZIN<br>
		PARAMEDIK VETERINER PELAYANAN ASISTEN TEKNIK REPRODUKSI (SIPP-ATR)<br>
		Nomor: SIPP-ATR / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah_operator.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr>';
		echo '
		<tr>
		<td colspan="3"><p align="center">
		Berdasarkan Peraturan Menteri Pertanian Nomor : <input type="text" name="nomor_peraturan" width="40" required> tentang <input type="text" name="tentang" width="40" required> , maka yang bertanda tangan di bawah ini Kepala Dinas  <input type="text" name="kepala_dinas" width="40" required>   '; 
					 if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query5 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query5)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}
		echo ' memberikan IZIN PELAYANAN TEKNIK REPRODUKSI kepada :<br><br></p>';
		$query6 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query6)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		elseif ($r->id_jenis_pengajuan == 8) {
			echo'<tr>
		<td colspan="3">
		<p align="center">
		SURAT IZIN<br>
		PARAMEDIK VETERINER PELAYANAN PEMERIKSA KEBUNTINGAN (SIPP-PKB)<br>
		Nomor: SIPP-PKB '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah_operator.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr>
		<tr>
		<td colspan="3"><p align="center">
		Berdasarkan Peraturan Menteri Pertanian Nomor:<input type="text" name="nomor_peraturan" width="40" required>tentang <input type="text" name="tentang" width="40" required>,maka yang bertanda tangan di bawah ini Kepala  <input type="text" name="kepala_dinas" width="40" required>   ';   if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }  
					if($hitung >= 3){
					$query7 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query7)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				};
		echo 'memberikan  IZIN PELAYANAN PEMERIKSAAN KEBUNTINGAN kepada :<br><br></p>';
		$quer8 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query8)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		elseif ($r->id_jenis_pengajuan == 9) {
			echo'<tr>
		<td colspan="3">
		<p align="center">
		SURAT IZIN<br>
		PARAMEDIK VETERINER PELAYANAN INSEMINATOR (SIPP INSEMINATOR)<br>
		Nomor: SIPP-INSEMINATOR / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah_operator.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr><tr>
		<td colspan="3"><p align="center">
		Berdasarkan Peraturan Menteri Pertanian Nomor:<input type="text" name="nomor_peraturan" width="40" required>tentang <input type="text" name="tentang" width="40" required>, yang bertanda tangan di bawah ini Kepala Dinas  <input type="text" name="kepala_dinas" width="40" required>   ';   
						if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }  
					if($hitung >= 3){
					$query9 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query9)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				};
		echo ' memberikan  IZIN PELAYANAN INSEMINASI BUATAN kepada :<br><br></p>';
		$query10 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query10)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		elseif ($r->id_jenis_pengajuan == 10) {
			echo'<tr>
		<td colspan="3">
		<p align="center">
		SURAT IZIN<br>
		PARAMEDIK VETERINER PELAYANAN KESEHATAN HEWAN (SIPP-KESWAN)<br>
		Nomor: SIPP-KESWAN / '.$pekerjaan->isi_biodata_member.' / '.$r->id_wilayah_operator.' / '.$d.' / PKH / '.date("Ym").'</p>
		</td>
		</tr><tr>
		<td colspan="3"><p align="center">
		Berdasarkan Peraturan Menteri Pertanian Nomor:<input type="text" name="nomor_peraturan" width="40" required>tentang <input type="text" name="tentang" width="40" required>, yang bertanda tangan di bawah ini Kepala Dinas  <input type="text" name="kepala_dinas" width="40" required>   ';   if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }  
					if($hitung >= 3){
					$query11 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query11)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				};
		echo ' memberikan  IZIN PELAYANAN PARAMEDIK VETERINER KESEHATAN HEWAN kepada:<br><br></p>';
		$query12 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
			$nama = $this->db->query($query12)->row();

		echo'<p align="center"><b>'.$nama->isi_biodata_member.'
		</b></p></td>
		</tr>';}
		?>

		<tr>
		<td width="30%" >
		Tempat dan Tanggal Lahir
		</td>
		<td colspan="2">
			<?php $query13 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
			$data = $this->db->query($query13)->row();
			echo $data->isi_biodata_member;
			?>,
			<?php $query14 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
			$data = $this->db->query($query14)->row();
			echo $data->isi_biodata_member;
			?>
			
		</td>
		</tr>

		<tr>
		<td width="30%">
			Alamat
		</td>
		<td colspan="2">
			<?php $query15 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
			$data = $this->db->query($query15)->row();
			echo $data->isi_biodata_member;
			?>
		</td>
		</tr>


		<tr>
		<td width="30%">
		Nama Pos IB
		</td>
		<td colspan="2">
		<input type="text" name="nama_pos_ib" width="40" required>
		</td>
		</tr>

		<tr>
		<td width="30%">
		Alamat Pos IB
		</td>
		<td colspan="2">
		<input type="text" name="alamat_pos_ib" width="40" required>
		</td>
		</tr>

		<tr>
		<td width="30%">
		Dokter Hewan Penyelia
		</td>
		<td colspan="2">
		<input type="text" name="nama_dokter_hewan_penyelia" width="40" required placeholder="dr.example">
		</td>
		</tr>

		<tr>
		<td width="30%">
		Nomor SIP Dokter Hewan Penyelia
		</td>
		<td colspan="2">
		<input type="text" name="no_sip_dokter_hewan_penyelia" width="40" required>
		</td>
		</tr>


		<tr>
		<td width="30%">
			Masa Berlaku Kontrak Penyeliaan
		</td>
		<td colspan="2">
		<input type="text" name="masa_berlaku_kontrak_penyelia" width="40" required>
		</td>
		</tr>

		<tr>
		<td width="30%">
		<?php if ($r->id_jenis_pengajuan == 7){
				echo "Masa Berlaku SIPP-ATR1) ";
			}elseif ($r->id_jenis_pengajuan == 8) {
				echo " Masa Berlaku SIPP PKb1) ";
			}elseif ($r->id_jenis_pengajuan == 9) {
				echo "Masa Berlaku SIPP Inseminator";
			}elseif ($r->id_jenis_pengajuan == 10) {
				echo "Masa Berlaku SIPP-Keswan";
			}
			?>
		</td>
		<td colspan="2">
		<input type="text" name="masa_brelaku_sipp" width="40" required>
		</td>
		</tr>

		<tr>
		<td width="30%">
		Untuk Pelayanan
		</td>
		<td colspan="2">
			<?php if ($r->id_jenis_pengajuan == 7){
				echo"Inseminasi Buatan, Pemeriksaan Kebuntingan dan Teknik Reproduksi";
			}elseif ($r->id_jenis_pengajuan == 8) {
				echo" Inseminasi Buatan dan Pemeriksaan Kebuntingan
";
			}elseif ($r->id_jenis_pengajuan == 9) {
				echo"Inseminasi Buatan";
			}elseif ($r->id_jenis_pengajuan == 10) {
				echo"Paramedik Kesehatan Hewan";
			}
			?>
		</td>
		</tr>

		<tr>
		<td width="30%">
		Wilayah Kerja
		</td>
		<td colspan="2">
		<input type="text" name="wilayah_kerja" width="40" required>
		</td>
		</tr>

		<tr>
		<td width="30%">
		Waktu Pelayanan
		</td>
		<td colspan="2">
		<input type="text" name="waktu_pelayanan" width="40" required>
		</td>
		</tr>

		<tr>
		<td width="30%">
		</td>
		<td width="80px" height="120px">
			<?php $query16 = "SELECT isi_biodata_member FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 17";
			$data = $this->db->query($query16)->row();
			?>
					<img width="80px" height="120px" src="<?php echo base_url('/images').'/'.$data->isi_biodata_member;?>">
		</td>
		<td>
		Ditetapkan di :<?php if($hitung == 2){
					 	echo ' Provinsi '.$n_wilayah->nama_wilayah;
					 }else{
					 	echo $n_wilayah->nama_wilayah;
					 }
					if($hitung >= 3){
					$query17 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
				 	$nama_provinsi = $this->db->query($query17)->row(); 
				 	echo  '&nbsp; Provinsi '.$nama_provinsi->nama; 
				}else{
					echo "";
				}?> <br>
		Pada Tanggal : <?php echo longdate_indo('Y-m-d');?><br>
		Kepala Dinas<br>
		<br>
		<small>Tanda Tangan Cap Instansi</small>
		<br>
		<br>
		NIP : <input type="text" width="40" name="nip" required placeholder="NIP">
		</td>
		</tr>

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
			}elseif ($r->id_jenis_pengajuan == 8) {
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	PKb: Pemeriksa Kebuntingan<br>
				2)  Harus sama dengan masa berlaku kontrak penyelia';
			}elseif ($r->id_jenis_pengajuan == 9) {
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	Harus sama dengan masa berlaku kontrak penyelia';
			}elseif ($r->id_jenis_pengajuan == 10) {
				echo'Tembusan :<br>
					1.	Otoritas Veteriner Kab/Kota<br>
					2.	Dokter Hewan Penyelia<br>
					<br>
				Keterangan<br>
				1)	ATR: Asisten Teknik Reproduksi<br>
				2)	Harus sama dengan masa berlaku kontrak penyelia';
			}
			?>
			<input type="hidden" name="id_jenis_pengajuan" value="<?php echo $r->id_jenis_pengajuan;?>">
			<input type="hidden" name="id_member" value="<?php echo $r->id_member;?>">
			<input type="hidden" name="id_pengajuan" value="<?php echo $r->id_pengajuan;?>">

		</td>
		<td></td>
		<td align="right" valign="bottom"><button class="btn btn-info" name="submit">Simpan</button>
		</td>
		</tr>

		<?php endforeach;} ?>

	</table>
	</div>
	</div>
	</form>
</section>