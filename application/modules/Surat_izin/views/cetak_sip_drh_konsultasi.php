<html><head>
	<title>
		SIP DOKTER HEWAN
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
	
</head><body>
<?php if($cetak != NULL)
{
	foreach ($cetak as $r) :?>

<table width="100%" align="center" class="font10">
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT KETERANGAN <br>
				PRAKTIK DOKTER HEWAN KONSULTASI <br><br>
		</td>
	</tr>
	<tr>
		<td><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor:&nbsp;<?php echo $r->nomor_peraturan;?>  &nbsp;tentang &nbsp; <?php echo $r->tentang;?> &nbsp;, yang bertanda tangan di bawah ini:
		</p></td>
	</tr>

</table>
<br><br>
<table width="100%" class="font10">
	<tr>
		<td width="30%">Nama Pimpinan Perusahaan </td>
		<td> : <?php echo $r->nama_pemimpin_perusahaan;?></td>
	</tr>
	<tr>
		<td>Jabatan </td>
		<td> : <?php echo $r->jabatan;?> </td>
	</tr>
	<tr>
		<td>Nama Perusahaan </td>
		<td> : <?php echo $r->nama_perusahaan;?></td>
	</tr>
	<tr>
		<td>Alamat Perusahaan </td>
		<td> : <?php echo $r->alamat_perusahaan;?></td>
	</tr>
	<tr>
		<td><br> Dengan ini menyatakan bahwa</td>
	</tr>
	<tr>
		<td>Nama Dokter Hewan</td>
		<td> : <?php echo $r->nama_dokter;?></td>
	</tr>
	<tr>
		<td>Tempat dan Tanggal Lahir</td>
		<td> : <?php echo $r->ttl;?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td> : <?php echo $r->jenis_kelamin;?></td>
	</tr>
	<tr>
		<td>Alamat	Tempat Tinggal </td>
		<td> : <?php echo $r->alamat_dokter;?> </td>
	</tr>
	<tr>
		<td>Nomor NPWP </td>
		<td> : <?php echo $r->no_npwp_dokter;?></td>
	</tr>
</table>
<p class="font10">benar sebagai dokter hewan praktik konsultasi kesehatan hewan di Perusahaan&nbsp;<?php echo $r->dokter_perusahaan;?> <br>

Demikian pernyataan ini dibuat dengan sesungguhnya untuk dapat digunakan sebagaimana mestinya.</p>
<br><br><br>
<table width="100%" border="0">
	<tr>
		<td width="40%"></td>
		<td width="20%"></td>
		<td width="40%">
			<table>
				<tr align="center">
					<td colspan="2"><p class="font10">Kota, <?php echo longdate_indo('Y-m-d');?><br>
				<br><br><br><br>(<?php echo $r->nama_pemimpin_perusahaan;?>)
				<br></p>
						</td>
				</tr>
				<tr>
					<td colspan="2"><br><p align="center"> 
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
			1.	Otoritas Veteriner Kab/Kota <br>
			2.	PDHI Cabang Setempat
			<br><br>
			<small> Keterangan <br>
			*. Coret yang tidak perlu</small>

		</td>
	</tr>
</table>


<?php endforeach; }?>
</body></html>