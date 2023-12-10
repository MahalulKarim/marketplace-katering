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
            $id_jenis = trim($_POST['id_jenis']);
            $nama_menu = trim($_POST['nama_menu']);
            $harga = trim($_POST['harga']);
            $deskripsi = trim($_POST['deskripsi']);
            $status=$_POST['status'];
            if(empty($id_jenis)||empty($nama_menu)||empty($harga)||empty($deskripsi)){
                        echo "<script type='text/javascript'>
                        alert('Data Tidak Boleh Kosong!');window.location='d_menu_saya.php'</script>
                                            ";
            }else{

                $foto=$_FILES['gambar']['name'];
                

                if(empty($foto)){
                    $query="UPDATE `menu` SET nama_menu='$nama_menu',id_jenis='$id_jenis',deskripsi='$deskripsi',harga='$harga',status='$status' WHERE id_menu='$id_menu'";
                        $result=mysqli_query($db,$query);
                        if($result){

                            echo "<script type='text/javascript'>
                                    alert('Menu Berhasil diubah!');window.location='d_menu_saya.php'</script>
                                    ";
                            }

                    }else{
                        $tmp=$_FILES['gambar']['tmp_name'];
                        $fotobaru=date('dmYHis').$foto;
                        $path="../asset/user/gambar/toko/menu/".$fotobaru;
                        if(move_uploaded_file($tmp, $path)){
                        $query3="SELECT gambar FROM `menu` WHERE id_menu='$id_menu'";
                        $result3=mysqli_query($db,$query3);
                                    $data3=mysqli_fetch_array($result3);
                                    if(is_file("../asset/user/gambar/toko/menu/".$data3['gambar']))
                                        unlink("../asset/user/gambar/toko/menu/".$data3['gambar']);
                                        $query="UPDATE `menu` SET nama_menu='$nama_menu',id_jenis='$id_jenis',deskripsi='$deskripsi',harga='$harga',gambar='$fotobaru',status='status' WHERE id_menu='$id_menu'";
                                        $result=mysqli_query($db,$query);
                                        if($result){

                                        echo "<script type='text/javascript'>
                                    alert('Menu Berhasil diubah!');window.location='d_menu_saya.php'</script>
                                    ";
                                }
                        }


                    }
            
                     
                    }
        } ?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>