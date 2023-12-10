<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    
$id  =$_POST['id_user'];
$ket=$_POST['ket'];
date_default_timezone_set('Asia/Jakarta');
  $tanggal=date("Y/m/d H:i:s");
$query="UPDATE `user` SET status='non aktif' WHERE id_user='$id'";
$result=mysqli_query($db,$query);
if($query)
{
	$query="INSERT INTO `banned` SET id_user='$id',tgl_banned='$tanggal',ket='$ket'";
	$result=mysqli_query($db,$query);
    header('location:data_pembeli.php');
}
else
{
    die("Penyimpanan Gagal..");
}
}else{
    die("akses dilarang");
}
?>
}
?>