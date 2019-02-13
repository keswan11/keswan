<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $title; ?></title>

	<!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/back_end/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/back_end/login/css/style.css">	

</head>
<body>
<br>		

			<div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url() ?>assets/back_end/login/images/logo-login1.png" alt="sing up image"></figure>
                        
                    </div>
					
                    <div class="signin-form">
					<br>
                        <h2 class="form-title">Login</h2>
                        <form action="<?php echo base_url() ?>login/masuk" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
							
							<?php if($this->session->flashdata('pesan')): ?>
								<div class="row">
									<div class="col-sm-12">
										<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h4><i class="icon fa fa-close"></i> <?php echo $this->session->flashdata('pesan'); ?>!</h4>
										</div>
									</div>
								</div>
							<?php endif; ?>
							
                            <div class="form-group form-button">
                                <input name="submit" type="submit" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
	
		
		<!-- /.login-box-body -->
	
	<!-- /.login-box -->

    <!-- JS -->
    <script src="<?php echo base_url() ?>assets/back_end/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/back_end/login/js/main.js"></script>

	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' 
			});
		});
	</script>
</body>
</html>
