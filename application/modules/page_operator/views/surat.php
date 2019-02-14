<head>
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">

	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
</head>

<!-- End Navbar -->
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
	<div class="card">
	<div class="card-header card-header-primary">
		<h3><?php echo $title;?></h3><br>
	</div>
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
			  
		<div class="card-body">
			  <?php 
				//Cek apakah dia bagian administrasi atau lapangan
				$id_role = $this->session->userdata('id_role_operator');
				$query = $this->db->query("SELECT nama_role_operator FROM tb_role_operator WHERE id_role_operator = $id_role")->row();
				$get_adm_lap = explode(' ', $query->nama_role_operator);
				$end_adm_lap = end($get_adm_lap);
				$status = array('Terkirim', 'Disposisi', 'Terverifikasi Administrasi', 'Terverifikasi Lapangan', 'Terbitkan');
			   ?>
			<div class="box-body" > 
			  <table id="tabel" style="width: 102%" class="table table-bordered table-hover">
				<thead class="text-primary"  >
				  <tr>
					<td>ID Pengajuan</td>
					<td>ID Member</td>
					<td style="width: 30%">Jenis Pengajuan</td>
					<td>Wilayah</td>
					<td style="width: 20%">Jenis Warga</td>
					<td style="width: 20%">Status Sekarang</td>
					<td>Detail</td>
					  <td>Cetak</td>
					<?php if( $end_adm_lap != 'Administrasi' && $end_adm_lap != 'Lapangan' ): ?>
					  <td style="width: 70%" >Update Status Pengajuan</td>
					<?php endif ?>
				  </tr>
				</thead>
				<tbody>
				  <?php
                
					$pengajuan = $this->uri->segment(4);
					$jenis_warga = explode('_', $pengajuan);
					$warganegara = strtoupper(end($jenis_warga));
					foreach ($data_list_surat as $data):  
					  $warga = $this->Page_operator_model->get_jenis_warga($data->id_member);
					   //Filter Warganegara
					  if($warganegara == 'WNI' || $warganegara == 'WNA'){
						if($warga->nama_jenis_warga <> $warganegara){
						 continue;
						}
					  }
					  //Cek jenis surat (surat izin atau rekomendasi)
					  $link_jenis_surat = 'surat_izin';
					  if($jenis_surat == 'rekomendasi'){
						$link_jenis_surat = 'surat_rekomendasi';
					  }
					?>
					<?php
					// validasi
					$this->db->select('*');
					$this->db->from('tb_data_sipp');
					$this->db->where('id_pengajuan' , $data->id_pengajuan);
					$this->db->where('id_jenis_pengajuan',  $data->id_jenis_pengajuan);
					$this->db->where('id_member' , $data->id_member);
					$validasi = $this->db->get();
					
					$this->db->select('*');
					$this->db->from('tb_data_sip');
					$this->db->where('id_pengajuan' , $data->id_pengajuan);
					$this->db->where('id_jenis_pengajuan',  $data->id_jenis_pengajuan);
					$this->db->where('id_member' , $data->id_member);
					$validasi_sip = $this->db->get();
					?>
					  <tr>
						<td><?php echo $data->id_pengajuan; ?></td>
						<td><?php echo $data->id_member; ?></td>
						<td><?php echo $data->nama_jenis_pengajuan ?></td>
						<td><?php echo $data->nama_wilayah ?></td>
						<td><?php echo $warga->nama_jenis_warga ?></td>
						<td><?php echo $data->status_pengajuan ?></td>
						<td>
						  <?php echo anchor(base_url().$link_jenis_surat."/detail/".$data->id_jenis_pengajuan."/".$data->id_pengajuan, 'Detail', array('class' => 'btn btn-primary btn-info')); ?>  
						</td>
						  <td align="center">
							<?php
								//SIPP ATR PKB INSEMINATOOR KESWAN
							  if($data->id_status_pengajuan == 5)
							  {
								  if($data->id_jenis_pengajuan == 7 || $data->id_jenis_pengajuan == 8 || $data->id_jenis_pengajuan == 9 || $data->id_jenis_pengajuan == 10)
								  {
									  if($validasi->num_rows() == 0)
										{
										   echo '<a href="'.base_url().'page_operator/form_sipp/'.$data->id_pengajuan.'"><button class="btn btn-block btn-success">Lengkapi</button></a>';                                
										}else
										  {
											echo '<a href="'.base_url().'page_operator/cetak/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Cetak</button></a>';
										  }
								  }
								 
								  //SIP DRH KONSULTASI
								  elseif($data->id_jenis_pengajuan == 3 || $data->id_jenis_pengajuan == 4)
								  {
									if($validasi->num_rows() == 0)
									  {
										echo '<a href="'.base_url().'page_operator/form_drhk/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Lengkapi Data</button></a>';
									  }
										else
										{
										  echo '<a href="'.base_url().'page_operator/cetak_drhk/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Cetak</button></a>';
										}
								  }

								  //SIP DRH KUDA 
								  elseif($data->id_jenis_pengajuan == 5 || $data->id_jenis_pengajuan == 6)
								  { 
									if($validasi->num_rows() == 0)
									{    
										echo '<a href="'.base_url().'page_operator/form_sip_drh_kuda/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Lengkapi Data</button></a>';
									}
									else
									{
										echo '<a href="'.base_url().'page_operator/cetak_sip_drh_kuda/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Cetak</button></a>';
									}
								  }
								  //SIP DRH WNI
								  elseif($data->id_jenis_pengajuan == 1 || $data->id_jenis_pengajuan == 2)
									{ 
									  if($validasi->num_rows() == 0)
									  {
										echo '<a href="'.base_url().'page_operator/form_sip_drh/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Lengkapi Data</button></a>';
									  }
									  else
									  {
										  echo '<a href="'.base_url().'page_operator/cetak_sip_drh/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Cetak</button></a>';
									  }
										  
									}
									//SIP DRH WNI SPESIALIS
								  elseif($data->id_jenis_pengajuan == 27 || $data->id_jenis_pengajuan == 28)
									{ 
									  if($validasi->num_rows() == 0)
									  {
										echo '<a href="'.base_url().'page_operator/form_sip_drh_spesialis/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Lengkapi Data</button></a>';
									  }
									  else
									  {
										  echo '<a href="'.base_url().'page_operator/cetak_sip_drh_spesialis/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Cetak</button></a>';
									  }
										  
									}

									 //SURAT REKOMENDASI
								  elseif($data->id_jenis_pengajuan == 11 || $data->id_jenis_pengajuan == 12 || $data->id_jenis_pengajuan == 13 || $data->id_jenis_pengajuan == 14 || $data->id_jenis_pengajuan == 15 || $data->id_jenis_pengajuan == 16 || $data->id_jenis_pengajuan == 17 || $data->id_jenis_pengajuan == 18)
									{ 
									  
										echo '<a href="'.base_url().'page_operator/cetak_rekomendasi/'.$data->id_pengajuan.'"><button class="btn btn-primary btn-info">Cetak</button></a>';   
									}


									 //SIVET ATR KH HK RSH
								  elseif($data->id_jenis_pengajuan == 19 || $data->id_jenis_pengajuan == 20 || $data->id_jenis_pengajuan == 21 || $data->id_jenis_pengajuan == 22 || $data->id_jenis_pengajuan == 23 || $data->id_jenis_pengajuan == 24 || $data->id_jenis_pengajuan == 25 || $data->id_jenis_pengajuan == 26)
									{ 
									  if($validasi_sip->num_rows() == 0)
									  {
										echo '<a href="'.base_url().'page_operator/form_sivet/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Lengkapi Data</button></a>'; 
									  }
									  else
									  {
										echo '<a href="'.base_url().'page_operator/cetak_sivet/'.$data->id_pengajuan.'"><button class="btn btn-block btn-info">Cetak</button></a>';   
									  }
									}

							  }//tutup 5
							  //LAMPIRAN ID STATUS PENGAJUAN 3 ATAU 2
							  elseif($data->id_status_pengajuan == 3 || $data->id_status_pengajuan == 2)
							  {
								if($end_adm_lap == 'Lapangan'){
									if($data->id_jenis_pengajuan == 13 || $data->id_jenis_pengajuan == 17)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_1/"><img src="'.base_url().'images/icons8-pdf-26.png" >';
									  echo '<a href="'.base_url().'page_operator/cetak_excell_1/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
									  echo '<li class="dropdown user user-menu">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
										Import
									  </a>
									  <ul class="dropdown-menu">
										<!-- User image -->
										<li class="user-header">
										  
															///
						
										</li>
										<!-- Menu Footer-->
										<li class="user-footer">
										  <div class="pull-right">
											///
										  </div>
										  <div class="pull-left">
											///
										  </div>
										</li>
									  </ul>
									</li>'; 
									}
									elseif($data->id_jenis_pengajuan == 16 || $data->id_jenis_pengajuan == 12)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_2/"><img src="'.base_url().'images/icons8-pdf-26.png" >';
									  echo '<a href="'.base_url().'page_operator/cetak_excell_2/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
									  echo '
									  <div class="dropdown user user-menu">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
										Import
									  </a>
										  <ul class="dropdown-menu">
											<form method="post" action="" enctype="multipart/form-data">
											<input type="file" name="file">
											<br>
											<button type="submit" name="import">Import</button>
										  </form>
										  </ul>
									</div>'; 
									}
									elseif($data->id_jenis_pengajuan == 14 || $data->id_jenis_pengajuan == 18)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_3/"><button class="btn btn-block btn-info">Cetak</button></a>';
									  echo '<a href="'.base_url().'page_operator/cetak_excell_3/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >';
									  echo '<div class="dropdown user user-menu">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
										Import
									  </a>
									  <ul class="dropdown-menu">
										  <form method="post" action="" enctype="multipart/form-data">
										  <input type="file" name="file">
										  <br>
										  <button type="submit" name="import">Import</button>
										</form>
									  </ul>
									</div>'; 
									}
									elseif($data->id_jenis_pengajuan == 11 || $data->id_jenis_pengajuan == 15)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_4/"><img src="'.base_url().'images/icons8-pdf-26.png" >';
									  echo '<a href="'.base_url().'page_operator/cetak_excell/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
									  echo '<div class="dropdown user user-menu">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
										Import
									  </a>
									  <ul class="dropdown-menu">
									  <form method="post" action="" enctype="multipart/form-data">
									  <input type="file" name="file">
									  <br>
									  <button type="submit" name="import">Import</button>
									</form>
									  </ul>
									</div>'; 
									}
								  }else{
									 if($data->id_jenis_pengajuan == 13 || $data->id_jenis_pengajuan == 17)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_1/"><img src="'.base_url().'images/icons8-pdf-26.png" style="padding-right:25px">';
									  echo '<a href="'.base_url().'page_operator/cetak_excell_1/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
									}
									elseif($data->id_jenis_pengajuan == 16 || $data->id_jenis_pengajuan == 12)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_2/"><img src="'.base_url().'images/icons8-pdf-26.png" style="padding-right:25px" >';
									  echo '<a href="'.base_url().'page_operator/cetak_excell_2/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
									}
									elseif($data->id_jenis_pengajuan == 14 || $data->id_jenis_pengajuan == 18)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_3/"><button class="btn btn-block btn-info">Cetak</button></a>';
									  echo '<a href="'.base_url().'page_operator/cetak_excell_3/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >';
									}
									elseif($data->id_jenis_pengajuan == 11 || $data->id_jenis_pengajuan == 15)
									{
									  echo '<a href="'.base_url().'page_operator/cetak_lampiran_4/"><img src="'.base_url().'images/icons8-pdf-26.png" style="padding-right:25px">';
									  echo '<a href="'.base_url().'page_operator/cetak_excell/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
									}
								  }
								}
							  else{
								echo"";
							  }
							?>
						  </td>
						  <td>
							<?php
							if($data->id_status_pengajuan ==1){
							  echo 
							  anchor(
								  base_url().$link_jenis_surat."/update_status/".$data->id_pengajuan."/2/".$data->id_jenis_pengajuan.urldecode($_SERVER['REQUEST_URI']), 
								  
								  $status[$data->id_status_pengajuan], array('class' => 'btn btn-block btn-success')
								  );//urlencode diganti decode 
							}else if($data->id_status_pengajuan == 4)
							{
								echo 
								anchor(
									base_url().$link_jenis_surat."/terbitkan_surat/".$data->id_jenis_pengajuan."/".$data->id_pengajuan.urldecode($_SERVER['REQUEST_URI']), 
									
									$status[$data->id_status_pengajuan], array('class' => 'btn btn-block btn-success')
								  ); //urlencode diganti decode 
							}
							else if ($data->id_status_pengajuan == 5){
							  echo "Sudah diterbitkan";
							}
							else if ($data->id_status_pengajuan == 6){
							  echo "Ditolak";
							}
							?>    
						  </td>
					  </tr>
				  <?php endforeach ?>
				</tbody>
			  </table>
			</div>
		</div>
		  
	</div>

