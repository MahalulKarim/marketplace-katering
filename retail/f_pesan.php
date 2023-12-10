
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title><link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/daftar_customer.css">
     <link rel="stylesheet" href="css/style01.css">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/popper.js"></script>

</head>

<body>





<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../f_login.php?pesan=belumlogin");
} 
include "koneksi.php";
$username = $_SESSION['username'];
// cari user
$kode = "SELECT * FROM user WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}
$id_user=$hasil['id_user'];

  if(isset($_GET['id'])){
     $id=$_GET['id'];
    $query1 = "SELECT * FROM menu WHERE id_menu='$id' AND id_user='$id_user'";
    $result1 = mysqli_query($db, $query1);
    if (mysqli_num_rows($result1)<1){
    $query = "SELECT * FROM menu WHERE id_menu='$id'";
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_array($result);?>
   

<div class="container justify-content-center pt-5">
  <section class="col-md-12 pt-1 " >
    
             <form class="form-container  pesan" method="POST" action="s_pesanan.php" enctype="multipart/form-data">
                    <h5 class="font-weight-bold col-md-12 text-center">Masukan Data Pesan</h5><br>
                    <input type="hidden" name="id_menu" value="<?php echo $data['id_menu']?>">
                    <input type="hidden" name="id_user" value="<?php echo $hasil['id_user']?>">
                    <div class="row g-3">
                          <div class="col">   
                            <table>
                                <tr>
                                    <th>Nama Menu</th>
                                    <td> : </td>
                                    <td><?php echo $data['nama_menu']?></td>
                                </tr>
                                <tr>
                                     <th>Harga</th>
                                    <td> : </td>
                                    <td>Rp. <?php echo $data['harga']?> / Qty</td>
                                </tr>
                            </table>
                       </div>
                        </div>

                        <hr>
                     <input type="hidden" class="form-control form-control-sm" value="<?php echo $data['harga']?>" autocomplete="off" readonly="" id="harga" onchange="sum();">
                     <div class="row g-3">
                            
                        
                        <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Jumlah Pesan :</label>
                             <input type="number" class="form-control form-control-sm"  autocomplete="off" required="" id="jumlah"  onchange="sum();" min="1" name='jumlah'>
                        </div>
                          <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Tanggal Pesan :</label>
                             <input type="date" class="form-control form-control-sm"  autocomplete="off" name='tgl_pemesanan'  required="" >
                        </div>
                         <div class="col-md-3">
                            <label for="inputEmail4" class="form-label">Total Bayar :</label>
                             <input type="text" class="form-control form-control-sm bg-white"  autocomplete="off" required="" id="total" readonly="" name="total_bayar">
                        </div>
                        </div>
                        <br>
                        <div class="row g-3">
                         <div class="col-6">
                        <label for="inputAddress" class="form-label">Alamat Kirim :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pesan" autocomplete="off" required><?php echo $hasil['alamat']?></textarea>
                        <p style="text-align: center;font-size: 12px">*Ubah jika dikirim ke alamat yang berbeda</p>
                        </div>
                       
                       
                    </div>
                 </br>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" name="pesan" onclick="return confirm('Apakah Anda Yakin Dengan Pesanan Anda?')">Pesan</button>
                    <?php echo "<a class='btn btn-danger' href=\"javascript:history.go(-1)\" >Batal</a>";?>               
                </div>
                </form>
        

               
            </section>

        </div>



    <?php
    }else{
     echo "<script type='text/javascript'>
            alert('Anda Tidak Dapat Memesan Menu Anda Sendiri!');window.location='javascript:history.go(-1)'
            </script>";
    }
  }

  ?>
        
</body> <script src="js/jquery.js"></script>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('jumlah').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);

          if (!isNaN(result)) {
             document.getElementById('total').value = "Rp. ".concat(result);
        }    
}
</script>



</html>