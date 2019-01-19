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
          <h3 class="box-title">Data Kategori Jenis Peralatan &nbsp; 
            <?php 
             echo anchor('kategori_jenis_peralatan/create', 'Tambah Kategori Jenis Peralatan', array('class' => 'btn btn-info'));
          ?>
        </h3>
      </div>
            <div class="box-body">
            <table id="tabel" class="table table-bordered">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Nama kategori jenis peralatan</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody><?php
                    $no =0;
                    foreach ($kategori_jenis_peralatan_data as $kategori_jenis_peralatan)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$no ?></td>
                            <td><?php echo $kategori_jenis_peralatan->nama_kategori_jenis_peralatan ?></td>
                            <td style="text-align:center">
                                <?php 
                                echo anchor(site_url('kategori_jenis_peralatan/update/'.$kategori_jenis_peralatan->id_kategori_jenis_peralatan),'Perbarui',array('class' => 'btn btn-success')); 
                                echo ' &nbsp; '; 
                                echo anchor(site_url('kategori_jenis_peralatan/delete/'.$kategori_jenis_peralatan->id_kategori_jenis_peralatan),'Hapus',array('class' => 'btn btn-danger', 'onclick' => "return confirm('Anda Yakin ?')")); 
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
