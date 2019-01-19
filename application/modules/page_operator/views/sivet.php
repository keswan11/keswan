<html>
<head>
	<title>SIVET</title>

</head><body>
 <?php 
        if($sivet != NULL)
        {
            foreach ($sivet as $r) :?>

            <?php
            //COUNT NOMER SURAT
            $query = "SELECT COUNT(id_jenis_pengajuan) AS jlm FROM tb_list_pengajuan_surat_izin WHERE id_jenis_pengajuan = $r->id_jenis_pengajuan";
            $hasil = $this->db->query($query)->row();
            $e = $hasil->jlm+1;

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
            $q2 = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah" ;
            $q2 = $this->db->query($q2)->row();

            //Data SIP
            $qdata = "SELECT * FROM tb_data_sip WHERE id_pengajuan = $r->id_pengajuan;";
            $d = $this->db->query($qdata)->row();
            ?>  
				
		<table width="92%">
			<tr>
				<td colspan="3"><br><br><br><br><hr></td>
			</tr>
			<tr>
				 <td colspan="3"> 
                            <p align="center">
                            <b>SURAT IZIN USAHA VETERINER (SIVET)
                            <?php 
                            if($r->id_jenis_pengajuan == 19 || $r->id_jenis_pengajuan == 23 )
                            {
                                echo "AMBULATORI";
                            }
                            elseif ($r->id_jenis_pengajuan == 20 || $r->id_jenis_pengajuan == 24 ) 
                            {
                                echo "KLINIK";
                            }
                            elseif ($r->id_jenis_pengajuan == 21 || $r->id_jenis_pengajuan == 25 ) 
                            {
                                echo "TEMPAT HEWAN KESAYANGAN";
                            }
                            elseif ($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26 ) 
                            {
                                echo "RUMAH SAKIT HEWAN";
                            }
                            ?> 
                            </b></p>
                        </td>
			</tr>
			<tr>
				 <td colspan="3">
                            <p align="center"><b>Nomor: 
                                <?php 
                            if($r->id_jenis_pengajuan == 19 || $r->id_jenis_pengajuan == 23 )
                            {
                                echo "SIVET-AMBULATORI";
                            }
                            elseif ($r->id_jenis_pengajuan == 20 || $r->id_jenis_pengajuan == 24 ) 
                            {
                                echo "SIVET-KLINIK";
                            }
                            elseif ($r->id_jenis_pengajuan == 21 || $r->id_jenis_pengajuan == 25 ) 
                            {
                                echo "SIVET-HK";
                            }
                            elseif ($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26 ) 
                            {
                                echo "SIVET-RSH";
                            }
                            ?>
                             / <?php echo $r->id_wilayah;?>
                             / <?php echo $e;?>
                             / PTSP
                             / <?php echo date('Ym');?>
                            </b></p>
                        </td>
			</tr>
			<tr>
				<td colspan="3"><br><br>
                            Berdasarkan Peraturan Menteri Pertanian Nomor: <?php echo $d->nomor_peraturan;?> tentang <?php echo $d->tentang;?> dan permohonan Izin Usaha Veteriner tertanggal 
                            <?php echo $d->ttl;?> maka yang bertanda tangan di bawah ini Kepala Pelayanan Terpadu Satu Pintu 
                             <?php
                             if($hitung >= 3){
                                $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                              }else if($hitung == 1 )
                              {
                                  $wilayah=' Pusat';
                              }
                                echo $wilayah ;
                            ?>   memberikan IZIN USAHA VETERINER kepada :<br><br>
                        </td>
			</tr>
			 		<tr>
                        <td width="50%">
                            1. Nama <?php 
                            if($r->id_jenis_pengajuan == 19 || $r->id_jenis_pengajuan == 23 )
                            {
                                echo "AMBULATORI";
                            }
                            elseif ($r->id_jenis_pengajuan == 20 || $r->id_jenis_pengajuan == 24 ) 
                            {
                                echo "KLINIK";
                            }
                            elseif ($r->id_jenis_pengajuan == 21 || $r->id_jenis_pengajuan == 25 ) 
                            {
                                echo "Tempat Hewan Kesayangan";
                            }
                            elseif ($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26 ) 
                            {
                                echo "Rumah Sakit Hewan";
                            }
                            ?> 
                        </td>
                        <td colspan="2">
                              : <?php echo $d->nama_perusahaan;?>
                        </td>
                    </tr>
                    <tr>
                        <td>2. Alamat</td>
                        <td colspan="2">
                        	 : <?php echo $d->alamat_dokter;?>
                        </td>
                    </tr>
                    <tr>
                        <td>3. Nomor surat keterangan pemenuhan persyaratan teknis</td>
                        <td colspan="2">
                        	 : <?php echo $d->no_npwp_dokter;?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            SIVET ini berlaku sepanjang 
                            <?php 
                            if($r->id_jenis_pengajuan == 19 || $r->id_jenis_pengajuan == 23 )
                            {
                                echo "AMBULATORI";
                            }
                            elseif ($r->id_jenis_pengajuan == 20 || $r->id_jenis_pengajuan == 24 ) 
                            {
                                echo "KLINIK";
                            }
                            elseif ($r->id_jenis_pengajuan == 21 || $r->id_jenis_pengajuan == 25 ) 
                            {
                                echo "Tempat Hewan Kesayangan";
                            }
                            elseif ($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26 ) 
                            {
                                echo "Rumah Sakit Hewan";
                            }
                            ?>   <?php echo $d->nama_perusahaan;?>  
                             memenuhi persyaratan administrasi dan teknis.<br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td width=""></td>
                        <td colspan="2">
                            Ditetapkan di : 
                            <?php
                             if($hitung >= 3){
                                $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                              }else if($hitung == 1 )
                              {
                                  $wilayah=' Pusat';
                              }
                                echo $wilayah ;
                            ?><br>
                            Pada Tanggal : <?php echo $r->tgl_dibuat;?><br>
                            Kepala PTSP 
                            <?php
                             if($hitung >= 3){
                                $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                              }else if($hitung == 1 )
                              {
                                  $wilayah=' Pusat';
                              }
                                echo $wilayah ;
                            ?>
                            <br><br><br><br><br><br>
                            NIP : <?php echo $d->dokter_perusahaan;?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><br><br>
                            Tembusan:<br>
                            1.  Otoritas Veteriner Kab/Kota
                        </td>
                    </tr>
		</table>

        <?php endforeach; }?>
</body></html>