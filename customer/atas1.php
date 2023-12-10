<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../f_login.php?pesan=belumlogin");
} 
include "../koneksi.php";
$username = $_SESSION['username'];
// cari user
$kode = "SELECT * FROM user WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/style01.css">
    <link rel="stylesheet" href="../asset/user/font/css/all.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-reboot.min.css">

    <link rel="stylesheet" type="text/css" href="../asset/user/datatbel/jquery.dataTables.min.css">

    <script src="../asset/user/js/jquery.js"></script>
    <script src="../asset/user/js/bootstrap.js"></script>

    <script src="../asset/user/js/popper.js"></script>

</head>

<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-orange fixed-top" style="background-color: #FFC82B;">
   <div class="container-fluid">
   <nav class="nav" >
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #FFC82B;">
    <img src="../asset/user/gambar/logo1.png" height="45" class="mr-5">

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
          
           <a class="btn btn-danger fa fa-shopping-cart pt-2" data-toggle="tooltip" data-placement="left" title="Chart" href="d_keranjang.php"></a>
           <a class="btn btn-danger fas fa-heart pt-2" data-toggle="tooltip" data-placement="left" title="Wishlist" href="d_wishlist.php"></a>
            <a class="btn btn-danger fas fa-comment pt-2" data-toggle="tooltip" data-placement="left" title="Pesan" href="chat.php"></a>
           <a class="btn btn-danger fa fa-headset pt-2" data-toggle="tooltip" data-placement="left" title="Hubungi Kami?" href="layanan_pelanggan.php"></a>

       </div>
      </div>



 
         
            
         <ul class="nav justify-content-end mr-4"> 
             <li class="nav-item dropdown mr-4">
              <a class="btn btn-outline-danger btn-sm dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i>
              </a>    
              <ul class="dropdown-menu dropdown-left" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="akun_saya.php">Akun</a></li>
                <li><a class="dropdown-item" href="d_pesanan_saya.php">Pesanan</a></li>

              
                <li><a class="dropdown-item" href="../logout.php">LogOut</a></li>
              </ul>
            </li>
       

              
      </ul>
    </div>
    </div>
  </nav>
  </nav>