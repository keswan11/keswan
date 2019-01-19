<html><head><!-- format 21 -->
  <title><p align="center">PERMOHONAN<br>
SURAT IZIN USAHA VETERINER (SIVET)</p>
</title>
<style type="text/css">
  .font10{
    font-size: 10pt;
    font-family: : Times;
  }

</style>

</head><body>
  <?php if(!empty($sivet)){
    foreach ($sivet as $r) :?>
    
  
  <table align="center" width="100%">
    <tr>
      <td><p align="center"><b>PERMOHONAN<br>
        SURAT IZIN USAHA VETERINER (SIVET)</b>
        </p><hr><br>
      </td>
    </tr>
  </table>
  
  <table align="center" width="100%" class="font10">
    <tr>
      <td>Kepada Yth.<br>
        Kepala <?php echo $r->nama_wilayah;?><br>
        di <?php echo $r->nama_wilayah;?>
        <br><br>
      </td>
    </tr>
  </table>
  <table align="center" width="100%" class="font10">

    <tr>
    <?php
    //Get Nama Penanggung Jawab
    $query = "SELECT * FROM tb_data_member  WHERE id_member = $r->id_member AND id_biodata_member = 10";
    $data = $this->db->query($query)->row(); 
    ?>
      <td width="25%">1. Nama Penanggung Jawab</td>
      <td> : <?php echo $data->isi_biodata_member;?></td>
    </tr>
    <tr>
    <?php
    //Get Alamat
    $query = "SELECT * FROM tb_data_member  WHERE id_member = $r->id_member AND id_biodata_member = 11 ";
    $data_alamat = $this->db->query($query)->row(); 
    ?>
      <td>2. Alamat</td>
      <td> : <?php echo $data_alamat->isi_biodata_member;?></td>
    </tr>
    <tr>
    <?php
    //Get No KTP
    $query = "SELECT * FROM tb_data_member  WHERE id_member = $r->id_member AND id_biodata_member = 12";
    $data = $this->db->query($query)->row(); 
    ?>
      <td>3. Nomer KTP</td>
      <td> : <?php echo $data->isi_biodata_member;?></td>
    </tr>
    <tr>
    <?php
    //Get No NPWP
    $query = "SELECT * FROM tb_data_member  WHERE id_member = $r->id_member AND id_biodata_member = 13";
    $data = $this->db->query($query)->row(); 
    ?>
      <td>4. Nomer NPWP</td>
      <td> : <?php echo $data->isi_biodata_member;?></td>
    </tr>
    <tr>
      <td>5. Jenis Kegiatan Usaha</td>
      <td> : <?php 
          if($r->id_jenis_pengajuan == 19 || $r->id_jenis_pengajuan == 23){
            echo "Ambulatori";
          }elseif($r->id_jenis_pengajuan == 20 || $r->id_jenis_pengajuan == 24){
              echo "Klinik Hewan";
            }elseif($r->id_jenis_pengajuan == 21 || $r->id_jenis_pengajuan == 25){
              echo "HK";
            }elseif($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26){
              echo "RSH";
            }?>
      </td>
    </tr>
  </table>
  <table align="center" width="100%" class="font10">
    <tr>
      <td>
        <br><br>Dengan ini mengajukan permohonan untuk mendapatkan SIVET <?php 
          if($r->id_jenis_pengajuan == 19 || $r->id_jenis_pengajuan == 23){
            echo "Ambulatori";
          }elseif($r->id_jenis_pengajuan == 20 || $r->id_jenis_pengajuan == 24){
              echo "Klinik Hewan";
            }elseif($r->id_jenis_pengajuan == 21 || $r->id_jenis_pengajuan == 25){
              echo "HK";
            }elseif($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26){
              echo "RSH";
            }?>
            <?php
    //Get Nama
    $query = "SELECT * FROM tb_data_member  WHERE id_member = $r->id_member AND id_biodata_member = 10";
    $datanama = $this->db->query($query)->row(); 
    ?>
     dengan nama <?php echo $datanama->isi_biodata_member;?> yang beralamat di <?php echo $data_alamat->isi_biodata_member;?> sebagai bahan pertimbangan bersama ini dilampirkan :
      </td>
    </tr>
    <tr>
      <td>
        a.  Foto copy Kartu Tanda Penduduk (KTP) pemilik usaha;|<br>
        b.  Foto copy akte pendirian badan usaha atau perubahannya bagi badan usaha;<br>
        c.  Surat keterangan pemenuhan persyaratan teknis <br>
        d.  Surat bukti kepemilikan atau penguasaan lahan dan bangunan.<br><br>
        Saya menyatakan bahwa permohonan ini dibuat dengan benar dan bertanggung jawab secara hukum atas: <br>
        a.  Keaslian seluruh dokumen yang disampaikan, <br>
        b.  Kesesuaian seluruh fotokopi data yang disampaikan dengan dokumen aslinya, dan <br>
        c.  Keaslian seluruh tandatangan yang tercantum dalam permohonan.<br><br>
        Demikian permohonan ini dibuat untuk dapat digunakan sebagaimana semestinya.<br><br><br><br>
      </td>
    </tr>
  </table>
  <table align="center" width="100%" class="font10">
    <tr>
      <td width="60%"></td>
      <td align="center"><?php echo $r->nama_wilayah;?> , <?php echo longdate_indo('Y-m-d');?><br><br>
        <br><br><br>
        ( <?php echo $datanama->isi_biodata_member;?> )<br>
        <br><br><br><br><br>
      </td>
    </tr>
    <tr>
      <td colspan="2">Tembusan :
      1. Otoritas Veteriner Kab/Kota<br><br>
      Keterangan:<br>
      *) Pilih salah satu
      </td>
    </tr>
  </table>
<?php endforeach;}?>
</body></html>