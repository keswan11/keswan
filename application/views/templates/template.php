<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo base_url('assets/logo.png'); ?>">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>D</b>KN</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Pelayanan Jasa Medik Veteriner</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" >
								<?php if ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') != NULL): ?>

									<img src="<?php echo base_url() ?>images/<?php echo $this->session->userdata('user_image');?>" class="user-image" alt="User Image">

								<?php elseif ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') == NULL): ?>
									<img src="<?php echo base_url() ?>assets/logo.png" class="user-image" alt="User Image">

								<?php else:?>
									<img src="<?php echo base_url() ?>assets/logo.png" class="user-image" alt="User Image">

								<?php endif ?>

								<?php if ($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('id_jenis_member') == 1): ?>
									<span class="hidden-xs"><?php echo $this->session->userdata('fullname'); ?></span>
								<?php else: ?>
									<span class="hidden-xs"><?php echo $this->session->userdata('penanggung_jawab');?></span>
								<?php endif ?>
								
								<?php if ($this->session->userdata('level') == "Operator"): ?>
									<span class="hidden-xs"><?php echo $this->session->userdata('nama_role_operator'); ?></span>
								<?php elseif($this->session->userdata('level') == "Admin"): ?>
									<span class="hidden-xs">Admin</span>
								<?php endif ?>

							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<?php if ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') != NULL): ?>

										<img src="<?php echo base_url() ?>images/<?php echo $this->session->userdata('user_image');?>" class="img-circle" alt="User Image">
										<a href="<?php echo base_url('member/ganti_foto') ?>" class="btn bg-yellow">Ganti foto</a>

									<?php elseif ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') == NULL): ?>
										<img src="<?php echo base_url() ?>assets/logo.png" class="img-circle" alt="User Image">
										<a href="<?php echo base_url('member/ganti_foto') ?>" class="btn bg-yellow">Ganti foto</a>

									<?php else: ?>
										<img src="<?php echo base_url() ?>assets/logo.png" class="img-circle" alt="User Image">
									<?php endif ?>

									<?php if ($this->session->userdata('level') == "Operator"): ?>
										<p><?php echo $this->session->userdata('nama_role_operator'); ?>
											<?php if ($this->session->userdata('nama_provinsi') != NULL): ?>
												<small>Wilayah : <?php echo $this->session->userdata('nama_provinsi') ?></small>
											<?php else: ?>
												<small>Wilayah : <?php echo $this->session->userdata('nama_kabupaten') ?></small>
											<?php endif ?>  
										</p>
									<?php elseif($this->session->userdata('level') == "Admin"): ?>
										<p>Admin</p>
									<?php endif ?>
									<p>
										<?php
										if ($this->session->userdata('id_jenis_member') == 1) 
										{
											echo $this->session->userdata('fullname');
										}
										else
										{
											echo $this->session->userdata('penanggung_jawab'); 
										}
										?>

									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<!-- Belum beres, buat tes aja -->
										<?php if ($this->session->userdata('id_member') != NULL): ?>
											<a href="<?php echo base_url('member/keluar') ?>" class="btn btn-default btn-flat">Keluar</a>
										<?php else: ?>
											<a href="<?php echo base_url('login/keluar') ?>" class="btn btn-default btn-flat">Keluar</a>
										<?php endif ?>
									</div>
									<div class="pull-left">
										<?php if ($this->session->userdata('id_member') != NULL): ?>
											<a href="<?php echo base_url('profil_member') ?>" class="btn btn-default btn-flat">Perbarui profil</a>	
										<?php else: ?>
											<a href="<?php echo site_url('profil_operator') ?>" class="btn btn-default btn-flat">Perbarui password</a>	
										<?php endif ?>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<?php if ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') != NULL): ?>
							<img src="<?php echo base_url() ?>images/<?php echo $this->session->userdata('user_image');?>" class="img-circle" alt="User Image">

						<?php elseif ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') == NULL): ?>
							<img src="<?php echo base_url() ?>assets/logo.png" class="img-circle" alt="User Image">

						<?php else: ?>
							<img src="<?php echo base_url() ?>assets/logo.png" class="img-circle" alt="User Image">

						<?php endif ?>
						
					</div>
					<div class="pull-left info">
						<p>
							<?php if ($this->session->userdata('level') == "Operator"): ?>
								<?php if ($this->session->userdata('nama_provinsi') != NULL): ?>
									Wilayah <br> <?php echo $this->session->userdata('nama_provinsi') ?>
								<?php else: ?>
									Wilayah <br> <?php echo $this->session->userdata('nama_kabupaten') ?>
								<?php endif ?>  

							<?php elseif($this->session->userdata('level') == "Admin"): ?>
								Admin
							<?php endif ?>

							<?php
							if ($this->session->userdata('id_jenis_member') == 1) 
							{
								echo $this->session->userdata('fullname');
							}
							else
							{
								echo $this->session->userdata('penanggung_jawab'); 
							}
							?>
						</p>
						
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<?php 
				$this->load->view('templates/list_menu');           
				?> 
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php echo $contents; ?>
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<strong>
			Copyright &copy; 2017</strong> 
			<a class="unit" href="http://keswan.ditjenpkh.pertanian.go.id" target="_blank">Direktorat Kesehatan Hewan</a> |
			<a href="http://ditjenpkh.pertanian.go.id/">Direktorat Jendral Peternakan dan Kesehatan Hewan </a>| 
			<a href="http://www.pertanian.go.id/">Kementrian Pertanian.</a>
		</footer>
  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
  	<div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.0 -->
  <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
  <script>
  	$(function () {
  		$(".select2").select2();
  		$("#tabel").DataTable();
  		$('#role_operator_tambah').modal('hide');
  		$('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
  		$('.staticParent').on('keydown', '.child', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
  		$('.datepicker').datepicker({
  			autoclose: true,
  			format: 'yyyy-mm-dd'
  		});
  	});
  </script>
</body>
</html>