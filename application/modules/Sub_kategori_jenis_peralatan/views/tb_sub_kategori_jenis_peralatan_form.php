<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form action="<?php echo $action; ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="varchar">Nama sub kategori jenis peralatan <?php echo form_error('nama_sub_kategori_jenis_peralatan') ?></label>
                        <input type="text" class="form-control" name="nama_sub_kategori_jenis_peralatan" id="nama_sub_kategori_jenis_peralatan" placeholder="nama sub kategori jenis peralatan" value="<?php echo $nama_sub_kategori_jenis_peralatan; ?>" />
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id_sub_kategori_jenis_peralatan" value="<?php echo $id_sub_kategori_jenis_peralatan; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('sub_kategori_jenis_peralatan') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>