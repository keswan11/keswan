<section class="content-header">
  <h1>
    <?php echo $title; ?>
  </h1>
</section>
<section class="content">
  <div class="col-xs-12">
    <div class="box">
     <?php 
     if ($this->uri->segment(2) == "operator_pusat_edit") {
       echo form_open('operator/operator_pusat_edit', array('class' => 'form-horizontal'));
     } else if ($this->uri->segment(2) == "operator_provinsi_edit"){
      echo form_open('operator/operator_provinsi_edit', array('class' => 'form-horizontal'));
    } else if ($this->uri->segment(2) == "operator_kab_kota_edit"){
      echo form_open('operator/operator_kab_kota_edit', array('class' => 'form-horizontal'));
    } 
    ?>
    <input type="hidden" name="id_operator" value="<?php echo $operator['id_operator'] ?>">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Role operator</label>
        <div class="col-sm-10">
          <select name="id_role_operator" class="form-control select2">
            <?php foreach ($role_operator as $rp) {
              echo "<option value='$rp->id_role_operator'";
              echo $operator['id_role_operator']==$rp->id_role_operator?'selected':'';
              echo ">$rp->nama_role_operator</option>";
            } 
            ?>
          </select>
        </div>
      </div>
      <?php 
      if ($this->uri->segment(2) == "operator_pusat_tambah" || $this->uri->segment(2) == "operator_pusat_edit") {
        echo '<input type="hidden" name="id_wilayah_operator" value="1">';
      } else if ($this->uri->segment(2) == "operator_provinsi_tambah" || $this->uri->segment(2) == "operator_provinsi_edit") {
        ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Provinsi</label>
          <div class="col-sm-10">
            <select name="id_wilayah_operator" class="form-control select2">
              <?php foreach ($provinsi as $p) {
                echo "<option value='$p->id_provinsi'";
                echo $operator['id_wilayah_operator']==$p->id_provinsi?'selected':'';
                echo ">$p->nama</option>";
              } ?>
            </select>
          </div>
        </div>
        <?php
      } else if ($this->uri->segment(2) == "operator_kab_kota_tambah" || $this->uri->segment(2) == "operator_kab_kota_edit") {
        ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Kabupaten / kota</label>
          <div class="col-sm-10">
            <select name="id_wilayah_operator" class="form-control select2">
              <?php foreach ($kab_kota as $kk) {
                echo "<option value='$kk->id_kabupaten'";
                echo $operator['id_wilayah_operator']==$kk->id_kabupaten?'selected':'';
                echo ">$kk->nama</option>";
              } ?>
            </select>
          </div>
        </div>
        <?php
      }
      ?>
      <div class="form-group">
        <label for="password_operator" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password_operator" class="form-control" id="password_operator" placeholder="Kosongkan bila tidak diganti">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <?php
          $status = array('Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif');
          echo form_dropdown('status', $status, $operator['status'], array('class'=>'form-control')); 
          ?>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="reset" class="btn btn-default">Ulang</button>
      <button type="submit" name="submit" class="btn btn-info pull-right">Simpan</button>
    </div>
  </form>
</div>
</div>
</section>
