
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
                    <img src="asset/user/assets/img/atasmenu.png" alt="Slide1" width="100%" height="50%">
                    <div class="carousel-caption">
                        <h2 class="text-left">CATERING</h2>
                        <p></p>
                    </div>
                </div>
                

            </div>

           
        </div>
  <div class="row mx-auto pt-3 mb-2">

     <form method="GET">
      <div class="input-group">
      


      <input type="text" name="cari" placeholder="Cari Katering" class="form-control rounded-0">
     <button type="submit" name="kirim" class="btn btn-success fa fa-search pt-2 rounded-0"></button>
      </div>
   
  </form>

</div>
 
  <div class="row mx-auto">


     <?php
            // jika tombol cari di klik menjalankan query cari

            if (isset($_GET['kirim'])) {
                $cari = $_GET['cari'];
                $query = "SELECT * FROM user WHERE type_user='penjual'  AND status='aktif' AND nama like '%" . $cari . "%'";
            } else {
                // jika tombol cari tidak di klik menjalankan query menampilkan semua data
                 $query="SELECT * FROM user WHERE type_user='penjual' AND status='aktif'";
            }
    
        $result=mysqli_query($db,$query);
        while($data=mysqli_fetch_array($result)){
          ?>
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK PRODUK-->
          <div class="card mr-1 ml-3 " style="width: 39rem;">
                    <img src="asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
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
<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK PRODUK-->


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
                  <!-- MENCARI DETAIL PRODUK -->
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
<!-- MENAMPILKAN DETAIL PRODUK -->
                  <div class="col-md-4">
                    <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']?>" class="img-fluid" >

                  </div>
                  <div class="col-md-7">
                      <table class="table table-borderless">
                        <tr>
                          <th>Nama Catering</th>
                          <td><?php echo $data1['nama']?></td>
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