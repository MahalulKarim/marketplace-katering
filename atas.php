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
    <link rel="stylesheet" type="text/css" href="asset/user/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/user/css/style01.css">
    <link rel="stylesheet" href="asset/user/font/css/all.css">
    <link rel="stylesheet" type="text/css" href="asset/user/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="aseet/user/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="asset/user/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="asset/user/css/bootstrap-reboot.min.css">

    <link rel="stylesheet" type="text/css" href="asset/user/datatbel/jquery.dataTables.min.css">

    <script src="asset/user/js/jquery.js"></script>
    <script src="asset/user/js/bootstrap.js"></script>

    <script src="asset/user/js/popper.js"></script>

</head>

<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-orange fixed-top" style="background-color: #FFC82B;height:85px;">
   <div class="container-fluid">
   <nav class="nav" >
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #FFC82B;">
    <img src="asset/user/gambar/logo1.png" height="45" class="mr-5">

      <a class="nav-link" href="index.php">HOME</a>
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
      <form class="row g-4" action="d_menu.php" method="GET">
        <div class="col-auto">
          <input type="text" class="form-control form-control-sm" placeholder="Cari Menu.." name="cari" required>
        </div>
        <div class="col-auto">
          <button type="submit" name="kirim" class="btn btn-success fa fa-search pt-2"></button>
        </div>
      </form>

      <div class="col-auto">
          <div class="btn-group" role="group" aria-label="Basic example">
          
           <a class="btn btn-danger fas fa-sign-in-alt pt-2" data-toggle="tooltip" data-placement="left" title="Login" href="f_login.php"></a>
           <a class="btn btn-danger fas fa-user fa-lg pt-2" data-toggle="modal" data-placement="left" title="Daftar" href="#daftar"></a>
       </div>
      </div>

    </ul>
    </div>
    </div>
  </nav>
   <div class="modal" tabindex="-1" id="daftar">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Daftar Sebagai</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                  <!-- MENCARI DETAIL menu -->
                   
<!-- MENAMPILKAN DETAIL menu -->
                  
                  <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                    <a href="retail/f_daftar.php" class="btn btn-primary btn-sm">Penjual</a>
                    <a href="customer/f_daftar.php" class="btn btn-info btn-sm ml-3">Pembeli</a>
                    </div>                                  
                  </div>
                </div>
              </div>
             
              </div>
            </div>
      </div>