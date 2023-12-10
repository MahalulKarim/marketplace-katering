<?php
include "../koneksi.php";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE BINARY username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = "login";
        header("location:indexlogin.php");
    } else {
        header("location:f_login.php?pesan=gagal");
    }
}
