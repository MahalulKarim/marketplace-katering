<?php include "atas.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-5 mb-5">
    
            <div class="row mx-auto p-3" style="background-color: #e9e9e9">

               <?php
                      // jika tombol cari di klik menjalankan query cari

                      if (isset($_GET['id'])) {
                          $id=$_GET['id'];
                          $query1="SELECT pr.id_menu,pr.gambar,pr.nama_menu,pr.harga,pr.deskripsi,pr.status as stat,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";

                                  $result1=mysqli_query($db,$query1);
                                  if(mysqli_num_rows($result1) <1 )
                                  {
                                    die("Data Tidak Ditemukan..");
                                  }else{

                                  $data1=mysqli_fetch_array($result1);
                                  }
                                }?>
                <div class="col-md-3">
                    

                  <div class="bd-example">
                                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                                             
                                              <div class="carousel-inner">
                                                 <div class="carousel-item active">
                                                       <img src="asset/user/gambar/toko/menu/<?php echo $data1['gambar']?>" class="img-thumbnail" style="width:20rem; height: 18rem">
                                                     
                                                  </div>

                       

                                                 <?php 
                                                         
                                                            $query2="SELECT * FROM gambar where id_menu='$id'";
                                                            $result2=mysqli_query($db,$query2);
                                                            $jumlah= mysqli_num_rows($result2);
                                                            for ($i=0; $i < $jumlah ; $i++) { 
                                                                $data2 = mysqli_fetch_array($result2); 
                                                                 ?>
                                                              
                                                  <div class="carousel-item">
                                                      <img src="asset/user/gambar/toko/menu/<?php echo $data2['gambar']?>" class="img-thumbnail" style="width:20rem; height: 18rem" alt='menu'>
                                                     </div>
                                                  <?php  }
                                                        ?>
                                                  </div>
                                              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                  <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                  <span class="sr-only">Next</span>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="pt-5">
                                        <?php echo "<a class='btn btn-danger btn-sm' href=\"javascript:history.go(-1)\" >Kembali</a>";?>
                                      </div>


                </div>
                <div class="col-lg-8">
                  

                  <table class="table table-borderless mb-5">
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
                                 

                                    <a href="f_login.php" class="btn btn-info btn-sm">Login Untuk Pesan</a>

                                    <a href="#" class="btn btn-success btn-sm " data-target="#user<?php echo $data1['id_user']; ?>" data-toggle="modal">

                                   Lihat Catering</a>
                                    </div>
                                </form>

                                  <!-- [[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]] -->

                                

                        
                </div>




            </div>
            <div class="modal fade" id="user<?php echo $data1['id_user']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">


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
                        $id = $data1['id_user']; 

                        $query1="SELECT * FROM user u WHERE id_user='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                    ?>
<!-- MENAMPILKAN DETAIL PRODUK -->
                  <div class="col-md-6">
                    <img src="asset/user/gambar/user/foto/<?php echo $data1['foto']?>" class="img-fluid" >

                  </div>
                  <div class="col-md-6">
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
                  
                 <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>

  </div>


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
