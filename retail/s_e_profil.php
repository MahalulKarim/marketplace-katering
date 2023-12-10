<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
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
           $nama_katering = addslashes($_POST['nama_katering']);
          

           $username = trim($_POST['username']);
           $password = trim($_POST['password']);
           $alamat = trim($_POST['alamat']);

           $email = trim($_POST['email']);
           $no_hp = trim($_POST['no_hp']);
           $tgl_lahir = trim($_POST['tgl_lahir']);
           $jk = trim($_POST['jk']);


            if(empty($nama)||empty($username)||empty($password)||empty($alamat)||empty($email)||empty($no_hp)||empty($tgl_lahir)||empty($jk)){
                 echo "<script type='text/javascript'>
                        alert('Data Tidak Boleh Kosong!');window.location='akun_saya.php'</script>
                                            ";
                    }else{


            

                    
                            $query = "UPDATE `user` SET nama='$nama',nama_katering='$nama_katering',username='$username',password='$password',email='$email',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir',no_hp='$no_hp' WHERE id_user='$id_user'";
                            $result = mysqli_query($db, $query); 
                            if($result){
                    	       echo "<script type='text/javascript'>
                    	       alert('Akun Berhasil Diubah, Silahkan Login Kembali!');window.location='../f_login.php'</script>";

                            } else {

                                    
						          echo "<script type='text/javascript'>
						          alert('Operasi Gagal!');window.location='akun_saya.php'
						          </script>";
                                 }
            
                    } 
    }?>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>