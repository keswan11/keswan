<!-- Main Content -->
<div class="content">
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
	<div class="container-fluid">  
	<div class="row">
	<div class="col-md-12">
	<div class="card">


  
    <div class="card-header card-header-tabs card-header-primary">
	<div class="nav-tabs-navigation">
    <div class="nav-tabs-wrapper">
		<h3 class="box-title"><?php echo $title ?></h3>
					<div class="card-footer"></div>  
						<ul class="nav nav-tabs" data-tabs="tabs">
						<li class="nav-item">
                          <a class="nav-link active" href="#Biodata" data-toggle="tab" >
                            <i class="material-icons">assignment</i> Detail Tempat Praktik
							<div class="ripple-container"></div>
                          </a>
                        </li>
						
						<li class="nav-item">
                          <a class="nav-link" href="#KTP"  data-toggle="tab">
                            <i class="material-icons">assignment_ind</i> Detail Data Penanggung Jawab
                            <div class="ripple-container"></div>
                          </a>
                        </li>
					
	</div>	
	</div>	
	</div>	
	

  

        <div class="card-body">
		
            <div class="col-md-12">
              <!-- Custom Tabs -->
                <ul class="nav nav-tabs">
                  <?php if ($this->session->userdata('id_jenis_member') == 1): ?>
                    <li><a href="#tab_3" data-toggle="tab">Passport</a></li>
                  <?php endif ?>
                </ul>
				
            <div class="tab-content">
                  <div class="tab-pane active" id="Biodata">
                   <form class="form-horizontal" method="post" action="<?php echo site_url('profil_member/update_action') ?>" enctype="multipart/form-data">
                    <?php 
                    foreach ($biodata as $bio) {
                      echo '<input type="hidden" name="id_member" value="'.$bio->id_member.'">';
                      $l = "Laki - laki";
                      $p = "Perempuan";
                      $asn = "ASN";
                      $mandiri = "Mandiri";
                      $nama = ucwords(str_replace("_", " ", $bio->nama_jenis_biodata));
                      if ($nama == "Nomor Ktp") {
                        $nama = "Nomor KTP";
                      } else if ($nama == "Nomor Npwp") {
                        $nama = "Nomor NPWP";
                      }
                      if ($nama == "Status Kepegawaian") {
                        echo "<div class='form-group'>";
                        echo "<label for='$bio->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
                        echo "<select name='isi_biodata_member[]' class='form-control' id='$bio->id_jenis_biodata'>";
                        echo '<option value="'.$asn.'" '.(($bio->isi_biodata_member==$asn)?'selected="selected"':"").'>ASN</option>';
                        echo '<option value="'.$mandiri.'" '.(($bio->isi_biodata_member==$mandiri)?'selected="selected"':"").'>Mandiri</option>';
                        echo "</select>";
                        echo "</div>";
                        echo "</div>";
                      } else if ($nama == "Jenis Kelamin") {
                        echo "<div class='form-group'>";
                        echo "<label for='$bio->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
                        echo "<select name='isi_biodata_member[]' class='form-control' id='$bio->id_jenis_biodata'>";
                        echo '<option value="'.$l.'" '.(($bio->isi_biodata_member==$l)?'selected="selected"':"").'>Laki - laki</option>';
                        echo '<option value="'.$p.'" '.(($bio->isi_biodata_member==$p)?'selected="selected"':"").'>Perempuan</option>';
                        echo "</select>";
                        echo "</div>";
                        echo "</div>";
                      }
                      if ($bio->nama_jenis_input == "text" && $bio->nama_jenis_biodata != 'status' && $bio->nama_jenis_biodata != 'username' && $bio->nama_jenis_biodata != 'status_kepegawaian' && $bio->nama_jenis_biodata != 'jenis_kelamin' && $bio->nama_jenis_biodata != 'nomor_ktp') {
                        echo "<div class='form-group'>";
                        echo "<label for='$bio->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
                        echo "<input type='$bio->nama_jenis_input' id='$bio->id_jenis_biodata' name='isi_biodata_member[]' class='form-control' placeholder='$nama' value='$bio->isi_biodata_member'>";
                        echo "</div>";
                        echo "</div>";
                      } else if ($bio->nama_jenis_input == "textarea") {
                        echo "<div class='form-group'>";
                        echo "<label for='$bio->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
                        echo "<textarea name='isi_biodata_member[]' id='$bio->id_jenis_biodata' class='form-control' rows='3' placeholder='$nama'>$bio->isi_biodata_member</textarea>";
                        echo "</div>";
                        echo "</div>";
                      } 
                      else if ($bio->nama_jenis_input == "date") {
                        echo "<div class='form-group'>";
                        echo "<label for='$bio->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_biodata_member[]' value='$bio->id_jenis_biodata'>";
                        echo "<input type='text' name='isi_biodata_member[]' class='form-control datepicker' placeholder='$nama' value='$bio->isi_biodata_member'>";
                        echo "</div>";
                        echo "</div>";
                      }  
                    }
                    ?>
                    <div class="form-group">

                      <label for="password" class="col-sm-2 control-label">Password </label>
                      <div class="col-sm-10">
                        <input type="password" name="password" placeholder="*************" class="form-control">
                        <i style="color:red">Kosongkan bila tidak diganti</i>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="KTP">
                  <form class="form-horizontal" method="post" action="<?php echo site_url('profil_member/update_ktp') ?>" enctype="multipart/form-data">
                    <?php 
                    foreach ($ktp as $k) {
                      $nama = ucwords(str_replace("_", " ", $k->nama_jenis_biodata));
                      if ($nama == "Nomor Ktp") {
                        $nama = "Nomor KTP";
                      } else if ($nama == "Scan Ktp") {
                        $nama = "Scan KTP";
                      }
                      if ($k->nama_jenis_input == "text") {
                        echo "<div class='form-group'>";
                        echo "<label for='$k->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_biodata_member[]' value='$k->id_jenis_biodata'>";
                        echo "<input type='$k->nama_jenis_input' id='$bio->id_jenis_biodata' name='isi_biodata_member[]' class='form-control' value='$k->isi_biodata_member'>";
                        echo "</div>";
                        echo "</div>";
                      } else if ($k->nama_jenis_input == "file") {
                        echo "<div class='form-group'>";
                        echo "<label for='$k->id_jenis_biodata' class='col-sm-2 control-label'>KTP</label>";
                        echo "<div class='col-sm-10'>";
                        // if (file_exists(base_url('images/'.$k->isi_biodata_member))) {
                        echo "<img src='".base_url('images/'.$k->isi_biodata_member)."' width='50%'>";
                        // } else {
                        //   echo "<p>Tidak ada gambar</p>";
                        // }
                        echo "</div>";
                        echo "</div>";
                        echo "<div>";
                        echo "<label for='$k->nama_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                        echo "<div class='col-sm-10'>";
                        echo "<input type='hidden' name='id_gambar' value='$k->id_jenis_biodata'>";
                        echo "<input type='$k->nama_jenis_input' id='$k->nama_jenis_biodata' name='userfile' accept='image/jpeg'>";
                        echo "</div>";
                        echo "</div>";
                      } 
                    }
                    ?>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                  </form>
                </div>
                <?php if ($this->session->userdata('id_jenis_member') == 1): ?>
                  <div class="tab-pane" id="tab_3">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('profil_member/update_passport') ?>" enctype="multipart/form-data">
                      <?php 
                      foreach ($passport as $p) {
                        $nama = ucwords(str_replace("_", " ", $p->nama_jenis_biodata));
                        if ($p->nama_jenis_input == "text") {
                          echo "<div class='form-group'>";
                          echo "<label for='$p->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                          echo "<div class='col-sm-10'>";
                          echo "<input type='hidden' name='id_biodata_member[]' value='$p->id_jenis_biodata'>";
                          echo "<input type='$p->nama_jenis_input' id='$bio->id_jenis_biodata' name='isi_biodata_member[]' class='form-control' value='$p->isi_biodata_member'>";
                          echo "</div>";
                          echo "</div>";
                        } else if ($p->nama_jenis_input == "date") {
                          echo "<div class='form-group'>";
                          echo "<label for='$p->id_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                          echo "<div class='col-sm-10'>";
                          echo "<input type='hidden' name='id_biodata_member[]' value='$p->id_jenis_biodata'>";
                          echo "<input type='text' name='isi_biodata_member[]' class='form-control datepicker' value='$p->isi_biodata_member'>";
                          echo "</div>";
                          echo "</div>";
                        } else if ($p->nama_jenis_input == "file") {
                          echo "<div class='form-group'>";
                          echo "<label for='$p->id_jenis_biodata' class='col-sm-2 control-label'>Passport</label>";
                          echo "<div class='col-sm-10'>";
                          if (file_exists(FCPATH.'images/' .$p->isi_biodata_member)) {
                           echo "<img src='".base_url('images/'.$p->isi_biodata_member)."' width='50%' alt='$p->isi_biodata_member'>";
                         } else {
                           echo "<p>Tidak ada gambar</p>";
                         }

                         echo "</div>";
                         echo "</div>";
                         echo "<div class='form-group'>";
                         echo "<label for='$p->nama_jenis_biodata' class='col-sm-2 control-label'>$nama</label>";
                         echo "<div class='col-sm-10'>";
                         echo "<input type='hidden' name='id_gambar' value='$p->id_jenis_biodata'>";
                         echo "<input type='$p->nama_jenis_input' id='$p->nama_jenis_biodata' name='userfile' accept='image/jpeg'>";
                         echo "</div>";
                         echo "</div>";
                       } 
                     }
                     ?>
                     <div class="box-footer">
                      <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                  </form>
                </div>
              <?php endif ?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          
          <!-- nav-tabs-custom -->
        </div>
      </div>
    


	</div>
	</div>
	</div>
	</div>
</div>
