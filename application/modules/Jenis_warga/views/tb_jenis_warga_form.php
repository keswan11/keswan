<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form action="<?php echo $action; ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="varchar">Nama jenis warga <?php echo form_error('nama_jenis_warga') ?></label>
                        <input type="text" class="form-control" name="nama_jenis_warga" id="nama_jenis_warga" placeholder="nama jenis warga" value="<?php echo $nama_jenis_warga; ?>" />
                    </div>
                    <input type="hidden" name="id_jenis_warga" value="<?php echo $id_jenis_warga; ?>" /> 
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('jenis_warga') ?>" class="btn btn-default">Batal</a> 
                </div>
            </form>
        </div>
    </div>
</section>
