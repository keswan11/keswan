<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form action="<?php echo $action; ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="varchar">Nama Jenis Persyaratan <?php echo form_error('nama_jenis_persyaratan') ?></label>
                        <input type="text" class="form-control" name="nama_jenis_persyaratan" id="nama_jenis_persyaratan" placeholder="nama jenis persyaratan" value="<?php echo $nama_jenis_persyaratan; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Kode Jenis Persyaratan <?php echo form_error('kode_jenis_persyaratan') ?></label>
                        <input type="text" class="form-control" name="kode_jenis_persyaratan" id="kode_jenis_persyaratan" placeholder="kode jenis persyaratan" value="<?php echo $kode_jenis_persyaratan; ?>"/>
                    </div>
                        <label for="varchar">Tipe Jenis Biodata</label>
                        <select class="form-control" name="tipe_jenis_persyaratan" id="tipe_jenis_persyaratan">
                            <?php
                                foreach ($jenis_input as $jenis_input): 
                                    $selected = "";
                                    if(isset($tipe_jenis_persyaratan)){
                                        if ($jenis_input->id_jenis_input == $tipe_jenis_persyaratan) {
                                            $selected = "selected";
                                        }
                                    }
                            ?>
                                <option value="<?php echo $jenis_input->id_jenis_input ?>" <?php echo $selected ?> ><?php echo $jenis_input->nama_jenis_input ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id_jenis_persyaratan" value="<?php echo $id_jenis_persyaratan; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('jenis_persyaratan') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="box-body">

</div>
