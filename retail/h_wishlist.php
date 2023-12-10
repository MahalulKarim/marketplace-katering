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
          include "../koneksi.php";

        //menangkap inputan form
        if (isset($_GET['id'])) {
            $id= $_GET['id'];


            $query1 = "DELETE FROM `wishlist` WHERE id_wishlist='$id'";
            $result1 = mysqli_query($db, $query1);
                            if ($result1) {
                                 echo "<script type='text/javascript'>
                                alert('Wishlist Berhasil dihapus!');window.location='d_wishlist.php'</script>
                                ";

                         } else {
                            
                          
                                  echo "<script type='text/javascript'>
                                alert('Gagal');window.location='d_wishlist.php'</script>
                                ";

                       


                    }


            
                   
           
        }?>



       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>