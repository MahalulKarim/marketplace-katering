<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style01.css">
    <link rel="stylesheet" href="font/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">

    <link rel="stylesheet" type="text/css" href="datatbel/jquery.dataTables.min.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>
    <title></title>
</head>

<body>

    <div class="container pt-5">



        <?php
        //koneksi ke database
        include "koneksi.php";

        //menangkap inputan form
         if(isset($_GET['id'])){
                        $id=$_GET['id'];

                             $query = "SELECT * FROM `chart` WHERE id_chart='$id'";
                                $result = mysqli_query($db, $query);
                                $data=mysqli_fetch_array($result); 



                        ?>


                            <div class="container justify-content-center pt-5">
                                  <div class="row justify-content-center">
                                     <form class="form-container  pesan" method="POST" action="#" enctype="multipart/form-data">
                                            <h5 class="font-weight-bold col-md-12 text-center pt-3">Jumlah</h5><br>
                                            <div class="row justify-content-center">
                                            <div class="col-md-6 mr-2 mb-2" >
                            
                                    
                                            <input type="hidden" name="id_chart" value="<?php echo $id?>">
                                            <input type="number" class="form-control form-control-sm" required="" name='jumlah' value="<?php echo $data['jumlah']?>">
                                        </br>

                                            </div>
                                             <div class="col-md-6 mb-2" >
                            
                                            <button type="submit" class="btn btn-primary btn-sm " name="simpan" >Simpan</button>
                                             <?php echo "<a class='btn btn-danger btn-sm' href=\"javascript:history.go(-1)\" >Batal</a>";?>
                                            </div>
                                                
                                        
                                        </form>
                                   </div>
                                </div>
                            </div>






                        <?php
                    }

                    
        if (isset($_POST['simpan'])) {
            $id = $_POST['id_chart'];
            $jml = $_POST['jumlah'];

            //cek input data kosong

            

                             $query = "UPDATE `chart` SET jumlah='$jml' WHERE id_chart='$id'";
                                $result = mysqli_query($db, $query); 
                                if($result){
                                    echo "<script type='text/javascript'>
                                    alert('Berhasil');window.location='d_keranjang.php'</script>
                                    ";

                             } else {
                                                
                                    echo "<script type='text/javascript'>
                                    alert('Gagal!');window.location='d_keranjang.php'
                                    </script>";
                            }



                    




            
                   
            
        } ?>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>