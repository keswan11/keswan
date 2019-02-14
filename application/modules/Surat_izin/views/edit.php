<!-- Main Content -->
<div class="content">
<div class="container-fluid">  
<div class="row">
<div class="col-md-12">

	<div class="card">
		<div class="card-header card-header-tabs card-header-primary">
		  <h3 class="box-title">Edit Surat Izin
			<?php foreach($data_pengajuan as $dpengajuan){ $nama_pengajuan=$dpengajuan->nama_jenis_pengajuan;
			echo $nama_pengajuan;}?>
		  </h3>
		</div>
		<?php
		  echo form_open_multipart('surat_izin/edit','class="form-horizontal"');
		?>

		<div class="card-body">
		  
		  <div class="row">
		  <?php
		  $data_wilayah=$this->Model_surat_rekomendasi->get_wilayah();
		  $get_id_wilayah=$this->Model_surat_izin->get_id_wilayah_pengajuan($id_pengajuan);
		  echo '
		  
			<h4 class="col-sm-3" style="margin-left:14px;">Wilayah Pengajuan</h4>';
		  foreach($data_wilayah as $dwilayah)
		  {
			if($get_id_wilayah==$dwilayah->id_wilayah)
			{
			  echo '<h4 class="col-sm-6" style="margin-left:14px;" > : '.$dwilayah->nama_wilayah.'</h4>';
			}
		  }
		  
		  ?>
		  </div>	
		  <div class="row"
		  <?php foreach($data_list_surat_izin as $dlist)
		  {
			if($dlist->detail_wilayah!=NULL || $dlist->detail_wilayah!='')
			{
			  $detail_wilayah='<h4 class="col-sm-6" style="margin-left:14px;"> : '.$dlist->detail_wilayah.'</h4>';
			  echo '
			  <div >
				<h4 class="col-sm-3" style="margin-left:14px;">Detail Wilayah</h4>
				'.$detail_wilayah.'
			  </div>';
			}
		  }?>
		  <?php
		  
		  /*$stat_pengajuan=$this->Model_surat_izin->get_status_izin($id_pengajuan);
		  $status=array("Diajukan","Terdisposisi","Terverifikasi Dokumen","Terverifikasi Lapangan","Diterbitkan");

		  echo '
		  <div class="row">
		  <div class="col-md-3">
		  <br><h4 style="margin-left:14px;">Status Pengajuan<h4>
		  </div>
		  <div>
		  <select style="margin-top:16px; width:280px;" class="form-control" name="id_status_pengajuan">';
		  for($i=0;$i<count($status);$i++)
		  {
			if($i+1==$stat_pengajuan)
			{
			  $select='selected=""';
			}
			else {
			  $select="";
			}
			echo ' <option value="'.($i+1).'"'.$select.'>'.$status[$i].'</option>';
		  }
		  echo '</select></div></div><br>';*/
		   ?>

			<input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
			<input type="text" name="id_pengajuan" hidden="true" value="<?php echo $id_pengajuan; ?>"></input>
			<input type="text" name="id_member" hidden="true" value="<?php echo $id_member; ?>"></input>
			<input type="text" name="nama_pengajuan" hidden="true" value="<?php echo $nama_pengajuan; ?>"></input>

			
		  </div>		
		</div>		
	</div>		
		  
			<div class="card">
				<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="card-header card-header-tabs card-header-primary">
				  <h3 class="widget-user-username">Detail Pemohon</h3>
				  <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
				</div>
				
				<div class="card-body">

				  <?php
				  $data_member=$this->Model_surat_izin->get_member_by_id($id_member);
				  if(count($data_member!=0))
				  {
					echo '<style="margin-left:30px;" div class="row">';
					$i=1;
					foreach($data_member as $dmember)
					{
					  if($i==1 || $i==8)
					  {
						echo '<div class="col-md-6"><table width="100%">';
						echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
						 <td><b>:</b> '.$dmember->isi_biodata_member.'</td></tr>';
					  }
					  else {
						if(strpos($dmember->isi_biodata_member,".jpg")!==false)
						{
						  echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
						   <td><b>:</b> <a target="blank" href="'.base_url().'images/'.$dmember->isi_biodata_member.'"><img width="50px" height="auto" src="'.base_url().'images/'.$dmember->isi_biodata_member.'"></a> </td></tr>';

						}
						else
						{
						  echo '<tr><td><b>'.ucwords(str_replace("_"," ",$dmember->nama_jenis_biodata)).'<b></td>
						   <td><b>:</b> '.$dmember->isi_biodata_member.'</td></tr>';
						}
					  }

					  if($i==7)
					  {
						echo '</table></div>';
					  }

					   $i++;
					}
					echo '</div></table>';

				  }
				  ?>
			</div>	
				  <!-- /.row -->
    

    <div class="card">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="card-header card-header-tabs card-header-primary">
            <h3 class="widget-user-username">Detail Surat Izin</h3>
            <h5 class="widget-user-desc"><?php echo $nama_pengajuan; ?></h5>
          </div>
          
		  <div class="card-body">
		  <div class="row">
		  <div class="col-md-12">
		 
            <?php foreach($data_pesyaratan as $syarat)
            {

                $isi_data=$this->Model_surat_izin->get_isi_persyaratan($id_pengajuan,$syarat->id_jenis_persyaratan);
                 foreach($isi_data as $isi)
                 {

                  if($syarat->nama_jenis_input!="file")
                  {
                   $name='name="'.$syarat->kode_jenis_persyaratan.'"';
                   $ket_file=null;
                  }
                  else
                  {
                      if(strpos($syarat->kode_jenis_persyaratan,"foto")!==false)
                      {
                        $name='name="'.$syarat->kode_jenis_persyaratan.'"'.' accept="image/*,.pdf"';
                       $ket_file=' <label style="font-style:italic;color:red;font-size:12px;">file gambar atau .pdf</label>';
                      }
                      else
                      {
                        $name='name="'.$syarat->kode_jenis_persyaratan.'"'.' accept=".pdf"';
                        $ket_file=' <label style="font-style:italic;color:red;font-size:12px;">file .pdf</label>';
                      }
                  }
                  
                  if($isi->id_jenis_persyaratan==63 || $isi->id_jenis_persyaratan==64)
                  {
                    $isi_data_persyaratan=base_url()."dokumen/".$nama_pengajuan."/".md5($id_pengajuan)."/".$isi->isi_jenis_persyaratan;
                    if(strpos($isi_data_persyaratan,'File kosong')!==false)
                    {
                      echo '
                      <div>
                        <label class="col-sm-4 control-label">'.$syarat->nama_jenis_persyaratan.'</br>'.$ket_file.'</label>

                        <div class="col-sm-4">
                          <input value="'.$isi->isi_jenis_persyaratan.'" type="'.$syarat->nama_jenis_input.'" class="form-control" '.$name.'"
                            placeholder="'.$syarat->nama_jenis_persyaratan.'"><span id="errmsg"></span>
                        </div>
                      </div>';
                    }
                    else
                    {
                      echo '
                      <div>
                        <label class="col-sm-4 control-label">'.$syarat->nama_jenis_persyaratan.'</br>'.$ket_file.'</label>

                        <div class="col-sm-4">
                          <a class="form-control" target="blank" href="'.$isi_data_persyaratan.'"> <i class="fa fa-download"> Unduh file lama</i></a>
                          <input value="'.$isi->isi_jenis_persyaratan.'" type="'.$syarat->nama_jenis_input.'" class="form-control" '.$name.'"
                            placeholder="'.$syarat->nama_jenis_persyaratan.'"><span id="errmsg"></span>
                        </div>
                      </div>';
                    }

                  }
                  else
                  {
                    if($syarat->nama_jenis_input!="file")
                    {
                      $isi_data_persyaratan=$isi->isi_jenis_persyaratan;
                      echo '
                        <div>
                         <label class="col-sm-4 control-label">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                         <div class="col-sm-4">
                         <text class="form-control">'.$isi_data_persyaratan.'</text>
                      </div>
                      </div>';
                    }
                    else
                    {
                      $isi_data_persyaratan=base_url()."dokumen/".$nama_pengajuan."/".md5($id_pengajuan)."/".$isi->isi_jenis_persyaratan;
                      echo '
                        <div>
                         <label class="col-sm-4 control-label">'.ucwords($syarat->nama_jenis_persyaratan).'</label>
                         <div class="col-sm-4">
                         <a class="form-control" target="blank" href="'.$isi_data_persyaratan.'"> <i class="fa fa-download"> Unduh file</i></a>
                      </div><br><br>
                      </div>';
                    }
                  }


                  }
                }?>
          
          </div>
          </div>
		  <button type="submit" onclick="return confirm('Anda yakin ingin mengsubmit data ini ?') "class="btn btn-success pull-right" name="submit">Submit</button>
          </div>
    </div>
    



      

</div>
</div>
</div>
</div>
