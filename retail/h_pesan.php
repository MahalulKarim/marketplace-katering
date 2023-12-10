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
            $id_chat = $_GET['id'];


            $query1 = "DELETE FROM `chat` WHERE id_chat='$id_chat'";
            $result1 = mysqli_query($db, $query1);
                            if ($result1) {
                                 
                                $query3 = "DELETE FROM `chatroom` WHERE id_chat='$id_chat'";
                            $result3 = mysqli_query($db, $query3); 
                            if($result3){
                                echo "<script type='text/javascript'>
                                alert('Pesan Berhasil dihapus!');window.location='layanan_pelanggan.php'</script>
                                ";

                         } else {
                            
                          
                                  echo "<script type='text/javascript'>
                                alert('Pesan');window.location='layanan_pelanggan.php'</script>
                                ";

                       


                    }


            
                   
           
        } 
    }elseif (isset($_GET['id2'])) {
         $id_chat = $_GET['id2'];



            $query1 = "DELETE FROM `chat2` WHERE id_chat='$id_chat'";
            $result1 = mysqli_query($db, $query1);
                            if ($result1) {
                                 
                                $query3 = "DELETE FROM `chatroom` WHERE id_chat='$id_chat'";
                            $result3 = mysqli_query($db, $query3); 
                            if($result3){
                                echo "<script type='text/javascript'>
                                alert('Pesan Berhasil dihapus!');window.location='chat.php'</script>
                                ";

                         } else {
                            
                          
                                  echo "<script type='text/javascript'>
                                alert('Pesan');window.location='chat.php'</script>
                                ";

                          }
                  
           
        } 
        
    }?>


       <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.js"></script>
</body>

</html>