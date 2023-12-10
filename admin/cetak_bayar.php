<?php

if(isset($_POST['cetak'])){
	$id_bayar=$_POST['id_bayar'];
	$tgl_bayar=$_POST['tgl'];
    $nama_menu=$_POST['menu'];
    $penjual=$_POST['penjual'];
    $pembeli=$_POST['pembeli'];
    $alamat=$_POST['alamat'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
    $total=$_POST['total'];


    }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Cetak</title>

  <!-- Favicons -->
  <link href="img/fafi.png" rel="icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2 ">
			</div>
			<div class="col-md-8 ">
				<h4 class="text-center">PEMBAYARAN</h4>
				<hr>	
				<table width="90%">
					<tr>
						<th width="30%">Tanggal Pembayaran</th><td>:</td><td><?php echo $tgl_bayar?></td>
					</tr>
					<tr>
						<th>Id Pembayaran</th><td>:</td><td><?php echo $id_bayar?></td>
					</tr>

					<tr>
						<th>Nama Menu</th><td>:</td><td><?php echo $nama_menu?></td>
					</tr>
					<tr>
						<th>Penjual</th><td>:</td><td><?php echo $penjual?></td>
					</tr>
					<tr>
						<th>Pembeli</th><td>:</td><td><?php echo $pembeli?></td>
					</tr>
					<tr>
						<th>Alamat Kirim</th><td>:</td><td><?php echo $alamat?></td>
					</tr>
					<tr>
						<th>Harga</th><td>:</td><td>Rp. <?php echo number_format($harga); ?>,-</td>
					</tr>
					<tr>
						<th>Jumlah</th><td>:</td><td><?php echo $jumlah?></td>
					</tr>
					<tr>
						<th>Total</th><td>:</td><td>Rp. <?php echo number_format($total); ?>,-</td>
					</tr>
				</table>	
				<hr>		
			</div>
			<div class="col-md-2 ">
			</div>
		</div>
	</div>
</html>
<script>
window.print();
</script>

