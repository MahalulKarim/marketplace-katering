<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
$username   =$_POST['username'];
$password   =$_POST['password'];

$query="SELECT * FROM `user` WHERE BINARY username='$username' AND password='$password'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_array($result);
$cek=mysqli_num_rows($result);
if($cek>0 && $row['type_user']=='admin'){
    session_start();
    $_SESSION['username']=$row['username'];
    $_SESSION['status']="login";
    header("location:index_admin.php");

}else{
	header("location:index.php?pesan=gagal");
}


    
}


?>