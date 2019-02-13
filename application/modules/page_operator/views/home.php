<!-- Main Content -->
<div class="content">
<div class="container-fluid">  
<div class="row">
<div class="col-md-12">
	<div class="card">


		<div class="card-header card-header-tabs card-header-primary">
		<div class="nav-tabs-navigation">
		<div class="nav-tabs-wrapper">
			<h3 class="box-title"><?php echo $title ?></h3>
		</div>
		</div>
		</div>
		
		<div class="card-body">
		<div class="row">
		
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
		  
		  
				<div class="card-header">
				  <h3 class="box-title">
					Selamat datang <strong><?php echo $this->session->userdata('nama_role_operator'); ?></strong>
				  </h3>
				  <p>Anda bertanggung jawab untuk wilayah 
					  <strong>
						<?php if ($this->session->userdata('nama_provinsi') != NULL) {
						  echo $this->session->userdata('nama_provinsi');
						} else {
						  echo $this->session->userdata('nama_kabupaten');
						}
						?>
					  </strong>
					</p>
				</div>
				
					
		
		

		</div>
		</div>
		

	</div>
</div>
</div>
</div>
</div>