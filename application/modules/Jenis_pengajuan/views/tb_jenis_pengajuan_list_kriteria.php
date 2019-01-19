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
          <h3 class="box-title">Data Jenis Pengajuan &nbsp; 
            <?php 
			foreach($jenis_pengajuan as $jp)
			{
				$judul = $jp->nama_jenis_pengajuan;
			}
             echo anchor('jenis_pengajuan/create', 'Tambah Kriteria '.$judul, array('class' => 'btn btn-info'));
          ?>
        </h3>
      </div>
            <div class="box-body">
            <table id="tabel" class="table table-bordered">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis Kriteria</th>
                    <th>Action</th>
                    </tr>
                <thead>
                <tbody><?php
                $no =0;
                    foreach ($jenis_kriteria_data as $jenis_kriteria)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$no ?></td>
                            <td><?php echo $jenis_kriteria->nama_jenis_persyaratan ?></td>
                            <td style="text-align:center">
                                <?php 
                               echo anchor(site_url('jenis_pengajuan/update/'.$jenis_kriteria->id_jenis_persyaratan),'Perbarui',array('class' => 'btn btn-success')); 
                                echo ' &nbsp; '; 
                                echo anchor(site_url('jenis_pengajuan/delete/'.$jenis_kriteria->id_jenis_persyaratan),'Hapus',array('class' => 'btn btn-danger'),'onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'); 
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>