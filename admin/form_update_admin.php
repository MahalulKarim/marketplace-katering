<?php include "headerfooter/atas.php";
include "koneksi.php";
$username = $_SESSION['username'];

$query="SELECT * FROM `user` WHERE username='$username'";
$result=mysqli_query($db,$query);
$data=mysqli_fetch_array($result);
?>
<h3><i class="fa fa-cog"></i> Ubah Username/Password</h3>
  <hr style="border: 1px solid #417e9d;">
        <div class="row">
           <div class="col-md-2  text-center">
           </div>
         

          <div class="col-md-6  text-center">
            <div class="form-panel">
              <form action="simpan_edit_admin.php" class="form-horizontal style-form" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id_user'];?>" readonly>
                <div class="col-md-12">
                  <div class="col-md-12 col-xs-11">
                  <label class="control-label col-md-3">Username</label>
                  
                    <input class="form-control " type="text" value="<?php echo $data['username'];?>" name="username" required>
                  </div>
                  <div class="col-md-12 col-xs-11">
                  <label class="control-label col-md-3">Password</label>
                  
                    <input class="form-control " type="Password" value="<?php echo $data['username'];?>" name="password" required>
                    <br>
                  </div>
                </div>

                <button type="submit" name="simpan" class="btn btn-info p-4" >Ubah</button>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
       
<?php include "headerfooter/bawah.php"?>