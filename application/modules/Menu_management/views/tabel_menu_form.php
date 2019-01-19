<section class="content-header">
    <h1><?php echo $title; ?></h1>
</section>
<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form action="<?php echo $action; ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="varchar">Posisi <?php echo form_error('posisi') ?></label>
                        <input type="text" class="form-control" name="posisi" id="posisi" placeholder="posisi" value="<?php echo $posisi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama_menu <?php echo form_error('nama_menu') ?></label>
                        <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="nama menu" value="<?php echo $nama_menu; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Icon <?php echo form_error('icon') ?></label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="icon" value="<?php echo $icon; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Link <?php echo form_error('link') ?></label>
                        <input type="text" class="form-control" name="link" id="link" placeholder="link" value="<?php echo $link; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Parent <?php echo form_error('parent') ?></label>
                        <?php 
                        echo dropdown('parent', 'tabel_menu', 'nama_menu', 'menu_id',array('parent'=>0),'',array('--PARENT--'=>0));
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="role_menu">Role menu <?php echo form_error('role_menu') ?></label>
                        <?php 
                        $role = array('admin'=>'Admin', 'member'=>'Member', 'operator'=>'Operator');
                        echo form_dropdown('role_menu', $role, $role_menu, 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Status <?php echo form_error('aktif') ?></label>
                        <select name="aktif" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('menu_management') ?>" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
<div class="box-body">

</div>
