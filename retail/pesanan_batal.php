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
        if (isset($_GET['id'])) {
            $id_pesanan = $_GET['id'];
            
                    $query = "UPDATE `pemesanan` SET status='di batalkan' WHERE id_pemesanan='$id_pesanan'";
                    $result = mysqli_query($db, $query); 
                    if($result){
                    	echo "<script type='text/javascript'>
                    	alert('Pesanan Berhasil dibatalkan!');window.location='d_pesanan_saya.php'</script>
                    	";

                 } else {
                    
                  
						  echo "<script type='text/javascript'>
                        alert('gagal');window.location='d_pesanan_saya.php'</script>
                        ";

                }
           
        } ?>


       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>