<!doctype html>
<html>
    <head>
        <title>Sub Kategori Jenis Peralatan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_sub_kategori_jenis_peralatan Read</h2>
        <table class="table">
	    <tr><td><strong>Nama_sub_kategori_jenis_peralatan</strong></td><td><?php echo ": ".$nama_sub_kategori_jenis_peralatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sub_kategori_jenis_peralatan') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>