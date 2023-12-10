<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style01.css">
    <link rel="stylesheet" href="font/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">

    <link rel="stylesheet" type="text/css" href="datatbel/jquery.dataTables.min.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>

</head>

<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-orange fixed-top" style="background-color: #FFC82B;">
   <div class="container-fluid">
   <nav class="nav" >
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #FFC82B;">
    <img src="gambar/logo1.png" height="45" class="mr-5">

      <a class="nav-link" href="indexlogin.php">HOME</a>
      <a class="nav-link" href="d_menu.php">MENU</a>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
            KATEGORI
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="d_prasmanan.php">Prasmanan</a></li>
            <li><a class="dropdown-item" href="d_nasikotak.php">Nasi Kotak</a></li>
            <li><a class="dropdown-item" href="d_nasitumpeng.php">Tumpeng</a></li>
            <li><a class="dropdown-item" href="d_snack.php">Snack</a></li>
            <li><a class="dropdown-item" href="d_lainya.php">Lainya</a></li>
          </ul>
        </li>
       <a class="nav-link" href="d_catering.php">CATERING</a>

       

      <a class="nav-link" href="cara_pesan.php">CARA PESAN</a>

    
  </nav>

    <ul class="nav justify-content-end mr-4">
      <form class="row g-3" action="d_menu.php" method="GET">
        <div class="col-auto">
          <input type="text" class="form-control form-control-sm" placeholder="Cari" name="cari" required>
        </div>
        <div class="col-auto">
          <button type="submit" name="kirim" class="btn btn-success fa fa-search pt-2"></button>
        </div>
      </form>

      <div class="col-auto">
          <div class="btn-group" role="group" aria-label="Basic example">
          
           <a class="btn btn-danger fas fa-sign-in-alt pt-2" data-toggle="tooltip" data-placement="left" title="Login" href="f_login.php"></a>
           <a class="btn btn-danger fas fa-user fa-lg pt-2" data-toggle="tooltip" data-placement="left" title="Daftar" href="../f_login.php#daftar"></a>
       </div>
      </div>

    </ul>
    </div>
    </div>
  </nav>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-2 mb-5">
     <div id="demo" class="carousel slide " data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>

                <li data-target="#demo" data-slide-to="3"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                    <img src="assets/img/slide1.png" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Selamat Datang di AllCatering</h3>
                        <p>Temukan catering yang anda butuhkan hanya di allCatering!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slide1.png" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Catering Lengkap</h3>
                        <p>Paket lengkap yang kamu butuhkan</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slide2.png" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Jelajah Lebih</h3>
                        <p>Cari lebih banyak paket catering</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="assets/img/slide3.png" alt="Slide1" width="100%" height="100%">
                    <div class="carousel-caption">
                        <h3>Pesan</h3>
                        <p>Pesan dengan cara yang simple</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
  <hr style="border: 1px solid #FFC82B;">
  <h4 class="text-center pt-2">PRASMANAN</h4>
 
  <div class="row mx-auto">
    <?php 
            


        $query="SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND p.id_jenis=j.id_jenis AND j.jenis='Prasmanan' AND u.type_user='penjual'";
        
        $result=mysqli_query($db,$query); 
        for ($i = 0; $i <= 0; $i++) {
                $data = mysqli_fetch_array($result) ?>


          
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">
                   
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title"><b><?php echo $data['nama_menu'] ?></b></p>
                            <p class="card-text ">Rp. <?php echo number_format($data['harga'])?></p>
                             <div class="row mb-2">
                                 <div class="col-md-6">
                                    <form method="POST" action="f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                       <div class="btn-group pt-2">
                                         <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>
                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm " data-target="#menu1<?php echo $data['id_menu']; ?>" data-toggle="modal">Detail</a>
                                       </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                    </div>
                   
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->


    <div class="modal" tabindex="-1" id="menu1<?php echo $data['id_menu'];?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail menu</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">

                   <?php
                        $id = $data['id_menu']; 

                        $query1="SELECT pr.*,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>

                  <div class="col-md-5">
                    <img src="gambar/toko/menu/<?php echo $data1['gambar']?>" class="card-img-top" >
                  </div>
                  <div class="col-md-6">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Menu</th>
                          <td><?php echo $data1['nama_menu']?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?php echo number_format($data1['harga'])?> Per Box/Paket</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?php  echo
                                        nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));?></td>
                        </tr>
                        
                      </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
              </div>
            </div>
      </div>
  
      <?php } ?>


        
  </div>
    <p class="text-center pt-4"><a href="d_prasmanan.php" class="btn btn-success sm">Tampilkan Lebih Banyak &raquo;</a></p>

<hr style="border: 1px solid #FFC82B;">
  <h4 class="text-center pt-2 mt-2">SNACK</h4>
  <div class="row mx-auto">
    <?php 

          $query="SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND p.id_jenis=j.id_jenis AND j.jenis='Snack' AND u.type_user='penjual'";
        $result=mysqli_query($db,$query); 
        for ($i = 0; $i <= 0; $i++) {
                $data = mysqli_fetch_array($result) ?>


<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">
                   
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title"><b><?php echo $data['nama_menu'] ?></b></p>
                            <p class="card-text ">Rp. <?php echo number_format($data['harga'])?></p>
                            <div class="row mb-2">
                                 <div class="col-md-6">
                                    <form method="POST" action="f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                       <div class="btn-group pt-2">
                                         <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>
                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm " data-target="#menu1<?php echo $data['id_menu']; ?>" data-toggle="modal">Detail</a>
                                       </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                    </div>
                   
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
                
    <div class="modal" tabindex="-1" id="menu1<?php echo $data['id_menu'];?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail menu</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">

                   <?php
                        $id = $data['id_menu']; 

                        $query1="SELECT pr.*,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>

                  <div class="col-md-5">
                    <img src="gambar/toko/menu/<?php echo $data1['gambar']?>" class="card-img-top" >
                  </div>
                  <div class="col-md-6">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Menu</th>
                          <td><?php echo $data1['nama_menu']?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?php echo number_format($data1['harga'])?> Per Box/Paket</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?php  echo
                                        nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));?></td>
                        </tr>
                        
                      </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
              </div>
            </div>
      </div>
  
      <?php } ?>


        
  </div>
    <p class="text-center pt-4"><a href="d_snack.php" class="btn btn-success sm">Tampilkan Lebih Banyak &raquo;</a></p>

