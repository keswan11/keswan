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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            Selamat datang <strong><?php echo $this->session->userdata('nama_role_operator'); ?></strong>
          </h3>
        </div>
        <div class="box-body">
          <div class="form-group">
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
</section>