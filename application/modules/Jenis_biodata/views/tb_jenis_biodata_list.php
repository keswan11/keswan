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
          <h3 class="box-title">Data Jenis Biodata &nbsp; 
            <?php 
            echo anchor('jenis_biodata/create', 'Tambah Jenis Biodata', array('class' => 'btn btn-info'));
            ?>
          </h3>
        </div>
        <div class="box-body">
          <table id="tabel" class="table table-bordered">
           <thead>
            <tr>
              <th>No</th>
              <th>Nama Jenis Biodata</th>
              <th>Tipe Jenis Biodata</th>
              <th>Action</th>
            </tr>
            <thead>
             <tbody><?php
             $no = 0;
             foreach ($jenis_biodata_data as $jenis_biodata)
             {
              ?>
              <tr>
                <td><?php echo ++$no ?></td>
                <td><?php echo $jenis_biodata->nama_jenis_biodata ?></td>
                <td><?php echo $jenis_biodata->nama_jenis_input ?></td>
                <td style="text-align:center">
                  <?php 
                  echo anchor(site_url('jenis_biodata/update/'.$jenis_biodata->id_jenis_biodata),'Perbarui',array('class' => 'btn btn-success')); 
                  echo ' &nbsp; '; 
                  echo anchor(site_url('jenis_biodata/delete/'.$jenis_biodata->id_jenis_biodata),'Hapus',array('class' => 'btn btn-danger'),'onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'); 
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