<hr style="border: 1px solid #FFC82B;">
  <h4 class="text-center pt-2 mt-2">NASI KOTAK</h4>
  <div class="row mx-auto">
    <?php 

          $query="SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND p.id_jenis=j.id_jenis AND j.jenis='Nasi Box' AND u.type_user='penjual'";
        $result=mysqli_query($db,$query); 
        for ($i = 0; $i <= 0; $i++) {
                $data = mysqli_fetch_array($result) ?>


        
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">
                   
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title"><b><?php echo $data['nama_menu'] ?></b></p>
                            <p class="card-text ">Rp. <?php echo number_format($data['harga'])?></p>
                            <div class="row mb-2">
                                 <div class="col-md-6">
                                    <form method="POST" action="f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                       <div class="btn-group pt-2">
                                         <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>
                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm " data-target="#menu1<?php echo $data['id_menu']; ?>" data-toggle="modal">Detail</a>
                                       </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                    </div>
                   
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->

                
    <div class="modal" tabindex="-1" id="menu1<?php echo $data['id_menu'];?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail menu</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">

                   <?php
                        $id = $data['id_menu']; 

                        $query1="SELECT pr.*,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>

                  <div class="col-md-5">
                    <img src="gambar/toko/menu/<?php echo $data1['gambar']?>" class="card-img-top" >
                  </div>
                  <div class="col-md-6">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Menu</th>
                          <td><?php echo $data1['nama_menu']?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?php echo number_format($data1['harga'])?> Per Box/Paket</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?php  echo
                                        nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));?></td>
                        </tr>
                        
                      </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
              </div>
            </div>
      </div>
  
      <?php } ?>


        
  </div>
    <p class="text-center pt-4"><a href="d_nasikotak.php" class="btn btn-success sm">Tampilkan Lebih Banyak &raquo;</a></p>
      
    
<hr style="border: 1px solid #FFC82B;">
  <h4 class="text-center pt-2 mt-2">TUMPENG</h4>
  <div class="row mx-auto">
    <?php 

          $query="SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND p.id_jenis=j.id_jenis AND j.jenis='Tumpeng' AND u.type_user='penjual'";
        $result=mysqli_query($db,$query); 
        for ($i = 0; $i <= 0; $i++) {
                $data = mysqli_fetch_array($result) ?>


       
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">
                   
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title"><b><?php echo $data['nama_menu'] ?></b></p>
                            <p class="card-text ">Rp. <?php echo number_format($data['harga'])?></p>
                              <div class="row mb-2">
                                 <div class="col-md-6">
                                    <form method="POST" action="f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                       <div class="btn-group pt-2">
                                         <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>
                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm " data-target="#menu1<?php echo $data['id_menu']; ?>" data-toggle="modal">Detail</a>
                                       </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                    </div>
                   
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
                
    <div class="modal" tabindex="-1" id="menu1<?php echo $data['id_menu'];?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail menu</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">

                   <?php
                        $id = $data['id_menu']; 

                        $query1="SELECT pr.*,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>

                  <div class="col-md-5">
                    <img src="gambar/toko/menu/<?php echo $data1['gambar']?>" class="card-img-top" >
                  </div>
                  <div class="col-md-6">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Menu</th>
                          <td><?php echo $data1['nama_menu']?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?php echo number_format($data1['harga'])?> Per Box/Paket</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?php  echo
                                        nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));?></td>
                        </tr>
                        
                      </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
              </div>
            </div>
      </div>
  
      <?php } ?>


        
  </div>
    <p class="text-center pt-4"><a href="d_nasitumpeng.php" class="btn btn-success sm">Tampilkan Lebih Banyak &raquo;</a></p>
     <p class="text-center pt-4"><a href="d_lainya.php" class="btn btn-success sm">Menu Lainya &raquo;</a></p>
    </div>
    <footer class="text-white p-5" style="background-color: #FCB900;">
        <div class="row">
            <div class="col-md-3">
                <h5>TENTANG KAMI</h5>
                <ul>
                    <li style='list-style-type: none;'>Tentang Marketplace Katering</li>
                </ul>
            </div>
        <div class="col-md-3">
          <h5></h5>
          <ul>
            <li style='list-style-type: none;'></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5></h5>
          <ul>
            <li style='list-style-type: none;'></li>
          </ul>
        </div>
            <div class="col-md-3">

                <h5>SOSIAL MEDIA KAMI</h5>
                <ul>
             <style type="text/css">
            .a{
              color: white;
            }
          </style>
          <li  style='list-style-type: none; color: white;'>
            <a href="" style="color: white; text-decoration: none;"><i class="fab fa-instagram"></i> instagram
            </a>
          </li>
           <li  style='list-style-type: none; color: white;'>
                    <a href="" style="color: white; text-decoration: none;"><i class="fab fa-facebook"></i> facebook</a>
          </li>
                    <li style='list-style-type: none;'><i class="fab fa-whatsapp"></i> whatsapp</li>
                </ul>
            </div>
        </div>
        <p class="text-center mt-4">&copy; Copyright 2021 All Right Reserved</p>
    </footer>
</body>
</html>