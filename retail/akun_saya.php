<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-5 mb-5">
    
 <h4 class="text-center">Akun Saya</h4>

  <hr style="border: 1px solid #FFC82B;"> 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center">
        <img src="../asset/user/gambar/user/foto/<?php echo $hasil['foto']; ?>" class="img-thumbnail"  alt="..." width="800"></h2>
      <h4 class="text-center"><?php echo $hasil['nama_katering'] ?></h4>
      <p class="text-center"></p>
       <p class="text-center">
        <a href="" data-target="#user<?php echo $hasil['id_user']; ?>" data-toggle="modal" title="Edit Profil">
          <i class="fa fa-pencil-alt fa-lg text-primary"></i>
        </a> 
        <a href=""  data-target="#user1<?php echo $hasil['id_user']; ?>" data-toggle="modal" title="Ubah Foto"><i class="fa fa-camera fa-lg text-primary"></i></a>
      </p>
      
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

        <div class="row">
            <div class="col-2 text-center">
                

            </div>

            <div class="col-8 pl-5">
                <hr>
               
                <p><i class="fas fa-user"></i> <?php echo $hasil['nama'] ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $hasil['alamat'] ?></p>
                <p><i class="fa fa-phone-square"></i> <?php echo $hasil['no_hp'] ?></p>
                <p><i class="fa fa-envelope"></i> <?php echo $hasil['email'] ?></p>
                <p><i class="fas fa-calendar"></i> <?php  $tanggal = $hasil['tgl_lahir'];
                                    echo date('d-m-Y', strtotime($tanggal)); ?></p>
            </div>
        </div>
    </div>

    </div>

<!-- MODAL EDIT DATA DIRI USER -->

        <div class="modal" tabindex="-1" id="user<?php echo $hasil['id_user'];?>">
            <div class="modal-dialog md-8">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ubah Profil </h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                <!-- MENAMPILKAN FORM EDIT USRER -->
                  <div class="col-md-8">
                    <form method="POST" action="s_e_profil.php">


                      <input type="hidden" class="form-control form-control-sm" name="id_user" value="<?php echo $hasil['id_user'];?>">
  
                       <label class="form-label">Nama Lengkap:</label>
                      <input type="text" class="form-control form-control-sm" name="nama" value="<?php echo $hasil['nama'];?>" required>
                       <label class="form-label">Nama Katering:</label>
                      <input type="text" class="form-control form-control-sm" name="nama_katering" value="<?php echo $hasil['nama_katering'];?>" required>


                       <label class="form-label">Username:</label>
                      <input type="text" class="form-control form-control-sm" name="username" value="<?php echo $hasil['username'];?>" required>

                      <label for="inputEmail4" class="form-label">Password:</label>
                      <input type="password" class="form-control form-control-sm form-password" name="password" value="<?php echo $hasil['password'] ?>" required>
                      <input type="checkbox" class="form-checkbox"> Show password
                      <br>

                       <label class="form-label">Alamat:</label>
                      <textarea class="form-control form-control-sm" name="alamat" required><?php echo $hasil['alamat'];?></textarea>

                      <label class="form-label">No Hp:</label>
                      <input type="text" class="form-control form-control-sm" name="no_hp" value="<?php echo $hasil['no_hp'];?>" required>

                      <label class="form-label">Email:</label>
                      <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $hasil['email'];?>" required>

                      <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                             <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="1" <?php if ($hasil['jk'] == 'laki-laki') {;      echo 'checked';                                                                      } ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="2" <?php if ($hasil['jk'] == 'perempuan') {                                                                        echo 'checked';                                                                       } ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>

                        <label class="form-label">Tgl Lahir:</label>
                      <input type="date" class="form-control form-control-sm" name="tgl_lahir" value="<?php echo $hasil['tgl_lahir'];?>" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm" name="simpan">Ubah</button>
                   </form>
                 <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>

 </div>


          
     
<!-- AKHIR MODAL EDIT DATA DIRI USER -->
<!-- MODAL UBAH FOTO USER -->

        <div class="modal" tabindex="-1" id="user1<?php echo $hasil['id_user'];?>">
            <div class="modal-dialog md-8">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ubah Foto </h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                <!-- MENAMPILKAN FORM EDIT USRER -->
                  <div class="col-md-12">
                    <form method="POST" action="s_e_foto_profil.php" enctype="multipart/form-data">
                        <input type="hidden" class="form-control form-control-sm" name="id_user" value="<?php echo $hasil['id_user'];?>">
  
                        <div class="card " style="width: 25rem;">
                          
                            <div class="imgWrap">
                                <img src="../asset/user/gambar/user/foto/<?php echo $hasil['foto']; ?>" id="imgView" class="img-fluid">
                            </div>
                        </div>
                        <br>
                        <input type="file" id="inputFile" class="form-control form-control-sm" name="file">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm" name="simpan">Ubah</button>
                   </form>
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
 <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
    </script>
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
</html>