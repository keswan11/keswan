<section class="content">
<div class="box box-info">

<div class="box-header">
	<h3 align="center">FORM SIP DRH KONSULTASI</h3>
</div>
    	<form action="<?php echo base_url()?>surat_izin/input_sip_drh_konsultasi" method="post">
	<?php if($cetak != NULL)
	{
		foreach ($cetak as $r) :?>
			
<div class="box-body">
<table width="100%" align="center" class="table table-bordered" id="table">
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT KETERANGAN</b> <br>
				PRAKTIK DOKTER HEWAN KONSULTASI<br><br></p>
		</td>
	</tr>
	<div class="form-group">
		<tr>
		<td><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor:<input class="form" type="text" name="nomor_peraturan" required> tentang <input class="form" type="text" name="tentang" required>, yang bertanda tangan di bawah ini:
		</p></td>
		</tr>
	</div>

</table>
<br><br>

<table width="100%" class="table table-bordered" id="table">	
<div class="form-group">
	<tr>
		<td width="30%">Nama Pimpinan Perusahaan </td>
		<td>  <input class="form-control" type="text" name="nama_pemimpin_perusahaan" required > </td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Jabatan </td>
		<td>  <input class="form-control" type="text" name="jabatan" required></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Nama Perusahaan </td>
		<td>  <input class="form-control" type="text" name="nama_perusahaan" required></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Alamat Perusahaan </td>
		<td>  <input class="form-control" type="text" name="alamat_perusahaan" required></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td><br> Dengan ini menyatakan bahwa</td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Nama Dokter Hewan</td>
		<td>  <input class="form-control" type="text" name="nama_dokter" placeholder="drh. example" required></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Tempat dan Tanggal Lahir</td>
		<td>  <input class="form-control" type="text" name="ttl" placeholder="Jakarta , 17-Agustus-1945 " required></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Jenis Kelamin</td>
		<td>  <select name="jenis_kelamin" class="form-control">
			<option value="Laki-Laki">Laki-Laki</option>
			<option value="Wanita">Wanita</option>
		</select></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Alamat	Tempat Tinggal </td>
		<td>  <input class="form-control" type="text" name="alamat_dokter" required></td>
	</tr>
</div>
<div class="form-group">
	<tr>
		<td>Nomor NPWP </td>
		<td>  <input class="form-control" type="text" name="no_npwp_dokter" required></td>
	</tr>
</div>

</table>

<div class="form-group">
<p class="font10">benar sebagai dokter hewan praktik konsultasi kesehatan hewan di Perusahaan<input class="form-control" type="text" name="dokter_perusahaan" required> <br>

Demikian pernyataan ini dibuat dengan sesungguhnya untuk dapat digunakan sebagaimana mestinya.</p>
</div>
<br><br><br>
<table width="100%" border="0">
	<tr>
		<td width="40%"></td>
		<td width="20%"></td>
		<td width="40%">
			<table>
				<tr>
					<td colspan="2"><p class="font10">Kota, <?php echo longdate_indo('Y-m-d');?><br>
				Yang membuat Pernyataan
				<br></p>
						<center><p class="font6">Tanda Tangan</p></center>
						<br><br><br>
						Nama Penanggung Jawab
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

<table class="font10" width="100%">
	<tr>
		<td width="90%">
			Tembusan :<br>
			1.	Otoritas Veteriner Kab/Kota <br>
			2.	PDHI Cabang Setempat
			<br><br>
			<small> Keterangan <br>
			*. Coret yang tidak perlu</small>
		</td>
		<td>
		    <input  type="hidden" name="id_pengajuan" value="<?php echo $r->id_pengajuan ;?>">
			<input  type="hidden" name="id_jenis_pengajuan" value="<?php echo $r->id_jenis_pengajuan;?>">
			<input  type="hidden" name="id_member" value="<?php echo $r->id_member;?>">
			<button class="btn btn-info" name="submit">Simpan</button>
		</td>
	</tr>
</table>
</div>
</div>
<?php endforeach;} ?>
</form>
</section>
