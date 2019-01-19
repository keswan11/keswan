<!doctype html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
	<center><h1>Ditjen Keswan</h1></center>
	<hr>
		<table width="100%">
			<td width="15%" style="border-right:2px #000 dashed">
				<ul>
				<!-- Untuk Menampilkan Menu -->
				<?php $this->load->view('templates/menu_view'); ?>

				</ul>
			</td>
			<td width="75%" style="padding:10px">
				<?php echo $contents;?>
			</td>
		</table>
	<hr>
<center><h5>CRUD Template and Generator Codeigniter<br>Edit This Template @./application/views/template/editthistemplate.php<br>Copyright <a href="http://mahasiswapoltek.org">&copy;</a> 2015</h5></center>
</body>
</html>