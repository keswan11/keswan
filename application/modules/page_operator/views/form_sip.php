<section class="content">
  <div class="box box-info">
    
    <form method="post" action="<?php echo base_url();?>page_operator/input">
      <?php if($data_sip != NULL)
      {
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
                <p align="center"><b>SURAT IZIN <br>
                PRAKTIK DOKTER HEWAN (SIP-DRH)<br>
                Nomor: SIP-DRH 
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
          <tr align="center">
            <td colspan="3">
              Berdasarkan Peraturan Menteri Pertanian Nomor: <input type="text" name="nomor_peraturan" width="40" class="form" required> tentang <input type="text" name="tentang" width="40" class="form" required>, yang bertanda tangan di bawah ini Kepala Dinas <input type="text" name="kepala_dinas" width="40" class="form" required> 
               <?php
                 if($hitung >= 3){
                    $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                  }else if($hitung == 1 )
                  {
                      $wilayah=' Pusat';
                  }
                    echo $wilayah ;
                ?>    
                    memberikan IZIN PRAKTIK DOKTER HEWAN kepada: 
              </td>
          </tr>
          <tr>
            <td colspan="3">
              <?php
              $q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 1";
              $q4 = $this->db->query($q4)->row();?>
              <p align="center"><b><?php echo $q4->isi_biodata_member;?></b></p>
            </td>
          </tr>
          <tr>
            <td width="30%">Tempat dan Tanggal Lahir</td>
            <td colspan="2">
              <?php
              $q5 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 5";
              $q5 = $this->db->query($q5)->row();?>
              <?php
              $q6 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 6";
              $q6 = $this->db->query($q6)->row();?>
              <?php echo $q5->isi_biodata_member;?> <?php echo $q6->isi_biodata_member;?>
            </td>
          </tr>
          <tr>
            <td>Alamat Tempat Tinggal</td>
            <td colspan="2">
              <?php
              $q4 = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 2";
              $q4 = $this->db->query($q4)->row();?> 
              <?php echo $q4->isi_biodata_member;?>
            </td>
          </tr>
          <tr>
            <td>Nama Tempat Praktik</td>
            <td colspan="2"><input type="text" name="nama_pos_ib" width="40" class="form" required></td>
          </tr>
          <tr>
            <td>Alamat Tempat Praktik</td>
            <td colspan="2"><input type="text" name="alamat_pos_ib" width="40" class="form" required></td>
          </tr>
          <tr>
            <td>Jenis Praktik</td>
            <td colspan="2"><select name="nama_dokter_hewan_penyelia">
              <option value="Praktik Mandiri">Praktik Mandiri</option>
              <option value="Praktik Bersama">Praktik Bersama</option>
              <option value="Tempat Hewan Kesayangan">Tempat Hewan Kesayangan</option>
              <option value="Klinik">Klinik</option>
              <option value="Rumah Sakit Hewan">Rumah Sakit Hewan</option>
              <option value="Praktik Hewan Percobaan">Praktik Hewan Percobaan</option>
            </select></td>
          </tr>
          <tr>
            <td>Nomor Rekomendasi PDHI</td>
            <td colspan="2"><input type="text" name="no_sip_dokter_hewan_penyelia" width="40" class="form" required></td>
          </tr>
          <tr>
            <td>Masa Berlaku SIP-DRH</td>
            <td colspan="2"><input type="text" name="masa_berlaku_kontrak_penyelia" width="40" class="form" required></td>
          </tr>
          <tr>
            <td>Untuk Praktik</td>
            <td colspan="2"><input type="text" name="masa_brelaku_sipp" width="40" class="form" required></td>
          </tr>
          <tr>
            <td>Wilayah Kerja</td>
            <td colspan="2"><input type="text" name="wilayah_kerja" width="40" class="form" required></td>
          </tr>
          <tr>
            <td>Waktu Pelayanan</td>
            <td colspan="2"><input type="text" name="waktu_pelayanan" width="40" class="form" required></td>
          </tr>
          <tr>    
              <?php
              $qq = "SELECT * FROM tb_data_member WHERE id_member = $r->id_member AND id_biodata_member = 30";
              $ww = $this->db->query($qq)->row();?>
            <td></td>
            <td align="right"><img width="80px" height="120px" src="../../images/<?php echo $ww->isi_biodata_member;?>"></td>
            <td align="left">
              Ditetapkan di
              <?php
              $q2 = "SELECT * FROM tb_wilayah WHERE id_wilayah = $r->id_wilayah" ;
              $q2 = $this->db->query($q2)->row();?>
              <?php echo $q2->nama_wilayah;?><br>
              Pada Tanggal<br>
              <?php echo longdate_indo('Y-m-d');?><br>
              Kepala Dinas<br>
              Tanda Tangan dan Cap Instansi
              NIP :  <input type="text" name="nip" width="40" class="form" required>
              <input type="hidden" name="id_member" value="<?php echo $r->id_member ;?>">
              <input type="hidden" name="id_jenis_pengajuan" value="<?php echo $r->id_jenis_pengajuan ;?>">
              <input type="hidden" name="id_pengajuan" value="<?php echo $r->id_pengajuan ;?>">

                 
            </td>
          </tr>
        </table>
      </div>
      <button class="btn btn-info btn-block" type="submit" name="submit">Simpan</button>

    <?php endforeach; }?>
    </form>

  </div>
</section>