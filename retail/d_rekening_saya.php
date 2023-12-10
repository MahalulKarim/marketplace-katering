
<!-- include header -->
<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-5 mb-5">
    
 
 
 
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

<hr style="border: 1px solid #FFC82B;"> 
    <h4 class="text-center">Rekening Saya</h4>
  <div class="row mx-auto">
<a href="#tambah" class="btn btn-success btn-sm mb-2" data-toggle="modal">Tambah Rekening</a>
    <div class="col-12">

      <table id="dataTables" class="display" cellspacing="0" width="100%">
        <thead>
            <tr  class="table-primary">
                <th>No</th>
                <th>Kode Bank</th>
                <th>Nama Bank</th>
                <th>Atas Nama</th>
                <th>No. Rek</th>
                <th>Aksi</th>
            </tr>
        </thead>
       <tbody>
         <?php
      $id=$hasil['id_user'];
      $query2="SELECT * FROM bank WHERE id_user='$id'";
      $result2=mysqli_query($db,$query2);
      $no=1;
      while ($data2=mysqli_fetch_array($result2)) {
       
     
    ?>
        <tr>
           <td><?php echo $no++?></td>
                    <td align="center"><?php echo $data2['kode_bank'];?></td>
                    <td align="center"><?php echo $data2['nama_bank'];?></td>
                    <td align="center"><?php echo $data2['nama'];?></td>
                    <td align="center"><?php echo $data2['no_rek'];?></td>
          <td>
             <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#detail<?php echo $data2['id_bank'];?>" class="btn btn-outline-info btn-sm" data-toggle="modal">
                  <i class="fa fa-pencil-alt"></i>
                </a>
                
                <a href="hapus.php?id_bank=<?php echo $data2['id_bank']?>" type="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus bank <?php echo $data2['nama_bank']?> ?') "><i class="fa fa-trash"></i></a>
              </div>

          </td>
        </tr>


 <div class="modal" tabindex="-1" id="detail<?php echo $data2['id_bank'];?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Bank</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> 
                <div class="modal-body">
                <div class="row">
                   <!-- MENCARI DETAIL menu -->
                   <?php
                        $id = $data2['id_bank']; 

                        $query1="SELECT * FROM bank WHERE id_bank='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                    ?>
                                    
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_e_rekening_saya.php" enctype="multipart/form-data">
                         
                          <input type="hidden" class="form-control form-control-sm" name="id_bank" value="<?php echo $data1['id_bank'];?>
                          ">
                          <input type="hidden" class="form-control form-control-sm" name="id_user" value="<?php echo $hasil['id_user'];?>
                          ">
                        <div class="row">
                          <div class="col-md-12">
                           <label class="form-label">Nama Bank</label>
                              <select class="form-control form-control-sm" name="kode_bank">
                             <?php 

                             $query5="SELECT * FROM bank GROUP BY kode_bank";
                              $result5=mysqli_query($db,$query5);
                                
                                while ($data5=mysqli_fetch_array($result5)) {

                                    if($data5['kode_bank']==$data1['kode_bank']){?>

                                      <option value="<?php echo $data5['kode_bank']?>" selected>
                                          <?php echo $data5['nama_bank'];?>
                                        </option>

                                      <?php

                                    }else{

                                      ?>
                                    
                                        <option value="<?php echo $data5['kode_bank']?>">
                                          <?php echo $data5['nama_bank'];?>
                                        </option>

                                        <?php } } ?>
                                      </select>

                          </div>
                        </div>
                            <label class="form-label">Atas Nama</label>
                              <input type="text" class="form-control form-control-sm" name="nama" required value="<?php echo $data1['nama'];?>">
                          
                            <label class="form-label">No Rekening</label>
                              <input type="text" class="form-control form-control-sm" name="no_rek" required value="<?php echo $data1['no_rek'];?>">
                          
                          
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary btn-sm" name="simpan" onclick="return confirm('Pastikan anda memasukan dengan benar, jika terjadi kesalahan saat transaksi ke nomor rekening diatas bukan menjadi tanggung jawab kami!')">Simpan</button>
                     </form>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                     </div>
              </div>
            </div>
      </div>

<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->



      <?php } ?>
      </tbody>
    </table>
</div>



</div>

<!-- modal untuk tambah menu -->
          <div class="modal" tabindex="-1" id="tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Nomor Rekening</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                <div class="row">
                                    
                  <!-- TAMBAH menu -->
                  <div class="col-md-12">
                      <form method="POST" action="s_rekening_saya.php" enctype="multipart/form-data">
                          <input type="hidden" class="form-control form-control-sm" name="id_user" value="<?php echo $hasil['id_user'];?>">
                        <div class="row">
                          <div class="col-md-12">
                            <label class="form-label">Nama Bank</label>
                              <select class="form-control form-control-sm" name="kode_bank">
                             <?php 

                             $query5="SELECT * FROM bank GROUP BY kode_bank";
                              $result5=mysqli_query($db,$query5);
                                
                                while ($data5=mysqli_fetch_array($result5)) {

                                      ?>
                                    
                                        <option value="<?php echo $data5['kode_bank']?>">
                                          <?php echo $data5['nama_bank'];?>
                                        </option>
                                        <?php } ?>
                                      </select>

                           
                            <label class="form-label">Atas Nama</label>
                              <input type="text" class="form-control form-control-sm" name="nama" required>
                        
                            <label class="form-label">No Rekening</label>
                              <input type="text" class="form-control form-control-sm" name="no_rek" required>
                          </div>
                         
                       
                            
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary btn-sm" name="simpan" onclick="return confirm('Pastikan anda memasukan data dengan benar, jika terjadi kesalahan saat transaksi ke nomor rekening diatas bukan menjadi tanggung jawab kami!')">Simpan</button>
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
    <script src="../asset/user/datatabel/jquery-1.12.0.min.js"></script>
  <script src="../asset/user/datatabel/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#dataTables').DataTable();
  } );
  </script>
  <script>
  $(document).ready(function() {
    $('#data').DataTable();
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