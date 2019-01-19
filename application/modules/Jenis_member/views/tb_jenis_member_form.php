<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form action="<?php echo $action; ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="varchar">Nama Jenis Member <?php echo form_error('nama_jenis_member') ?></label>
                        <input type="text" class="form-control" name="nama_jenis_member" id="nama_jenis_member" placeholder="nama jenis member" value="<?php echo $nama_jenis_member; ?>"/>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id_jenis_member" value="<?php echo $id_jenis_member; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('jenis_member') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="box-body">

</div>
