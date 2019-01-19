<html><head>
	<title>
		<?php echo $title;?>
	</title>
</head><body style="margin-left: 30px; margin-right: 30px; margin-top: 20px; margin-bottom: 20px" >
	
	<?php 
		if($cetak != NULL)
		{
			foreach($cetak as $r) :?>
	
	<?php 
	if($r->id_jenis_pengajuan == 1)
	{
		echo '<p align="center">
			<font size="10pt" face="Arial"><b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN(SIP DRH)<br>
			WARGA NEGARA INDONESIA</b>
			</font>	
			</p>';	
	}
	elseif($r->id_jenis_pengajuan == 2)
	{
		echo '<p align="center">
			<font size="10pt" face="Arial"><b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN(SIP DRH)<br>
			WARGA NEGARA ASING</b>
			</font>	
			</p>';
	}
	elseif($r->id_jenis_pengajuan == 5)
	{
		echo '<p align="center">
			<font size="10pt" face="Arial"><b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN KUDA(SIP DRH KUDA)<br>
			WARGA NEGARA INDONESIA</b>
			</font>	
			</p>';
	}
	elseif($r->id_jenis_pengajuan == 6)
	{
		echo '<p align="center">
			<font size="10pt" face="Arial"><b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN KUDA(SIP DRH KUDA)<br>
			WARGA NEGARA ASING</b>
			</font>	
			</p>';
	}
	elseif($r->id_jenis_pengajuan == 27)
	{
		echo '<p align="center">
			<font size="10pt" face="Arial"><b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN SPESIALIS<br>
			WARGA NEGARA INDONESIA</b>
			</font>	
			</p>';
	}
	elseif($r->id_jenis_pengajuan == 28)
	{
		echo '<p align="center">
			<font size="10pt" face="Arial"><b>
			PERMOHONAN<br>
			SURAT IZIN PRAKTIK DOKTER HEWAN SPESIALIS<br>
			WARGA NEGARA ASING</b>
			</font>	
			</p>';
	}
	?>


<!-- Tujuan Surat -->
<p align="left">
	<?php 
		$q1 = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah";
		$wilayah =  $this->db->query($q1)->row()
	 ?>
	<font size="2" face="Arial">
		Kepada Yth.<br>
		Direktur Jendral Peternakan dan Kesehatan Hewan/Kepala Dinas <?php echo $wilayah->nama_wilayah ;?> <br>
		di<br>
		<?php echo $wilayah->nama_wilayah ;?>
	</font>	
</p>

<!-- Isi Surat -->
<p align="left">
	<font size="2" face="Arial">
		Dengan Hormat,<br>
		Yang bertanda tangan di bawah ini<br><br>
		<table>
		    <?php
		    $q2 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
		    $nama1 = $this->db->query($q2)->row();
		    $q3 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 10";
		    $nama10 = $this->db->query($q3)->row();
		    $q4 = "SELECT * FROM tb_list_member WHERE id_member = $r->id_member";
		    $jenis_member = $this->db->query($q4)->row();
		    ?>
			<tr>
				<td>Nama Lengkap</td>
			<td> : 
			<?php
			if($jenis_member->id_jenis_member = 1)
			{
			   echo $nama1->isi_biodata_member;
			}
			elseif($jenis_member->id_jenis_member = 2)
			{
			    echo $nama10->isi_biodata_member;
			}
			?>
			</td>
		</tr>
			<?php
			$q5 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
			$alamat2 = $this->db->query($q5)->row();
			$q6 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 11";
			$alamat11 = $this->db->query($q6)->row();
			?>
			<tr>
				<td>Alamat</td>
			<td> : 
			<?php
			if($jenis_member->id_jenis_member = 1)
			{
			   echo $alamat2->isi_biodata_member;
			}
			elseif($jenis_member->id_jenis_member = 2)
			{
			    echo $alamat11->isi_biodata_member;
			}
			?>
			</td>
		</tr>
			<tr>
			   <?php 
			   $q7 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 3";
			   $no_hp = $this->db->query($q7)->row();
				?>
				<td>Tlp/Hp.</td>
			<td> : <?php echo $no_hp->isi_biodata_member ;?> </td>
		</tr>
			</tr>
			<tr>
			    <?php 
			   $q8 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
			   $tempat = $this->db->query($q8)->row();
			   
			   $q9 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
			   $ttl = $this->db->query($q9)->row();
				?>
				<td>Tempat/Tanggal Lahir</td>
			<td> : <?php echo $tempat->isi_biodata_member ;?> , <?php echo $ttl->isi_biodata_member ;?></td>
			</tr>
			<tr>
			<?php 
			   $q10 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 7";
			   $jk = $this->db->query($q10)->row();
			?>
				<td>Jenis Kelamin</td>
			<td> : <?php echo $jk->isi_biodata_member ;?> </td>
			</tr>
			<tr>
			    <?php 
			   $q11 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 8";
			   $pk = $this->db->query($q11)->row();
			?>
				<td>Pendidikan</td>
			<td> : <?php echo $jk->isi_biodata_member ;?></td>
			</tr>
			<tr>
			    <?php 
			   $q11 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 9";
			   $tl = $this->db->query($q11)->row();
			    ?>
			
				<td>Tahun Lulus</td>
			<td> : <?php echo $tl->isi_biodata_member ;?></td>
			</tr>
		</table>
	</font>	
</p>

<p align="left">
	<font size="2" face="Arial">
		Dengan ini mengajukan permohonan untuk mendapatkan 
		<?php if($r->id_jenis_pengajuan == 1 || $r->id_jenis_pengajuan == 2)
		{
			echo "SIP DRH";
		}
		elseif($r->id_jenis_pengajuan == 5 || $r->id_jenis_pengajuan == 6)
		{
			"SIP DRH KUDA";
		}
		elseif($r->id_jenis_pengajuan == 27 || $r->id_jenis_pengajuan == 28)
		{
			"SIP DRH SPESIALIS";
		}?> 
		untuk tempat praktik dengan alamat di
		<?php
			if($jenis_member->id_jenis_member = 1)
			{
			   echo $alamat2->isi_biodata_member;
			}
			elseif($jenis_member->id_jenis_member = 2)
			{
			    echo $alamat11->isi_biodata_member;
			}
			?>
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
	<tr align="center">
		<td width="35%"></td>
		<td width="20%"></td>
		<td>
			<?php echo $wilayah->nama_wilayah ;?>, <?php echo longdate_indo('Y-m-d');?><br><br><br>
			<br><br><br>
		(	<?php
			if($jenis_member->id_jenis_member = 1)
			{
			   echo $nama1->isi_biodata_member;
			}
			elseif($jenis_member->id_jenis_member = 2)
			{
			    echo $nama10->isi_biodata_member;
			}
			?> )
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
<?php endforeach; } ?>
</body></html>
