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
                <td>Nama Member</td>
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

                  //validasi Kelengkapan
                  $this->db->select('*');
                  $this->db->from('tb_data_sipp');
                  $this->db->where('id_member',$data->id_member);
                  $this->db->where('id_jenis_pengajuan',$data->id_jenis_pengajuan);
                  $hasil = $this->db->get();
                  
                  //Nama Member
                  $querynama = "SELECT * FROM tb_data_member  WHERE id_member = $data->id_member AND id_biodata_member = 1";
                  $nama = $this->db->query($querynama)->row();
                  
                  $query = "SELECT tb_jenis_warga.nama_jenis_warga FROM tb_list_member INNER JOIN tb_jenis_warga ON tb_jenis_warga.id_jenis_warga = tb_list_member.id_jenis_warga WHERE tb_list_member.id_member = $data->id_member ";
                  $warga = $this->db->query($query)->row();
                   //Filter Warganegara
                  if($warganegara == 'WNI' || $warganegara == 'WNA'){
                    if($warga->nama_jenis_warga <> $warganegara){
                     continue;
                    }
                  }
                ?>
                <?php if($warga->nama_jenis_warga == 'WNI'){

                  ?>
                  <tr>
                    <td><?php echo $nama->isi_biodata_member; ?></td>
                    <td><?php echo $data->nama_jenis_pengajuan ?></td>
                    <td><?php echo $data->nama_wilayah ?></td>
                    <td><?php echo $warga->nama_jenis_warga ?></td>
                    <td><?php echo $data->status_pengajuan ?></td>
                    <td><?php echo $data->tgl_dibuat ?></td>
                    <?php if($hasil->num_rows() == 0){
                      echo '<td><a href="'.base_url().'Kepala_dinas_otovet_provinsi/form_sipp/'.$data->id_pengajuan.'">
                              <button type="submit" class="btn btn-info" name="submit">Detail</button></a></td>';
                    }else{
                     echo '<td><a href="'.base_url().'Kepala_dinas_otovet_provinsi/cetak_sipp/'.$data->id_pengajuan.'">
                              <button type="submit" class="btn btn-info" name="submit">Cetak</button></a></td>';
                    }?>
                  </tr>
              <?php } endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>