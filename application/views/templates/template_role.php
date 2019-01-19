
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
        <span class="logo-lg"><b>Ditjen</b>Keswan</span>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() ?>assets/logo.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata('nama_role_operator'); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url() ?>assets/logo.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $this->session->userdata('nama_role_operator'); ?>
                    <?php if ($this->session->userdata('nama_provinsi') != NULL): ?>
                      <small>Wilayah : <?php echo $this->session->userdata('nama_provinsi') ?></small>
                    <?php else: ?>
                      <small>Wilayah : <?php echo $this->session->userdata('nama_kabupaten') ?></small>
                    <?php endif ?>   
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?php echo base_url('login/keluar') ?>" class="btn btn-default btn-flat">Keluar</a>
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
            <img src="<?php echo base_url() ?>assets/logo.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <!-- <p><?php echo $this->session->userdata('nama_role_operator'); ?></p> -->
            <p>Wilayah <br> <?php if ($this->session->userdata('nama_provinsi') != NULL): ?>
              <?php echo $this->session->userdata('nama_provinsi') ?>
            <?php else: ?>
              <?php echo $this->session->userdata('nama_kabupaten') ?>
            <?php endif ?>
          </p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php $this->load->view('templates/list_menu_role'); ?>
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
    $("#tabel").DataTable({
      "order": [[0, "desc"]]
    });
    $('#role_operator_tambah').modal('hide');
    $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
  });
</script>
</body>
</html>
