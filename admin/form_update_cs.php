<?php include "headerfooter/atas_cs.php";
include "koneksi.php";
$query="SELECT * FROM `customer_service` WHERE id_cs='1'";
$result=mysqli_query($db,$query);
$data=mysqli_fetch_array($result);
?>
<h3><i class="fa fa-cog"></i> Ubah Username/Password</h3>
  <hr style="border: 1px solid #417e9d;">
        <div class="row mt">
         

       
            <div class="form-panel">
              <form action="simpan_edit_admin.php" class="form-horizontal style-form" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id_admin'];?>" readonly>
                <div class="form-group">
                  <label class="control-label col-md-3">Username</label>
                  <div class="col-md-3">
                    <input class="form-control " type="text" value="<?php echo $data['username'];?>" name="username">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-3">
                    <input class="form-control " type="Password" value="<?php echo $data['username'];?>" name="password">
                  </div>
                </div>
                <button type="submit" name="simpan_cs" class="btn btn-info" onclick="return confirm('Anda akan diarahkan ke halaman login kembali!.')">Ubah</button>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
<?php include "headerfooter/bawah.php"?>