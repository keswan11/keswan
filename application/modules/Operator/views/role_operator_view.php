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
          <h3 class="box-title">Role Operator &nbsp; <button title="Tambah Role Operator" class="btn btn-info" data-toggle="modal" data-target="#role_operator_tambah">Tambah Role Operator</button></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tabel" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Role Operator</th>
                <th>Role username</th>
                <th>Tanggal Pembaruan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($role as $rp) {
               echo "
               <tr>
               <td>$no</td>
               <td>$rp->nama_role_operator</td>
               <td>$rp->username_role</td>
               <td>".tgl_indo_timestamp($rp->tgl_dibuat)."</td>
               <td>".anchor('operator/role_operator_edit/'.$rp->id_role_operator, 'Edit', array('class' => 'btn btn-success'))." &nbsp; ".anchor('operator/role_operator_hapus/'.$rp->id_role_operator, 'Hapus', array('class' => 'btn btn-danger', 'onclick' => "return confirm('Hapus data ini?')"))."</td>
               </tr>
               ";
               $no++;
             } ?>
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
<!-- Modal -->
<div class="modal fade" id="role_operator_tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <?php 
    echo form_open('operator/role_operator_tambah',array('class' => 'form-horizontal'));
    ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Role Operator</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <label for="nama_role_operator" class="col-sm-3 control-label">Role Operator</label>
            <div class="col-sm-9">
              <input type="text" name="nama_role_operator" class="form-control" id="nama_role_operator" placeholder="Nama role operator">
            </div>
          </div>
          <div class="form-group">
            <label for="username_role" class="col-sm-3 control-label">Role Username</label>
            <div class="col-sm-9">
              <input type="text" name="username_role" class="form-control" id="username_role" placeholder="Role username">
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>