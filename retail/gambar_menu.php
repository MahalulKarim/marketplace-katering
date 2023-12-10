
<!-- include header -->
<?php include "atas.php"?>
  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-5 mb-2">
      <?php 

        if (isset($_GET['id'])) {
            $id_menu = $_GET['id'];
             $query = "SELECT * FROM menu WHERE id_menu='$id_menu'";
             $result=mysqli_query($db,$query);
             $data=mysqli_fetch_array($result);
      
            }

      ?>

    
      <h2 class="text-left "><?php echo $data['nama_menu']?></h2>
      <div class="pt-2">
         <a href="d_menu_saya.php" class="btn btn-danger btn-sm " >kembali</a>
        
      </div>
      <div class="pt-5">
         <a href="#tambah" class="btn btn-info btn-sm " data-toggle="modal">Tambah Gambar</a>
        
      </div>
     
                       
           
        
      </div>
    <div class="container-fluid mb-3"> 
  <div class="row mx-auto">
     <div class="card ml-3" style="width: 25rem; background-color:  #F8F8FF;">

               <div class="card-body">
                      <div class="row">
                          <div class="col-md-10">
                            <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                          <div class="col-md-2">
                            <div class="btn-group pt-2">
                              <a href="#e_gambar_utama<?php echo $data['id_menu']?>" class="btn btn-primary btn-sm fa fa-pencil-alt pt-2" data-toggle="modal"></a>
                            </div>
                          </div>
                      </div>
                    </div>                 
          </div>




     <?php
            

           
               

          $query1= "SELECT * FROM gambar WHERE id_menu='$id_menu'";
        
    
        $result1=mysqli_query($db,$query1);
        while($data1=mysqli_fetch_array($result1)){
          ?>
<!-- MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->
          <div class="card ml-1" style="width: 25rem; background-color:  #F8F8FF;">

               <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                            <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']; ?>" class="img-thumbnail" alt="...">
                          </div>
                        
                           

                               
                                
                              <div class="col-md-2">
                            <div class="btn-group pt-2">
                              <a href="#e_gambar<?php echo $data1['id_gambar']?>" class="btn btn-primary btn-sm fa fa-pencil-alt pt-2" data-toggle="modal"></a>
                               <a href="hapus.php?id_gambar=<?php echo $data1['id_gambar']?>" class="btn btn-danger btn-sm fa fa-trash pt-2" onclick="return confirm('Yakin hapus gambar?')"></a>
                            </div>
                         

                             
                          </div>
                      </div>
                    </div>

                                     
          </div>


          <div class="modal" tabindex="-1" id="e_gambar_utama<?php echo $data['id_menu']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Gambar</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                                    
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_gambar.php" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-sm" name="id_menu" value="<?php echo $data['id_menu'];?>">
                          <div class="row">
                           
                         
                                <div class="col-md-6">
                                  <label class="form-label">Gambar</label>
                                    <div class="card " style="width: 15rem;">
                                      <div class="imgWrap">
                                        <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" id="imgView" class="card-img-top img-fluid" alt="menu">
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
                     <input type="submit" name="simpan_edit_utama" class="btn btn-primary btn-sm" value="Simpan">
                     </form>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                     </div>
                        </div>
                      </div>


                </div>


          <div class="modal" tabindex="-1" id="e_gambar<?php echo $data1['id_gambar']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Gambar</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                                    
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_gambar.php" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-sm" name="id_gambar" value="<?php echo $data1['id_gambar'];?>">
                          <div class="row">
                           
                         
                                <div class="col-md-6">
                                  <label class="form-label">Gambar</label>
                                    <div class="card " style="width: 15rem;">
                                      <div class="imgWrap">
                                        <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']; ?>" id="imgView" class="card-img-top img-fluid" alt="menu">
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
                     <input type="submit" name="simpan_edit" class="btn btn-primary btn-sm" value="Simpan">
                     </form>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                     </div>
                        </div>
                      </div>


                </div>


<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->


        <?php } ?>

      
  </div>

  <div class="modal" tabindex="-1" id="tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Gambar</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                                    
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_gambar.php" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-sm" name="id_menu" value="<?php echo $id_menu;?>">
                          <div class="row">
                           
                         
                                <div class="col-md-6">
                                  <label class="form-label">Gambar</label>
                                    <div class="card " style="width: 15rem;">
                                      <div class="imgWrap">
                                        <img src=".." id="imgView" class="card-img-top img-fluid" alt="menu">
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
     <script src="../asset/user/datatabel/jquery-1.12.0.min.js"></script>
  <script src="../asset/user/datatabel/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTables').DataTable();
  } );
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
</body>
</html>