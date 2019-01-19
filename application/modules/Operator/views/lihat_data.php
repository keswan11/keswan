<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
</section>

<section class="content">
  <?php if($this->session->flashdata('pesan')): ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('pesan'); ?>!</h4>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data operator &nbsp; 
            <?php 
            if ($this->uri->segment(2) == "operator_pusat") {
             echo anchor('operator/operator_pusat_tambah', 'Tambah Operator', array('class' => 'btn btn-info'));
           } else if ($this->uri->segment(2) == "operator_provinsi"){
            echo anchor('operator/operator_provinsi_tambah', 'Tambah Operator', array('class' => 'btn btn-info'));
          } else if ($this->uri->segment(2) == "operator_kab_kota"){
            echo anchor('operator/operator_kab_kota_tambah', 'Tambah Operator', array('class' => 'btn btn-info'));
          } 
          ?>
        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="tabel" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Username Operator</th>
              <th>Wilayah Operator</th>
              <th>Role Operator</th>
              <th>Status Operator</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach ($operator as $op) {
              echo "
              <tr>
              <td>$no</td>
              <td>$op->username_operator</td>
              <td>";
              if ($this->uri->segment(2) != "operator_kab_kota") {
                echo $op->nama_wilayah;
              } else {
                echo $op->kab_kota;
              }
              echo "</td>
              <td>$op->nama_role_operator</td>
              <td>$op->status</td>
              <td>"; 
              if ($this->uri->segment(2) == "operator_pusat") {
               echo anchor('operator/operator_pusat_edit/'.$op->id_operator, 'Edit', array('class' => 'btn btn-success'));
             } else if ($this->uri->segment(2) == "operator_provinsi"){
              echo anchor('operator/operator_provinsi_edit/'.$op->id_operator, 'Edit', array('class' => 'btn btn-success'));
            } else if ($this->uri->segment(2) == "operator_kab_kota"){
              echo anchor('operator/operator_kab_kota_edit/'.$op->id_operator, 'Edit', array('class' => 'btn btn-success'));
            } 
            echo "&nbsp; ".anchor('operator/operator_hapus/'.$op->id_operator, 'Hapus', array('class' => 'btn btn-danger', 'onclick' => "return confirm('Hapus data ini?')"))."
            </td>
            </tr>";
            $no++; 
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
