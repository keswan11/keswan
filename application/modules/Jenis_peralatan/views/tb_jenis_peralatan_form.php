<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <form action="<?php echo $action; ?>" method="post">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="int">kategori peralatan <?php echo form_error('id_kategori_peralatan') ?></label>
                        <select name="id_kategori_peralatan" class="form-control select2">
                            <?php 
                            foreach ($kategori_jenis_peralatan as $kjp) {
                                echo "<option value='$kjp->id_kategori_jenis_peralatan'";
                                echo $id_kategori_peralatan==$kjp->id_kategori_jenis_peralatan?'selected':'';
                                echo ">$kjp->nama_kategori_jenis_peralatan</option>";
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="int">sub kategori peralatan <?php echo form_error('id_sub_kategori_peralatan') ?></label>
                        <select name="id_sub_kategori_peralatan" class="form-control select2">
                            <?php 
                            foreach ($sub_kategori_jenis_peralatan as $skjp) {
                                echo "<option value='$skjp->id_sub_kategori_jenis_peralatan'";
                                echo $id_sub_kategori_peralatan==$skjp->id_sub_kategori_jenis_peralatan?'selected':'';
                                echo ">$skjp->nama_sub_kategori_jenis_peralatan</option>";
                            } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama peralatan <?php echo form_error('nama_peralatan') ?></label>
                        <input type="text" class="form-control" name="nama_peralatan" id="nama_peralatan" placeholder="nama peralatan" value="<?php echo $nama_peralatan; ?>" />
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id_jenis_peralatan" value="<?php echo $id_jenis_peralatan; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('jenis_peralatan') ?>" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="box-body">

</div>