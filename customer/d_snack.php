<?php include "atas.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-2 mb-5">
     <div id="demo" class="carousel slide " data-ride="carousel">

          
          

            <!-- The slideshow -->
            <div class="carousel-inner">
              
                <div class="carousel-item active">
                    <img src="../asset/user/assets/img/atasmenu.png" alt="Slide1" width="100%" height="50%">
                    <div class="carousel-caption">
                        <h2 class="text-left">Snack</h2>
                        <p></p>
                    </div>
                </div>
                

            </div>

           
        </div>
  <div class="row text-center">
    <div class="col-md-12 p-4">
       <a href="d_snack.php" class="link-info mr-5"><b>Semua</b></a>
      
    
    
      <?php
        $query1="SELECT * FROM subjenis";
        $result1=mysqli_query($db,$query1);
        while ($dat1=mysqli_fetch_array($result1)) {?>
          <a href="d_snack.php?nama=<?php echo $dat1['nama']?>" class="link-info mr-5">
            <b><?php echo $dat1['nama']?>
              
            </b>
          </a>

          <?php
        }

  ?>
  </div>
    
  </div>

  <div class="row mx-auto">

    

     <?php
            // jika tombol cari di klik menjalankan query cari

            if (isset($_GET['kirim'])) {
                $cari = $_GET['cari'];

                $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE p.id_jenis=j.id_jenis AND u.id_user=p.id_user AND u.status='aktif'  AND j.jenis='Snack' AND p.nama_menu like '%" . $cari . "%'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
         
                $data_barang = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE p.id_jenis=j.id_jenis AND u.id_user=p.id_user AND u.status='aktif'  AND j.jenis='Snack' AND p.nama_menu like '%" . $cari . "%' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                // $query = "SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND u.type_user='penjual' AND p.id_jenis=j.id_jenis AND j.jenis='Snack' AND p.nama_menu like '%" . $cari . "%'";

            }elseif (isset($_GET['nama'])) {
              $cari=$_GET['nama'];
               $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE p.id_jenis=j.id_jenis AND u.id_user=p.id_user AND u.status='aktif'  AND j.jenis='Snack' AND p.nama_menu like '%" . $cari . "%'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                 $data_barang = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE p.id_jenis=j.id_jenis AND u.id_user=p.id_user AND u.status='aktif'  AND j.jenis='Snack' AND p.nama_menu like '%" . $cari . "%' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

              //   $query = "SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND u.type_user='penjual' AND p.id_jenis=j.id_jenis AND j.jenis='Snack' AND p.nama_menu like '%" . $cari . "%'";

              // $query = "SELECT SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND  p.id_jenis=j.id_jenis AND j.jenis='Snack' AND u.type_user='penjual' AND u.status='aktif' AND p.nama_menu like '%" . $cari . "%'";

            } else {

               $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db,"SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND  p.id_jenis=j.id_jenis AND j.jenis='Snack' AND u.type_user='penjual' AND u.status='aktif'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
         
                $data_barang = mysqli_query($db,"SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND  p.id_jenis=j.id_jenis AND j.jenis='Snack' AND u.type_user='penjual' AND u.status='aktif' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                // jika tombol cari tidak di klik menjalankan query menampilkan semua data
                 // $query="SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND  p.id_jenis=j.id_jenis AND j.jenis='Snack' AND u.type_user='penjual'";
            }
    

         
        
        if (mysqli_num_rows($data_barang)<1) {
          echo "<h6 class='text-center'>Menu yang anda cari saat ini belum tersedia..</h6>";
        }
        while($data=mysqli_fetch_array($data_barang)){?>

<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">
                   
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                           <div class="col-md-6">
                            <p class="card-title"><b><?php echo $data['nama_menu'] ?></b></p>
                             <?php
                             $id_menu=$data['id_menu'];
                             $query4="SELECT  min(v.harga) as min,max(v.harga) as max FROM varian v, menu p WHERE v.id_menu=p.id_menu AND p.id_menu='$id_menu'";
                            $result4=mysqli_query($db,$query4);
                             if (mysqli_num_rows($result4)<1) {
                                            # code...
                                          } else{
                                            $data4=mysqli_fetch_array($result4);

                                                                                      }

                            ?>



                            <p class="card-text ">Rp. <?php echo number_format($data4['min'])?> - Rp. <?php echo number_format($data4['max'])?></p>
                            <div class="row mb-2">
                                 <div class="col-md-6">
                                    <form method="GET" action="detailmenu.php">
                                      <input type="hidden" name="id2" value="<?php echo $data['id_menu']?>">
                                      
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                     <?php if ($data['status']=='kosong'){
                                                                  ?>
                                                                    <a class="btn btn-danger btn-sm" readonly>Kosong</a>
                                                                  <?php }else{?>
                                                                     <a href="detailmenu.php?id2=<?php echo $data['id_menu']?>" class="btn btn-primary btn-sm" value='Pesan sekarang'>Pesan sekarang</a>

                                                                  <?php                                                                  } 
                                                                  ?>
                                      
                                       <div class="btn-group pt-2">
                                         <a href="detailmenu.php?id2=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></a>
                                    </form>
                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                         <a href="detailmenu.php?id2=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                       
                                       </div>
                                    </div>
                                  </div>
                                </div>

                      </div>
                    </div>
                   
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->

   <!-- modal untuk detail -->
          <div class="modal" tabindex="-1" id="menu1<?php echo $data['id_menu'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail menu</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                  <!-- MENCARI DETAIL menu -->
                   <?php
                        $id = $data['id_menu']; 

                        $query1="SELECT pr.*,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                    ?>
<!-- MENAMPILKAN DETAIL menu -->
                  <div class="col-md-4">
                    <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']?>" class="img-fluid" >

                  </div>
                  <div class="col-md-7">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Menu</th>
                          <td><?php echo $data1['nama_menu']?></td>
                        </tr>
                        <tr>
                          <th>Harga</th>
                          <td>Rp. <?php echo number_format($data1['harga'])?> Per Box/Paket</td>
                        </tr>
                        <tr>
                          <th>Deskripsi</th>
                          <td><?php  echo
                                        nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));?></td>
                        </tr>
                        <tr>
                          <th>Penjual</th>
                          <td><?php echo $data1['nama_katering']?></td>
                        </tr>
                      </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <form method="POST" action="f_pesan_keranjang.php">
                    <div class="row">
                        <div class="col-md-3">
                          <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1">
                        </div>
                        <div class="col-md-12">                        
                        </div>                
                    </div>        
                          <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                          <div class="col-md-6">
                          </div>                         
                           </br>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <input type="submit" name="pesan" class="btn btn-danger btn-sm" value='Pesan sekarang'>           
                          <input type="submit" name="keranjang" class="btn btn-primary btn-sm"  value='Tambah ke keranjang'>
                          </div>
                          <a href="profil_penjual.php?id=<?php echo $data['id_user']?>" class="btn btn-success btn-sm">Kunjungi Penjual</a>
                      </form> 
               </div>
              </div>
            </div>
      </div>
        <?php } ?>

      
  </div>
  <?php 
    if ($jumlah_data>6) {?>




   <div class="text-center mb-3 pt-3">
  <div class="btn-group" role="group" aria-label="Basic example">
  <a class="btn btn-info rounded-0" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
   
    <?php 
        for($x=1;$x<=$total_halaman;$x++){
          ?> <a class="btn btn-info rounded-0" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
          <?php
        }
        ?>  
      <a  class="btn btn-info rounded-0" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
  </div>
 </div>
  <?php
      
    }
  ?>
