
<!-- include header -->
<?php include "atas.php"?>
  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-2 mb-2">
     <div id="demo" class="carousel slide " data-ride="carousel">

          
          

            <!-- The slideshow -->
            <div class="carousel-inner">
              
                <div class="carousel-item active">
                    <img src="asset/user/assets/img/atasmenu.png" alt="Slide1" width="100%" height="50%">
                    <div class="carousel-caption">
                        <h2 class="text-left">Tumpeng</h2>
                        <p></p>
                    </div>
                </div>
                

            </div>

           
        </div>  
      </div>
    <div class="container-fluid mb-3">
  <div class="row mx-auto">

     <?php
                  
     $batas = 6;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
        $previous = $halaman - 1;
        $next = $halaman + 1;

          $query="SELECT p.*,u.nama,j.* FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND u.type_user='penjual' AND j.id_jenis=p.id_jenis AND j.jenis='Tumpeng'";
        
        $data = mysqli_query($db,$query);
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
 
        $query1="SELECT p.*,u.nama,j.* FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND u.type_user='penjual' AND j.id_jenis=p.id_jenis AND j.jenis='Tumpeng' LIMIT $halaman_awal, $batas";

        $data_barang = mysqli_query($db,$query1);
        $nomor = $halaman_awal+1;

                 while ($data = mysqli_fetch_assoc($data_barang)) { 
          ?>
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">

               <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title mb-2"><b><?php echo $data['nama_menu'] ?></b></p>
                            <p class="card-text mb-2">Rp. <?php echo number_format($data['harga'])?></p>

                                <?php 
                                  if ($data['status']=='kosong') {?>
                                    <div class="row mb-2">
                                 <div class="col-md-6">

                                    <form method="POST" action="retail/f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="text" readonly value="Kosong" class="form-control form-control-sm bg-danger text-white" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                       <div class="btn-group pt-2">
                                        
                                    </form>


                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="detailmenu.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                       </div>
                                    </div>

                              </div>
                                    <?php
                                  }else{
                                ?>
                                
                              <div class="row mb-2">
                                 <div class="col-md-6">

                                    <form method="POST" action="retail/f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                       <div class="btn-group pt-2">
                                         <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>


                                       <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                        <a href="detailmenu.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                       </div>
                                    </div>

                              </div>
                              <?php }?>
                          </div>
                      </div>
                    </div>

                                     
          </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->

        <?php } ?>

      
  </div>

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






 <!--  <h4 class="text-center pt-2 mt-2">TERBARU</h4> -->
  
      
    
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