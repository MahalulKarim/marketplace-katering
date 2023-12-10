
<!-- include header -->
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
                        <h2 class="text-left">CATERING</h2>
                        <p></p>
                    </div>
                </div>
                

            </div>

           
        </div>
  <hr style="border: 1px solid #FFC82B;"> 
  <div class="row mx-auto pl-5">

     <?php
            // jika tombol cari di klik menjalankan query cari

            // if (isset($_GET['kirim'])) {
            //     $cari = $_GET['cari'];
            //     $query = "SELECT * FROM user WHERE type_user='penjual'  AND status='aktif' AND nama like '%" . $cari . "%'";
            // } else {
            //     // jika tombol cari tidak di klik menjalankan query menampilkan semua data
            //      $query="SELECT * FROM user WHERE type_user='penjual' AND status='aktif'";
            // }
    
            // $result=mysqli_query($db,$query);

      if (isset($_GET['kirim'])) {
                $cari = $_GET['cari'];

                 $batas = 2;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db,"SELECT * FROM user WHERE type_user='penjual'  AND status='aktif' AND nama like '%" . $cari . "%'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
         
                $data_barang = mysqli_query($db,"SELECT * FROM user WHERE type_user='penjual'  AND status='aktif' AND nama like '%" . $cari . "%' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;


              
            } else {
                // jika tombol cari tidak di klik menjalankan query menampilkan semua data
              $batas = 2;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
         
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($db,"SELECT * FROM user WHERE type_user='penjual' AND status='aktif'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
         
                $data_barang = mysqli_query($db,"SELECT * FROM user WHERE type_user='penjual' AND status='aktif' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                
            }
        while($data=mysqli_fetch_array($data_barang)){
          ?>
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK KATERING-->
          <div class="card mr-1 ml-3 " style="width: 38rem;">
                    <img src="../asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      
                        <p class="card-title "><?php echo $data['nama_katering'] ?></p>
                         <p class="card-text "><?php echo $data['alamat'] ?></p>

                    </div>
                    <div class="card-footer text-center pt-2">
                         <div class="btn-group" role="group" aria-label="Basic example">
                         
                            <a href="#" class="btn btn-success btn-sm" data-target="#catering<?php echo $data['id_user']; ?>" data-toggle="modal">Detail</a>
                            
                        </div>
                    </div>
                </div>
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK KATERING-->


<!-- modal untuk detail -->
          <div class="modal" tabindex="-1" id="catering<?php echo $data['id_user'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Catering</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                  <!-- MENCARI DETAIL KATERING -->
                   <?php
                        $id = $data['id_user']; 

                        $query1="SELECT * FROM user u WHERE id_user='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                    ?>
<!-- MENAMPILKAN DETAIL KATERING -->
                  <div class="col-md-4">
                    <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']?>" class="img-fluid" >

                  </div>
                  <div class="col-md-7">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Catering</th>
                          <td><?php echo $data1['nama_katering']?></td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td> <?php echo $data1['alamat']?></td>
                        </tr>
                        
                      </table>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <a href="profil_penjual.php?id=<?php echo $data1['id_user']?>" class="btn btn-success btn-sm">Kunjungi Penjual</a>
                 <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
      </div>
        <?php } ?>

      
  </div>


<?php 
    if ($jumlah_data>2) {?>




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




<!--   <h4 class="text-center pt-2 mt-2">TERBARU</h4> -->
  
      
    
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