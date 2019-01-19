<section class="content">
    <div class="box box-info">
        
        <?php 
        if($sivet != NULL)
        {
            foreach ($sivet as $r) :?>

            <?php
            //COUNT NOMER SURAT
            $query = "SELECT COUNT(id_jenis_pengajuan) AS jlm FROM tb_list_pengajuan_surat_izin WHERE id_jenis_pengajuan = $r->id_jenis_pengajuan";
            $hasil = $this->db->query($query)->row();
            $d = $hasil->jlm+1;

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
            ?>  
        <form method="post" action="<?php echo base_url();?>page_operator/input_sivet">
            <div class="box-body">
                <table class="table table-bordered" id="table" width="100%">
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
                             / <?php echo $d;?>
                             / PTSP
                             / <?php echo date('Ym');?>
                            </b></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Berdasarkan Peraturan Menteri Pertanian Nomor: <input type="text" name="nomor_peraturan" width="40" required> tentang <input type="text" name="tentang" width="40" required> dan permohonan Izin Usaha Veteriner tertanggal 
                            <input type="text" name="ttl" width="40" required placeholder="17-Agustus-1945">maka yang bertanda tangan di bawah ini Kepala Pelayanan Terpadu Satu Pintu 
                             <?php
                             if($hitung >= 3){
                                $wilayah=$q2->nama_wilayah." Provinsi ". $nama_provinsi->nama;
                              }else if($hitung == 1 )
                              {
                                  $wilayah=' Pusat';
                              }
                                echo $wilayah ;
                            ?>   memberikan IZIN USAHA VETERINER kepada :
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">
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
                                echo "TEMPAT HEWAN KESAYANGAN";
                            }
                            elseif ($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26 ) 
                            {
                                echo "RUMAH SAKIT HEWAN";
                            }
                            ?> 
                        </td>
                        <td colspan="2">
                             <input type="text" name="nama_perusahaan" width="40" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>2. Alamat</td>
                        <td colspan="2">
                            <input type="text" name="alamat_dokter" width="40" required class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>3. Nomor surat keterangan <br>pemenuhan persyaratan teknis</td>
                        <td colspan="2">
                            <input type="text" name="no_npwp_dokter" width="40" required class="form-control">
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
                                echo "TEMPAT HEWAN KESAYANGAN";
                            }
                            elseif ($r->id_jenis_pengajuan == 22 || $r->id_jenis_pengajuan == 26 ) 
                            {
                                echo "RUMAH SAKIT HEWAN";
                            }
                            ?> ................
                             memenuhi persyaratan administrasi dan teknis.
                        </td>
                    </tr>
                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td>
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
                            <br><small>Tanda Tangan dan Cap Instansi</small><br><br>
                            ....Nama Lengkap........<br>
                            NIP : <input type="text" name="dokter_perusahaan" width="40" required class="form">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Tembusan:<br>
                            1.  Otoritas Veteriner Kab/Kota
                        </td>
                    </tr>
                </table>
            </div>
            <input type="hidden" name="id_member" value="<?php echo $r->id_member;?>">
            <input type="hidden" name="id_pengajuan" value="<?php echo $r->id_pengajuan;?>">
            <input type="hidden" name="id_jenis_pengajuan" value="<?php echo $r->id_jenis_pengajuan;?>">
            <button class="btn btn-info btn-block">Simpan</button>
        </form>
        <?php endforeach; }?>
    </div>
</section>