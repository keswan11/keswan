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
	<p class="font10" align="center"><b>Kop Direktorat Jenderal PKH / Dinas Provinsi*)</b></p><br><br><hr>
</head><body>
<table width="100%" align="center" class="font10">
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN <br>
				PRAKTIK DOKTER HEWAN KONSULTASI (SIP-DRH(K))<br>
		Nomor:: SIP-DRH(K) 
			/ <?php if (!empty($status_kerja)) {
				foreach ($status_kerja as $r) :
				?><?php echo $r->isi_biodata_member;?>
			<?php
			endforeach;}?>   
			/ <?php if (!empty($wilayah)) {
				foreach ($wilayah as $r) :
				?><?php echo $r->id_wilayah;?>
			<?php
			endforeach;}?>  
			/ 
			<?php if (!empty($no_surat_sip_konsultasi)) {
				foreach ($no_surat_sip_konsultasi as $r) :
				?><?php echo $r->jumlah+1;?>
			<?php
			endforeach;}?> 
			 / PKH 
			 / <?php echo date('Ym') ;?></b></p>
		</td>
	</tr>
	<tr>
		<td><br><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor:.................. tentang ..........................., yang bertanda tangan di bawah ini Direktur Jenderal Peternakan dan Kesehatan Hewan/Kepala Dinas.................... Provinsi................**) memberikan IZIN PRAKTIK DOKTER HEWAN KONSULTASI kepada:
		</p></td>
	</tr>
	<tr>
		<td><p align="center" class="font14"><b>
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?><?php echo $r->isi_biodata_member;?>
			<?php endforeach; }?>
		</b></p>
		</td>
	</tr>
</table>

<table width="100%" class="font10">
	<tr>
		<td width="30%">Tempat dan Tanggal Lahir</td>
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
		<td>Alamat Tempat Tinggal</td>
			<?php if (!empty($alamat)) {
				foreach ($alamat as $r) :
			?>
			<td> : <?php echo $r->isi_biodata_member;?></td>
			<?php endforeach; }?>
	</tr>
	<tr>
		<td>Nama Tempat Praktik</td>
		<td> :  </td>
	</tr>
	<tr>
		<td>Alamat Tempat Praktik</td>
		<td> : </td>
	</tr>
	<tr>
		<td>Jenis Praktik</td>
		<td> : Praktik Mandiri/Praktik Bersama/Tempat Hewan <br> &nbsp; Kesayangan/Klinik/Rumah Sakit Hewan/Praktik Hewan Percobaan*)</td>
	</tr>
	<tr>
		<td>Nomor Rekomendasi PDHI</td>
		<td> :  </td>
	</tr>
	<tr>
		<td>Masa Berlaku SIP-DRH(K)</td>
		<td> : </td>
	</tr>
	<tr>
		<td>Untuk Praktik</td>
		<td> : Dokter Hewan Konsultasi</td>
	</tr>
	<tr>
		<td>Wilayah Kerja**) </td>
		<td> : </td>
	</tr>
	<tr>
		<td>Waktu Praktik </td>
		<td> : Pukul </td>
	</tr>
</table>
<br><br><br>
<table width="100%" border="0">
	<tr>
		<td width="40%"></td>
		<td width="20%"><table border="0" align="center">
			<tr>
				<td width="80px" height="120px">
					<img width="80px" height="120px" src="<?php echo base_url();?>images/
					<?php if(!empty($foto)){
						foreach($foto as $r) :
							?><?php echo $r->isi_biodata_member;?>
					<?php endforeach;}?>">
				</td>
			</tr>
		</table></td>
		<td width="40%">
			<table>
				<tr class="font10">
					<td>Ditetapkan di</td>
					<td> : </td>
				</tr>
				<tr class="font10">
					<td>Pada Tanggal</td>
					<td> : <?php echo longdate_indo('Y-m-d');?></td>
				</tr>
				<tr>
					<td colspan="2"><p class="font10">Direktur Jenderal Peternakan <br>dan Kesehatan Hewan/ Kepala <br>Dinas <small>*)</small></p>
						<p class="font6">Tanda Tangan dan Cap Instansi</p>
						</td>
				</tr>
				<tr>
					<td colspan="2"><br><p align="center">   <br>
						NIP :  
					</p></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table class="font10">
	<tr>
		<td>
			Tembusan: <br>
			1.	PDHI Cabang Setempat
			<br><br>
			<small> Keterangan <br>
			*)    Pilih salah satu <br>
			**)  Sebutkan provinsi atau kabupaten/kota
			</small>

		</td>
	</tr>
</table>


</body></html>