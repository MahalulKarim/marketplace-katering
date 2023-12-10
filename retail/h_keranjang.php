<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <title></title>
</head>

<body>

    <div class="container pt-5">



        <?php
        //koneksi ke database
        include "../koneksi.php";

        //menangkap inputan form
        if (isset($_GET['id'])) {
            $id= $_GET['id'];
            
                    $query = "DELETE FROM `chart` WHERE id_chart='$id'";
                    $result = mysqli_query($db, $query); 
                    if($result){
                    	echo "<script type='text/javascript'>
                    	alert('Menu Berhasil dihapus!');window.location='d_keranjang.php'</script>
                    	";

                 } else {
                    
                  

                }
           
        } ?>


       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>