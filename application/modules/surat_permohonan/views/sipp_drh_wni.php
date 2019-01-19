<!DOCTYPE html><html><head>
	<title><?php echo $title; ?></title>
<style type="text/css">

	.font9{
		font-size: 9,1pt;
		font-family: Arial;
		margin-top: 0;
		margin-bottom: 0;
	}
	.font10{
		font-size: 10pt;
		font-family: Arial;
		margin-top: 0;
		margin-bottom: 0;
	}
	.alpha{
		list-style-type: lower-alpha;
		margin-bottom: 0px;
		margin-top: 0px
	}
</style>
 
<table width="100%" border="0" align="center">
	<tr>
		<td><p class="font10" align="center"><b>PERMOHONAN<br>
			SURAT IZIN PARAMEDIK PELAYANAN KESEHATAN HEWAN (SIPP-Keswan)/<br>
			SURAT IZIN PARAMEDIK PELAYANAN INSEMINASI BUATAN (SIPP Inseminator)/<br>
			SURAT IZIN PARAMEDIK PELAYANAN PEMERIKSA KEBUNTINGAN (SIPP-PKb)/
			SURAT IZIN PARAMEDIK PELAYANAN ASISTEN TEKNIK REPRODUKSI (SIPP-ATR) *)</b></p>
			<hr>
		</td>
	</tr>	
</table>
</head><body>
<table border="0" class="font9">
		<tr>
			<td class="font9">Kepada Yth.<br>
			Kepala Dinas<br>
			Kab/Kota <?php echo "Bogor";?><br>
			di Kota/Kab<br><br>
			Dengan hormat,<br>
			Yang bertanda tangan di bawah ini</td>
			
		</tr>
		<tr>
			<td width="20%">Nama Lengkap</td>
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>Alamat</td>
			<?php if (!empty($alamat)) {
				foreach ($alamat as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>Tlp/Hp.</td>
			<?php if (!empty($no_tlp)) {
				foreach ($no_tlp as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<?php if (!empty($tempat)) {
				foreach ($tempat as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?><?php endforeach; }?> ,
			<?php if (!empty($tgl_lahir)) {
				foreach ($tgl_lahir as $r) :
			?> <?php echo $r->isi_biodata_member;?>
			<?php endforeach; }?>  </td>
			
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<?php if (!empty($jenis_kelamin)) {
				foreach ($jenis_kelamin as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>Pendidikan</td>
			<?php if (!empty($pendidikan)) {
				foreach ($pendidikan as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>Tahun Lulus</td>
			<?php if (!empty($tahun_lulus)) {
				foreach ($tahun_lulus as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>	
		<tr>
			<td colspan="2">Dengan ini mengajukan permohonan untuk mendapatkan SIPP-Keswan/ SIPP-Inseminator/ SIPP-PKb/
				SIPP-ATR*) untuk tempat pelayanan dengan alamat di .............
			</td>
		</tr>
</table>
<table border="0" class="font9">
		<tr >
			<td valign="top">Sebagai bahan pertimbangan bersama ini kami lampirkan :<br>
							1. Kartu Tanda Penduduk (KTP)<br>
							2. Nomor Pokok Wajib Pajak (NPWP)<br>
							3. Pas Foto Berwarna ukuran 4 x 6 sebanyak 2 (dua) lembar<br>
							4. Surat Kontrak Penyeliaan<br>
							5. Ijazah pendidikan*):<br>
							<ol class="alpha">
								<li>Ijazah pendidikan minimal SMK di bidang Kesehatan Hewan untuk SIPP-Keswan;</li>
								<li>Ijazah pendidikan minimal SMU IPA atau SMK di bidang peternakan dan/atau kesehatan hewan
									untuk SIPP Inseminator dan SIPP-PKb;atau</li>
								<li>Ijazah pendidikan minimal SMK di bidang peternakan dan/atau kesehatan hewan untuk SIPP-ATR</li>
							</ol>
							6. Sertifikat Kompetensi yang diterbitkan oleh Lembaga Sertifikasi Profesi*):<br>
							<ol class="alpha"><li>Sertifikat kompetensi di bidang Kesehatan Hewan untuk SIPP-Keswan,</li>
									<li>Sertifikat Kompetensi di bidang Inseminasi Buatan untuk SIPP Inseminator,</li>
									<li>Sertifikat Kompetensi di bidang Pemeriksaan Kebuntingan untuk SIPP-PKb, atau </li>
									<li>Sertifikat Kompetensi di bidang asistensi teknik reproduksi untuk SIPP-ATR</li>
							</ol>
							7. Sertifikat Pelatihan yang diterbitkan oleh Lembaga Pelatihan terakreditasi **)<br>
									<ol class="alpha">
										<li>Sertifikat Pelatihan di bidang Kesehatan Hewan </li>
										<li>Sertifikat Pelatihan di bidang inseminasi buatan, </li>
										<li>Sertifikat Pelatihan di bidang pemeriksa kebuntingan, atau</li>
										<li>Sertifikat Pelatihan di bidang teknik reproduksi</li>
									</ol>
							8. Surat Rekomendasi dari Organisasi Paramedik Veteriner Indonesia di bawah binaan Perhimpunan
								Dokter Hewan Indonesia (PDHI)<br>
							9. Surat Pernyataan Tempat Yandik Keswan atau Pos IB*)<br>
							10. Surat Pernyataan memiliki sarana dan prasarana pelayanan<br>
							Saya menyatakan bahwa permohonan ini dibuat dengan dan bertanggung jawab secara hukum atas :<br>
							<ol class="alpha">
								<li>Keaslian seluruh dokumen yang disampaikan, </li>
								<li>Kesesuaian seluruh fotokopi data yang disampaikan dengan dokumen aslinya, dan </li>
								<li>Keaslian seluruh tandatangan yang tercantum dalam permohonan.</li>
							</ol>
							Demikian permohonan ini dibuat untuk dapat digunakan sebagaimana mestinya
			</td>
		</tr>
</table>
<table border="0" width="100%">
		<tr>
			<td width="70%" colspan="2" class="font9"><br><br><br>Tembusan :<br>
							1. Otoritas Veteriner Kab/Kota<br>
							<small><br>Keterangan<br>
							*) Pilih salah satu <br>
			 				**) Pilih salah satu dan wajib dilampirkan bagi yang belum memiliki sertifikat kompetensi</small></td>
			<td><p align="center" class="font9"><?php echo "Bogor";?>,
				<?php echo longdate_indo('Y-m-d');?><br><br><br><br><br>
				
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?><?php echo $r->isi_biodata_member;?>
			<?php endforeach; }?>
			</p></td>
		</tr>
</table>
	
</body></html>