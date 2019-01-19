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
  <p class="font10" align="center"><b></b></p><br><br><br><br><hr>
</head><body>
  <?php if($cetak_sip_drh != NULL){
    foreach ($cetak_sip_drh as $r) :?>
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
    <td>
      <p align="center"  class="font11"><b>SURAT IZIN <br>
        PRAKTIK DOKTER HEWAN (SIP-DRH-SPESIALIS)<br>
        Nomor: SIP-DRH-SPESIALIS 
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
  
  <tr><?php 
      $q3 = "SELECT * FROM tb_data_sipp WHERE id_pengajuan = $r->id_pengajuan";
      $q3 = $this->db->query($q3)->row();?>
    <td>
    <br><p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor: <?php echo $q3->nomor_peraturan;?> tentang <?php echo $q3->tentang;?>, yang bertanda tangan di bawah ini Kepala Dinas <?php echo $q3->kepala_dinas;?> 
         <?php
                 if($hitung >= 3){
                    $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                  }else if($hitung == 1 )
                  {
                      $wilayah=' Pusat';
                  }
                    echo $wilayah ;
                ?>   
        memberikan IZIN PRAKTIK DOKTER HEWAN SPESIALIS kepada: 
    </p>
    </td>
  </tr>

  <tr>
    <td>
        <?php
        $q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
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
        $q5 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
        $q5 = $this->db->query($q5)->row();
        $q6 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
        $q6 = $this->db->query($q6)->row();?>

    <td> : <?php echo $q5->isi_biodata_member;?>,&nbsp;    
        <?php echo $q6->isi_biodata_member;?></td>
  </tr>
  <tr>
    <td>Alamat Tempat Tinggal</td>
      
      <td> : <?php
        $q7 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
        $q7 = $this->db->query($q7)->row();
      ?> <?php echo $q4->isi_biodata_member;?></td>
  </tr>
  <tr>
    <td>Nama Tempat Praktik</td>
    <td> : <?php echo $q3->nama_pos_ib;?></td>
  </tr>
  <tr>
    <td>Alamat Tempat Praktik</td>
    <td> : <?php echo $q3->alamat_pos_ib;?></td>
  </tr>
  <tr>
    <td>Jenis Praktik</td>
    <td> : <?php echo $q3->nama_dokter_hewan_penyelia;?></td>
  </tr>
  <tr>
    <td>Nomor Rekomendasi PDHI</td>
    <td> : <?php echo $q3->no_sip_dokter_hewan_penyelia;?></td>
  </tr>
  <tr>
    <td>Masa Berlaku SIP-DRH</td>
    <td> :  <?php echo $q3->masa_berlaku_kontrak_penyelia;?></td>
  </tr>
  <tr>
    <td>Untuk Praktik</td>
    <td> : <?php echo $q3->masa_brelaku_sipp;?></td>
  </tr>
  <tr>
    <td>Wilayah Kerja </td>
    <td> :    <?php echo $q3->wilayah_kerja;?></td>
  </tr>
  <tr>
    <td>Waktu Pelayanan </td>
    <td> : Pukul &nbsp;<?php echo $q3->waktu_pelayanan;?></td>
  </tr>
</table>
<br><br><br>
<table width="100%" border="0">
  <tr>
    <td width="40%"></td>
    <td width="20%"><table border="0" align="center">
      <tr>
          <?php
          $qq = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 30";
          $ww = $this->db->query($qq)->row();
          ?>
        <td width="80px" height="120px">
          <img width="80px" height="120px" src="<?php echo "./images/".$ww->isi_biodata_member ?>">
        </td>
      </tr>
    </table></td>
    <td width="40%">
      <table>
        <tr class="font10">
          <td>Ditetapkan di</td>
          <td> :  <?php echo $q2->nama_wilayah;?> </td>
        </tr>
        <tr class="font10">
          <td>Pada Tanggal</td>
          <td> : <?php echo longdate_indo('Y-m-d');?></td>
        </tr>
        <tr>
          <td colspan="2"><p class="font10">Kepala Dinas<br></p>
            
            <br></td>
        </tr>
        <tr>
          <td colspan="2"><p align="center"> <br>
            NIP :  <?php echo $q3->nip;?></p></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<table class="font10">
  <tr>
    <td>
      Tembusan: <br>
      1.  Otoritas Veteriner Kab/Kota <br>
      2.  PDHI Cabang Setempat
      <br><br>
      <small> Keterangan <br>
      *. Coret yang tidak perlu</small>

    </td>
  </tr>
</table>
<?php endforeach; }?>

</body></html>