<?php

if(isset($_GET['pesan'])){
   if($_GET['pesan']=="ubah"){
     
session_start();
session_destroy();
echo "<script type='text/javascript'>
    alert('Username Atau Password Berhasil diubah Silahkan Login Kembali!');window.location='index.php'</script>
                      ";
}
}
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  

  <!-- Favicons -->
  <link href="img/icon.png" rel="icon">
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
  <title>logout</title>
  
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
        <h2 class="form-login-heading">Berhasil Logout</br><br><i class="fa fa-check fa-3x"></i></h2>
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