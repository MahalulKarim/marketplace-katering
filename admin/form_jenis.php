<?php include "headerfooter/atas.php"
?>
<h3><i class="fa fa-plus"></i> Tambah Kategori</h3>
<hr style="border: 1px solid #417e9d;">
<div class="row mt text-center">

<div class="row">
  <div class="col-md-2 ml-4">
    
  </div>
    <div class="col-md-6  text-center">
    <div class="form-panel">
      <form action="simpan_jenis.php" class="form-horizontal style-form" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id_cs']; ?>">
        <div class="form-group">

          <div class="col-lg-10">
            <label>Username</label>
            <input class="form-control" type="text" value="<?php echo $data['username']; ?>" name="username">
          </div>

          <div class="col-lg-10">
            <label>Password</label>
            <input class="form-control " type="text" value="<?php echo $data['username']; ?>" name="password">
          </div>
        </div>
        <button type="submit" name="simpan_cs" class="btn btn-info">Tambah</button>
      </form>
    </div>
    <!-- /form-panel -->
  </div>
</div>

  <!-- /col-lg-12 -->
</div>
<?php include "headerfooter/bawah.php" ?>