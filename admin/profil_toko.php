 <?php include "headerfooter/atas.php"; 
include "koneksi.php";
if( !isset($_GET['id'])){
    header('location:data_banned_toko.php');
}
$id =$_GET['id'];

$query="SELECT * FROM `user` WHERE id_user='$id'";
$result=mysqli_query($db,$query);
$data=mysqli_fetch_array($result);
if(mysqli_num_rows($result) <1 ){
    die("Data Tidak Ditemukan..");
}
?>
 <div class="row mt">
  <table width="70%" align="center">
    <tr>
      <td ><img src="../asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" height="200" width="100%"></td>
    </tr>
  </table>
  <div class="col md-10">
    <h3 class="text-center"><?php echo $data['nama_katering'];?></h3>
    <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#kontak"><b>Profil</b></a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit"><b>menu</b></a>
                  </li>
                  <li>
                    <a href="data_penjualan.php?id=<?php echo $id?>"><b>data penjualan</b></a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="kontak" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6">
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <a href="form_banned.php?id=<?php echo $id;?>" class="btn btn-danger"><i class="fa fa-exclamation-triangle pull-left" ></i> Bekukan Akun</a>
                        <div class="col-md-8 col-md-offset-2 mt text-center">

                           <?php                          
                          $query="SELECT * FROM user WHERE id_user='$id'";
                          $result=mysqli_query($db,$query);
                          $data=mysqli_fetch_array($result);
                          if(mysqli_num_rows($result) <1 ){
                              die("Data Tidak Ditemukan..");
                          }
                          ?>
                           <p>
                           <h5> Nama Pemilik : <?php echo $data['nama']?>
                           </h5>
                          </p>
                           <p>
                           <h5> Status : <?php echo $data['status']?> <i class="fa fa-exclamation "></i>
                           </h5>
                          </p>
                          <p>
                            <h5>
                            alamat : <?php echo $data['alamat']?>.
                            </h5>
                          </p>
                          <p>
                            <h5>
                           Hp/Wa : <?php echo $data['no_hp']?>.
                           </h5>
                          </p>
                          <p>
                           Email : <br/><?php echo $data['email']?><br/>.
                          </p>

                       </div>
                        
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                

              <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                       <hr>
                      
                        <table id="da" class="display" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                  <th align="center">Foto</th>
                                  <th align="center">Nama</th>
                                  <th align="center">Deskripsi</th>
                                  <th align="center">Harga</th>
                                  <th align="center">Aksi</th>                               
                              </tr>
                          </thead>     
                          <tbody>                     
                           <?php 
                      $query1="SELECT * FROM `menu` WHERE id_user='$id'";
                      $result1=mysqli_query($db,$query1);
                      $no=1;
                      while ($data1=mysqli_fetch_array($result1)){
                    ?>

                      <tr>
                    <td width="10%"> <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']; ?>" width="100%"></td>
                    <td><?php echo $data1['nama_menu'];?></td>
                    <td><?php echo $data1['deskripsi'];?></td>
                    <td>Rp. <?php echo  number_format($data1['harga']); ?></td>
                    <td><a href="hapus.php?id_menu3=<?php echo $data1['id_menu']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></a></td>
                  </tr> 
                    <?php } ?>
                     </tbody>
   
                  </table>
              
              </div>
                      
                    <!--\ /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <div id="rekap" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                       <hr>
                      
                        <table id="da" class="display" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                  <th align="center">Foto</th>
                                  <th align="center">Nama</th>
                                  <th align="center">Deskripsi</th>
                                  <th align="center">Harga</th>
                                  <th align="center">Aksi</th>                               
                              </tr>
                          </thead>     
                          <tbody>                     
                           <?php 
                      $query1="SELECT * FROM `menu` WHERE id_user='$id'";
                      $result1=mysqli_query($db,$query1);
                      $no=1;
                      while ($data1=mysqli_fetch_array($result1)){
                    ?>

                      <tr>
                    <td width="10%"> <img src="img/produk/<?php echo $data1['gambar']?>" width="100%"></td>
                    <td><?php echo $data1['nama_menu'];?></td>
                    <td><?php echo $data1['deskripsi'];?></td>
                    <td>Rp. <?php echo  number_format($data1['harga']); ?></td>
                    <td><a href="hapus.php?id_menu3=<?php echo $data1['id_menu']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></a></td>
                  </tr> 
                    <?php } ?>
                     </tbody>
   
                  </table>
              
              </div>
                      
                    <!--\ /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              
                      
                    <!--\ /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>

              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
 <script src="css/datatabel/jquery-1.12.0.min.js"></script>
  <script src="css/datatabel/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#da').DataTable();
  } );
  </script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  
</body>

</html>