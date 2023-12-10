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
            $id_jenis = $_POST['id_jenis'];
            $nama_menu = trim($_POST['nama_menu']);
            $harga = trim($_POST['harga']);
            $deskripsi = trim($_POST['deskripsi']);
            $status=$_POST['status'];
             if(empty($id_jenis)||empty($nama_menu)||empty($harga)||empty($deskripsi)){
                        echo "<script type='text/javascript'>
                        alert('Data Tidak Boleh Kosong!');window.location='d_menu_saya.php'</script>
                                            ";
            }else{


            $file = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

          

                //membuat nama fille baru
                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
                $path = "../asset/user/gambar/toko/menu/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                    $query = "INSERT INTO `menu` SET id_user='$id_user',nama_menu='$nama_menu',id_jenis='$id_jenis',deskripsi='$deskripsi',harga='$harga',gambar='$fotobaru',status='$status'";
                    $result = mysqli_query($db, $query); 
                    	echo "<script type='text/javascript'>
                    	alert('Menu Berhasil ditambahkan!');window.location='d_menu_saya.php'</script>
                    	";

                 }
          
        } 
    }?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>