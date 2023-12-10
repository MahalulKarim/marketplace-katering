<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../asset/user/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/style01.css">
    <link rel="stylesheet" href="../asset/user/font/css/all.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap-reboot.min.css">
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
            
                    $query = "UPDATE  `pemesanan` SET status='terkirim' WHERE id_pemesanan='$id_pesanan'";
                    $result = mysqli_query($db, $query); 
                    if($result){
                        // echo "<script type='text/javascript'>
                        // alert('Pesanan Terkirim!');</script>
                        // ";
                        ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                
                            </div>
                             <div class="col-md-6 justify-content-center pesan" style="background-color: ">
                                     
                                <form class="pt-3" method="POST">

                                        <div class="form-group  ml-4 mr-4">
                                            <label for="exampleFormControlTextarea1"><h5>Feedback</h5></label>
                                            <input type="hidden" name="id_pemesanan" value="<?php echo $id_pesanan?>">
                                            <textarea name="isi" class="form-control form-control-sm" placeholder="Opsional" style="height:100px"></textarea>
                                        </div>
                                        <div class="form-group  ml-5 mr-5">
                                         <button type="submit" class="btn btn-primary btn-sm " name="simpan" >Simpan</button>
                                             <a class='btn btn-danger btn-sm' href="d_pesanan_saya.php">Lewati</a>
                                            </div>                                              
                                </form>                        

                            </div>
                             <div class="col-md-3">
                                
                            </div>
                            
                      
                            </div>
                             
                        <?php
                        if(isset($_POST['simpan'])){
                            $id_pemesanan=$_POST['id_pemesanan'];
                            $isi=$_POST['isi'];
                            $tgl=date('Ymd');
                            $query1 = "INSERT INTO `feedback` SET id_pemesanan='$id_pemesanan',isi='$isi',tgl='$tgl'";
                            $result1 = mysqli_query($db, $query1); 
                            if($result1){
                                          echo "<script type='text/javascript'>
                                                alert('Terimakasih untuk feedback anda ');window.location='d_pesanan_saya.php'</script>
                                                 ";
                                    }

                        }
                    	

                 } else {
                    
                  
						  echo "<script type='text/javascript'>
                        alert('null');window.location='d_pesanan_saya.php'</script>
                        ";

                }
           
        } ?>
 </div>

       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>