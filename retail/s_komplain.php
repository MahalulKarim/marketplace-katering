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
        if (isset($_POST['laporkan'])) {
            $id_user = $_POST['id_user'];
            $komplain = $_POST['komplain'];
            $tanggal=date('Y-m-d');

            
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            

                //membuat nama fille baru
                $fotobaru = date('d-m-Y') . $file;

                //upload file ke folder sistem
                $path = "../asset/user/gambar/komplain/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {
                    $query = "INSERT INTO `komplain` SET id_user='$id_user',
                    tgl_komplain='$tanggal',
                    komplain='$komplain',
                    foto='$fotobaru'";
                    $result = mysqli_query($db, $query); 
                    	echo "<script type='text/javascript'>
                    	alert('Terimakasih, Laporan anda telah kami terima dan akan kami proses lebih lanjut');window.location='d_catering.php'</script>
                    	";

                 } else {
                    //input data tanpa gambar
                    $query = "INSERT INTO  `komplain` SET id_user='$id_user',
                    tgl_komplain='$tanggal',
                    komplain='$komplain'";;
                    $result = mysqli_query($db, $query);
                  
						  echo "<script type='text/javascript'>
                        alert('Terimakasih, Laporan anda telah kami terima dan akan kami proses lebih lanjut');window.location='d_pesanan_masuk.php'</script>
                        ";

                }
           
        } ?>


       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>