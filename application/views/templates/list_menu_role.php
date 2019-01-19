<ul class="sidebar-menu tree" data-widget="tree">
  <?php
    //list menu
    $uri4 = strtolower(str_replace('_', ' ', $this->uri->segment(4)));
    foreach ($menu as $menu):
    $row = $this->Page_operator_model->get_menu($menu->id_jenis_pengajuan);
    $role = $this->Page_operator_model->get_role_name()->row();
    $str_role =  str_replace(' ', '_', strtolower($role->nama_role_operator));
    $link =  str_replace(' ', '_', strtolower($row->nama_jenis_pengajuan));
    $surat = str_replace('Surat Rekomendasi', 'SR', $row->nama_jenis_pengajuan);
    
    
    $active = '';
    if(strtolower($row->nama_jenis_pengajuan) == $uri4){
      $active = 'active';
    } 
  ?>
    <li class="treeview <?php echo $active ?>">
      <a href="<?php echo base_url()."page_operator/index/".$str_role."/".$link ?>">
        <i class="fa fa-circle-o"></i>
        <?php echo $surat ?>
      </a>
    </li>
  <?php endforeach ?>
</ul>