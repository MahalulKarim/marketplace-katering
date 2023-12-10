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
        if (isset($_POST['daftar'])) {
            $type_user = $_POST['typeuser'];
            $nama = trim($_POST['nama']);
            $nama_katering = trim($_POST['nama_katering']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $alamat = trim($_POST['alamat']);

            $email = trim($_POST['email']);
            $no_hp = trim($_POST['no_hp']);
            $tgl_lahir = trim($_POST['tgl_lahir']);
            $jk = trim($_POST['jk']);

            if(empty($nama)||empty($nama_katering)||empty($username)||empty($password)||empty($alamat)||empty($email)||empty($no_hp)||empty($tgl_lahir)||empty($jk)){
                 echo "<script type='text/javascript'>
                        alert('Data Tidak Boleh Kosong!');window.location='f_daftar.php'</script>
                                            ";
                    }else{
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            //cek nomer hp atau email di database
            $query = "SELECT * FROM user WHERE no_hp='$no_hp' OR email='$email'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {

                //membuat nama fille baru
                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
                $path = "../asset/user/gambar/user/foto/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                    $query = "INSERT INTO `user` SET type_user='$type_user',nama='$nama',nama_katering='$nama_katering',username='$username',password='$password',email='$email',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir',no_hp='$no_hp',foto='$fotobaru',status='aktif'";
                    $result = mysqli_query($db, $query); 
                    	echo "<script type='text/javascript'>
                    	alert('Anda Berhasil Mendaftar, Silahkan Login!');window.location='../f_login.php'</script>
                    	";

                 } else {
                    //input data tanpa gambar
                    $query = "INSERT INTO `user` SET type_user='$type_user',nama_katering='$nama_katering',nama='$nama',username='$username',password='$password',email='$email',alamat='$alamat',jk='$jk',tgl_lahir='$tgl_lahir',no_hp='$no_hp',status='aktif'";
                    $result = mysqli_query($db, $query);
                  
						echo "<script type='text/javascript'>
						alert('Anda Berhasil Mendaftar, Silahkan Login!');window.location='../f_login.php'
						</script>";
                }
            } else { 

            	echo "<script type='text/javascript'>
						alert('Nomor telepon atau email telah terdaftar!');window.location='f_daftar.php'
						</script>";
            }
        } 
    }?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>