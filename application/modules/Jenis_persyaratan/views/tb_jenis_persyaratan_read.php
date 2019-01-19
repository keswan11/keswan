<!doctype html>
<html>
    <head>
        <title>Tb_jenis_persyaratan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_jenis_persyaratan Read</h2>
        <table class="table">
	    <tr><td><strong>Nama_jenis_persyaratan</strong></td><td><?php echo ": ".$nama_jenis_persyaratan; ?></td></tr>
	    <tr><td><strong>Kode_jenis_persyaratan</strong></td><td><?php echo ": ".$kode_jenis_persyaratan; ?></td></tr>
	    <tr><td><strong>Tipe_jenis_persyaratan</strong></td><td><?php echo ": ".$tipe_jenis_persyaratan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_persyaratan') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>