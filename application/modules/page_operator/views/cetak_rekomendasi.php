<html><head>
  <title><?php echo $title; ?></title>
<style type="text/css">

  .font9{
    font-size: 9,1pt;
    font-family: Arial;
    margin-top: 0;
    margin-bottom: 0;
  }
  .font10{
    font-size: 10pt;
    font-family: Arial;
    margin-top: 0;
    margin-bottom: 0;
  }
  .alpha{
    list-style-type: lower-alpha;
    margin-bottom: 0px;
    margin-top: 0px
  }
</style>
 <?php if(!empty($cetak)){
  foreach ($cetak as $r) :?>
<table width="100%" border="0" align="center">
  <tr>
    <?php if ($r->id_jenis_pengajuan == 11 || $r->id_jenis_pengajuan == 15) {
      echo '<td><p class="font10" align="center"><b>PERMOHONAN<br>
      SURAT IZIN PARAMEDIK PELAYANAN KESEHATAN HEWAN (SIPP-ATR)</p></td>';
    }
    elseif ($r->id_jenis_pengajuan == 12 || $r->id_jenis_pengajuan == 16) {
      echo '<td><p class="font10" align="center"><b>PERMOHONAN<br>
      SURAT IZIN PARAMEDIK PELAYANAN PEMERIKSA KEBUNTINGAN (SIPP-PKb)</p></td>';
    }
    elseif ($r->id_jenis_pengajuan == 13 || $r->id_jenis_pengajuan == 17) {
      echo '<td><p class="font10" align="center"><b>PERMOHONAN<br>
      SURAT IZIN PARAMEDIK PELAYANAN INSEMINASI BUATAN (SIPP Inseminator)</p></td>';
    }
    elseif ($r->id_jenis_pengajuan == 14 || $r->id_jenis_pengajuan == 18) {
      echo '<td><p class="font10" align="center"><b>PERMOHONAN<br>
      SURAT IZIN PARAMEDIK PELAYANAN KESEHATAN HEWAN (SIPP-Keswan)</p></td>';
    }

    ?>
      <hr>
    </td>
  </tr> 
</table>
</head><body>
<table border="0" class="font9" widht = "100%">
    <tr>
      <td class="font9" width="10%">Kepada Yth.<br>
      Kepala Dinas<br>
      <?php
      $nwilayah = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah";
      $nama_wilayah = $this->db->query($nwilayah)->row();
      ?>
      <?php echo $nama_wilayah->nama_wilayah;?><br>
      di<br>
      <?php echo $nama_wilayah->nama_wilayah;?><br>
      Dengan hormat,<br>
      Yang bertanda tangan di bawah ini</td>
      
    </tr>
    <tr>
      <td width="10%">Nama Lengkap</td>
      <?php 
      $q1 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
      $query1 = $this->db->query($q1)->row();
      $qn = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 3";
      $qnl = $this->db->query($qn)->row();
      $lm = "SELECT * FROM tb_list_member WHERE id_member = $r->id_member";
        $list = $this->db->query($lm)->row();?>

      <td> : 
        <?php if(isset($query1) || isset($qnl))
        {
         if($list->id_jenis_member == 1)
         {
          echo $query1->isi_biodata_member;
         }
         elseif($list->id_jenis_member == 2)
         {
          echo $qnl->isi_biodata_member;
         }
          
      }
      else
      {
        $nohp=''; 
      }?>
        
      </td>
    </tr>
    <tr>
      <td>Alamat</td>  <?php 
      $q2 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 7";
      $query2 = $this->db->query($q2)->row();
      ?>
     <td> : <?php if(isset($query2))
      {
          $nohp=$query2->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?></td>
    </tr>
    <tr>
      <td>Tlp/Hp.</td>  <?php 
      $q3 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 10";
      $query3 = $this->db->query($q3)->row();
      ?>
      <td> : <?php if(isset($query3))
      {
          $nohp=$query3->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?></td>
    </tr>
    <tr>
      <td>Tempat/Tanggal Lahir</td>  <?php 
      $q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 4";
      $query4 = $this->db->query($q4)->row();
      ?><?php 
      $q5 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
      $query5 = $this->db->query($q5)->row();
      ?>
      <td> : <?php if(isset($query4))
      {
          $nohp=$query4->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?> &nbsp; 
       <?php if(isset($query5))
      {
          $nohp=$query5->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?></td>
      
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <?php 
      $q7 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
      $query7 = $this->db->query($q7)->row();
      ?>
     <td> : <?php if(isset($query7))
      {
          $nohp=$query7->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?></td>
    </tr>
    <tr>
      <td>Pendidikan</td>
      <?php 
      $q8 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 13";
      $query8 = $this->db->query($q8)->row();
      ?>
      <td> : <?php if(isset($query8))
      {
          $nohp=$query8->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?></td>
    </tr>
    <tr>
      <td>Tahun Lulus</td>
      <?php 
      $q9 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 14";
      $query9 = $this->db->query($q9)->row();
      ?>
      <td> : <?php if(isset($query9))
      {
          $nohp=$query9->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?></td>
    </tr> 
    <tr>
      <td colspan="2">Dengan ini mengajukan permohonan untuk mendapatkan
       <?php if ($r->id_jenis_pengajuan == 11 || $r->id_jenis_pengajuan == 15) {
      echo 'SIPP-ATR';
    }
    elseif ($r->id_jenis_pengajuan == 12 || $r->id_jenis_pengajuan == 16) {
      echo 'SIPP-PKb';
    }
    elseif ($r->id_jenis_pengajuan == 13 || $r->id_jenis_pengajuan == 17) {
      echo 'SIPP Inseminator';
    }
    elseif ($r->id_jenis_pengajuan == 14 || $r->id_jenis_pengajuan == 18) {
      echo 'SIPP-Keswan';
    }

    ?> untuk tempat pelayanan dengan alamat di &nbsp;<?php if(isset($query2))
      {
          $nohp=$query2->isi_biodata_member;
          
      }
      else
      {
        $nohp=''; 
      }
      echo $nohp;?>
      </td>
    </tr>
</table>
<table border="0" class="font9">
    <tr >
      <td valign="top">Sebagai bahan pertimbangan bersama ini kami lampirkan :<br>
              1. Kartu Tanda Penduduk (KTP)<br>
              2. Nomor Pokok Wajib Pajak (NPWP)<br>
              3. Pas Foto Berwarna ukuran 4 x 6 sebanyak 2 (dua) lembar<br>
              4. Surat Kontrak Penyeliaan<br>
              5. Ijazah pendidikan*):<br>
              <ol class="alpha">
                <li>Ijazah pendidikan minimal SMK di bidang Kesehatan Hewan untuk SIPP-Keswan;</li>
                <li>Ijazah pendidikan minimal SMU IPA atau SMK di bidang peternakan dan/atau kesehatan hewan
                  untuk SIPP Inseminator dan SIPP-PKb;atau</li>
                <li>Ijazah pendidikan minimal SMK di bidang peternakan dan/atau kesehatan hewan untuk SIPP-ATR</li>
              </ol>
              6. Sertifikat Kompetensi yang diterbitkan oleh Lembaga Sertifikasi Profesi*):<br>
              <ol class="alpha"><li>Sertifikat kompetensi di bidang Kesehatan Hewan untuk SIPP-Keswan,</li>
                  <li>Sertifikat Kompetensi di bidang Inseminasi Buatan untuk SIPP Inseminator,</li>
                  <li>Sertifikat Kompetensi di bidang Pemeriksaan Kebuntingan untuk SIPP-PKb, atau </li>
                  <li>Sertifikat Kompetensi di bidang asistensi teknik reproduksi untuk SIPP-ATR</li>
              </ol>
              7. Sertifikat Pelatihan yang diterbitkan oleh Lembaga Pelatihan terakreditasi **)<br>
                  <ol class="alpha">
                    <li>Sertifikat Pelatihan di bidang Kesehatan Hewan </li>
                    <li>Sertifikat Pelatihan di bidang inseminasi buatan, </li>
                    <li>Sertifikat Pelatihan di bidang pemeriksa kebuntingan, atau</li>
                    <li>Sertifikat Pelatihan di bidang teknik reproduksi</li>
                  </ol>
              8. Surat Rekomendasi dari Organisasi Paramedik Veteriner Indonesia di bawah binaan Perhimpunan
                Dokter Hewan Indonesia (PDHI)<br>
              9. Surat Pernyataan Tempat Yandik Keswan atau Pos IB*)<br>
              10. Surat Pernyataan memiliki sarana dan prasarana pelayanan<br>
              Saya menyatakan bahwa permohonan ini dibuat dengan dan bertanggung jawab secara hukum atas :<br>
              <ol class="alpha">
                <li>Keaslian seluruh dokumen yang disampaikan, </li>
                <li>Kesesuaian seluruh fotokopi data yang disampaikan dengan dokumen aslinya, dan </li>
                <li>Keaslian seluruh tandatangan yang tercantum dalam permohonan.</li>
              </ol>
              Demikian permohonan ini dibuat untuk dapat digunakan sebagaimana mestinya
      </td>
    </tr>
</table>
<table border="0" width="100%">
    <tr>
      <td width="70%" colspan="2" class="font9"><br><br><br>Tembusan :<br>
              1. Otoritas Veteriner Kab/Kota<br>
              <small><br>Keterangan<br>
              *) Pilih salah satu <br>
              **) Pilih salah satu dan wajib dilampirkan bagi yang belum memiliki sertifikat kompetensi</small></td>
      <td><p align="center" class="font9">
        <?php echo longdate_indo('Y-m-d');?><br><br><br><br><br>
        (&nbsp;
           <?php if(isset($query1) || isset($qnl))
        {
         if($list->id_jenis_member == 1)
         {
          echo $query1->isi_biodata_member;
         }
         elseif($list->id_jenis_member == 2)
         {
          echo $qnl->isi_biodata_member;
         }
          
      }
      else
      {
        $nohp=''; 
      }?>&nbsp;)
      </p></td>
    </tr>
</table>

 <?php endforeach;}?>
  
</body></html>

?>