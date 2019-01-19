<?php
    $main=$this->db->query("SELECT * FROM tabel_menu WHERE parent = 0 ORDER BY posisi ASC");
    foreach ($main->result() as $m)
    {
        // chek ada submenu atau tidak
        $sub=$this->db->get_where('tabel_menu',array('parent'=>$m->menu_id));
        if($sub->num_rows() >0)
        {
            // buat menu + sub menu
            echo '<li>'.anchor($m->link,'<i class="'.$m->icon.'"></i>
                 <span class="menu-text">'.strtoupper($m->nama_menu).'</span>
                 <b class="arrow icon-angle-down"></b>',array('class'=>'dropdown-toggle'));
            echo "<ul class='submenu'>";
            foreach ($sub->result() as $s)
            {
                 echo '<li>'.anchor($s->link,'<i class="'.$s->icon.'"></i>'.  strtoupper($s->nama_menu)).'</li>';
            }
            echo "</ul>";
            echo '</li>';
        }
        else
        {
            // single menu
            echo '<li>'.anchor($m->link,'<i class="'.$m->icon.' fa-lg">
                 </i>  <span class="menu-text">'.strtoupper($m->nama_menu).'</span>').'</li>';
        }
    }
?>