<?php include "headerfooter/atas.php"; 
include "koneksi.php";
if( !isset($_GET['id'])){
    header('location:paketmakanan.php');
}
$id =$_GET['id'];

$query="SELECT * FROM `user` WHERE id_user='$id'";
$result=mysqli_query($db,$query);
$data=mysqli_fetch_array($result);
if(mysqli_num_rows($result) <1 ){
    die("Data Tidak Ditemukan..");
}
?>
      
    <div class="col-lg-12 mt">
            <div class="row content-panel">
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="kontak" class="tab-pane active">
                    <div class="row">
                      <div class="col-lg-12">
            <div class="row content-panel">
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3><?php echo $data['nama'];?></h3>
                
                <br>
                <p>
                     <a href="form_banned_pembeli.php?id=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i> Banned Akun</a>
                  </p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="../asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" class="img-circle"></p>
                  

                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
                      <div class="col-md-6">
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <div class="col-md-8 col-md-offset-2 mt">
                          <h4>Detail Profil</h4>
                           <?php                          
                          $query="SELECT * FROM `user` WHERE id_user='$id' AND status='aktif'";
                          $result=mysqli_query($db,$query);
                          $data=mysqli_fetch_array($result);
                          if(mysqli_num_rows($result) <1 ){
                              die("Data Tidak Ditemukan..");
                          }
                          ?>
                          <p>
                            Status :<?php echo $data['status']?> <i class="fa fa-check "> </i>
                          </p>
                          <p>
                            Alamat :<?php echo $data['alamat']?>
                          </p>
                          <p>
                           Hp/Wa :<?php echo $data['no_hp']?>
                          </p>
                          <p>
                           Email :<br/><?php echo $data['email']?>
                          </p>
                        </div>
                        
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
          <!-- /row -->
        </div>
<?php include 'headerfooter/bawah.php'?>