<form action="<?php echo base_url() ?>member/lupa_password" method="post">
	<div class="box-body">
		<div class="form-group">
			<input type="text" name="email" class="form-control" placeholder="Email" required>
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
	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-lg-12">
				<button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-justify">
			<p align="center">Belum punya akun? silahkan daftar <a href="<?php echo site_url('daftar') ?>" title="Disini">disini</a></p>	
		</div>
	</div>
</form>