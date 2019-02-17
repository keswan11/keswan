 
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
			  <div class="card">
                <div class="card-header card-header-primary">
                  <h1><?php echo $title;?></h1>
                </div>
                
				<div class="card-body">
                
					<small>

					<?php

					echo anchor('surat_izin/input/'.$id_jenis_pengajuan,'<i class="material-icons">add</i> Pengajuan','class="btn bg-green btn-round"');
					
					?>

					</small>
					<div class="card-header">
					</div>
					    <input type="text" name="id_jenis_pengajuan" hidden="true" value="<?php echo $id_jenis_pengajuan; ?>"></input>
						<input type="text" name="id_pengajuan" hidden="true" value="<?php echo $id_pengajuan; ?>"></input>
						<input type="text" name="id_member" hidden="true" value="<?php echo $id_member; ?>"></input>
						
						<?php
						  echo form_open_multipart('surat_izin/update','class="form-horizontal"');
						?>
				
				<div class="card-body">
                    <table id="tabel" style="width: 103%" class="table table-bordered table-hover" class="margin-bottom: 100px">
                      <thead class=" text-primary">
						  <tr>
							<td>Nama Member</td>
							<td>Jenis Pengajuan</td>
							<td>Wilayah</td>
							<td>Status Pengajuan</td>
							<td>Tanggal Dibuat</td>
							<td>Aksi</td>
						  </tr>
						</thead>
                    <tbody>
                    <?php
                    $i=1;
                    // <a href="'.base_url().'surat_izin/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">'.$i.'. Data ID '.$i.'</a>
                    foreach($data_list_surat_izin as $dsurat){
                      if ($dsurat->st_pengajuan == 0) {
                        $a = "Tersimpan";
                      }
                      elseif ($dsurat->st_pengajuan ==1) {
                        $a = "Terkirim";
                      }
                      elseif ($dsurat->st_pengajuan ==2) {
                        $a = "Terdisposisi";
                      }
                      elseif ($dsurat->st_pengajuan ==3) {
                        $a = "Terverifikasi Administrasi";
                      }
                      elseif ($dsurat->st_pengajuan ==4) {
                        $a = "Terverifikasi Lapangan";
                      }
                      elseif ($dsurat->st_pengajuan ==5) {
                        $a = "Diterbitkan";
                      }
                      elseif ($dsurat->st_pengajuan ==6) {
                        $a = "Ditolak";
                      }
                      if ($dsurat->id_status_pengajuan <1) {
                          $onclick="return confirm('Anda yakin ingin submit data ini ?')";
                          $status = '
                          
                          <a class="btn btn-info" href="'.base_url().'surat_izin/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">Detail</a>
                          
                          &nbsp;
                          '
                          
                          ;
                          
                          //Personal WNI WNA SURAT SIPP ATR PKB INSEMINATOR dan KESWAN
                          if($dsurat->id_jenis_pengajuan==7 || $dsurat->id_jenis_pengajuan==8 || $dsurat->id_jenis_pengajuan==9 || $dsurat->id_jenis_pengajuan==10 )
                          {
                              $status.='<a class="btn btn-info" href="'.base_url().'surat_izin/cetak/'.$dsurat->id_pengajuan.'">Cetak Surat Permohonan</a>';
                          }
                          
                          //Personal WNI ATAU WNA SIP DRH KUDA DAN SPESIALIS
                          elseif($dsurat->id_jenis_pengajuan==1 || $dsurat->id_jenis_pengajuan==2 || $dsurat->id_jenis_pengajuan==5 || $dsurat->id_jenis_pengajuan==6 || $dsurat->id_jenis_pengajuan==27 || $dsurat->id_jenis_pengajuan==28)
                          {
                              $status.='<a class="btn btn-info" href="'.base_url().'surat_izin/cetak_sip_drh/'.$dsurat->id_pengajuan.'">Cetak Surat Permohonan</a>';
                          }
                          
                          // Personal WNA WNI KONSULTASI
                          elseif($dsurat->id_jenis_pengajuan==3 || $dsurat->id_jenis_pengajuan==4)
                          {
                              $this->db->select('*');
                              $this->db->from('tb_data_sip');
                              $this->db->where('id_pengajuan', $dsurat->id_pengajuan);
                              $validasi = $this->db->get();
                              if($validasi->num_rows() > 0)
                              {
                                $status.='<a class="btn btn-info" href="'.base_url().'surat_izin/cetak_sip_drh_konsultasi/'.$dsurat->id_pengajuan.'">Cetak Surat Permohonan</a>';
                              }
                              else
                              {
                                  $status.='<a class="btn btn-info" href="'.base_url().'surat_izin/lengkapi_drh_konsultasi/'.$dsurat->id_pengajuan.'">Lengkapi Permohonan</a>';
                              }
                                  
                          }

                          //SIVET PERMOHONAN ATR KH HK RSH
                          elseif($dsurat->id_jenis_pengajuan==19 || $dsurat->id_jenis_pengajuan==20 || $dsurat->id_jenis_pengajuan==21 || $dsurat->id_jenis_pengajuan==22 || $dsurat->id_jenis_pengajuan==23 || $dsurat->id_jenis_pengajuan==24 || $dsurat->id_jenis_pengajuan==35 || $dsurat->id_jenis_pengajuan==36)
                          {
                              $status.='<a class="btn btn-info" href="'.base_url().'surat_izin/cetak_sivet/'.$dsurat->id_pengajuan.'">Cetak Surat Permohonan</a>';
                          }
                          
                          
                          $status.='&nbsp;
                          
                          <a class="btn btn-warning" href="'.base_url().'surat_izin/edit/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">Edit</a>';
                          
                          
                          
                          
                          
                      }
                      elseif($dsurat->id_status_pengajuan >= 5)
                      {
                          $status = '
                          &nbsp;
                          <a  class="btn btn-info" href="'.base_url().'surat_izin/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">Detail</a>';
                      }
                      else
                      {
                          $status = '
                          &nbsp;
                          <a  class="btn btn-info" href="'.base_url().'surat_izin/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">Detail</a>';
                      }
                      
                    echo '<tr>
                    <td>'.$dsurat->isi_biodata_member.'</td>
                    <td>'.$dsurat->nama_jenis_pengajuan.'</td>
                    <td>'.$dsurat->nama_wilayah.'</td>
                    <td>'.$a.'</td>
                     <td>'.$dsurat->tgl.'</td>
                     <td>'.$status.'</td>
                    </tr>';
					$i++;}?>
                  
					<!-- anchor(site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$id_pengajuan), "Submit", array("class" => "btn  btn-success")).'
                     '.anchor(site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$id_pengajuan), "Cetak", array("class" => "btn  btn-primary")) -->
					</tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>
            </div>
            
			
          </div>
        </div>
      
      