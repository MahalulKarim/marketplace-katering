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
            


            $file = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

          

                //membuat nama fille baru
                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
                $path = "../asset/user/gambar/toko/menu/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                    $query = "INSERT INTO `gambar` SET id_menu='$id_menu',gambar='$fotobaru'";
                    $result = mysqli_query($db, $query); 
                    	echo "<script type='text/javascript'>
                    	alert('Gambar ditambahkan!');window.location='gambar_menu.php?id=".$id_menu."'</script>
                    	";

                 }
          
        
    }elseif (isset($_POST['simpan_edit'])) {
            $id_gambar = $_POST['id_gambar'];
            


            $file = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

          

                //membuat nama fille baru
                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
               $path="../asset/user/gambar/toko/menu/".$fotobaru;
                        if(move_uploaded_file($tmp, $path)){
                        $query3="SELECT gambar FROM `gambar` WHERE id_gambar='$id_gambar'";
                        $result3=mysqli_query($db,$query3);
                                    $data3=mysqli_fetch_array($result3);
                                    if(is_file("../asset/user/gambar/toko/menu/".$data3['gambar']))
                                        unlink("../asset/user/gambar/toko/menu/".$data3['gambar']);
                                        $query="UPDATE `gambar` SET gambar='$fotobaru' WHERE id_gambar='$id_gambar'";
                                        $result=mysqli_query($db,$query);
                                        if($result){

                                        echo "<script type='text/javascript'>
                                    alert('Gambar berhasil diubah!');window.location='gambar_menu.php?id=".$id_menu."'</script>
                                    ";
                                }
                        }


                    
          
        
    }elseif (isset($_POST['simpan_edit_utama'])) {
            $id_menu = $_POST['id_menu'];
            


            $file = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];

          

                //membuat nama fille baru
                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
               $path="../asset/user/gambar/toko/menu/".$fotobaru;
                        if(move_uploaded_file($tmp, $path)){
                        $query3="SELECT gambar FROM `menu` WHERE id_menu='$id_menu'";
                        $result3=mysqli_query($db,$query3);
                                    $data3=mysqli_fetch_array($result3);
                                    if(is_file("../asset/user/gambar/toko/menu/".$data3['gambar']))
                                        unlink("../asset/user/gambar/toko/menu/".$data3['gambar']);
                                        $query="UPDATE `menu` SET gambar='$fotobaru' WHERE id_menu='$id_menu'";
                                        $result=mysqli_query($db,$query);
                                        if($result){

                                        echo "<script type='text/javascript'>
                                    alert('Gambar berhasil diubah!');window.location='gambar_menu.php?id=".$id_menu."'</script>
                                    ";
                                }
                        }


                    
          
        
    }

    ?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>