<!-- 
  <h4 class="text-center pt-2 mt-2">TERBARU</h4> -->
  
      
    
    </div>
    <footer class="text-white p-5" style="background-color: #FCB900;">
        <div class="row">
            <div class="col-md-3">
                <h5>TENTANG KAMI</h5>
                <ul>
                    <li style='list-style-type: none;'>Tentang Marketplace Katering</li>
                </ul>
            </div>
        <div class="col-md-3">
          <h5></h5>
          <ul>
            <li style='list-style-type: none;'></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5></h5>
          <ul>
            <li style='list-style-type: none;'></li>
          </ul>
        </div>
            <div class="col-md-3">

                <h5>SOSIAL MEDIA KAMI</h5>
                <ul>
             <style type="text/css">
            .a{
              color: white;
            }
          </style>
          <li  style='list-style-type: none; color: white;'>
            <a href="" style="color: white; text-decoration: none;"><i class="fab fa-instagram"></i> instagram
            </a>
          </li>
           <li  style='list-style-type: none; color: white;'>
                    <a href="" style="color: white; text-decoration: none;"><i class="fab fa-facebook"></i> facebook</a>
          </li>
                    <li style='list-style-type: none;'><i class="fab fa-whatsapp"></i> whatsapp</li>
                </ul>
            </div>
        </div>
        <p class="text-center mt-4">&copy; Copyright 2021 All Right Reserved</p>
    </footer>
</body>
</html>