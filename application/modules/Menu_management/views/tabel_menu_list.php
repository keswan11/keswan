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
          <h3 class="box-title">Data Menu &nbsp; 
            <?php 
             echo anchor('menu_management/create', 'Tambah Menu', array('class' => 'btn btn-info'));
          ?>
        </h3>
      </div>
            <div class="box-body">
            <table id="tabel" class="table table-bordered">
             <thead>
                <tr>
                    <th>No</th>
                    <th>Nama menu</th>
                    <th>Icon</th>
                    <th>Link</th>
                    <th>Parent</th>
                    <th>Aktif</th>
                    <th>Action</th>
                    </tr>
            <thead>
            <tbody>
                    <?php
                    $no = 0;
                    foreach ($menu_management_data as $menu_management)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$no ?></td>
                            <td><?php echo $menu_management->nama_menu ?></td>
                            <td><i class="<?php echo $menu_management->icon ?>"></i>&nbsp;<?php echo $menu_management->icon ?></td>
                            <td><?php echo $menu_management->link ?></td>
                            <td><?php echo $menu_management->parent ?></td>
                            <td><?php echo $menu_management->aktif ?></td>
                            <td style="text-align:center">
                                <?php 
                                echo anchor(site_url('menu_management/update/'.$menu_management->menu_id),'Perbarui',array('class' => 'btn btn-success')); 
                                echo ' &nbsp; '; 
                                echo anchor(site_url('menu_management/delete/'.$menu_management->menu_id),'Hapus',array('class' => 'btn btn-danger'),'onclick="javasciprt: return confirm(\'Anda Yakin ?\')"'); 
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>