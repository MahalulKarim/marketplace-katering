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
        if (isset($_POST['simpan_varian'])) {
            $id_menu = $_POST['id_menu'];
            $varian = $_POST['varian'];
            $harga=$_POST['harga'];
            

            $file = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

            if (empty($file)) {
                
                $query = "INSERT INTO `varian` SET id_menu='$id_menu',varian='$varian',harga='$harga'";
                    $result = mysqli_query($db, $query); 
                        echo "<script type='text/javascript'>
                        alert('Varian berhasil ditambahkan!');window.location='d_menu_saya.php'</script>
                        ";






            }else{

                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
                $path = "../asset/user/gambar/toko/menu/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                     $query = "INSERT INTO `varian` SET id_menu='$id_menu',varian='$varian',harga='$harga'";
                    $result = mysqli_query($db, $query); 
                        if($result){
                             $query1 = "INSERT INTO `gambar` SET id_menu='$id_menu',gambar='$fotobaru'";
                            $result1 = mysqli_query($db, $query1); 
                             echo "<script type='text/javascript'>
                             alert('Varian berhasil ditambahkan!');window.location='d_menu_saya.php'</script>
                             ";

                        }

                   

                 }


            }

                // //membuat nama fille baru
                // 
          
        
    }?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>