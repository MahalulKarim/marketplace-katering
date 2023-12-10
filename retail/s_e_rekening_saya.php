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
            $id_user=$_POST['id_user'];
            $id_bank = $_POST['id_bank'];
            $kode_bank=$_POST['kode_bank'];
            $nama = trim($_POST['nama']);
            $norek = trim($_POST['no_rek']);
             if(empty($nama)||empty($norek)){
                        echo "<script type='text/javascript'>
                        alert('Data Tidak Boleh Kosong!');window.location='d_rekening_saya.php'</script>
                                            ";
            }else{

                 $query2="SELECT * FROM bank WHERE kode_bank='$kode_bank'";
                $result2=mysqli_query($db,$query2);
                if (mysqli_num_rows($result2)<1) {

                }else{



             $data2=mysqli_fetch_array($result2);
                    $nama_bank=$data2['nama_bank'];

                     $query = "UPDATE `bank` SET id_user='$id_user',kode_bank='$kode_bank',nama_bank='$nama_bank',nama='$nama',no_rek='$norek' WHERE id_bank='$id_bank'";
                            $result = mysqli_query($db, $query); 
                            if ($result) {
                                 echo "<script type='text/javascript'>
                                        alert('Nomor Rekening Berhasil disimpan!');window.location='d_rekening_saya.php'</script>
                                        ";
                            }else { 

                                echo "<script type='text/javascript'>
                                        alert('Gagal!');window.location='d_rekening_saya.php'
                                        </script>";
                            }


                }
    }
}?>



        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>
