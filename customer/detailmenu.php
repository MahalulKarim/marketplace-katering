<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-4 mb-5">
    
            <div class="row mx-auto p-3" style="background-color: #e9e9e9">

               <?php
                      // jika tombol cari di klik menjalankan query cari

                      if (isset($_GET['id'])) {
                          $id=$_GET['id'];
                          $query1="SELECT pr.*,u.* FROM menu pr, user u WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual'";

                                  $result1=mysqli_query($db,$query1);
                                  if(mysqli_num_rows($result1) <1 )
                                  {
                                    die("Data Tidak Ditemukan..");
                                  }else{

                                  $data1=mysqli_fetch_array($result1);
                                  }
                      ?>
                      <!-- ====================== -->

                                     <div class="col-md-3">
                    

                                                <div class="bd-example">
                                                                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                                                                           
                                                                            <div class="carousel-inner">
                                                                               <div class="carousel-item active">
                                                                                     <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']?>" class="img-thumbnail" style="width:20rem; height: 18rem">
                                                                                   
                                                                                </div>

                                                     

                                                                               <?php 
                                                                                       
                                                                                          $query2="SELECT * FROM gambar where id_menu='$id'";
                                                                                          $result2=mysqli_query($db,$query2);
                                                                                          $jumlah= mysqli_num_rows($result2);
                                                                                          for ($i=0; $i < $jumlah ; $i++) { 
                                                                                              $data2 = mysqli_fetch_array($result2); 
                                                                                               ?>
                                                                                            
                                                                                <div class="carousel-item">
                                                                                    <img src="../asset/user/gambar/toko/menu/<?php echo $data2['gambar']?>" class="img-thumbnail" style="width:20rem; height: 18rem">
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

                                                       <form method="POST" action="f_pesan_keranjang.php" class="pt-5">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                  <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1">
                                                                </div>
                                                                <div class="col-md-12">                        
                                                                </div>                
                                                            </div>        
                                                                  <input type="hidden" name="id" value="<?php echo $data1['id_menu']?>">
                                                                  <div class="col-md-6">
                                                                  </div>                         
                                                                   </br>
                                                                    <?php 
                                                                   $key=$data1['id_menu'];
                                                                   $query5="SELECT * FROM menu WHERE id_menu='$key'";
                                                                   $result5=mysqli_query($db,$query5);
                                                                   $data5=mysqli_fetch_array($result5);

                                                                   if ($data5['status']=='kosong') {
                                                                     echo "<p class='text-danger'>Maaf menu saat ini tak tersedia</p>";
                                                                   } else{?>
                                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                                      <input type="submit" name="pesan" class="btn btn-danger btn-sm" value='Pesan sekarang'>           
                                                                      <input type="submit" name="keranjang" class="btn btn-primary btn-sm"  value='Tambah ke keranjang'>
                                                                  </div>


                                                                  <?php 
                                                                  }

                                                                      $key=$data1['id_menu'];
                                                                      $data1['id_user'];
                                                                      $user=$hasil['id_user'];
                                                                      $query3="SELECT * FROM chat2 c, chatroom ch WHERE c.id_menu='$key' AND c.id_chat=ch.id_chat AND ch.id_user='$user'";
                                                                      $result3=mysqli_query($db,$query3);
                                                                      if(mysqli_num_rows($result3)<1){?> 

                                                                         <div class="btn-group ml-4" role="group" aria-label="Basic example">
                                                                          <a href="#" class="btn btn-warning btn-sm" data-target="#chat<?php echo $data1['id_menu']?>" data-toggle="modal">Chat Sekarang</a>
                                                                        <?php

                                                                      }else{?> 
                                                                        <div class="btn-group ml-4" role="group" aria-label="Basic example">
                                                                         <a href="chat.php" class="btn btn-warning btn-sm">Chat</a>
                                                                        <?php
                                                                       
                                                                      }
                                                                    ?>

                                                                 
                                                                  <a href="profil_penjual.php?id=<?php echo $data1['id_user']?>" class="btn btn-success btn-sm">Kunjungi Penjual</a>
                                                                  </div>
                                                              </form>
                                              </div>




                                          </div>
                                          <div class="modal fade" id="chat<?php echo $data1['id_menu']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">



                                        <div class="modal-dialog modal-dialog modal-dialog-scrollable">
                                          <div class="modal-content">
                                            <div class="modal-header bg-warning" style="height: 60px">
                                                 <p>  <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']; ?>" class="img-circle bordered "  alt="..." width="40" height="40"> <?php echo $data1['nama_katering']; ?></p>
                                              <p class="modal-title"></p>

                                              <button type="button" class="close btn-danger" data-dismiss="modal">X</button>
                                            </div>
                                            <div class="modal-body">
                                                 <div class="col">
                                              <div class="card-body">
                                              
                                                        <div class="p-3" style="background-color: #1d1744;
                                                                    border-radius: 5px;
                                                                    color: white;


                                                        ">
                                                          <?php echo $data1['nama_menu'];?>
                                                        </div>
                                                       
                                                
                                             
                                              
                                                
                                               </div>
                                  
                                          </div>
                                            </div>

                                            <div class="modal-footer">
                                              <div class="col-md-12 p-2">
                                                 <form method="POST" action="kirim_pesan.php">
                                                  <input type="hidden" name="id_user2" value="<?php echo $data1['id_user']?>">
                                                  <input type="hidden" name="id_menu" value="<?php echo $data1['id_menu']?>">

                                                <div class="form-group">
                                                  
                                                  <textarea class="form-control form-control-sm"  id="username" name="pesan" placeholder="Ketikan pesan.." style="background: #DCDCDC;resize:none;height:70px;" required="">Apakah menu ini tersedia?</textarea>
                                              </div>
                                              </div>
                                               
                                         
                                                <button type="submit" class="btn btn-primary btn-sm" name="kirim2" >Kirim</button>
                                               
                                                      

                                                </form>
                                                 
                                                      
                                                           </div>
                                                    </div>
                                                </div>
                                            </div>



                                  </div>
                                  <!-- ============== -->





                      <?php






                      }elseif(isset($_GET['id2'])) {
                          $id=$_GET['id2'];
                          $query1="SELECT pr.*,u.*,min(v.harga) as minh,max(v.harga) as maxh FROM menu pr, user u, varian v WHERE pr.id_menu='$id' AND pr.id_user=u.id_user AND u.type_user='penjual' AND v.id_menu=pr.id_menu";

                                  $result1=mysqli_query($db,$query1);
                                  if(mysqli_num_rows($result1) <1 )
                                  {
                                    die("Data Tidak Ditemukan..");
                                  }else{

                                  $data1=mysqli_fetch_array($result1);
                                  }
                          ?>
                          <!-- ========================== -->
                            <!-- ====================== -->

                                     <div class="col-md-3">
                    

                                                <div class="bd-example">
                                                                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="false">
                                                                           
                                                                            <div class="carousel-inner">
                                                                               <div class="carousel-item active">
                                                                                     <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']?>" class="img-thumbnail" style="width:20rem; height: 18rem">
                                                                                   
                                                                                </div>

                                                     

                                                                               <?php 
                                                                                       
                                                                                          $query2="SELECT * FROM gambar where id_menu='$id'";
                                                                                          $result2=mysqli_query($db,$query2);
                                                                                          $jumlah= mysqli_num_rows($result2);
                                                                                          for ($i=0; $i < $jumlah ; $i++) { 
                                                                                              $data2 = mysqli_fetch_array($result2); 
                                                                                               ?>
                                                                                            
                                                                                <div class="carousel-item">
                                                                                    <img src="../asset/user/gambar/toko/menu/<?php echo $data2['gambar']?>" class="img-thumbnail" style="width:20rem; height: 18rem">
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
                                                                  <td>Rp. <?php echo number_format($data1['minh'])?> - Rp. <?php echo number_format($data1['maxh'])?> / Varian</td>
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

                                                              <!-- form -->
                                                       <form method="POST" action="f_pesan_keranjang.php" class="pt-5">
                                                         <input type="hidden" name="id_menu" value="<?php echo $data1['id_menu']?>">
                                                            <div class="row">
                                                                 <div class="col-md-12 mb-2">

                                                              <h6>Varian *</h6>
                                                              <div class="form-check">
                                                                 <?php
                                                                    $query4="SELECT * FROM varian WHERE id_menu='$id'";
                                                                    $result4=mysqli_query($db,$query4);
                                                                    while ($data4=mysqli_fetch_array($result4)) {?>

                                                                  <input class="form-check-input  ml-2" type="checkbox" value="<?php echo $data4['id_varian']?>" id="flexCheckDefault" name="varian[]">

                                                                 
                                                                       <label class="form-check-label ml-4" for="flexCheckDefault">
                                                                        <b>
                                                                    <?php echo $data4['varian'];?>
                                                                    <span class="text-danger">Rp. <?php echo number_format($data4['harga'])?></span>

                                                                  </b>

                                                                  </label>

                                                                      <?php
                                                                    }
                                                                  ?>
                                                                 
                                                                </div>
                                                              </div>
                                                            </br>

                                                                <div class="col-md-2">
                                                                  <input type="number" class="form-control form-control-sm" name="jumlah" required="" min="1">
                                                                </div>
                                                                <div class="col-md-12">                        
                                                                </div>                
                                                            </div>        
                                                                  <input type="hidden" name="id" value="<?php echo $data1['id_menu']?>">
                                                                  <div class="col-md-6">
                                                                  </div>                         
                                                                   </br>
                                                                   <?php 
                                                                   $key=$data1['id_menu'];
                                                                   $query5="SELECT * FROM menu WHERE id_menu='$key'";
                                                                   $result5=mysqli_query($db,$query5);
                                                                   $data5=mysqli_fetch_array($result5);

                                                                   if ($data5['status']=='kosong') {
                                                                     echo "<p class='text-danger'>Maaf menu saat ini tak tersedia</p>";
                                                                   } else{?>
                                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                                      <input type="submit" name="pesan3" class="btn btn-danger btn-sm" value='Pesan sekarang'>           
                                                                      <input type="submit" name="keranjang3" class="btn btn-primary btn-sm"  value='Tambah ke keranjang'>
                                                                  </div>


                                                                  <?php 
                                                                  }
                                                                      $key=$data1['id_menu'];
                                                                      $data1['id_user'];
                                                                      $user=$hasil['id_user'];
                                                                      $query3="SELECT * FROM chat2 c, chatroom ch WHERE c.id_menu='$key' AND c.id_chat=ch.id_chat AND ch.id_user='$user'";
                                                                      $result3=mysqli_query($db,$query3);
                                                                      if(mysqli_num_rows($result3)<1){?> 

                                                                         <div class="btn-group ml-4" role="group" aria-label="Basic example">
                                                                          <a href="#" class="btn btn-warning btn-sm" data-target="#chat<?php echo $data1['id_menu']?>" data-toggle="modal">Chat Sekarang</a>
                                                                        <?php

                                                                      }else{?> 
                                                                        <div class="btn-group ml-4" role="group" aria-label="Basic example">
                                                                         <a href="chat.php" class="btn btn-warning btn-sm">Chat</a>
                                                                        <?php
                                                                       
                                                                      }
                                                                    ?>

                                                                 
                                                                  <a href="profil_penjual.php?id=<?php echo $data1['id_user']?>" class="btn btn-success btn-sm">Kunjungi Penjual</a>
                                                                  </div>
                                                              </form>

                                                              <!-- endform -->
                                              </div>




                                          </div>
                                          <div class="modal fade" id="chat<?php echo $data1['id_menu']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">



                                        <div class="modal-dialog modal-dialog modal-dialog-scrollable">
                                          <div class="modal-content">
                                            <div class="modal-header bg-warning" style="height: 60px">
                                                 <p>  <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']; ?>" class="img-circle bordered "  alt="..." width="40" height="40"> <?php echo $data1['nama']; ?></p>
                                              <p class="modal-title"></p>

                                              <button type="button" class="close btn-danger" data-dismiss="modal">X</button>
                                            </div>
                                            <div class="modal-body">
                                                 <div class="col">
                                              <div class="card-body">
                                              
                                                        <div class="p-3" style="background-color: #1d1744;
                                                                    border-radius: 5px;
                                                                    color: white;


                                                        ">
                                                          <?php echo $data1['nama_menu'];?>
                                                        </div>
                                                       
                                                
                                             
                                              
                                                
                                               </div>
                                  
                                          </div>
                                            </div>

                                            <div class="modal-footer">
                                              <div class="col-md-12 p-2">
                                                 <form method="POST" action="kirim_pesan.php">
                                                  <input type="hidden" name="id_user2" value="<?php echo $data1['id_user']?>">
                                                  <input type="hidden" name="id_menu" value="<?php echo $data1['id_menu']?>">

                                                <div class="form-group">
                                                  
                                                  <textarea class="form-control form-control-sm"  id="username" name="pesan" placeholder="Ketikan pesan.." style="background: #DCDCDC;resize:none;height:70px;" required="">Apakah menu ini tersedia?</textarea>
                                              </div>
                                              </div>
                                               
                                         
                                                <button type="submit" class="btn btn-primary btn-sm" name="kirim2" >Kirim</button>
                                               
                                                      

                                                </form>
                                                 
                                                      
                                                           </div>
                                                    </div>
                                                </div>
                                            </div>



                                  </div>
                                  <!-- ===================== -->



                          <?php
                      }else{
                      }?>
 

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
