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
        if (isset($_POST['terima'])) {
            $id_pemesanan = $_POST['id_pemesanan'];
            $ongkir=$_POST['ongkir'];

                    $query = "UPDATE `pemesanan` SET status='di pesan',biaya_kirim='$ongkir' WHERE id_pemesanan='$id_pemesanan'";
                    $result = mysqli_query($db, $query); 
                    if($result){;
                    	echo "<script type='text/javascript'>
                    	alert('Pesanan Diterima, Silahkan Tunggu Pembayaran Dari Pemesan');window.location='d_pesanan_masuk.php'</script>
                    	";                   
            } else { 

            	echo "<script type='text/javascript'>
						alert('Gagal!');window.location='d_menu.php'
						</script>";
            }
        } elseif(isset($_GET['id2'])) {
            $id_pemesanan = $_GET['id2'];

                    $query = "UPDATE `pemesanan` SET status='kosong' WHERE id_pemesanan='$id_pemesanan'";
                    $result = mysqli_query($db, $query); 
                    if($result){;
                        echo "<script type='text/javascript'>
                        alert('Pemesanan Berhsil Ditolak!');window.location='d_pesanan_masuk.php'</script>
                        ";                   
            } else { 

                echo "<script type='text/javascript'>
                        alert('Gagal!');window.location='d_menu.php'
                        </script>";
            }
        }else{
            
        }



        ?>







        <!-- <div class="alert alert-primary">
            Ini contoh alert primary!
        </div>

        <div class="alert alert-secondary">
            Ini contoh alert secondary!
        </div>

       

        <div class="alert alert-warning">
            Ini contoh alert warning!
        </div>

        <div class="alert alert-info">
            Ini contoh alert info!
        </div>

        <div class="alert alert-light">
            Ini contoh alert light!
        </div>

        <div class="alert alert-dark">
            Ini contoh alert dark!
        </div>

    </div> -->

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>