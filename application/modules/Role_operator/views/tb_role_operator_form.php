<!doctype html>
<html>
<head>
    <title>Role Operator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
    body{
        padding: 15px;
    }
</style>
</head>
<body>
    <h2 style="margin-top:0px">Role Operator <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
       <div class="form-group">
        <label for="varchar">Nama role operator <?php echo form_error('nama_role_operator') ?></label>
        <input type="text" class="form-control" name="nama_role_operator" id="nama_role_operator" placeholder="nama role operator" value="<?php echo $nama_role_operator; ?>" />
    </div>
    <input type="hidden" name="id_role_operator" value="<?php echo $id_role_operator; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('role_operator') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>