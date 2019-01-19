<section class="content">
  <div class="box  box-info">

    
    <form method="post" action="<?php echo base_url();?>page_operator/input_sip_drh_kuda">
    <?php if($data_sip != NULL){
      foreach ($data_sip as $r) :?>
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
      <div class="box-body">
        <table id="table" class="table table-bordered">
          <tr>
            <td colspan="3">
              <p align="center"  class="font11"><b>SURAT IZIN <br>
              PRAKTIK DOKTER HEWAN KUDA (SIP-DRH KUDA)<br>
              Nomor: SIP-DRH KUDA 
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
                <p class="font10">Berdasarkan Peraturan Menteri Pertanian Nomor: <input type="text" name="nomor_peraturan" required>  tentang <input type="text" name="tentang" required>, yang bertanda tangan di bawah ini Direktur Jenderal Peternakan dan Kesehatan Hewan/Kepala Dinas <input type="text" name="kepala_dinas" required> <?php
                
                
                
                
                 if($hitung >= 3){
                    $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
              }else if($hitung == 1 )
              {
                  $wilayah=' Pusat';
              }
                
                
                echo $wilayah ;?>   memberikan IZIN PRAKTIK DOKTER HEWAN KUDA kepada:</p>
          </td>
          </tr>
          <tr>
            <td colspan="3">
            <?php
            $q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND (id_biodata_member = 10 OR id_biodata_member = 1)";
            $q4 = $this->db->query($q4)->row();?>
            <p align="center" class="font14"><b><?php echo $q4->isi_biodata_member;?></b></p>
            </td>
          </tr>
          <tr>
        <td width="35%">Tempat dan Tanggal Lahir</td>
        <td colspan="2">
          <?php
          $q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
          $q4 = $this->db->query($q4)->row();?><?php
          $q5 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
          $q5 = $this->db->query($q5)->row();?>
           : <?php echo $q4->isi_biodata_member;?> , <?php echo $q5->isi_biodata_member;?>
        </td>
      </tr>
      <tr>
        <td width="35%">Alamat Tempat Tinggal</td>
        <td>
          <?php
          $q6 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
          $q6 = $this->db->query($q6)->row();?>     
           <?php echo $q6->isi_biodata_member;?>
        </td>
      </tr>
      <tr>
        <td width="35%">Nama Tempat Praktik</td>
        <td> <input type="text" name="nama_pos_ib" required></td>
      </tr>
      <tr>
        <td width="35%">Alamat Tempat Praktik</td>
        <td> <input type="text" name="alamat_pos_ib" required></td>
      </tr>
      <tr>
        <td width="35%">Nomor Rekomendasi PDHI</td>
        <td> <input type="text" name="no_sip_dokter_hewan_penyelia" required></td>
      </tr>
      <tr>
        <td width="35%">Masa Berlaku SIP-DRH Kuda</td>
        <td> <input type="text" name="masa_berlaku_kontrak_penyelia" required></td>
      </tr>
      <tr>
        <td width="35%">Untuk Praktik</td>
        <td> Dokter Hewan Kuda</td>
      </tr>
      <tr>
        <td width="35%">Wilayah Kerja</td>
        <td> <input type="text" name="wilayah_kerja" required></td>
      </tr>
      <tr>
        <td width="35%">Waktu Praktik</td>
        <td>  Pukul  <input type="text" name="waktu_pelayanan" required></td>
      </tr>
      <tr>
        <td width="35%"></td>
         <?php
          $qq = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 30";
          $ww = $this->db->query($qq)->row();
          ?>
        <td> 
          <p align="right"><img width="80px" height="120px" src="<?php echo base_url();?>images/<?php echo $ww->isi_biodata_member;?>"></p>
        </td>
        <td><p align="left">Ditetapkan di : <?php echo $q2->nama_wilayah;?><br>
          Pada Tanggal <?php echo longdate_indo('Y-m-d');?><br><br>
          Direktur Jenderal Peternakandan Kesehatan Hewan / Kepala Dinas</p>
          <br><br><br><br>
          <p align="center">NIP : <input type="text" name="nip" required></p> 
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Tembusan : <br>
          1.  PDHI Cabang Setempat
          <br><br>
          <small> Keterangan : <br>
          *)    Pilih salah satu <br>
          **)  Sebutkan provinsi atau kabupaten/kota
          </small>
        </td>
      </tr>   
        </table>
      </div>
      <input type="hidden" name="id_member" value="<?php echo $r->id_member;?>">
      <input type="hidden" name="id_jenis_pengajuan" value="<?php echo $r->id_jenis_pengajuan;?>">
      <input type="hidden" name="id_pengajuan" value="<?php echo $r->id_pengajuan;?>">
    <?php  endforeach; }?>
    <button class="btn btn-block btn-info" type="submit" name="submit">Simpan</button>
    </form>

  </div>
</section>