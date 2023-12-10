<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  

  <!-- Favicons -->
  <link href="img/fafi.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <title>login</title>
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
 
          <h4 align="center">
<?php
if(isset($_GET['pesan'])){
    if($_GET['pesan']=="gagal"){
        echo "Login Gagal!, Username atau Password salah!";
    }else if($_GET['pesan']=="logout"){
        echo "Anda telah Logout";
    }else if($_GET['pesan']=="belumlogin"){
        echo "Silahkan Login terlebih dahulu!";
    }
}
?>
</h4>
       
	<div id="login-page">
    <div class="container">

      <form class="form-login" action="cek_login.php" method="post">
        <h2 class="form-login-heading">LOGIN</h2>
        <div class="login-wrap ">
          <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" autofocus required>
          <br>
          <input type="password" class="form-control" name="password" placeholder="Password" autofocus required>
		  <br>
          <input type="submit" class="btn btn-theme btn-block" name="simpan" value="login">
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  
</body>

</html>
