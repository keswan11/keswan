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
	<?php if($cetak_sipk != NULL){
		foreach ($cetak_sipk as $r) :?>
<table width="100%" align="center" class="font10">
	<tr>
		<td>
			<p align="center"  class="font11"><b>SURAT IZIN <br>
				PRAKTIK DOKTER HEWAN KONSULTASI (SIP-DRH(K))<br>
		Nomor: SIP-DRH(K) 
			/ <?php
				$q1 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 18";
				$q1 = $this->db->query($q1)->row();
				?>
				<?php echo $q1->isi_biodata_member;?>   
			/ <?php
				$q2 = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah" ;
				$q2 = $this->db->query($q2)->row();
				?>
				<?php echo $q2->nama_wilayah;?>  
			/ <?php
			$query = "SELECT COUNT(id_jenis_pengajuan) AS jlm FROM tb_list_pengajuan_surat_izin WHERE id_jenis_pengajuan = $r->id_jenis_pengajuan";
			$hasil = $this->db->query($query)->row();
			$d = $hasil->jlm+1;
			?>
			<?php echo $d;?>
			 / PKH 
			 / <?php echo date('Ym') ;?></b></p>
		</td>
	</tr>
	<tr>
		<?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_pengajuan = $r->id_pengajuan";
	        $q3 = $this->db->query($q3)->row();
		<td><br><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor: <?php echo $q3->nomor_peraturan;?> tentang <?php echo $q3->tentang;?>, yang bertanda tangan di bawah ini Direktur Jenderal Peternakan dan Kesehatan Hewan/Kepala Dinas <?php echo $q3->kepala_dinas;?> <?php echo $q2->nama_wilayah;?> memberikan IZIN PRAKTIK DOKTER HEWAN KONSULTASI kepada:
		</p></td>
	</tr>
	<tr>
		<td><p align="center" class="font14"><b>
			 <?php
				$q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND (id_biodata_member = 10 OR id_biodata_member = 1)";
				$q4 = $this->db->query($q4)->row();
			?>
		    <p align="center" class="font14"><b>
			<?php echo $q4->isi_biodata_member;?>
		</b></p>
		</td>
	</tr>
</table>

<table width="100%" class="font10">
	<tr>
		<td width="30%">Tempat dan Tanggal Lahir</td>
		<?php
				$q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
				$q4 = $this->db->query($q4)->row();
			?>
		<td> : <?php echo $q4->isi_biodata_member;?>,
		<?php
				$q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
				$q4 = $this->db->query($q4)->row();
			?> <?php echo $q4->isi_biodata_member;?></td>
	</tr>
	<tr>
		<td>Alamat Tempat Tinggal</td>
			
			<td> : <?php
				$q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
				$q4 = $this->db->query($q4)->row();
			?> <?php echo $q4->isi_biodata_member;?></td>
	</tr>
	<tr>
		<td>Nama Tempat Praktik</td>
		<td> : <?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_member = $r->id_member";
	        $q3 = $this->db->query($q3)->row();
	    ?>
	    <?php echo $q3->nama_pos_ib;?> </td>
	</tr>
	<tr>
		<td>Alamat Tempat Praktik</td>
		<td> : <?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_member = $r->id_member";
	        $q3 = $this->db->query($q3)->row();
	    ?>
	    <?php echo $q3->alamat_pos_ib;?></td>
	</tr>
	<tr>
		<td>Jenis Praktik</td>
		<td> : Praktik Mandiri/Praktik Bersama/Tempat Hewan <br> &nbsp; Kesayangan/Klinik/Rumah Sakit Hewan/Praktik Hewan Percobaan*)</td>
	</tr>
	<tr>
		<td>Nomor Rekomendasi PDHI</td>
		<td> :  <?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_member = $r->id_member";
	        $q3 = $this->db->query($q3)->row();
	    ?>
	    <?php echo $q3->no_sip_dokter_hewan_penyelia;?></td>
	</tr>
	<tr>
		<td>Masa Berlaku SIP-DRH(K)</td>
		<td> : <?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_member = $r->id_member";
	        $q3 = $this->db->query($q3)->row();
	    ?>
	    <?php echo $q3->masa_berlaku_kontrak_penyelia;?></td>
	</tr>
	<tr>
		<td>Untuk Praktik</td>
		<td> : Dokter Hewan Konsultasi</td>
	</tr>
	<tr>
		<td>Wilayah Kerja**) </td>
		<td> : <?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_member = $r->id_member";
	        $q3 = $this->db->query($q3)->row();
	    ?>
	    <?php echo $q3->wilayah_kerja;?></td>
	</tr>
	<tr>
		<td>Waktu Praktik </td>
		<td> : Pukul <?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_member = $r->id_member";
	        $q3 = $this->db->query($q3)->row();
	    ?>
	    <?php echo $q3->waktu_pelayanan;?></td>
	</tr>
</table>
<br><br><br>
<table width="100%" border="0">
	<tr>
		<td width="40%"></td>
		<td width="20%"><table border="0" align="center">
			<tr>
				<td width="80px" height="120px">
					<img width="80px" height="120px" src="./images/">
					imagess
				</td>
			</tr>
		</table></td>
		<td width="40%">
			<table>
				<tr class="font10">
					<td>Ditetapkan di</td>
					<td> : <?php
				$q2 = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah" ;
				$q2 = $this->db->query($q2)->row();
				?>
				<?php echo $q2->nama_wilayah;?> </td>
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