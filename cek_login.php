<?php
include "koneksi.php";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE BINARY username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);    
    if(mysqli_num_rows($result)<1){
         header("location:f_login.php?pesan=gagal");
    }else{
        $row = mysqli_fetch_array($result);
        if ($row['type_user']=='penjual') {
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['status'] = "login";
                    header("location:retail/indexlogin.php");
            
            }elseif($row['type_user']=='pembeli'){
                    session_start();
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['status'] = "login";
                    header("location:customer/indexlogin.php");
            }elseif($row['type_user']=='admin'){


            }else{
                 header("location:f_login.php?pesan=gagal");
            }



    }
}




