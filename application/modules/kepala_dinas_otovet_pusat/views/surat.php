<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
</section>
<section class="content">
  <?php if($this->session->flashdata('message')): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('message'); ?>!</h4>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
          <?php 
            //Cek apakah dia bagian administrasi atau lapangan
            $id_role = $this->session->userdata('id_role_operator');
            $query = $this->db->query("SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id_role")->row();
            $get_adm_lap = explode(' ', $query->nama_role_operator);
            $end_adm_lap = end($get_adm_lap);
            $status = array('Terkirim', 'Disposisi', 'Terverifikasi Administrasi', 'Terverifikasi Lapangan', 'Terbitkan');
           ?>
          <table id="tabel" class="table table-bordered">
            <thead>
              <tr>
                <td>ID Pengajuan</td>
                <td>ID Member</td>
                <td>Jenis Pengajuan</td>
                <td>Wilayah</td>
                <td>Jenis Warga</td>
                <td>Status Sekarang</td>
                <td>Aksi</td>
                <?php if( $end_adm_lap != 'Administrasi' && $end_adm_lap != 'Lapangan' ): ?>
                  <td>Status Pengajuan</td>
                <?php endif ?>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($data_surat_izin as $data):
                  $role = $this->uri->segment(2);
                  $jenis_warga = explode('_', $role);
                  $warganegara = strtoupper(end($jenis_warga));
                  
                  $query = "SELECT tb_jenis_warga.nama_jenis_warga FROM tb_list_member INNER JOIN tb_jenis_warga ON tb_jenis_warga.id_jenis_warga = tb_list_member.id_jenis_warga WHERE tb_list_member.id_member = $data->id_member ";
                  $warga = $this->db->query($query)->row();
                   //Filter Warganegara
                  if($warganegara == 'WNI' || $warganegara == 'WNA'){
                    if($warga->nama_jenis_warga <> $warganegara){
                     continue;
                    }
                  }
                ?>
                  <tr>
                    <td><?php echo $data->id_pengajuan; ?></td>
                    <td><?php echo $data->id_member; ?></td>
                    <td><?php echo $data->nama_jenis_pengajuan ?></td>
                    <td><?php echo $data->nama_wilayah ?></td>
                    <td><?php echo $warga->nama_jenis_warga ?></td>
                    <td><?php echo $data->status_pengajuan ?></td>
                    <td><?php echo anchor(site_url($this->uri->segment(1)."/".$detail."/".$data->id_jenis_pengajuan."/".$data->id_pengajuan), 'Detail', array('class' => 'btn btn-block btn-success')); ?></td>
                      <?php
                        
                        if( $end_adm_lap != 'Administrasi' && $end_adm_lap != 'Lapangan' ){
                          if($detail == 'detail_surat_izin'){
                            $status_surat_function = 'izin';
                          }else{
                            $status_surat_function = 'rekomendasi';
                          }
                          echo "<td>";
                          if( $data->id_status_pengajuan <> 5 ){
                             echo anchor(site_url($this->uri->segment(1)."/disposisi_surat/".$status_surat_function."/".$data->id_pengajuan), $status[($data->id_status_pengajuan) + 1], array('class' => 'btn btn-block btn-info'));
                          }else{
                            echo "Sudah Diterbitkan";
                          }
                          echo "</td>";
                        }
                      ?>
                  </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>