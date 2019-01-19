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
        <h2 style="margin-top:0px">Biodata Read</h2>
        <table class="table">
	    <tr><td><strong>Fk_idkelas</strong></td><td><?php echo ": ".$fk_idkelas; ?></td></tr>
	    <tr><td><strong>Nama</strong></td><td><?php echo ": ".$nama; ?></td></tr>
	    <tr><td><strong>No_telp</strong></td><td><?php echo ": ".$no_telp; ?></td></tr>
	    <tr><td><strong>Alamat</strong></td><td><?php echo ": ".$alamat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('biodata') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>