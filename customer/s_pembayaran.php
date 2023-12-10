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
        if (isset($_POST['bayar'])) {
            $id_pesanan = $_POST['id_pemesanan'];
            $total=$_POST['total_bayar'];
            $tgl_bayar = $_POST['tgl_bayar'];
            $no_rek=$_POST['no_rek'];
            $nama_rek=$_POST['nama_rek'];
            $jml_tf=$_POST['jumlah_transfer'];
            $keterangan=$_POST['ket_bayar'];
            $tgl=date('Y-m-d');
            if($tgl_bayar<$tgl){
                echo "<script type='text/javascript'>
                               alert('Pembayaran tidak dapat dilakukan!');window.location='d_pesanan_saya.php'</script>
                               ";

            }else{
                
           
            $file = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];

            //cek pesanan sudah dibayar atau belum
             $query = "SELECT * FROM pembayaran WHERE id_pemesanan='$id_pesanan'";
            $result = mysqli_query($db, $query);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) < 1) {


                //membuat nama fille baru
                $fotobaru = date('dmYHis') . $file;

                //upload file ke folder sistem
                $path = "../asset/user/gambar/user/bayar/" . $fotobaru;

                //input data dengan upload dengan gambar
                if (move_uploaded_file($tmp, $path)) {

                    $query = "INSERT INTO `pembayaran` SET id_pemesanan='$id_pesanan',atas_nama='$nama_rek',no_rek='$no_rek',jml_tf='$jml_tf',total_bayar='$total',
                                                            bukti_bayar='$fotobaru',
                                                            tgl_bayar='$tgl_bayar',ket_bayar='$keterangan',
                                                            status='pending'";
                    $result = mysqli_query($db, $query);
                    if($result){

                        echo "<script type='text/javascript'>
                        alert('Pembayaran Berhasil Admin Akan Segera Mem-Validasi Pembayaran Anda!');window.location='d_pesanan_saya.php'</script>
                        ";

                    } else{
                        echo "string";
                        

                 } 
                    }

            
        }else{
            echo "<script type='text/javascript'>
            alert('Pesanan Ini Sudah Terbayar! ');window.location='d_pesanan_saya.php'</script>
                        ";
        }

        }
    } ?>






        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>