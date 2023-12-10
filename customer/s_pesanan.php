<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../asset/user/css/bootstrap.css">
    <title></title>
</head>

<body>

    <div class="container pt-5">



        <?php
        //koneksi ke database
        include "../koneksi.php";


        //menangkap inputan form
        if (isset($_POST['pesan'])) {
            $id_menu = $_POST['id_menu'];
            $id_user = $_POST['id_user'];
            $jumlah = $_POST['jumlah'];
            $rand = rand(10, 1000);

            $tgl_pemesanan = $_POST['tgl_pemesanan'];
            $jam=$_POST['jam_pemesanan'];
            $datetime=$tgl_pemesanan.' '.$jam;
            $tgl=date('Y-m-d');
            $input=date('Y-m-d H:i');



            $total_bayar=$_POST['total_bayar'];
                $total = preg_replace("/[^0-9]/","",$total_bayar);

            $alamat = trim($_POST['alamat_pesan']);
            if(empty($alamat)){
                 echo "<script type='text/javascript'>
                        alert('Alamat harus diisi');window.location='javascript:history.go(-1)'</script>
                                            ";
                    }else{


                    $query = "INSERT INTO `pemesanan` SET kode='$rand',id_menu='$id_menu',
                                                        id_user='$id_user',
                                                        jumlah='$jumlah',tgl_input='$input',
                                                        tgl_pemesanan='$datetime',
                                                        total_bayar='$total',
                                                        alamat_pesan='$alamat',
                                                        status='menunggu'";
                    $result = mysqli_query($db, $query); 
                    if($result){;
                    	echo "<script type='text/javascript'>
                    	alert('Menu berhasil dipesan, silahkan tunggu konfirmasi dari penjual');window.location='d_pesanan_saya.php'</script>
                    	";                   
            } else { 

            	echo "<script type='text/javascript'>
						alert('Gagal!');window.location='d_menu.php'
						</script>";
            }
        } 
    }elseif (isset($_POST['pesan2'])) {
        
        for($i=0;$i<$_POST['jmlpsn'];$i++){

            $id_menu = $_POST['id_menu'.$i];
            $id_chart = $_POST['id_chart'.$i];
            
            $id_user = $_POST['id_user'.$i];
            $jumlah = $_POST['jumlah'.$i];

            $rand = rand(10, 1000);
             $tgl_pemesanan = $_POST['tgl_pemesanan'.$i];
            $jam=$_POST['jam_pemesanan'.$i];
            $datetime=$tgl_pemesanan.' '.$jam;
            $tgl=date('Y-m-d');
            $input=date('Y-m-d H:i');


            
            $total=$_POST['total_bayar'.$i];
            $alamat= $_POST['alamat_pesan'.$i];
            if(empty(trim($_POST['alamat_pesan'.$i]))){
            // goto a;
            }else{
                 $query5="SELECT max(id_pemesanan) as max FROM pemesanan";
                                  $result5=mysqli_query($db,$query5);
                                  $data=mysqli_fetch_array($result5);
                                  $id_pemesanan=$data['max']+1;

            $query = "INSERT INTO `pemesanan` SET id_pemesanan='$id_pemesanan',kode='$rand',id_menu='$id_menu',
                                                        id_user='$id_user',
                                                        jumlah='$jumlah',tgl_input='$input',
                                                        tgl_pemesanan='$datetime',
                                                        total_bayar='$total',
                                                        alamat_pesan='$alamat',
                                                        status='menunggu'";
            $result = mysqli_query($db, $query); 
                        if($result){
                         $query1 = "UPDATE `chart` SET status='1' WHERE id_chart='$id_chart' AND id_menu='$id_menu'";
                          $result1 = mysqli_query($db, $query1);
                          if($result1){
                             $query2 = "UPDATE `pilih_varian` SET id_pemesanan='$id_pemesanan' WHERE id_chart='$id_chart'";
                               $result2 = mysqli_query($db, $query2);
                                echo "<script type='text/javascript'>
                        alert('Menu berhasil dipesan, silahkan tunggu konfirmasi dari penjual');window.location='d_pesanan_saya.php'</script>
                        "; 

                          }
                      }
                    
            
                
            }

                // a: echo "<script type='text/javascript'>
                // alert('Alamat harus diisi');window.location='javascript:history.go(-2)'</script>";
            
    }
}   if (isset($_POST['pesan4'])) {
            $id_menu = $_POST['id_menu'];
            $id_user = $_POST['id_user'];
            $jumlah = $_POST['jumlah'];
            $pilih_varian=$_POST['varian'];
            $hitung=count($pilih_varian);

             $rand = rand(10, 1000);
             $tgl_pemesanan = $_POST['tgl_pemesanan'];
            $jam=$_POST['jam_pemesanan'];
            $datetime=$tgl_pemesanan.' '.$jam;
            $tgl=date('Y-m-d');
            $input=date('Y-m-d H:i');


            $total_bayar=$_POST['total_bayar'];
                $total = preg_replace("/[^0-9]/","",$total_bayar);
                $alamat = trim($_POST['alamat_pesan']);
            if(empty($alamat)){
                 echo "<script type='text/javascript'>
                        alert('Alamat harus diisi');window.location='javascript:history.go(-1)'</script>
                                            ";
                    }else{

            // $alamat = trim($_POST['alamat_pesan']);
            //  for($i=0;$i<$hitung;$i++){
            //     echo $pilih_varian[$i];
            //  }

              $query5="SELECT max(id_pemesanan) as max FROM pemesanan";
                                  $result5=mysqli_query($db,$query5);
                                  $data=mysqli_fetch_array($result5);
                                  $id_pemesanan=$data['max']+1;

            $query = "INSERT INTO `pemesanan` SET id_pemesanan='$id_pemesanan',kode='$rand',id_menu='$id_menu',
                                                        id_user='$id_user',
                                                        jumlah='$jumlah',tgl_input='$input',
                                                        tgl_pemesanan='$datetime',
                                                        total_bayar='$total',
                                                        alamat_pesan='$alamat',
                                                        status='menunggu'";
                                                           $result = mysqli_query($db, $query); if($result){

                                                             for($i=0;$i<$hitung;$i++){
                                                            $query9="INSERT INTO pilih_varian SET id_varian='$pilih_varian[$i]',id_pemesanan='$id_pemesanan'";
                                                                $result9=mysqli_query($db,$query9);

                                                           }
                                                           echo "<script type='text/javascript'>
                        alert('Menu berhasil dipesan, silahkan tunggu konfirmasi dari penjual');window.location='d_pesanan_saya.php'</script>
                        "; 

                                                           }
            }


        
    }


?>


       <script src="../asset/user/assets/js/jquery.js"></script>
        <script src="../asset/user/assets/js/popper.js"></script>
        <script src="../asset/user/assets/js/bootstrap.js"></script>
</body>

</html>