<<<<<<< HEAD
                          }//tutup 5
                          //LAMPIRAN ID STATUS PENGAJUAN 3 ATAU 2
                          elseif($data->id_status_pengajuan == 3 || $data->id_status_pengajuan == 2)
                          {
                            if($end_adm_lap == 'Lapangan'){
                                if($data->id_jenis_pengajuan == 13 || $data->id_jenis_pengajuan == 17)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_1/"><img src="'.base_url().'images/icons8-pdf-26.png" >';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell_1/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
                                  echo '<li class="dropdown user user-menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    Import
                                  </a>
                                  <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                      
                                                        ///
                    
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                      <div class="pull-right">
                                        ///
                                      </div>
                                      <div class="pull-left">
                                        ///
                                      </div>
                                    </li>
                                  </ul>
                                </li>'; 
                                }
                                elseif($data->id_jenis_pengajuan == 16 || $data->id_jenis_pengajuan == 12)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_2/"><img src="'.base_url().'images/icons8-pdf-26.png" >';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell_2/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
                                  echo '
                                  <div class="dropdown user user-menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    Import
                                  </a>
                                      <ul class="dropdown-menu">
                                        <form method="post" action="'.base_url().'page_operator/import/'.$data->id_pengajuan.'" enctype="multipart/form-data">
                                        <input type="file" name="file">
                                        <br>
                                        <button type="submit" name="import">Import</button>
                                      </form>
                                      </ul>
                                </div>'; 
                                }
                                elseif($data->id_jenis_pengajuan == 14 || $data->id_jenis_pengajuan == 18)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_3/"><button class="btn btn-block btn-info">Cetak</button></a>';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell_3/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >';
                                  echo '<div class="dropdown user user-menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    Import
                                  </a>
                                  <ul class="dropdown-menu">
                                  <form method="post" action="'.base_url().'page_operator/import/'.$data->id_pengajuan.'" enctype="multipart/form-data">
                                      <input type="file" name="file">
                                      <br>
                                      <button type="submit" name="import">Import</button>
                                    </form>
                                  </ul>
                                </div>'; 
                                }
                                elseif($data->id_jenis_pengajuan == 11 || $data->id_jenis_pengajuan == 15)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_4/"><img src="'.base_url().'images/icons8-pdf-26.png" >';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
                                  echo '<div class="dropdown user user-menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    Import
                                  </a>
                                  <ul class="dropdown-menu">
                                  <form method="post" action="'.base_url().'page_operator/import/'.$data->id_pengajuan.'" enctype="multipart/form-data">
                                  <input type="file" name="file">
                                  <br>
                                  <button type="submit" name="import">Import</button>
                                </form>
                                  </ul>
                                </div>'; 
                                }
                              }else{
                                 if($data->id_jenis_pengajuan == 13 || $data->id_jenis_pengajuan == 17)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_1/"><img src="'.base_url().'images/icons8-pdf-26.png" style="padding-right:25px">';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell_1/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
                                }
                                elseif($data->id_jenis_pengajuan == 16 || $data->id_jenis_pengajuan == 12)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_2/"><img src="'.base_url().'images/icons8-pdf-26.png" style="padding-right:25px" >';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell_2/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
                                }
                                elseif($data->id_jenis_pengajuan == 14 || $data->id_jenis_pengajuan == 18)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_3/"><button class="btn btn-block btn-info">Cetak</button></a>';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell_3/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >';
                                }
                                elseif($data->id_jenis_pengajuan == 11 || $data->id_jenis_pengajuan == 15)
                                {
                                  echo '<a href="'.base_url().'page_operator/cetak_lampiran_4/"><img src="'.base_url().'images/icons8-pdf-26.png" style="padding-right:25px">';
                                  echo '<a href="'.base_url().'page_operator/cetak_excell/'.$data->id_pengajuan.'"><img src="'.base_url().'images/icons8-microsoft-excel-file-26.png" >'; 
                                }
                              }
                            }
                          else{
                            echo"";
                          }
                        ?>
                      </td>
                      <td>
                        <?php
                        if($data->id_status_pengajuan ==1){
                          echo 
                          anchor(
                              base_url().$link_jenis_surat."/update_status/".$data->id_pengajuan."/2/".$data->id_jenis_pengajuan.urldecode($_SERVER['REQUEST_URI']), 
                              
                              $status[$data->id_status_pengajuan], array('class' => 'btn btn-block btn-success')
                              );//urlencode diganti decode 
                        }else if($data->id_status_pengajuan == 4)
                        {
                            echo 
                            anchor(
                                base_url().$link_jenis_surat."/terbitkan_surat/".$data->id_jenis_pengajuan."/".$data->id_pengajuan.urldecode($_SERVER['REQUEST_URI']), 
                                
                                $status[$data->id_status_pengajuan], array('class' => 'btn btn-block btn-success')
                              ); //urlencode diganti decode 
                        }
                        else if ($data->id_status_pengajuan == 5){
                          echo "Sudah diterbitkan";
                        }
                        else if ($data->id_status_pengajuan == 6){
                          echo "Ditolak";
                        }
                        ?>    
                      </td>
                  </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
=======
</div>
</div>
</div>
</div>
>>>>>>> 16c136fa1e9df364858d34f7381dd4bc31cfd477
