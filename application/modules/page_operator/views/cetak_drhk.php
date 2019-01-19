<html>
<head>
	<title>
		SIP DRH K
	</title>
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
	<p class="font10" align="center"><b></b></p><br><br><br><br><hr>
</head><body>
<?php if ($data_drhk != NULL) {
	foreach ($data_drhk as $r) :?>
	 <?php
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
            $hitung   = strlen($id_wilayah); 
            $get_id_prov = substr($id_wilayah,0,2);
              if($hitung >= 3){
                $query4 = "SELECT * FROM tb_provinsi WHERE id_provinsi = $get_id_prov";
              $nama_provinsi = $this->db->query($query4)->row();
              }else if($hitung == 1 )
              {
                $query4 = "SELECT * FROM tb_provinsi WHERE id_provinsi = '1'";
              $nama_provinsi = $this->db->query($query4)->row();
              }
            
            ?>
<table width="100%" align="center" class="font10">
	<tr>
		<td colspan="3"> 
			<p align="center" class="font11"><b>SURAT IZIN <br>
				PRAKTIK DOKTER HEWAN KONSULTASI (SIP-DRH(K))<br>
				Nomor: SIP-DRH(K) 
				/ <?php
				$q1 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 18";
				$q1 = $this->db->query($q1)->row();?>
				<?php echo $q1->isi_biodata_member;?>   
				/ <?php
				$q2 = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah" ;
				$q2 = $this->db->query($q2)->row();?>
				<?php echo $q2->nama_wilayah;?>  
				/ <?php
				$query = "SELECT COUNT(id_jenis_pengajuan) AS jlm FROM tb_list_pengajuan_surat_izin WHERE id_jenis_pengajuan = $r->id_jenis_pengajuan";
				$hasil = $this->db->query($query)->row();
				$d = $hasil->jlm+1;?>
				<?php echo $d;?>
			 	/ PKH 
			 	/ <?php echo date('Ym') ;?></b></p>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<?php 
	        $q3 = "SELECT * FROM tb_data_sipp WHERE id_pengajuan = $r->id_pengajuan";
	        $q3 = $this->db->query($q3)->row();?>
	        <br><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor: <?php echo $q3->nomor_peraturan;?> tentang <?php echo $q3->tentang;?>, yang bertanda tangan di bawah ini Direktur Jenderal Peternakan dan Kesehatan Hewan/Kepala Dinas <?php echo $q3->kepala_dinas;?>
	            <?php
                 if($hitung >= 3){
                    $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                  }else if($hitung == 1 )
                  {
                      $wilayah=' Pusat';
                  }
                    echo $wilayah ;
                ?>  
	            memberikan IZIN PRAKTIK DOKTER HEWAN KONSULTASI kepada:</p>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<p align="center" class="font14">
			 <?php
				$q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND (id_biodata_member = 10 OR id_biodata_member = 1)";
				$q4 = $this->db->query($q4)->row();?>
		    	<p align="center" class="font14"><b>
				<?php echo $q4->isi_biodata_member;?></b></p>
		</td>
	</tr>
	<tr>
		<td width="35%">Tempat dan Tanggal Lahir</td>
		<td colspan="2">
			<?php
				$q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
				$q4 = $this->db->query($q4)->row();
				$q5 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
				$q5 = $this->db->query($q5)->row();?>
				 : <?php echo $q4->isi_biodata_member;?>, <?php echo $q5->isi_biodata_member;?>
		</td>
	</tr>
	<tr>
		<td width="35%">Alamat Tempat Tinggal</td>
		<td colspan="2">
			 : 	<?php
				$q6 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
				$q6 = $this->db->query($q6)->row();?> 
				<?php echo $q6->isi_biodata_member;?>
		</td>
	</tr>
	<tr>
		<td width="35%">Nama Tempat Praktik</td>
		<td colspan="2"> : <?php echo $q3->nama_pos_ib;?></td>
	</tr>
	<tr>
		<td width="35%">Alamat Tempat Praktik</td>
		<td colspan="2"> : <?php echo $q3->alamat_pos_ib;?></td>
	</tr>
	<tr>
		<td width="35%">Jenis Praktik</td>
		<td colspan="2"> : <?php echo $q3->nama_dokter_hewan_penyelia;?></td>
	</tr>
	<tr>
		<td width="35%">Nomor Rekomendasi PDHI</td>
		<td colspan="2"> : <?php echo $q3->no_sip_dokter_hewan_penyelia;?></td>
	</tr>
	<tr>
		<td width="35%">Masa Berlaku SIP-DRH(K)</td>
		<td colspan="2"> : <?php echo $q3->masa_berlaku_kontrak_penyelia;?></td>
	</tr>
	<tr>
		<td width="35%">Untuk Praktik</td>
		<td colspan="2"> : Dokter Hewan Konsultasi</td>
	</tr>
	<tr>
		<td width="35%">Wilayah Kerja</td>
		<td colspan="2"> : <?php echo $q3->wilayah_kerja;?></td>
	</tr>
	<tr>
		<td width="35%">Waktu Praktik</td>
		<td colspan="2"> : Pukul <?php echo $q3->waktu_pelayanan;?></td>
	</tr>
	<tr>
		<td width="35%"></td>
		<td width="30%">
			<?php 
			$qm = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 30";
			$images = $this->db->query($qm)->row();?>
			<br><br><p align="right"><img src="<?php echo "./images/".$images->isi_biodata_member ?>" width="80px" height="120px"></p>
		</td>
		<td><br><br>
			Ditetapkan di : <?php echo $q2->nama_wilayah;?><br>
			Pada Tanggal : <?php echo longdate_indo('Y-m-d');?><br>
			Direktur Jenderal Peternakan dan Kesehatan Hewan/ Kepala Dinas <br><br><br><br>
			NIP : <?php echo $q3->nip;?>
		</td>
	</tr>
	<tr>
		<td colspan="3">
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

<?php endforeach; }?>
</body></html>