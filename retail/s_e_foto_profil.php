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
            $id = $_POST['id_user'];

            $foto = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            // merubah nama file foto dengan menambah tanggal upload
            $fotobaru = date('dmYHis') . $foto;
            $path = "../asset/user/gambar/user/foto/" . $fotobaru;
            // cek nama foto dalam datbase dan mengupload ke folder sistem
            if (move_uploaded_file($tmp, $path)) {
                $query3 = "SELECT foto FROM `user` WHERE id_user='$id'";
                $result3 = mysqli_query($db, $query3);
                $data3 = mysqli_fetch_array($result3);
                // 
                if (is_file("../asset/user/gambar/user/foto/" . $data3['foto']))
                    unlink("../asset/user/gambar/user/foto/" . $data3['foto']);
                // unlink untuk menghapus foto lama
                $query = "UPDATE `user` SET foto='$fotobaru' WHERE id_user='$id'";
                $result = mysqli_query($db, $query);
                // cek status upload jika berhasil dialihkan ke halaman login kembali
                if($result){
                        echo "<script type='text/javascript'>
                        alert('Akun Berhasil Diubah!');window.location='akun_saya.php'</script>
                        ";

                 } else {
                                    
                        echo "<script type='text/javascript'>
                        alert('Foto gagal di ubah!');window.location='akun_saya.php'
                        </script>";
                }
            }
        } ?>

       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>