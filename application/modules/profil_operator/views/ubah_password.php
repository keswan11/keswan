<div class="content">


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
        <div class="col-md-6">
            <form action="<?php echo base_url('profil_operator/update_action') ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************"/>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id_operator" value="<?php echo $this->session->userdata('id_operator'); ?>" /> 
                    <button type="submit" class="btn btn-primary">Perbarui</button> 
                </div>
            </form>
        </div>
    </div>

</div>
</div>
</div>
</div>
</div>