<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    
$id  =$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$query="UPDATE `customer_service` SET username='$username',password='$password'";
$result=mysqli_query($db,$query);
if($query)
{
    header('location:logout.php');
}

}elseif(isset($_POST['simpan_cs'])){
    
$id  =$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$query="UPDATE `customer_service` SET username='$username',password='$password'";
$result=mysqli_query($db,$query);
if($query)
{
    header('location:data_cs.php');
}

}
?>