<!-- Main Content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Form Surat Izin
   </div>
   <div class="box-body">
      <?php
	  $i=1;
	  foreach($data_surat_izin as $dsurat){
		echo '<a href="'.base_url().'surat_izin/input/'.$dsurat->id_jenis_pengajuan.'">'.$i.'. '.$dsurat->nama_jenis_pengajuan.'</a><br>';
	$i++;}?>
    </div>
</div>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Data Detail Surat Izin Terinput
 </div>
 <div class="box-body">
    <?php
  $i=1;
  foreach($data_list_surat_izin as $dsurat){
  echo '<a href="'.base_url().'surat_izin/detail/'.$dsurat->id_jenis_pengajuan.'/'.$dsurat->id_pengajuan.'">'.$i.'. Data ID '.$i.'</a><br>';
$i++;}?>
  </div>
</div>
</div>
