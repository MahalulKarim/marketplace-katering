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
                        <h2 class="text-left">Nasi Box</h2>
                        <p></p>
                    </div>
                </div>
                

            </div>

           
        </div>
  <hr style="border: 1px solid #FFC82B;"> 
  <div class="row mx-auto">

     <?php
            // jika tombol cari di klik menjalankan query cari

        //     if (isset($_GET['kirim'])) {
        //         $cari = $_GET['cari'];
        //         $query = "SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND u.type_user='penjual' AND p.id_jenis=j.id_jenis AND j.jenis='Nasi Box' AND p.nama_menu like '%" . $cari . "%'";
        //     } else {
        //         // jika tombol cari tidak di klik menjalankan query menampilkan semua data
        //          $query="SELECT p.*,u.nama FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND  p.id_jenis=j.id_jenis AND j.jenis='Nasi Box' AND u.type_user='penjual'";
        //     }
    

         
        // $result=mysqli_query($db,$query);
      if (isset($_GET['kirim'])) {
                $cari = $_GET['cari'];

                 $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE p.id_jenis=j.id_jenis AND u.id_user=p.id_user AND u.status='aktif' AND j.jenis='Nasi Box' AND p.nama_menu like '%" . $cari . "%'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
         
                $data_barang = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE p.id_jenis=j.id_jenis AND u.id_user=p.id_user AND u.status='aktif' AND j.jenis='Nasi Box' AND p.nama_menu like '%" . $cari . "%' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;


              
            } else {
                // jika tombol cari tidak di klik menjalankan query menampilkan semua data
              $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE  u.id_user=p.id_user AND p.id_jenis=j.id_jenis AND u.status='aktif' AND j.jenis='Nasi Box'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
         
                $data_barang = mysqli_query($db,"SELECT p.*,j.jenis FROM menu p, jenis j, user u WHERE  u.id_user=p.id_user AND p.id_jenis=j.id_jenis AND u.status='aktif' AND j.jenis='Nasi Box' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                
            }

        while($data=mysqli_fetch_array($data_barang)){?>
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->

         <!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">
                   
                     <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                           <div class="col-md-6">
                            <p class="card-title"><b><?php echo $data['nama_menu'] ?></b></p>
                            <p class="card-text ">Rp. <?php echo number_format($data['harga'])?></p>
                            <div class="row mb-2">
                                 <div class="col-md-6">
                                    <form method="POST" action="f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <?php if ($data['status']=='kosong'){
                                                                  ?>
                                                                    <a class="btn btn-danger btn-sm" readonly>Kosong</a>
                                                                  <?php }else{?>
                                                                     <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>

                                                                  <?php                                                                  } 
                                                                  ?>
                                       <div class="btn-group pt-2">
                                         <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>
                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="detailmenu.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                       </div>
                                    </div>
                                  </div>
                                </div>

                      </div>
                    </div>
                   
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->


<!-- MODAL DETAIL -->
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


  <!-- <h4 class="text-center pt-2 mt-2">TERBARU</h4> -->
  
      
    
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