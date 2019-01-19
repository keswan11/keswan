<section class="content-header">
  <h1>
    <?php echo $title ?>
  </h1>
</section>
<section class="content">
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
  <div class="row">
    <div class="col-xs-12">
      <form class="form-horizontal" action="<?php echo site_url('config_email/update_action') ?>" method="post" accept-charset="utf-8">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Email &nbsp; 
            </h3>
          </div>
          <div class="box-body">
            <input type="hidden" name="id" value="<?php echo $email['id'] ?>">
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $email['email'] ?>">
              </div>
            </div>  
            <div class="form-group">
              <label for="host" class="col-sm-2 control-label">Host</label>
              <div class="col-sm-10">
                <input type="text" name="host" id="host" class="form-control" value="<?php echo $email['host'] ?>">
              </div>
            </div> 
            <div class="form-group">
              <label for="port" class="col-sm-2 control-label">Port</label>
              <div class="col-sm-10">
                <input type="text" name="port" id="port" class="form-control" value="<?php echo $email['port'] ?>">
              </div>
            </div>  
            <div class="form-group">
              <label for="timeout" class="col-sm-2 control-label">Timeout</label>
              <div class="col-sm-10">
                <input type="text" name="timeout" id="timeout" class="form-control" value="<?php echo $email['timeout'] ?>">
              </div>
            </div> 
            <div class="form-group">
              <label for="pass" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="***********">
                <i style="color:red">Kosongkan bila tidak diganti</i>
              </div>
            </div>  
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>