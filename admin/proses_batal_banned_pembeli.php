<?php
include "koneksi.php";
if(isset($_GET['id'])){
$id =$_GET['id'];
$query="UPDATE `user` SET status='aktif' WHERE id_user='$id'";
$result=mysqli_query($db,$query);
if($result){

	$query1="DELETE FROM `banned` WHERE id_user='$id'";
$result1=mysqli_query($db,$query1);
	if($result1){
    header('location:data_baned_pembeli.php');
}
}
}
?>