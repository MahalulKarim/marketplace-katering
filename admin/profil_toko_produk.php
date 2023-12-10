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
 <div class="row mt">
  <table width="70%" align="center">
    <tr>
      <td ><img src="web/gambar/toko/fototoko/<?php echo $data['foto']?>" height="200" width="100%"></td>
    </tr>
  </table>
  <div class="col md-10">
  	<h3 class="text-center"><?php echo $data['username'];?></h3>
  	<div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li>
                    <a data-toggle="tab" href="#kontak">Profil Toko</a>
                  </li>
                  <li class="active">
                    <a data-toggle="tab" href="#edit">Produk</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="kontak" class="tab-pane">
                    <div class="row">
                      <div class="col-md-6">
                      </div>
                      <!-- /col-md-6 -->

                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4>Data Toko</h4>
                        <a href="form_banned.php?id=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i> Bekukan Akun</a>
                        <div class="col-md-8 col-md-offset-2 mt">

                           <?php                          
                          $query="SELECT * FROM `user` WHERE id_user='$id' AND status='Aktif'";
                          $result=mysqli_query($db,$query);
                          $data=mysqli_fetch_array($result);
                          if(mysqli_num_rows($result) <1 ){
                              die("Data Tidak Ditemukan..");
                          }
                          ?>
                        	<p>
                        		Status <?php echo $data['status']?> <i class="fa fa-check "> </i>
                        	</p>
                          <p>
                            Alamat<br/><?php echo $data['alamat']?><br/>.
                          </p>
                          <br>
                          <p>
                           Hp/Wa <br/><?php echo $data['no_hp']?><br/>.
                          </p>
                          <p>
                           Email <br/><?php echo $data['email']?><br/>.
                          </p>
                        </div>
                        
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane active">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Produk</h4>
                        <div class="content-panel ml-2 p-2">
					       <table id="dt" class="display" cellspacing="0" width="100%" border="1">
					        <thead>
					            <tr>
					                <th>Foto</th>
					                <th>Nama Paket</th>
					                <th>Deskripsi</th>
					                <th>Harga</th>
					            </tr>
					        </thead>
					        
					    <tbody>
                 <?php 
                      $query="SELECT * FROM `produk` WHERE id_user='$id'";
                      $result=mysqli_query($db,$query);
                      $no=1;
                      while ($data=mysqli_fetch_array($result)){
                    ?>
					        <tr>
					          <td align="center"><img src="img/produk/produk02.jpg" class="img-circle" width="50"></td>
					          <td align="center"><?php echo $data['nama_produk'];?></td>
                    <td align="center"><?php echo $data['deskripsi'];?></td>
                    <td align="center"><?php echo $data['harga'];?></td>>
					        </tr>	
                    <?php } ?>				        
					    </tbody>
					   
					  </table>
					            </div>
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
  </div>
         
<?php include "headerfooter/bawah.php"?>