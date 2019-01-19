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
	<p class="font10" align="center"><b>Kop Dinas Kab/Kota</b></p><br><hr>
</head><body>
<table width="100%" align="center" class="font10">
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN<br>
				PARAMEDIK VETERINER PELAYANAN PEMERIKSA KEBUNTINGAN  (SIPP-PKb)<br>
			Nomor:  SIPP-PKB 
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
			<?php if (!empty($no_surat_sipp_pkb)) {
				foreach ($no_surat_sipp_pkb as $r) :
				?><?php echo $r->jumlah+1;?>
			<?php
			endforeach;}?> 
			 / PKH 
			 / <?php echo date('Ym') ;?></p>
		</td>
	</tr>
	<tr>
		<td><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor:................... tentang ......................................, maka yang bertanda tangan di bawah ini Kepala Dinas................. Kab/Kota................ Provinsi.............  <br>
			memberikan IZIN PELAYANAN PEMERIKSAAN KEBUNTINGAN kepada :	
		</p></td>
	</tr>
	<tr>
		<td><p align="center" class="font14"><b>
			<?php if (!empty($nama)) {
				foreach ($nama as $r) :
			?><?php echo $r->isi_biodata_member;?>
			<?php endforeach; }?>
		</b></p><br>
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
		<td>Nama Pos IB</td>
		<td> : </td>
	</tr>
	<tr>
		<td>Alamat Pos IB</td>
		<td> : </td>
	</tr>
	<tr>
		<td>Dokter Hewan Penyelia</td>
		<td> : Drh. </td>
	</tr>
	<tr>
		<td>Nomor SIP Dokter Hewan Penyelia</td>
		<td> : <</td>
	</tr>
	<tr>
		<td>Masa Berlaku Kontrak Penyeliaan</td>
		<td> : </td>
	</tr>
	<tr>
		<td>Masa Berlaku SIPP PKb1)</td>
		<td> : </td>
	</tr>
	<tr>
		<td>Untuk Pelayanan</td>
		<td> : Inseminasi Buatan dan Pemeriksaan Kebuntingan</td>
	</tr>
	<tr>
		<td>Wilayah Kerja </td>
		<td> : </td>
	</tr>
	<tr>
		<td>Waktu Pelayanan </td>
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
					<td colspan="2"><p class="font10">Kepala Dinas<br></p>
						<p class="font6">Tanda Tangan dan Cap Instansi</p>
						</td>
				</tr>
				<tr>
					<td colspan="2"><br><p align="center">  <br>
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
			1.	Otoritas Veteriner Kab/Kota<br>
			2.	Dokter Hewan Penyelia<br>
			<small> Keterangan<br>
			1)	PKb: Pemeriksa Kebuntingan<br>
			2)	Harus sama dengan masa berlaku kontrak penyelia</small>
		</td>
	</tr>
</table>


</body></html>