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
          <h3 class="box-title"><?php echo $judul ?> &nbsp; 
          </h3>
        </div>
        <?php echo form_open_multipart('member/ganti_foto_action'); ?>
        <!-- <form class="form-horizontal" action="<?php echo base_url('member/ganti_foto_action') ?>" enctype="multipart/form-data"> -->

          <div class="box-body">
          <?php if ($this->session->userdata('user_image') != NULL):?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Foto sekarang</label>
              <div class="col-sm-10">
                <img src="<?php echo base_url('images/'.$foto['isi_biodata_member']) ?>" width="50%">
              </div>
            </div>

            <div class="form-group">
              <label for="foto" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="userfile">
              </div>
            </div>
          <?php else:?>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Foto sekarang</label>
              <div class="col-sm-10">
                <p>Tidak Ada Foto</p>
              </div>
            </div>

            <div class="form-group">
              <label for="foto" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="userfile">
              </div>
            </div>
          <?php endif?>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Ganti</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>