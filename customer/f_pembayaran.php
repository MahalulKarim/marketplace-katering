
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
    $query = "SELECT p.*,m.*,j.jenis FROM pemesanan p, menu m, jenis j WHERE m.id_menu=p.id_menu AND m.id_jenis=j.id_jenis AND p.id_pemesanan='$id_pemesanan' ";//MENCARI DETAIL DATA menu YANG ADA DI PESANAN SAYA
      $result = mysqli_query($db, $query);
      $data =mysqli_num_rows($result);
      if($data <  1){
      }
      $data1=mysqli_fetch_array($result);
      $status=$data1['status'];
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
                            nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));
                            // fungssi menampilkan ganti baris dari database

                            ?>
                        </td>
                       
                          
                        
                    </tr>  
                         <?php 
                         if ($data1['jenis']=='Snack'){
                          ?>
                      <tr>
                      <th>Varian</th>
                      <td>:</td>
                      <td>
                        <?php

                              $query5="SELECT v.* FROM pilih_varian vp, varian v WHERE v.id_varian=vp.id_varian AND vp.id_pemesanan='$id_pemesanan'";
                              $result5=mysqli_query($db,$query5);
                              while($data5=mysqli_fetch_array($result5)){
                                echo "<p>".$data5['varian']."<span class='text-danger'> Rp.".number_format($data5['harga'])." x ".$data1['jumlah']." </span> </p>";
                              }

                          ?>
                      </td>
                      </tr>
                         <?php
                          } else{
                          }?>

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

                        <td>Harga</td>
                        <td>:</td>
                        
                        <?php if ($data1['jenis']=='Snack'){?>
                          <td>
                          <?php
                          $query6="SELECT v.* FROM pilih_varian vp, varian v WHERE v.id_varian=vp.id_varian AND vp.id_pemesanan='$id_pemesanan'";
                              $result6=mysqli_query($db,$query6);
                              while($data6=mysqli_fetch_array($result6)){
                                echo "[Rp.".number_format($data6['harga'])." ]  ";
                              }
                              ?>
                              / Varian
                            </td>
                              <?php
                        } else{
                          ?>

                          <td> Rp. <?php echo number_format($data1['harga'])?> Per Box/paket
                          </td>

                          <?php

                            }?>
                         
                        
                    </tr>
                    <tr>
                        <td>Jumlah Pesan</td>
                        <td>:</td>
                        <td> <?php echo $data1['jumlah']?></td>
                    </tr>
                    <tr>
                        <td>Biaya Kirim</td>
                        <td>:</td>
                        <td> Rp. <?php echo number_format($data1['biaya_kirim']);?></td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td>:</td>
                        <td> Rp. <?php echo number_format($data1['total_bayar']+$data1['biaya_kirim']+$data1['kode'])?></td>
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


              <?php




              //MENCARI DATA PEMBAYARAN JIKA SUDAH TERBAYAR MAKA FORMBAYAR DI HILANGKAN
                $query1 = "SELECT * FROM pembayaran WHERE id_pemesanan='$id_pemesanan' ";
                  $result1 = mysqli_query($db, $query1);
                  $data1 =mysqli_num_rows($result1);
                  if($data1 <  1){



                    ?>




              <!--  MULAI BAGI FORM BAYAR -->
              <div class="col-md-4 text-left p-2">
                <?php 
                  date_default_timezone_set("Asia/Jakarta");

                  $query3="SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan'";
                  $result3=mysqli_query($db,$query3);
                  $data3=mysqli_fetch_array($result3);
                  $hariini=date('Y-m-d h:i:s');
                  $input=$data3['tgl_input'];

                  $awal  = strtotime($input); //waktu awal

                  $akhir = strtotime($hariini); //waktu akhir

                  $diff  = $akhir - $awal;

                  $jam   = floor($diff / (60 * 60));

                  $menit = $diff - $jam * (60 * 60);
                  if($jam>24){?>
                    <p>Maaf Anda tidak bisa melanjutkan pembayaran</p>

                     <a class='btn btn-danger btn-sm' href="pesanan_batal.php?id=<?php echo $id_pemesanan?>">Batalkan Pesanan</a>
                    <?php
                      
                  }else{
                        $query4 = "SELECT * FROM pemesanan WHERE id_pemesanan='$id_pemesanan' ";
                        $result4 = mysqli_query($db, $query4);
                      
                        if(mysqli_num_rows($result4) <  1){
                        }else{
                           $data4=mysqli_fetch_array($result4);
                            if ($data4['status']=='menunggu') {
                              ?>
                              <p class="text-danger">Menunggu Konfirmasi</p>
                              <?php
                            }else{?>

                              <a href="f_metode_bayar.php?id_pemesanan=<?php echo $id_pemesanan?>" class="btn btn-primary btn-sm" name="bayar">Bayar</a>

                              <?php


                            }
                      
                           }
                     
                      
                      
                    
?>
                
                   
                  
                     <a class='btn btn-danger btn-sm' href="pesanan_batal.php?id=<?php echo $id_pemesanan?>" onclick="return confirm('Yakin Batalkan Pemesanan?')" >Batalkan Pesanan</a>
                  <?php echo "<a class='btn btn-warning btn-sm' href=\"javascript:history.go(-1)\" >Kembali</a>";?>
                  <!-- FUNGSI UNTUK KEMBALI KE HALAMAN SEBELUMNYA -->
                    <?php                  }

                ?>
               
              </div>
            </div>
              <!--  AKHIR BAGI FORM BAYAR -->
              
                 
            </div>
             <?php }else{
                $data2=mysqli_fetch_array($result1);?>

                <div class="col-md-4 text-left p-2">
                
                </p>
                <table>
                  <tr>
                    <td>Tanggal Bayar</td>
                    <td>: </td>
                    <td><?php
                                        $tanggal = $data2['tgl_bayar'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                  </tr>
                  <tr>
                    <td> Status</td>
                    <td>: </td>
                    <td><?php if ($data2['status']=='pending'){
                      echo 'Pending';?>
                      
                </table>
                <br>
                      <?php
                        }elseif ($data2['status']=='terbayar'){
                           echo 'Tervalidasi';?>
                       </td>
                       </tr>
                 
                      </table>
                        <br>
                        <a class="btn btn-primary btn-sm" href="konfirmasi_pesanan.php?id=<?php echo $id_pemesanan?>" >Konfirmasi Pengiriman</a>
                      <?php 
               
                        }?>




                <?php echo "<a class='btn btn-danger btn-sm' href=\"javascript:history.go(-1)\" >Kembali</a>";

                ?>
              </div>

              <?php }?> 

                 
                  
                 

                
          </div>

           <!-- AKHIR KOTAK BAYAR -->
           
          </div>
          <!-- BODY AKHIR -->

</body> 

<!-- MEMANGGIL LIBRARY  JQUERY  -->
<script src="js/jquery.js"></script>
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