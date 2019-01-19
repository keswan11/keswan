<!doctype html>
<html>
    <head>
        <title>Biodata</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Biodata <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">Fk_idkelas <?php echo form_error('fk_idkelas') ?></label>
                <!--  -->
                <?php echo dropdown('fk_idkelas', 'kelas', 'kelas', 'idkelas','','',array('--KELAS--'=>''))?>
            </div>
	    <div class="form-group">
                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">No_telp <?php echo form_error('no_telp') ?></label>
                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="no_telp" value="<?php echo $no_telp; ?>" />
            </div>
	    <div class="form-group">
                <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="alamat"><?php echo $alamat; ?></textarea>
            </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('biodata') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>