<?php
if($this->session->userdata('id_member') != NULL){
echo "<ul class='sidebar-menu' id='nav'>";
echo "<li class='header'>MENU</li>";

if ($this->session->userdata('level') == "Admin") {
    $main=$this->db->query("SELECT * FROM tabel_menu WHERE parent = 0 AND role_menu = 'admin' AND aktif = '1' ORDER BY posisi ASC");
} else {
    $main=$this->db->query("SELECT tabel_menu.*,tb_menu_member.*,tb_jenis_member.*,tb_jenis_warga.* FROM tb_menu_member
        INNER JOIN tabel_menu ON tb_menu_member.menu_id = tabel_menu.menu_id 
        INNER JOIN tb_jenis_member ON tb_menu_member.id_jenis_member = tb_jenis_member.id_jenis_member
        INNER JOIN tb_jenis_warga ON tb_menu_member.id_jenis_warga = tb_jenis_warga.id_jenis_warga WHERE tabel_menu.parent = 0 AND tb_menu_member.id_jenis_member = ".$this->session->userdata('id_jenis_member')." AND tb_menu_member.id_jenis_warga = ".$this->session->userdata('id_jenis_warga')."  ORDER BY tabel_menu.posisi ASC");
}



// AND id_jenis_member = ".$this->session->userdata('id_jenis_member')." AND id_jenis_warga = ".$this->session->userdata('id_jenis_warga')."  
foreach ($main->result() as $m)
{
    $menu_1 = strtolower($m->nama_menu);
    $menu = ucwords($menu_1);
    $sub=$this->db->get_where('tabel_menu',array('parent'=>$m->menu_id,'aktif'=>'1'));
    if($sub->num_rows() >0)
    {
        echo "<li class='treeview'>";
        echo "<a href='#'><i class='$m->icon'></i><span>".$m->nama_menu."</span><i class='fa fa-angle-left pull-right'></i></a>";
        echo "<ul class='treeview-menu'>";
        foreach ($sub->result() as $s){
            // $sub_menu_1 = strtolower($s->nama_menu);
            // $sub_menu = ucwords($sub_menu_1);
            echo "<li>".anchor($s->link, '<i class="'.$s->icon.'"></i>'.$s->nama_menu)."</li>";
        }
        echo "</ul>";
        echo "<li>";
    }
    else
    {
        echo "<li>";
        echo anchor($m->link, '<i class="'.$m->icon.'"></i>'.$menu);
        echo "</li>";
    }
}
echo "</ul>";
echo "&nbsp;";
}else{
?>
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
<?php } ?>