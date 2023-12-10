<?php 
include "headerfooter/atas.php";

?>

        <h3  style="font-family: Arial Black;" ><p class="fa fa-dashboard"></p> Dashboard</h3>
        <div class="pull-right">
       <!--  <form method="get" action="index_admin.php">
          <input type="text" name="nama" placeholder="Cari">
          <button type="submit" name="cari" class="btn btn-default btn-sm fa fa-search"></button><br>
        </form> -->
        
        </div>
        <div class="pull-right">
          <div class="pt-3">
            
          </div>
        </div>
        
        <div  class="mt-5">
          <hr style="border: 1px solid #417e9d;width: 100%;">
          </div>
           <div class="row mt">
          <div class="col-lg-12">
          <h4>Selamat datang <?php echo $_SESSION['username'];?></h4>
          </div>
        </div>

           <div class="row mt">
            
            
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                 <div class="panel-body">
                  <h4>Pengguna</h4>
                  <h3 class="fa fa-users fa-3x"></h3>
                  <?php
                    include "koneksi.php";
                    $query="SELECT * FROM `user` WHERE type_user !='admin'";
                    $result=mysqli_query($db,$query);
                    $jumlah_pengguna = mysqli_num_rows($result);
                  ?>
                  <p class="text center"><?php echo $jumlah_pengguna;?> User</p>
                </div>
              </div>
            </div>

                 <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Toko</h4>
                  <h3 class="fa fa-cutlery fa-3x"></h3>
                  <?php
                    $query="SELECT * FROM `user` WHERE type_user='penjual'";
                    $result=mysqli_query($db,$query);
                    $jumlah_penjual = mysqli_num_rows($result);
                  ?>
                  <p class="text center"><?php echo $jumlah_penjual;?> User</p>
                </div>
              </div>

            </div>
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Pembeli</h4>
                   <?php
                    $query="SELECT * FROM `user` WHERE type_user='pembeli'";
                    $result=mysqli_query($db,$query);
                    $jumlah_pembeli = mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-shopping-cart fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_pembeli;?> User</p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Aktif</h4>
                   <?php
                    $query="SELECT * FROM `user` WHERE status='aktif'";
                    $result=mysqli_query($db,$query);
                    $jumlah_user_aktif = mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-user fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_user_aktif;?> User</p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Banned</h4>
                   <?php
                    $query="SELECT * FROM `user` WHERE status='non aktif'";
                    $result=mysqli_query($db,$query);
                    $jumlah_user_nonaktif = mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-ban fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_user_nonaktif;?> User</p>
                </div>
              </div>
            </div>
             <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Menu</h4>
                   <?php
                    $query="SELECT * FROM `menu`";
                    $result=mysqli_query($db,$query);
                    $jumlah_produk= mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-th fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_produk;?> menu</p>
                </div>
              </div>
            </div>
             <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Komplain</h4>
                   <?php
                    $query="SELECT * FROM `komplain`";
                    $result=mysqli_query($db,$query);
                    $jumlah_komplain= mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-exclamation-triangle fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_komplain;?> komplain</p>
                </div>
              </div>
            </div>
             <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Pemesanan</h4>
                   <?php
                    $query="SELECT * FROM `pemesanan`";
                    $result=mysqli_query($db,$query);
                    $jumlah_pemesanan= mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-stack-overflow fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_pemesanan;?> pesanan</p>
                </div>
              </div>
            </div>
              <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h4>Pembayaran</h4>
                   <?php
                    $query="SELECT * FROM `pembayaran`";
                    $result=mysqli_query($db,$query);
                    $jumlah_pembayaran= mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-money fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_pembayaran;?> pembayaran</p>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h5><b>Pesan</b></h5>
                   <?php
                    $query="SELECT * FROM `chatroom`";
                    $result=mysqli_query($db,$query);
                    $jumlah_pesan= mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-comments-o fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_pesan;?> Pesan</p>
                </div>
              </div>
            </div>
             <div class="col-md-2 col-sm-2 mb">
              <div class="panel darkblue-panel">
                <div class="panel-body">
                  <h5><b>Bank</b></h5>
                   <?php
                    $query="SELECT * FROM `bank`";
                    $result=mysqli_query($db,$query);
                    $jumlah_bank= mysqli_num_rows($result);
                  ?>
                  <h3 class="fa fa-bank fa-3x"></h3>
                  <p class="text center"><?php echo $jumlah_bank;?> Bank</p>
                </div>
              </div>
            </div>
          </div>
<?php include 'headerfooter/bawah.php'?>