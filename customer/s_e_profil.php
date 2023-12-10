<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../asset/user/css/bootstrap.css">
    <title></title>
</head>

<body>

    <div class="container pt-5">



        <?php
        //koneksi ke database
        include "../koneksi.php";

        //menangkap inputan form
        if (isset($_POST['simpan'])) {
            $id_user = $_POST['id_user'];
            $nama = trim($_POST['nama']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $alamat = trim($_POST['alamat']);

            $email = trim($_POST['email']);
            $no_hp = trim($_POST['no_hp']);
            $tgl_lahir = trim($_POST['tgl_lahir']);
            $jk = trim($_POST['jk']);

            //cek input data kosong

            if(empty($nama)||empty($username)||empty($password)||empty($alamat)||empty($email)||empty($no_hp)||empty($tgl_lahir)||empty($jk)){
                        echo "<script type='text/javascript'>
                        alert('Data Tidak Boleh Kosong!');window.location='akun_saya.php'</script>
                                            ";
                    }else{

                             $query = "UPDATE `user` SET nama='$nama',username='$username',password='$password',email='$email',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir',no_hp='$no_hp' WHERE id_user='$id_user'";
                                $result = mysqli_query($db, $query); 
                                if($result){
                                    echo "<script type='text/javascript'>
                                    alert('Akun Berhasil Diubah, Silahkan Login Kembali!');window.location='../f_login.php'</script>
                                    ";

                             } else {
                                                
                                    echo "<script type='text/javascript'>
                                    alert('Anda Berhasil Mendaftar, Silahkan Login!');window.location='akun_saya.php'
                                    </script>";
                            }



                    }




            
                   
            
        }elseif(isset($_POST['alih'])){
             echo $id_user = $_POST['id_user'];
             echo $nama_katering=$_POST['nama_katering'];
             $query="UPDATE user SET type_user='penjual',nama_katering='$nama_katering' WHERE id_user='$id_user'";
             $result=mysqli_query($db,$query);
             if ($result) {
                 echo "<script type='text/javascript'>
                                    alert('Berhasil Beralih Akun, Silahkan Login Kembali!');window.location='../logout.php'
                                    </script>";
             }else{
               
             }



        }else{

            
        }?>

        <script src="../asset/user/assets/js/jquery.js"></script>
        <script src="../asset/user/assets/js/popper.js"></script>
        <script src="../asset/user/assets/js/bootstrap.js"></script>
</body>

</html>