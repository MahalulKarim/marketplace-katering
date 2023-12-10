<?php

include "koneksi.php";
if(isset($_POST['balas'])){
    
$id_pertanyaan=$_POST['id_pertanyaan'];
$jawaban=$_POST['jawaban'];
date_default_timezone_set('Asia/Jakarta');
  $tanggal=date("Y/m/d H:i:s");
$query="INSERT INTO `balas` SET id_pertanyaan='$id_pertanyaan',jawaban='$jawaban'";
$result=mysqli_query($db,$query);
if($query)
{
    header('location:respon_penjual.php');
}
}
