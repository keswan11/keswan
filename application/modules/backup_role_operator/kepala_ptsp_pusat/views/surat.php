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
          <table id="tabel" class="table table-bordered">
            <thead>
              <tr>
                <td>ID Member</td>
                <td>Jenis Pengajuan</td>
                <td>Wilayah</td>
                <td>Jenis Warga</td>
                <td>Status Pengajuan</td>
                <td>Tanggal Dibuat</td>
                <td>Aksi</td>
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
                    <td><?php echo $data->id_member; ?></td>
                    <td><?php echo $data->nama_jenis_pengajuan ?></td>
                    <td><?php echo $data->nama_wilayah ?></td>
                    <td><?php echo $warga->nama_jenis_warga ?></td>
                    <td><?php echo $data->status_pengajuan ?></td>
                    <td><?php echo $data->tgl_dibuat ?></td>
                    <td><?php echo anchor(site_url($this->uri->segment(1)."/".$this->uri->segment(2)."/".$detail), 'Detail', array('class' => 'btn btn-block btn-success')); ?></td>
                  </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>