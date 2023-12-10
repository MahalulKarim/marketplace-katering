<?php
include "koneksi.php";
if( !isset($_GET['id'])){
    header('location:data_banned_toko.php');
}
$id =$_GET['id'];
$query="UPDATE `user` SET status='aktif' WHERE id_user='$id'";
$result=mysqli_query($db,$query);
if($result){
	
	$query1="DELETE FROM `banned` WHERE id_user='$id'";
$result1=mysqli_query($db,$query1);
	if($result1){
    header('location:data_banned_toko.php');
}
}
?>