<section class="content-header">
  <h1>
    <?php echo $title; ?>
  </h1>
</section>
<section class="content">
  <div class="col-xs-12">
    <div class="box">
     <form class="form-horizontal" method="post" action="<?php echo base_url('operator/role_operator_edit') ?>">
      <input type="hidden" name="id_role_operator" value="<?php echo $role['id_role_operator'] ?>">
      <div class="box-body">
        <div class="form-group">
          <label for="nama_role_operator" class="col-sm-2 control-label">Nama role operator</label>
          <div class="col-sm-10">
            <input type="text" name="nama_role_operator" value="<?php echo $role['nama_role_operator'] ?>" class="form-control" id="nama_role_operator" placeholder="Nama role operator">
          </div>
        </div>
        <div class="form-group">
          <label for="username_role" class="col-sm-2 control-label">Role Username</label>
          <div class="col-sm-10">
            <input type="text" name="username_role" value="<?php echo $role['username_role'] ?>" class="form-control" id="username_role" placeholder="Role Username">
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="reset" class="btn btn-default">Ulang</button>
        <button type="submit" name="submit" class="btn btn-info pull-right">Simpan</button>
      </div>
    </form>
  </div>
</div>
</section>
