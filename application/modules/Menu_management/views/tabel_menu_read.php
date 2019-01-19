<!doctype html>
<html>
    <head>
        <title>Tabel_menu</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tabel_menu Read</h2>
        <table class="table">
	    <tr><td><strong>Nama_menu</strong></td><td><?php echo ": ".$nama_menu; ?></td></tr>
	    <tr><td><strong>Icon</strong></td><td><?php echo ": ".$icon; ?></td></tr>
	    <tr><td><strong>Link</strong></td><td><?php echo ": ".$link; ?></td></tr>
	    <tr><td><strong>Parent</strong></td><td><?php echo ": ".$parent; ?></td></tr>
	    <tr><td><strong>Aktif</strong></td><td><?php echo ": ".$aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('menu_management') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>