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
            $id_menu = $_POST['id_menu'];

            $foto = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
            // merubah nama file foto dengan menambah tanggal upload
            $fotobaru = date('dmYHis') . $foto;
            $path = "../asset/user/gambar/toko/menu/" . $fotobaru;
            // cek nama foto dalam datbase dan mengupload ke folder sistem
            if (move_uploaded_file($tmp, $path)) {
                $query3 = "SELECT gambar FROM `menu` WHERE id_menu='$id_menu'";
                $result3 = mysqli_query($db, $query3);
                $data3 = mysqli_fetch_array($result3);
                // 
                if (is_file("../asset/user/gambar/toko/menu/" . $data3['gambar']))
                    unlink("../asset/user/gambar/toko/menu/" . $data3['gambar']);
                // unlink untuk menghapus foto lama
                $query = "UPDATE `menu` SET gambar='$fotobaru' WHERE id_menu='$id_menu'";
                $result = mysqli_query($db, $query);
                // cek status upload jika berhasil dialihkan ke halaman login kembali
                if($result){
                        echo "<script type='text/javascript'>
                        alert('Gambar Berhasil Diubah!');window.location='d_menu_saya.php'</script>
                        ";

                 } else {
                                    
                        echo "<script type='text/javascript'>
                        alert('Gambar gagal di ubah!');window.location='d_menu_saya.php'
                        </script>";
                }
            }
        } ?>

       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>