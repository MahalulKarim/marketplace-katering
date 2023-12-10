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
// SESSION START LOGIN
session_start();
if ($_SESSION['status'] != "login") {
    header("location:f_login.php?pesan=belumlogin");
} 

include "../koneksi.php";
$username = $_SESSION['username'];

// MENCARI USER YANGG SEDANG LOGIN
$kode = "SELECT * FROM user WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}
// CEK TOMBOL PEMBYARAN KETIKA DI KLIK
if(isset($_GET['id_pemesanan'])){
    $id_pemesanan=$_GET['id_pemesanan'];// MENANGKPA NILAI DARI HALAMAN PESANAN SAYA
    $query = "SELECT p.*,m.* FROM pemesanan p, menu m WHERE m.id_menu=p.id_menu AND p.id_pemesanan='$id_pemesanan' ";//MENCARI DETAIL DATA menu YANG ADA DI PESANAN SAYA
    $result = mysqli_query($db, $query);
      $data =mysqli_num_rows($result);
      if($data <  1){
      }
      $data=mysqli_fetch_array($result);
}

  ?>
<!-- BODY MULAI -->
<div class="container pt-3">
  
<!-- KOTAK BAYAR MULAI -->
<div class="kotakbayar mb-3 p-2">

<!-- JUDUL MULAI -->
<div class="row m-2 pt-2  text-center"> 
  <div class="col-md-12">
    <h5 class="text-center">PEMBAYARAN</h5>
  </div>
</div>
<!-- JUDUL AKHIR -->

<!-- MULAI BAGI FOTO DAN DESKRIPSI -->
<div class="row m-4 pt-2  text-center">
  
<!-- AREA DESKRIPSI MULAI -->
<div class="col-md-12 mb-1  text-left bg-white">
  <table class="table table-seccondary text-left p-4">
    <?php $query3="SELECT u.nama_katering FROM user  u, menu m, pemesanan p WHERE m.id_user=u.id_user AND m.id_menu=p.id_menu AND p.id_pemesanan='$id_pemesanan'";
    
    $result3 = mysqli_query($db, $query3);
    $data3=mysqli_num_rows($result3);
    if($data3 <  1){

    }
    $data4=mysqli_fetch_array($result3);
    
    
    ?>
    
    
    
    <h5 class="pt-2 pl-2">Nama Restaurant : <?php echo $data4['nama_katering']?></h5>
    <tr>
      <th>Nama Menu</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Sub Total</th>
    
    </tr>
    <tr>
      <td><?php echo $data['nama_menu']?></td>
      <td><?php echo $data['jumlah']?></td>
      <td> Rp. <?php echo number_format($data['harga'])?> Per Box/paket</td>
      <td> Rp. <?php echo number_format($data['total_bayar'])?></td>
    </tr>
  </table>
</div>
<!-- AREA DESKRIPSI AKHIR -->
</div>

<!-- MULAI BAGI DETAIL PESAN DAN FORM BAYAR-->

<div class="row m-2">
  
<!-- AREA MULAI DETAIL PESAN -->
<div class="col-md-12 text-left p-3">
  <table style="width:100%">
  <tr>
    <td><b>Biaya Kirim: </b></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>Rp. <?php echo number_format($data['biaya_kirim'])?></b></td>
  </tr>
   <tr>
    <td><b>Kode Bayar:</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b><?php echo number_format($data['kode'])?></b></td>
  </tr>
  <tr>
    <td><b>Total Bayar:</b></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>Rp. <?php echo number_format($total=$data['total_bayar']+$data['biaya_kirim']+$data['kode'])?></b></td>
  </tr>

</table>


<h4 class="pt-3">Rekening Pembayaran</h4>

<table class="table">
  
  <?php
  $query4="SELECT b.no_rek,b.nama_bank,b.nama as name FROM bank b, user u WHERE b.id_user=u.id_user AND u.type_user='admin'";
  $result4=mysqli_query($db,$query4);
  while($data4=mysqli_fetch_array($result4)){ ?>
  
  <tr>
    <td><b><?php echo $data4['nama_bank']?> </b></td>
    <td><b><?php echo $data4['no_rek']?> A.n <?php echo $data4['name']?></b></td>
    <td><b> </b></td>
  </tr>
  
  
  <?php  } ?>   

</table>

</div>

</div>

<!-- AKHIR DETAIL PESAN -->


<div class="col-md-8">
  <form class="form p-3" method="POST" action="s_pembayaran.php" enctype="multipart/form-data">
    <input type="hidden" name="id_pemesanan" value="<?php  echo $id_pemesanan; ?>">
    <input type="hidden" name="total_bayar" value="<?php echo $total?>">

    <h2><b>Konfirmasi Transfer</b></h2>

      <div class="form-group">
       <label class="form-label">Nama Rekening :</label>
    <input type="text" class="form-control" name="nama_rek" rows="3"></input>
    </div>

    <div class="form-group">
       <label class="form-label">Nomor Rekening :</label>
    <input type="text" class="form-control" name="no_rek" rows="3"></input>
    </div>

    <div class="form-group mb-3">
       <label class="form-label">Jumlah Transfer :</label>
    <input type="number" class="form-control" name="jumlah_transfer" rows="3"></input>
    <small class="text-danger">(Masukan tanpa tanda baca *)</small>
    </div>
  


    <div class="form-group pt-4">
      <label class="form-label">Bukti Transfer</label>
      <div class="imgWrap"  style="width: 10rem;">
      <img src="../asset/user/gambar/transfer.jpg" id="imgView" class="card-img-top img-thumbnail"alt="bayar">
    </div>
    <input type="file" id="inputFile" class="form-control form-control-sm" name="file" required>
  </div>
  
  <div class="mb-3">
    <label class="form-label">Keterangan Transfer :</label>
    <textarea class="form-control" name="ket_bayar" rows="3"></textarea>
  </div>
  
  
     
  
  <div class="form-group">
    <label for="tanggal">Tanggal Bayar :</label>
    <input type="date" class="form-control form-control-sm" name="tgl_bayar" required>
  </div>
  
  
  <input type="submit" class="btn btn-success btn-sm" name="bayar" value="Kirim">
  <?php echo "<a class='btn btn-warning btn-sm' href=\"javascript:history.go(-1)\" >Kembali</a>";?>


</form>

</div>






</div>


</div>
         <!-- AKHIR KOTAK BAYAR -->
          <!-- BODY AKHIR -->


</body> 

<!-- MEMANGGIL LIBRARY  JQUERY  -->
<script src="../asset/user/js/jquery.js"></script>
<script type="text/javascript"></script>

<!-- FUNGSI PREVIEW GAMBAR -->
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