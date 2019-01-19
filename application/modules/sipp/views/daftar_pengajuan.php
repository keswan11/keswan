<html>
<head>
	<title>Download PDF</title>
</head>
<body>

<table border="1" align="center" width="100%">

<tr>
	<td>No</td>
	<td>Nama Member</td>
	<td>Jenis Pengajuan</td>
	<td>Wilayah</td>
	<td>Status Pengajuan</td>
	<td>Aksi</td>
</tr>

<?php $no = 1 ; if (!empty($data_pengajuan)) {
	foreach ($data_pengajuan as $r) :?>
	<?php 
	// Validasi Data SIPP
	$id_jenis_pengajuan = $r->id_jenis_pengajuan;
	$id_member = $r->id_member;
	$id_pengajuan = $r->id_pengajuan;
	$this->db->select('*');
	$this->db->from('tb_data_sipp');
	$this->db->where('id_jenis_pengajuan', $id_jenis_pengajuan);
	$this->db->where('id_member' , $id_member);
	$this->db->where('id_pengajuan' , $id_pengajuan);
	$valid = $this->db->get();
	?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $r->isi_biodata_member;?></td>
			<td><?php echo $r->nama_jenis_pengajuan;?></td>
			<td><?php echo $r->nama_wilayah;?></td>
			<td><?php echo $r->status_pengajuan;?></td>
			<td>
				<?php
					if($r->id_jenis_pengajuan == 7){
						if($valid->num_rows() == 0){
							echo'<a href="'.base_url().'sipp/Sipp/detail/'.$r->id_pengajuan.'"><button>Detail</button></a>';
						}else{
							echo'<a href="'.base_url().'Sipp/cetak/'.$r->id_pengajuan.'"><button>Cetak</button></a>';
						}
					}elseif ($r->id_jenis_pengajuan == 8) {
						if($valid->num_rows() == 0){
							echo'<a href="'.base_url().'Sipp/detail/'.$r->id_pengajuan.'"><button>Detail</button></a>';
						}else{
							echo'<a href="'.base_url().'Sipp/cetak/'.$r->id_pengajuan.'"><button>Cetak</button></a>';
						}
					}elseif ($r->id_jenis_pengajuan == 9) {
						if($valid->num_rows() == 0){
							echo'<a href="'.base_url().'Sipp/detail/'.$r->id_pengajuan.'"><button>Detail</button></a>';
						}else{
							echo'<a href="'.base_url().'Sipp/cetak/'.$r->id_pengajuan.'"><button>Cetak</button></a>';
						}
					}elseif ($r->id_jenis_pengajuan == 10) {
						if($valid->num_rows() == 0){
							echo'<a href="'.base_url().'Sipp/detail/'.$r->id_pengajuan.'"><button>Detail</button></a>';
						}else{
							echo'<a href="'.base_url().'Sipp/cetak/'.$r->id_pengajuan.'"><button>Cetak</button></a>';
						}
					}elseif ($r->id_jenis_pengajuan == 1) {
						echo '<a href="#"><button>Cetak</button></a>';
					}elseif ($r->id_jenis_pengajuan == 2) {
						echo '<a href="#"><button>Cetak</button></a>';
					}elseif ($r->id_jenis_pengajuan == 3) {
						echo '<a href="#"><button>Cetak</button></a>';
					}elseif ($r->id_jenis_pengajuan == 4) {
						echo '<a href="#"><button>Cetak</button></a>';
					}elseif ($r->id_jenis_pengajuan == 5) {
						echo '<a href="#"><button>Cetak</button></a>';
					}elseif ($r->id_jenis_pengajuan == 6) {
						echo '<a href="#"><button>Cetak</button></a>';
					}
				 ?>
			</td>
		</tr>

<?php $no++;  endforeach;}?>

</table>

</body>
</html>