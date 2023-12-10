<?php
session_start();
    if($_SESSION['status']!="login"){
        header("location:index.php?pesan=belumlogin");
    }?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin Page Catering Marketplace</title>

  <!-- Favicons -->
  <link href="img/fafi.png" rel="icon">
  <link rel="stylesheet" type="text/css" href="css/stylecardproduk.css">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="lib/font-awesome/css/fontawesome.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="css/datatabel/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/style01.css">

  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  
  
</head>

<body>
  <section id="container">
    
    <!--header start-->
    <header class="header bg-theme05">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips"style="color: white;" data-placement="right" data-original-title="Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index_admin.php" class="logo"><b>AdminPage<span></span></b></a>
      <!--logo end-->
       <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" target="_blank"href="../index.php">Kunjungi Situs</a></li>
        </ul>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php">Logout<i class="fa"></i></a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <!-- <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Alex Dino</h5> -->
          <li class="mt">
            <a class="active" href="index_admin.php">
              <i class="fa fa-dashboard ikon"></i>
              <span>Dashboard</span>
              </a>
          </li>
         <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Menu</span>
              </a>
            <ul class="sub">
              <li> <a href="produk.php">Menu</a></li>
              <li><a href="data_jenis.php">Jenis</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>Pengguna</span>
              </a>
            <ul class="sub">
              <li><a href="data_toko.php">Penjual</a></li>
              <li><a href="data_pembeli.php">Pembeli</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="laporan.php">
              <i class="fa fa-exclamation-triangle"></i>
              <span>Komplain</span>
              </a>
          </li>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-ban"></i>
              <span>Banned Akun</span>
            </a>
               <ul class="sub">
              <li><a href="data_banned_toko.php">Penjual</a></li>
              <li><a href="data_baned_pembeli.php">Pembeli</a></li>
            </ul>
            </li>
            <li class="sub-menu">
            <a href="data_pemesanan.php">
              <i class="fa fa-cubes"></i>
              <span>Pemesanan</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-money"></i>
              <span>Pembayaran</span>
              </a>
               <ul class="sub">
              <li><a href="data_pembayaran_masuk.php">Pembayaran Masuk</a></li>
              <li><a href="data_pembayaran.php">Pembayaran Keluar</a></li>
            </ul>
              
          </li>
                      <li class="sub-menu">
            <a href="data_pesan.php">
              <i class="fa fa-comments-o"></i>
              <span>Pesan</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="data_bank.php">
              <i class="fa fa-bank"></i>
              <span>Bank</span>
              </a>
          </li>
            <li class="sub-menu">
            <a href="form_update_admin.php">
              <i class="fa fa-cog"></i>
              <span>Akun Admin</span>
              </a>
          </li>

        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">