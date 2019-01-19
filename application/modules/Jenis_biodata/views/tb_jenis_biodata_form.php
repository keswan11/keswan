<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form action="<?php echo $action; ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="varchar">Nama Jenis Biodata <?php echo form_error('nama_jenis_biodata') ?></label>
                        <input type="text" class="form-control" name="nama_jenis_biodata" id="nama_jenis_biodata" placeholder="nama jenis biodata" value="<?php echo $nama_jenis_biodata; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Tipe Jenis Biodata</label>
                        <select class="form-control" name="id_tipe_jenis_biodata" id="id_tipe_jenis_biodata">
                            <?php
                            foreach ($jenis_input as $jenis_input): 
                                $selected = "";
                                if(isset($id_jenis_biodata)){
                                    if ($jenis_input->id_jenis_input == $id_tipe_jenis_biodata) {
                                        $selected = "selected";
                                    }
                                }
                                ?>
                                <option value="<?php echo $jenis_input->id_jenis_input ?>" <?php echo $selected ?> ><?php echo $jenis_input->nama_jenis_input ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Biodata untuk : </label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="perorangan" value="1">Perorangan</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="instansi" value="2">Instansi</label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id_jenis_biodata" value="<?php echo $id_jenis_biodata; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('jenis_biodata') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="box-body">

</div>
