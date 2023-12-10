
<!-- include header -->
<?php include "atas1.php"?>
  <!-- body start -->
  <div class="container-fluid pt-5">
  </div>
    <div class="container-fluid pt-2 mb-5">
     
        <div class="row mx-auto text-center pt-3">

           <?php
               // mencari penjual

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM user WHERE id_user='$id' AND status='aktif'";
                    $result=mysqli_query($db,$query);
                    $data=mysqli_fetch_array($result);
                        if(mysqli_num_rows($result) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                
                }
            ?>
    
          <div class="col-md-2">
          </div>

          <div class="col-md-8">          
            <div class="kotakpenjual">
              <img src="../asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">

            <h4 class="text-center p-3"><?php echo $data['nama_katering'] ?></h4>
            </div>
          </div>
        </div>
     <div class="row mx-auto ">
        <div class="col-md-3">
           <a href="f_laporkan.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-sm">Laporkan</a>
        </div> 
        <div class="col-md-6"> 
            <div class="kotakprofilpenjual p-3">
              <p><i class="fas fa-map-marker-alt"></i> <?php echo $data['alamat'] ?></p>
              <p><i class="fa fa-envelope"></i> <?php echo $data['email'] ?></p>
            </div>
        </div>  
    </div>

    <hr style="border: 1px solid #FFC82B;"> 
    <h4 class="text-center pt-4">MENU</h4>
    <div class="row mx-auto mb-5">



     <!--  -->
 <?php  
              
      $query="SELECT p.*,j.jenis FROM menu p, jenis j WHERE p.id_jenis=j.id_jenis AND p.id_user='$id'";
      $result=mysqli_query($db,$query);
        while($data=mysqli_fetch_array($result)){

                                       if($data['jenis']=='Snack'){
                                         
                                         $id=$data['id_menu'];
                                         $query4="SELECT  min(harga) as min,max(harga) as max FROM varian WHERE id_menu='$id'";
                                         $result4=mysqli_query($db,$query4);


                                         if (mysqli_num_rows($result4)<1) {
                                            # code...
                                          } else{
                                            $data4=mysqli_fetch_array($result4);

                                                                                      }
                                        ?>


                                             <div class="card mr-1 ml-3 " style="width: 27rem; background-color:  #F8F8FF;">
                   
                                                <div class="card-body">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                        <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                                                      </div>
                                                      <div class="col-md-6">
                                                        <p class="card-title mb-2"><b><?php echo $data['nama_menu']?></b></p>
                                                        <p><?php ;?></p>

                                                        <p class="card-text mb-2">Rp. <?php echo number_format($data4['min'])?> - Rp.<?php echo number_format($data4['max'])?></p>
                                                            
                                                          <div class="row mb-2">


                                                             <div class="col-md-6">
                                                                <?php 
                                                                if($data['jenis']=='Snack'){?>
                                                                   <div class="row">
                                                              <div class="col-md-12">


                                                                 <form method="GET" action="detailmenu.php">
                                                                  <input type="hidden" name="id2" value="<?php echo $data['id_menu']?>">
                                                                    <?php if ($data['status']=='kosong'){
                                                                  ?>
                                                                    <a class="btn btn-danger btn-sm" readonly>Kosong</a>
                                                                  <?php }else{?>
                                                                     <input type="submit" class="btn btn-primary btn-sm" value='Pesan sekarang'>

                                                                  <?php                                                                  } 
                                                                  ?>
                                                                 
                                                                </form>


                                                               </div> 
                                                               <div class="col-lg-12">
                                                                  <div class="btn-group pt-2">
                                                                    <a href="detailmenu.php?id2=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" >

                                                                   <a href="s_wishlist.php?id=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" >
                                                                     

                                                                   </a>  
                                                                    <a href="detailmenu.php?id2=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                                                  </div>
                                                                  </div>
                                                                </div>

                                                                  <?php



                                                                }else{

                                                                  ?>



                                                                <form method="POST" action="f_pesan_keranjang.php">
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
                                                                    <a href="detailmenu.php?id2=<?php echo $data['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>              
                                                                   </div>
                                                                    <?php }?>  
                                                                </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                               
                                      </div>








                                        <?php

                                       }else{

          ?>
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card mr-1 ml-3 " style="width: 27rem; background-color:  #F8F8FF;">
                   
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title mb-2"><b><?php echo $data['nama_menu'] ?></b></p>

                            <p class="card-text mb-2">Rp. <?php echo number_format($data['harga'])?></p>
                                
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


<!-- modal untuk detail -->
       
        <?php } } ?>

      
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