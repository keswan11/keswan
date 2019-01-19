<html><head><!-- format 21 -->
	<title><p align="center">PERMOHONAN<br>
SURAT IZIN USAHA VETERINER (SIVET)</p>
</title>
<style type="text/css">
	.font10{
		font-size: 10pt;
		font-family: : Times;
	}

</style>

</head><body>
	<table align="center" width="100%">
		<tr>
			<td><p align="center"><b>PERMOHONAN<br>
				SURAT IZIN USAHA VETERINER (SIVET)</b>
				</p><hr><br>
			</td>
		</tr>
	</table>
	<table align="center" width="100%" class="font10">
		<tr>
			<td>Kepada Yth.<br>
				Kepala PTSP Pusat/Kepala PTSP Kab/Kota<br>
				di
				<?php echo "Bogor";?><br><br>
			</td>
		</tr>
	</table>
	<table align="center" width="100%" class="font10">
		<tr>
			<td width="25%">1. Nama Penanggung Jawab</td>
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>2. Alamat</td>
			<?php if (!empty($alamat)) {
				foreach ($alamat as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
		</tr>
		<tr>
			<td>3. Nomer KTP</td>
			<?php if (!empty($no_ktp)) {
				foreach ($no_ktp as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }else{ echo ""; }?>
		</tr>
		<tr>
			<td>4. Nomer NPWP</td>
			<?php if (!empty($no_npwp)) {
				foreach ($no_npwp as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }else{ echo ""; }?>
		</tr>
		<tr>
			<td>5. Jenis Kegiatan Usaha</td>
			<td> : Ambulatori/Klinik Hewan/HK/RSH*)</td>
		</tr>
	</table>
	<table align="center" width="100%" class="font10">
		<tr>
			<td>
				<br><br>Dengan ini mengajukan permohonan untuk mendapatkan SIVET Ambulatori/Klinik Hewan/HK/RSH*) dengan nama
				<?php echo "Robentogo";?> yang beralamat di <?php echo "Haur Jaya";?> sebagai bahan pertimbangan bersama ini dilampirkan :
			</td>
		</tr>
		<tr>
			<td>
				a.	Foto copy Kartu Tanda Penduduk (KTP) pemilik usaha;|<br>
				b.	Foto copy akte pendirian badan usaha atau perubahannya bagi badan usaha;<br>
				c.	Surat keterangan pemenuhan persyaratan teknis <br>
				d.	Surat bukti kepemilikan atau penguasaan lahan dan bangunan.<br><br>
				Saya menyatakan bahwa permohonan ini dibuat dengan benar dan bertanggung jawab secara hukum atas: <br>
				a.	Keaslian seluruh dokumen yang disampaikan, <br>
				b.	Kesesuaian seluruh fotokopi data yang disampaikan dengan dokumen aslinya, dan <br>
				c.	Keaslian seluruh tandatangan yang tercantum dalam permohonan.<br><br>
				Demikian permohonan ini dibuat untuk dapat digunakan sebagaimana semestinya.<br><br><br><br>
			</td>
		</tr>
	</table>
	<table align="center" width="100%" class="font10">
		<tr>
			<td width="60%"></td>
			<td align="center"><?php echo "Bogor";?>&nbsp;&nbsp;&nbsp;<?php echo longdate_indo('Y-m-d');?><br><br>
				Tanda Tanggan penanggung Jawab<br><br><br>
				Nama Lengkap, Tanda Tangan <br>
				Jabatan dan Cap Perusahaan<br><br><br><br><br>
			</td>
		</tr>
		<tr>
			<td colspan="2">Tembusan :
			1. Otoritas Veteriner Kab/Kota<br><br>
			Keterangan:<br>
			*) Pilih salah satu
			</td>
		</tr>
	</table>


</body></html>