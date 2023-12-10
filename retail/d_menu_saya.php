
<!-- include header -->
<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
   
    <div class="container pt-5 mb-5">
 
 
<div class="container-fluid pt-2 mb-6">
      
         
          <p class="text-center">
            <a href="akun_saya.php" class="btn btn-primary btn-sm mr-2">Akun Saya</a>
            <a href="d_menu_saya.php" class="btn btn-primary btn-sm mr-2">Menu Saya</a>

              <?php
                  $id=$hasil['id_user'];
                    $query7="SELECT p.* FROM pemesanan p, menu m,user u WHERE p.id_menu=m.id_menu AND m.id_user='$id' AND p.status='menunggu'";
                      $result7=mysqli_query($db,$query7);
                      if (mysqli_num_rows($result7)<1) {?>
                          <a href="d_pesanan_masuk.php" class="btn btn-primary btn-sm mr-2">Pesanan Masuk
                          </a>

                        
                          <?php }else{ ?>

                        
                         <a href="d_pesanan_masuk.php" class="btn btn-primary btn-sm mr-2 position-relative">Pesanan Masuk 
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   <i class="fas fa-info-circle"></i>
                                  </span>
                                  </span> 
                          </a>
                            
                          <?php }?>


            <a href="d_rekening_saya.php" class="btn btn-primary btn-sm mr-2">Rekening</a>
          </p>

        
    </div>

    </div>




  <hr style="border: 1px solid #FFC82B;"> 
  <div class="row mx-auto">
    <div class="col-12">
      
    <h4 class="text-center">Menu Saya</h4>
       <a href="#tambah" class="btn btn-success btn-sm mb-2" data-toggle="modal">Tambah Menu</a>
      <table id="dataTables" class="display" cellspacing="0" width="100%">
        <thead>
            <tr  class="table-primary">
                <th>No</th>
                <th>Menu</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
       <tbody>
         <?php
      $id=$hasil['id_user'];
      $query="SELECT m.*,j.jenis FROM menu m, jenis j WHERE m.id_jenis=j.id_jenis AND id_user='$id'";
      $result=mysqli_query($db,$query);
      $no=1;
      while ($data=mysqli_fetch_array($result)) {
       
     
    ?>
        <tr>
          <td><?php echo $no++?></td>
          <td  width="30%">
              <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" width="40%" class="img-thumbnail"> 
              <a href="gambar_menu.php?id=<?php echo $data['id_menu'];?>" class="btn btn-info btn-sm" data-placement="left" title="Tambah Gambar">
              <i class="fa fa-plus"></i></a>
              
          </td>
          <td><?php  echo $data['nama_menu'];?></td>
          <td><?php  echo $data['jenis'];?></td>
          <td>Rp. <?php echo number_format($data['harga'])?></td>
          <td><?php echo $data['status']?></td>
          <td>
             <div class="btn-group" role="group" aria-label="Basic example">
              <?php
                if($data['jenis']=='Snack'){?>

                  <a href="#tambah_varian<?php echo $data['id_menu']?>" class="btn btn-info btn-sm" data-toggle="modal" data-placement="left" title="Tambah Varian">
                <i class="fa fa-plus"></i>

                  <?php
                 
                }
              ?>
              
                <a href="#edit<?php echo $data['id_menu']?>" class="btn btn-primary btn-sm" data-toggle="modal" data-placement="left" title="Edit">
                <i class="fa fa-pencil-alt"></i>

                <a href="#detail<?php echo $data['id_menu'];?>" class="btn btn-success btn-sm" data-toggle="modal" data-placement="left" title="Detail">
                  <i class="fa fa-info"></i>
                </a>                
                <a href="hapus.php?id=<?php echo $data['id_menu']?>" type="button" class="btn btn-danger btn-sm" data-placement="left" title="Hapus" onclick="return confirm('Yakin hapus bank <?php echo $data['nama_menu']?> ?') "><i class="fa fa-trash"></i></a>
              </div>

          </td>
        </tr>

<!-- modal untuk detail -->
          <div class="modal" tabindex="-1" id="detail<?php echo $data['id_menu'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail menu</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                  <!-- MENCARI DETAIL menu -->
                   
<!-- MENAMPILKAN DETAIL menu -->
                  <div class="col-md-4">
                    <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']?>" class="img-thumbnail" >
                    <p></p>
                      <p class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                           
                        </div>
                       </p>

                  </div>
                  <div class="col-md-7">
                    <h5>Deskripsi</h5>
                     <p><?php  
                            echo nl2br(str_replace('', '', htmlspecialchars( $data['deskripsi'])));
                          ?>
                     </p>  
                     
                     <h5>Varian</h5>
                     <div class="row">




                       

                            <div class="col-md-12 pt-2 ">
                          <?php
                            $id_menu=$data['id_menu'];
                            if ($data['jenis']=='Snack') {
                              $query3="SELECT * FROM varian WHERE id_menu=$id_menu";
                              $result3=mysqli_query($db,$query3);
                              
                              while ($data3=mysqli_fetch_array($result3)) {?>
                             
                                <p>
                                  
                                
                               
                             <a href="hapus.php?varian=<?php echo $data3['id_varian']?>" class="btn btn-danger btn-sm mr-3" 
                              onclick="return confirm('Yakin hapus Varian?')"
                              ><i class="fa fa-trash"></i></a>
                            <?php echo $data3['varian']?>/ Rp. <?php echo number_format($data3['harga'])?>
                                
                                
                                
                                </p>
                                
                               
                              

                            <?php  }
                                }
                              ?>
                              </div>



                       
                       
                     </div>

                        
                      
                                                     
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
      </div>


 <div class="modal" tabindex="-1" id="tambah_varian<?php echo $data['id_menu'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Varian</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                  <!-- MENCARI DETAIL menu -->
                   
<!-- MENAMPILKAN DETAIL menu -->
                  
                  <div class="col-md-12">
                    <div class="col-md-6">
                        <form method="POST" action="s_varian.php" enctype="multipart/form-data">
                           <input type="hidden" class="form-control form-control-sm" name="id_menu" value="<?php echo $data['id_menu'];?>">
                            <label class="form-label">Nama Varian</label>
                               <input type="text" class="form-control form-control-sm" name="varian" required>
                          </div>
                          <div class="col-md-6">
                       
                            <label class="form-label">Harga</label>
                               <input type="number" class="form-control form-control-sm" name="harga" required>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Gambar</label>
                              <div class="card " style="width: 10rem;">
                                <div class="imgWrap">
                                  <img src=".." id="imgView" class="card-img-top img-fluid" alt="Gambar menu">
                                </div>
                              </div>
                                </br>
                                   <input type="file" id="inputFile" class="form-control form-control-sm" name="gambar">
                                <br>
                          </div>
                                                      
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                 <input type="submit" name="simpan_varian" class="btn btn-primary btn-sm" value="Simpan">
                     </form>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
      </div>

<!-- tambah gambar -->

      <!-- modal untuk edit deskripsi -->
          <div class="modal" tabindex="-1" id="edit<?php echo $data['id_menu'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Menu</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                                    <?php
                        $id = $data['id_menu']; 

                        $query2="SELECT * FROM menu WHERE id_menu='$id'";
                        $result2=mysqli_query($db,$query2);
                        $data2=mysqli_fetch_array($result2);
                        if(mysqli_num_rows($result2) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                    ?>
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_e_menu.php" enctype="multipart/form-data">
                           <input type="hidden" class="form-control form-control-sm" name="id_menu" value="<?php echo $data['id_menu'];?>">
                        <div class="row">
                              <div class="col-md-4">
                                <label class="form-label">jenis</label>
                                  <select class="form-control form-control-sm" name="id_jenis">
                                    <?php
                                      $sql="SELECT * FROM jenis";
                                      $eks=mysqli_query($db,$sql);
                                      while ($val=mysqli_fetch_array($eks)) {
                                        if($data2['id_jenis']==$val['id_jenis']){?>
                                         <option value="<?php echo $val['id_jenis']?>" selected><?php echo $val['jenis']?></option>
                                          
                                          <?php 
                                         
                                         }else{?>
                                           <option value="<?php echo $val['id_jenis']?>"><?php echo $val['jenis']?></option>
                                            <?php }
                                      } ?>
                                    </select> 
                              </div>
                              <div class="col-md-4">
                                <label class="form-label">Nama Menu</label>
                                   <input type="text" class="form-control form-control-sm" name="nama_menu" value="<?php echo $data2['nama_menu']?>" required>
                              </div>
                              <div class="col-md-4">
                                <label class="form-label">Harga (Per Paket/Box)</label>
                                  <input type="number" class="form-control form-control-sm" name="harga" value="<?php echo $data2['harga']?>" required>
                                  <p style="font-size: 12px">(*Masukan Harga Tanpa Tanda Baca!)</p>
                              </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-control form-control-sm" name="status">
                              <?php if($data2['status']=='tersedia'){?>

                                <option value="tersedia" selected>
                                Tersedia
                              </option>
                               <option value="kosong">
                                Kosong
                              </option>
                                <?php
                                echo $data2['status'];
                              }elseif($data2['status']=='kosong'){
                               ?>
                               <option value="kosong" selected>
                                Kosong
                              </option>
                              <option value="tersedia">
                                tersedia
                              </option>

                               <?php
                              }else{?>
                                 <option value="tersedia">
                                Tersedia
                              </option>

                                 <option value="kosong">
                                Kosong
                              </option>

                                <?php


                               
                              }?>
                              
                              
                            </select>
                             
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Deskripsi</label>
                              <textarea class="form-control form-control-sm" name="deskripsi" style="width: 20rem; height: 15rem;" required><?php echo $data2['deskripsi']?></textarea>
                          </div>
                        </div>
                          <div class="row">
                          <div class="col-md-6">
                            <label class="form-label">Gambar</label>
                              <div class="card " style="width: 10rem;">
                                <div class="imgWrap">
                                  <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" id="imgView" class="card-img-top img-fluid">
                                </div>
                              </div>
                                </br>
                                   <input type="file" id="inputFile" class="form-control form-control-sm" name="gambar">
                                <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <input type="submit" name="simpan" class="btn btn-primary btn-sm" value="Simpan">
                     </form>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                     </div>
              </div>
            </div>
      </div>
       <!-- modal untuk edit foto -->
          
       <?php } ?>
    </tbody>
   
  </table>

<!-- modal untuk tambah menu -->
          <div class="modal" tabindex="-1" id="tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah menu</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                                    
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_menu.php" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-sm" name="id_user" value="<?php echo $hasil['id_user'];?>">
                        <div class="row">
                          <div class="col-md-4">
                            <label class="form-label">jenis</label>
                              <select class="form-control form-control-sm" name="id_jenis">
                                <?php
                                  $sql="SELECT * FROM jenis";
                                  $eks=mysqli_query($db,$sql);
                                  while ($val=mysqli_fetch_array($eks)) {?>
                                  <option value="<?php echo $val['id_jenis']?>"><?php echo $val['jenis']?></option>
                                <?php } ?>
                                </select> 
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Nama Menu</label>
                               <input type="text" class="form-control form-control-sm" name="nama_menu" required>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Harga (Per Paket/Box)</label>
                              <input type="number" class="form-control form-control-sm" name="harga" required>
                              <p style="font-size: 12px">(*Masukan Harga Tanpa Tanda Baca!)</p>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-control form-control-sm" name="status">
                              
                                 <option value="tersedia">
                                Tersedia
                              </option>

                                 <option value="kosong">
                                Kosong
                              </option>

                              
                            </select>
                             
                          </div>
                          <div class="col-md-6">

                            <label class="form-label">Deskripsi</label>
                              <textarea class="form-control form-control-sm" name="deskripsi" style="width: 20rem; height: 15rem;" required></textarea>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Gambar</label>
                              <div class="card " style="width: 10rem;">
                                <div class="imgWrap">
                                  <img src="../asset/user/assets/img/User1.jpg" id="imgView" class="card-img-top img-fluid">
                                </div>
                              </div>
                              </br>
                                 <input type="file" id="inputFile" class="form-control form-control-sm" name="gambar" required>
                              <br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <input type="submit" name="simpan" class="btn btn-primary btn-sm" value="Tambah">
                     </form>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                     </div>
                        </div>
                      </div>


                </div>


                



    </div>


      
    
</div>
</div>
</div>
 </div>
 <div class="pt-5">
   
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
    <script src="../asset/user/datatabel/jquery-1.12.0.min.js"></script>
  <script src="../asset/user/datatabel/jquery.dataTables.min.js"></script>
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
  <script>
  $(document).ready(function() {
    $('#dataTables').DataTable();
  } );
  </script>
   
</body>
</html>