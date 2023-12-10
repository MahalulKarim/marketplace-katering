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
            $id_pembayaran = $_GET['id'];
           

            //cek nomer hp atau email di database
            $query = "UPDATE pembayaran SET status='terbayar' WHERE id_pembayaran='$id_pembayaran'";
            $result = mysqli_query($db, $query);
            if ($result) {
                    echo "<script type='text/javascript'>
                        alert('Pembayarn telah di Validasi');window.location='d_pesanan_masuk.php'</script>
                        ";
                    }

                }else{

                }

                ?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>