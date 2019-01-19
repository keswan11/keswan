<!doctype html>
<html>
    <head>
        <title>Tb_jenis_peralatan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_jenis_peralatan Read</h2>
        <table class="table">
	    <tr><td><strong>Id_kategori_peralatan</strong></td><td><?php echo ": ".$id_kategori_peralatan; ?></td></tr>
	    <tr><td><strong>Id_sub_kategori_peralatan</strong></td><td><?php echo ": ".$id_sub_kategori_peralatan; ?></td></tr>
	    <tr><td><strong>Nama_peralatan</strong></td><td><?php echo ": ".$nama_peralatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_peralatan') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>