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
          <h3 class="box-title">Data Jenis Peralatan &nbsp; 
            <?php 
             echo anchor('jenis_peralatan/create', 'Tambah Jenis peralatan', array('class' => 'btn btn-info'));
          ?>
        </h3>
      </div>
            <div class="box-body">
            <table id="tabel" class="table table-bordered">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori peralatan</th>
                    <th>Sub kategori peralatan</th>
                    <th>Nama peralatan</th>
                    <th>Action</th>
                    </tr>
            </thead>
                <tbody>
                     <?php
                    $no = 1;
                    foreach ($jenis_peralatan_data as $jenis_peralatan)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$no ?></td>
                            <td><?php echo $jenis_peralatan->nama_kategori_jenis_peralatan ?></td>
                            <td><?php echo $jenis_peralatan->nama_sub_kategori_jenis_peralatan ?></td>
                            <td><?php echo $jenis_peralatan->nama_peralatan ?></td>
                            <td >
                                <?php 
                                echo anchor(site_url('jenis_peralatan/update/'.$jenis_peralatan->id_jenis_peralatan),'Perbarui',array('class' => 'btn btn-success'));  
                                 echo "&nbsp; ";
                                echo anchor(site_url('jenis_peralatan/delete/'.$jenis_peralatan->id_jenis_peralatan),'Hapus',array('class' => 'btn btn-danger', 'onclick' => "return confirm('Anda Yakin ?')"));
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>