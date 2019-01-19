<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url();?>assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo base_url();?>assets/landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>assets/landing/css/stylish-portfolio.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url('assets/logo.png'); ?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition login-page">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="<?php echo base_url();?>landing"><img src="<?php echo base_url();?>assets/landing/img/logo-login.png"></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars fa-fw fa-3x"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav text-uppercase ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>landing">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>member">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="content" style="margin-top: 100px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto text-justify">
					<div class="box box-primary">
						<div class="login-logo">
							<br>
							<img src="<?php echo base_url('assets/logo.png'); ?>" width="10%">
							<div class="box-header with-border">
								<h3 class="box-title"><?php echo $judul ?></h3>
							</div>
						</div>

						<?php echo $contents; ?>
						<div class="box-body">
							<?php if($this->session->flashdata('message')): ?>
							<div class="row">
								<div class="col-sm-12">
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('message'); ?>!</h4>
									</div>
								</div>
							</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</section>

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mx-auto text-justify">
					<hr>
					<p class="text-muted text-center">Copyright &copy; 2017<br>  
						<a class="unit" href="http://keswan.ditjenpkh.pertanian.go.id" target="_blank" style="color: #958E96">Direktorat Kesehatan Hewan</a> |
						<a href="http://ditjenpkh.pertanian.go.id/" style="color: #958E96">Direktorat Jendral Peternakan dan Kesehatan Hewan </a>| 
						<a href="http://www.pertanian.go.id/" style="color: #958E96">  Kementrian Pertanian.</a> </p>
					</p>
				</div>
			</div>
		</div>
	</footer>
</di>
<a id="to-top" href="#top" class="btn btn-dark btn-lg js-scroll-trigger">
	<i class="fa fa-chevron-up fa-fw fa-1x"></i>
</a>
</footer>


<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' 
		});
		$('.datepicker').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});
	});
	$(document).ready(function() {
        /// make loader hidden in start
        $('#loading').hide();
        $('#email').blur(function(){
        	var email_val = $("#email").val();
        	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        	if(filter.test(email_val)){
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>daftar/email_check", {
            	email: email_val
            }, function(response){
            	$('#loading').hide();
            	$('#message').html('').html(response.message).show().delay(100000).fadeOut();
            	$('#cek').html('').html(response.message).show().delay(100000).fadeOut();
            });
            return false;
        }
    });

    });  
</script>
</body>
</html>
