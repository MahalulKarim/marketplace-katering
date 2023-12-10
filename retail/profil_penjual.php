
<!-- include header -->
<?php include "atas1.php"?>
  <!-- body start -->
  <div class="container-fluid pt-5">
  </div>
    <div class="container-fluid pt-2 mb-5">
     
      <hr style="border: 1px solid #FFC82B;"> 
        <div class="row mx-auto text-center">

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
     <?php $query1= "SELECT j.jenis, m.* FROM menu m, jenis j  WHERE j.id_jenis=m.id_jenis AND m.id_user='$id'";
           $result1=mysqli_query($db,$query1);
           $cek = mysqli_num_rows($result1);
           if($cek==0){ ?>
            <div class="col-md-12">
        
            <p class="text-center">Penjual Ini Belum Memiliki Menu!</p>
           </div>
          <?php } 
           while($data1=mysqli_fetch_array($result1)){?>
            <!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
           <div class="card mr-1 ml-3 " style="width: 25rem; background-color:  #F8F8FF;">

               <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                            <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-6">
                            <p class="card-title mb-2"><b><?php echo $data1['nama_menu'] ?></b></p>

                               
                             <?php if($data1['jenis']=='Snack'){




                                      $id1=$data1['id_menu'];
                                       $query4="SELECT  min(harga) as min,max(harga) as max FROM varian WHERE id_menu='$id1'";
                                      $result4=mysqli_query($db,$query4);
                                      if (mysqli_num_rows($result4)<1) {
                                       
                                      } else{
                                           $data4=mysqli_fetch_array($result4);
                                            if(empty($data4['min'] AND $data4['max'])){?>
                                               <p class="card-text mb-2">Rp. <?php echo number_format($data1['harga'])?></p>
                                              <?php


                                            }else{
                                              ?>
                                            <p class="card-text mb-2">Rp. <?php echo number_format($data4['min'])?> - Rp.<?php echo number_format($data4['max'])?></p>
                                           <?php


                                            }
                                            }

                                      }else{






                                        ?>

                                     <p class="card-text mb-2">Rp. <?php echo number_format($data1['harga'])?></p>

                          <?php
                                }
                       
                                  if ($data1['status']=='kosong') {?>
                                    <div class="row mb-2">
                                 <div class="col-md-6">

                                    <form method="POST" action="f_pesan_keranjang.php">
                                      <input type="hidden" name="id" value="<?php echo $data1['id_menu']?>">
                                      <input type="text" readonly value="Kosong" class="form-control form-control-sm bg-danger text-white" name="jumlah" required="" min="1" value="1">
                                 </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                       <div class="btn-group pt-2">
                                        
                                    </form>


                                       <a href="s_wishlist.php?id=<?php echo $data1['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                       <?php if($data1['jenis']=='Snack'){?>

                                          <a href="detailmenu.php?id2=<?php echo $data1['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>

                                        <?php



                                       }else{?>
                                        <a href="detailmenu.php?id=<?php echo $data1['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                      <?php } ?>
                                       </div>
                                    </div>

                              </div>
                                    <?php
                                  }else{
                                ?>
                                
                              <div class="row mb-2">
                                 <div class="col-md-6">


                                  <?php if ($data1['jenis']=='Snack') {?>


                                       <form method="GET" action="detailmenu.php">
                                      <input type="hidden" name="id2" value="<?php echo $data1['id_menu']?>">
                                      <input type="number" class="form-control form-control-sm" min="1" value="1">
                                 </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="submit" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                       <div class="btn-group pt-2">
                                         <button type="submit" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                    </form>



                                    <?php

                                  }else{?>

                                       <form method="POST" action="f_pesan_keranjang.php">
                                            <input type="hidden" name="id" value="<?php echo $data1['id_menu']?>">
                                            <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1" value="1">
                                       </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" name="pesan" class="btn btn-primary btn-sm" value='Pesan sekarang'>
                                             <div class="btn-group pt-2">
                                               <button type="submit" name="keranjang" class="btn btn-outline-danger btn-sm fas fa-cart-plus pt-2" ></button>
                                          </form>

                                    <?php
                                    
                                  }?>

                                   





                                       <a href="s_wishlist.php?id=<?php echo $data1['id_menu']?>" class="btn btn-outline-danger btn-sm fas fa-heart pt-2" ></a>
                                       <?php if($data1['jenis']=='Snack'){?>

                                          <a href="detailmenu.php?id2=<?php echo $data1['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>

                                        <?php



                                       }else{?>
                                        <a href="detailmenu.php?id=<?php echo $data1['id_menu']?>" class="btn btn-outline-danger btn-sm " >Detail</a>
                                      <?php } ?>
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