
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title><link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/user/css/daftar_customer.css">
     <link rel="stylesheet" href="../asset/user/css/style01.css">


    <script src="../asset/user/js/jquery.js"></script>
    <script src="../asset/user/js/bootstrap.js"></script>

    <script src="../asset/user/js/popper.js"></script>

</head>

<body>





<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../f_login.php?pesan=belumlogin");
} 
include "../koneksi.php";
$username = $_SESSION['username'];
// cari user
$kode = "SELECT * FROM user WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}

  if(isset($_GET['id'])){
    $id_user=$_GET['id'];

  }

  ?>
<div class="container pt-5">
  <div class="row">
    
 
  <div class="col-md-4 pt-1 " >
  </div>
  <div class="col-md-4 pt-1 " >
    
             <form class="form-container" method="POST" action="s_komplain.php" enctype="multipart/form-data">
                    <h5 class="font-weight-bold col-md-12 text-center">Laporkan Pengguna</h5><br>
                    <input type="hidden" name="id_user" value="<?php echo $id_user?>">
                    
                        <label for="inputAddress" class="form-label">Komplain:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komplain" autocomplete="off" required placeholder="Opsional"></textarea>
                        
                          <br>
                        <label for="inputEmail4" class="form-label">Sertakan Gambar? :</label>
                        </br>
                        <div class="card" style="width: 10rem;">
                            <div class="imgWrap">
                                <img src="../asset/user/assets/img/User1.jpg" id="imgView" class="card-img-top img-fluid">
                            </div>
                           
                        </div>
                        <br>
                        <input type="file" id="inputFile" class="form-control form-control-sm" name="file">
                          <br>

                        <button type="submit" class="btn btn-primary" name="laporkan">Laporkan</button>
                        <?php echo "<a class='btn btn-danger' href=\"javascript:history.go(-1)\" >Batal</a>";?>               
                    </form>
        

               
    </div>
  </div>
</div>

</body>
<script src="js/jquery.js"></script>
 <script>
        $("#inputFile").change(function(event) {
            fadeInAdd();
            getURL(this);
        });

        $("#inputFile").on('click', function(event) {
            fadeInAdd();
        });

        function getURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputFile").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#imgView').attr('src', e.target.result);
                    $('#imgView').hide();
                    $('#imgView').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loadAnimate").hide();
        }

        function fadeInAdd() {
            fadeInAlert();
        }

        function fadeInAlert(text) {
            $(".alert").text(text).addClass("loadAnimate");
        }
    </script>
</html>