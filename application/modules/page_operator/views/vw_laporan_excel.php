 <?php
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");

 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
      	 <?php $i=1; foreach($data_baru as $row){ ?>
 			<tr>
 				<th colspan="7" align="center"><?php echo $row->nama_jenis_pengajuan; ?></th>
 			</tr>
 		<?php  } ?>
           <tr>
			 <th>No</th>  
			 <th>Jenis</th>  
			 <th>Bentuk</th>  
			 <th>Keterangan</th>  
			 <th>Ada(Y)</th>
			 <th>Tidak Ada(X)</th>  
			 <th>Sesuai</th>
			 <th>Tidak Sesuai</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($data_booking as $row):   ?>
 			
           <tr>
 
			   <td><?php echo $i;?></td>  
			   <td><?php echo $row->nama_kategori_jenis_peralatan;?></td>
			   <td><?php echo $row->nama_sub_kategori_jenis_peralatan;?></td>
			   <td><?php echo $row->nama_peralatan;?></td>
			   <?php $baru = $row->id_status_peralatan; 
		           	if($baru==1){
		           		$hasil = 'Y';
		           		echo '<td>'.$hasil.'</td><td></td>';
		           	}else{
		           		$hasil = 'X';
		           		echo '<td></td><td>'.$hasil.'</td>';
		           	} ?>
			     
			   
			   <td><?php //echo $row['check_out'];?></td>  
			   <td><?php //echo $row['number_guest'];?></td> 
		 
           </tr>
 
           <?php $i++; endforeach; ?>
 
      </tbody>
 
 </table>