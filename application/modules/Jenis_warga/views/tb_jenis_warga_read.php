<!doctype html>
<html>
    <head>
        <title>Tb_jenis_warga</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_jenis_warga Read</h2>
        <table class="table">
	    <tr><td><strong>Nama_jenis_warga</strong></td><td><?php echo ": ".$nama_jenis_warga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_warga') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>