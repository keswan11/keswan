<!doctype html>
<html>
    <head>
        <title>Tb_role_operator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_role_operator Read</h2>
        <table class="table">
	    <tr><td><strong>Nama_role_operator</strong></td><td><?php echo ": ".$nama_role_operator; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('role_operator') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>