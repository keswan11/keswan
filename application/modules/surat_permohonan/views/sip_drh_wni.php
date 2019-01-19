<html><head>
	<title>
		<?php echo $title;?>
	</title>
</head><body style="margin-left: 30px; margin-right: 30px; margin-top: 20px; margin-bottom: 20px" >
	
<!-- Kop Surat -->
<p align="center">
	<font size="10pt" face="Arial">
		<b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN(SIP_DRH)/<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN KUDA(SIP_DRH KUDA)/<br>
			WARGA NEGARA INDONESIA
		</b>
	</font>	
</p>

<!-- Tujuan Surat -->
<p align="left">
	<font size="2" face="Arial">
		Kepada Yth.<br>
		Direktur Jendral Peternakan dan Kesehatan Hewan/Kepala Dinas Prov/Kepala Dinas Kab/Kota......*)<br>
		di<br>
		....
	</font>	
</p>

<!-- Isi Surat -->
<p align="left">
	<font size="2" face="Arial">
		Dengan Hormat,<br>
		Yang bertanda tangan di bawah ini
		<table>
			<tr>
				<td>Nama Lengkap</td>
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
			</tr>
			<tr>
				<td>Alamat</td>
			<?php if (!empty($alamat)) {
				foreach ($alamat as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
			</tr>
			<tr>
				<td>Tlp/Hp.</td>
			<?php if (!empty($no_tlp)) {
				foreach ($no_tlp as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
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
		</table>
	</font>	
</p>

<p align="left">
	<font size="2" face="Arial">
		Dengan ini mengajukan permohonan untuk mendapatkan SIP-DRH/SIP-DRH Kuda*) untuk tempat praktik dengan alamat di....................
	</font>
</p>

<p align="left">
	<font size="2" face="Arial">
		Sebagai bahan pertimbangan bersama ini kami lampirkan:
		<table>
			<tr>
				<td valign="top">1.</td>
				<td>Fotokopi Kartu Tanda Penduduk (KTP)</td>
			</tr>
			<tr>
				<td valign="top">2.</td>
				<td>Fotokopi Nomor Pokok Wajib Pajak (NPWP)</td>
			</tr>
			<tr>
				<td valign="top">3.</td>
				<td>Surat Pernyataan Tempat Praktik</td>
			</tr>
			<tr>
				<td valign="top">4.</td>
				<td>Pas Foto Berwarna ukuran 4 x 6 sebanyak 2 (dua) lembar</td>
			</tr>
			<tr>
				<td valign="top">5.</td>
				<td>Fotokopi Ijazah Dokter Hewan</td>
			</tr>
			<tr>
				<td valign="top">6.</td>
				<td>Surat Rekomendasi dari Perhimpunan Dokter Hewan Indonesia (PDHI) cabang setempat</td>
			</tr>
			<tr>
				<td valign="top">7.</td>
				<td>Sertifikat kompetensi praktik dokter hewan atau dokter hewan kuda*) yang diterbitkan oleh Organisasi Profesi Kedokteran Hewan Indonesia</td>
			</tr>
			<tr>
				<td valign="top">8.</td>
				<td>Surat Pernyataan bersedia menjadi Dokter Hewan Penyelia</td>
			</tr>
			<tr>
				<td valign="top">9.</td>
				<td>Surat Pernyataan memiliki sarana dan prasarana praktik</td>
			</tr>
		</table>
	</font>
</p>

<!-- Penutup Surat -->
<p>
	<font size="2" face="Arial">
		Saya menyatakan bahwa permohonan ini dibuat dengan benar dan bertanggung jawab secara hukum atas : 
		<table>
			<tr>
				<td valign="top">a.</td>
				<td>Keaslian seluruh dokumen yang saya sampaikan</td>
			</tr>
			<tr>
				<td valign="top">b.</td>
				<td>Kesesuaian seluruh fotokopi data yang disampaikan dengan dokumen aslinya, dan</td>
			</tr>
			<tr>
				<td valign="top">c.</td>
				<td>Keaslian seluruh tandatangan yang tercantum dalam permohonan</td>
			</tr>
		</table>
	</font>
</p>
<p>
	<font size="2" face="Arial">
		Demikian permohonan ini dibuat untuk digunakan sebagai mana mestinya.
	</font>	
</p>

<font size="2" face="Arial">
	<table width="100%">
	<tr>
		<td width="35%"></td>
		<td width="35%"></td>
		<td>
			Bogor, <?php echo longdate_indo('Y-m-d');?><br><br><br>
			<small>Tanda Tangan</small><br><br><br>
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?>
			<?php echo $r->isi_biodata_member;?>
			<?php endforeach; }?>
		</td>
	</tr>	
	<tr>
		<td>
			Keterangan:
			*Pilih salah satu
		</td>
	</tr>
</table>
</font>


</body></html>
