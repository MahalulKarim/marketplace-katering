
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
    $query = "SELECT p.*,pr.*,j.jenis FROM pemesanan p, menu pr,jenis j WHERE pr.id_menu=p.id_menu AND j.id_jenis=pr.id_jenis AND p.id_pemesanan='$id_pemesanan' ";//MENCARI DETAIL DATA menu YANG ADA DI PESANAN SAYA
      $result = mysqli_query($db, $query);
      $data =mysqli_num_rows($result);
      if($data <  1){
      }
      $data1=mysqli_fetch_array($result);
}

  ?>
<!-- BODY MULAI -->
   <div class="container text-center pt-3">

 <!-- KOTAK BAYAR MULAI -->
      <div class="kotakbayar">

<!-- JUDUL MULAI -->
        <div class="row m-2 pt-2  text-center"> 
          <div class="col-md-12">
            <h5>Detail Pesanan</h5>
            <hr>
          </div>
        </div>
<!-- JUDUL AKHIR -->

<!-- MULAI BAGI FOTO DAN DESKRIPSI -->
            <div class="row m-2 pt-2  text-center">
              <!-- AREA FOTO MULAI -->
              <div class="col-md-3">
                 <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']; ?>"  class="img-thumbnail" alt="..." width="200">
              </div>
              <!-- AREA FOTO AKHIR -->
              <!-- AREA DESKRIPSI MULAI -->
               <div class="col-md-8 mb-1 text-left bg-white">
                  <table class="table table-borderless text-left">
                    <tr>
                        <th width="120px">Nama Menu</th>
                        <td width="10px">:</td>
                        <td><?php echo $data1['nama_menu']?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td>
                          <?php  echo
                            nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])))."<br>";
                            // fungssi menampilkan ganti baris dari database
                           ?>
                        </td>
                    </tr>

                  
<?php         $id_pemesanan=$_GET['id_pemesanan'];
                      $iduser = $hasil['id_user'];
                       if ($data1['jenis']=='Snack') {
?>
                                   <tr>
                                    <th>Varian</th>
                                    <td>:</td>
                                    <td>



   <?php 
              
                              $query3="SELECT v.* FROM pilih_varian vp, pemesanan p,varian v WHERE v.id_varian=vp.id_varian AND vp.id_pemesanan=p.id_pemesanan AND p.id_pemesanan='$id_pemesanan'";
                              $result3=mysqli_query($db,$query3);
                                 if (mysqli_num_rows($result3)<1) {
                                                        # code...
                                  }else{
                                  echo "<p><b>Varian :</b></p>";
                                       while($data3=mysqli_fetch_array($result3)){

                                          echo '- '.$data3['varian'].', Rp.'.$data3['harga'].' / Varian <br>';
                                         }
                                       }



                            ?>
                                                             
                                  </td>
                                  </tr> 
                                  <?php
                              


                            }else{
                              
                            }
                            ?>





                                         
                  </table>
                </div>
                <!-- AREA DESKRIPSI AKHIR -->
            </div>
<!-- AKHIR BAGI FOTO DAN DESKRIPSI -->
<!-- MULAI BAGI DETAIL PESAN DAN FORM BAYAR-->

            <div class="row m-2">

              <!-- AREA MULAI DETAIL PESAN -->
              <div class="col-md-4 text-left p-3">
                <table>
                  <tr>
                        <td>Jumlah Pesan</td>
                        <td>:</td>
                        <td> <?php echo $data1['jumlah']?></td>
                    </tr>
                    <tr>
                      <?php
                           if ($data1['jenis']=='Snack') { 
                            $no=1;
                            $query3="SELECT v.* FROM pilih_varian vp, pemesanan p,varian v WHERE v.id_varian=vp.id_varian AND vp.id_pemesanan=p.id_pemesanan AND p.id_pemesanan='$id_pemesanan'";
                              $result3=mysqli_query($db,$query3);
                                 if (mysqli_num_rows($result3)<1) {
                                                        # code...
                                  }else{
                                    echo '<td>Harga</td>
                        <td>:</td><td>';
                                       while($data3=mysqli_fetch_array($result3)){

                                          echo '['.$no++.'] Rp. '.$data3['harga'].', ';
                                         }
                                       }
                                       echo "</td>";

                           }else{?>

                         <td>Harga</td>
                        <td>:</td>
                        <td>
                          


                       Rp. <?php echo number_format($data1['harga'])?>
                         
                          <!-- fungsi php menambah koma dalam angka -->
                        </td>
                            <?php


                           }?>
                       
                    </tr>
                    
                    <tr>
                        <td>Total Bayar</td>
                        <td>:</td>
                        <td> Rp. <?php echo number_format($data1['total_bayar'])?></td>
                        <!-- fungsi php menambah koma dalam angka -->
                    </tr>
                    <tr>
                        <td>Alamat Kirim</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
                <textarea readonly="" class="form-control form-control-sm bg-white"><?php echo $data1['alamat_pesan']?></textarea>
              </div>

                <!-- AKHIR DETAIL PESAN -->
                                  
              <div class="col-md-3 text-left p-3">
            
              </div>





              <!--  MULAI BAGI FORM BAYAR -->
              <div class="col-md-4 text-left p-2">
                  <h5>Status : Menunggu</h5>
                  <p></p>
                   <?php echo "<a class='btn btn-warning btn-sm' href=\"javascript:history.go(-1)\" >Kembali</a>";

                ?>
                <a class='btn btn-danger btn-sm' href="batal_pesanan.php?id=<?php echo $data1['id_pemesanan']?>" onclick="return confirm('Yakin Batalkan Pemesanan?')" >Batalkan Pesanan</a>
                   
                  <!-- FUNGSI UNTUK KEMBALI KE HALAMAN SEBELUMNYA -->
               
              </div>
            </div>
              <!--  AKHIR BAGI FORM BAYAR -->
              
                 
            </div>
             

                <div class="col-md-4 text-left p-2">
                
                </p>
              
                <br>
              </div>

                 
                  
                 

                
          </div>

           <!-- AKHIR KOTAK BAYAR -->
           
          </div>
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