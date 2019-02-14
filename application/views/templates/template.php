<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
  <link rel="shortcut icon" href="<?php echo base_url('assets/logo.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $title ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 

 
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">

 
 
 <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url() ?>assets/back_end/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url() ?>assets/back_end/demo/demo.css" rel="stylesheet" />

 


 
</head>

<body class="">
<div class="wrapper">

	
	<div class="sidebar" data-color="purple" data-background-color="white" data-image="<?php echo base_url() ?>assets/back_end/assets/img/sidebar-1.jpg">
		  <!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

			Tip 2: you can also add an image using data-image tag
		-->
			<div class="logo">
				<a href="" class="simple-text logo-normal">
				  Pelayanan Jasa
				</a>
			</div>
     

		<div class="sidebar-wrapper">
			<ul class="nav">
						<li class="nav-item active">
							<a href="" class="nav-link">
							<i class="material-icons"></i>	
								<?php if ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') != NULL): ?>
									<img src="<?php echo base_url() ?>images/<?php echo $this->session->userdata('user_image');?>" class="img-circle" alt="User Image">

								<?php elseif ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') == NULL): ?>
									<img src="<?php echo base_url() ?>assets/logo.png" width="15%" class="img-circle" alt="User Image">

								<?php else: ?>
									<img src="<?php echo base_url() ?>assets/logo.png" width="15%" class="img-circle" alt="User Image">

								<?php endif ?>									
							
						
          
								<?php if ($this->session->userdata('level') == "Operator"): ?>
									<?php if ($this->session->userdata('nama_provinsi') != NULL): ?>
										Wilayah <?php echo $this->session->userdata('nama_provinsi') ?>
									<?php else: ?>
										Wilayah <?php echo $this->session->userdata('nama_kabupaten') ?>
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
								
							</a>
						</li>
						<div><br></div>
						<!-- sidebar menu: : style can be found in sidebar.less -->
						<?php 
						$this->load->view('templates/list_menu');           
						?> 
						
			</ul>
		</div>
    </div>
	
	
	
	<div class="main-panel">
		<div class="content">
		  <!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
			<div class="container-fluid">
			  <div class="navbar-wrapper">
									<?php if ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') != NULL): ?>

										<img src="<?php echo base_url() ?>images/<?php echo $this->session->userdata('user_image');?>" class="user-image" alt="User Image">

									<?php elseif ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') == NULL): ?>
										<img src="<?php echo base_url() ?>assets/logo.png" width="7%" class="user-image" alt="User Image">

									<?php else:?>
										<img src="<?php echo base_url() ?>assets/logo.png" width="7%" class="user-image" alt="User Image">
										
									<?php endif ?>
									
									<?php if ($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('id_jenis_member') == 1): ?>
										<span style="padding-left: 6px" class="hidden-xs"><?php echo $this->session->userdata('fullname'); ?></span>
									<?php else: ?>
										<span style="padding-left: 6px" class="hidden-xs"><?php echo $this->session->userdata('penanggung_jawab');?></span>
									<?php endif ?>
									
									<?php if ($this->session->userdata('level') == "Operator"): ?>
										<span class="hidden-xs"><?php echo $this->session->userdata('nama_role_operator'); ?></span>
									<?php elseif($this->session->userdata('level') == "Admin"): ?>
										<span class="hidden-xs">Admin</span>
									<?php endif ?>
									
			  </div>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
			  </button>
			  
			  <div class="collapse navbar-collapse justify-content-end">
				<ul class="navbar-nav">
				  <li class="nav-item dropdown">
					<a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  <i class="material-icons">person</i>       
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
						<a class="dropdown show-dropdown ">
						<div class="dropdown-item active">
						
						
										<?php if ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') != NULL): ?>
											
											<img src="<?php echo base_url() ?>images/<?php echo $this->session->userdata('user_image');?>" class="img-circle" alt="User Image">
											<a href="<?php echo base_url('member/ganti_foto') ?>" class="btn bg-yellow">Ganti foto</a>

										<?php elseif ($this->session->userdata('id_member') != NULL && $this->session->userdata('id_jenis_member') == 1 && $this->session->userdata('user_image') == NULL): ?>
											<img src="<?php echo base_url() ?>assets/logo.png" width="90px"class="img-circle" alt="User Image">
											<a href="<?php echo base_url('member/ganti_foto') ?>" class="btn bg-yellow">Ganti foto</a>

										<?php else: ?>
											<img src="<?php echo base_url() ?>assets/logo.png" width="90px" class="img-circle" alt="User Image">
										<?php endif ?>
								
									
										<?php if ($this->session->userdata('level') == "Operator"): ?>
											<p style="font-size: 14px"><?php echo $this->session->userdata('nama_role_operator'); ?>
												<?php if ($this->session->userdata('nama_provinsi') != NULL): ?>
													<small><br>Wilayah : <?php echo $this->session->userdata('nama_provinsi') ?></small>
												<?php else: ?>
													<small><br>Wilayah : <?php echo $this->session->userdata('nama_kabupaten') ?></small>
												<?php endif ?>  
											</p>
										<?php elseif($this->session->userdata('level') == "Admin"): ?>
											<p>Admin</p>
										<?php endif ?>
										<p style="font-size: 14px">
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
						</a>
						<div class="dropdown-divider"></div>
						<a>
							<?php if ($this->session->userdata('id_member') != NULL): ?>
								<a href="<?php echo base_url('profil_member') ?>" style="font-size: 13px" class="dropdown-item">Perbarui profil</a>	
							<?php else: ?>
								<a href="<?php echo site_url('profil_operator') ?>" style="font-size: 13px" class="dropdown-item">Perbarui password</a>	
							<?php endif ?>				  
						</a>

						<a>
							<?php if ($this->session->userdata('id_member') != NULL): ?>
								<a href="<?php echo base_url('member/keluar') ?>" style="font-size: 13px" class="dropdown-item" >Keluar</a>
							<?php else: ?>
								<a href="<?php echo base_url('login/keluar') ?>" style="font-size: 13px" class="dropdown-item" >Keluar</a>
							<?php endif ?>				  
						</a>
					  
					</div>
				  </li>
				</ul>
			  </div>  
			</div>
		</nav>
			<div>	
			<?php echo $contents; ?>
			</div>
		</div>
	
		<footer class="footer">
			<div class="container-fluid">
			  <nav class="float-right">
				<ul>
				  <li>
					<a href="http://keswan.ditjenpkh.pertanian.go.id" target="_blank">
					  Direktorat Kesehatan Hewan
					</a>
				  </li>
				  <li>
					<a href="http://ditjenpkh.pertanian.go.id/">
					  Direktorat Jendral Peternakan dan Kesehatan Hewan
					</a>
				  </li>
				  <li>
					<a href="http://www.pertanian.go.id/">
					  Kementrian Pertanian.
					</a>
				  </li>
				</ul>
			  </nav>
			  <div class="copyright float-left" style="margin-left: 20px">
				Copyright &copy; 2017
			  </div>
			</div>
		</footer>	
	</div>
	
</div>

</body>
		
  
  
  
  <!--   Core JS Files   -->
  <script src="<?php echo base_url() ?>assets/back_end/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/back_end/js/core/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/back_end/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url() ?>assets/back_end/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url() ?>assets/back_end/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url() ?>assets/back_end/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  
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
