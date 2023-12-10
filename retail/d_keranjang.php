<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-5 mb-5">
    
 <h4 class="text-center">Keranjang Saya</h4>

     <hr style="border: 1px solid #FFC82B;"> 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>
        <?php
                            $iduser = $hasil['id_user'];
                            $query = "SELECT pr.id_menu,pr.nama_menu,pr.harga,pr.gambar,pr.deskripsi,c.*, j.* FROM chart  c, menu pr, jenis j WHERE pr.id_menu=c.id_menu AND j.id_jenis=pr.id_jenis AND c.id_user='$iduser' AND c.status='0'";
                            $result = mysqli_query($db, $query);
                            if(mysqli_num_rows($result)<1){
                              echo "<h4>Keranjang Anda Masih Kosong</h4>";
                              echo "<a href='d_menu.php' class='btn btn-success btn-sm mb-4'>Cari Menu</a>";
                            }else{?>

       
       
            <h2 class="text-center"></h2>
<form method="POST" action="f_pesan_keranjang.php">
                     <table  class="table table-info mb-5"  >
                         <thead>
                            <tr >
                                <td><input type="checkbox" class="check_all"></td>
                                <th>Menu</th>
                                <th></th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($data = mysqli_fetch_array($result))

                            {

                            ?>

                           
                                <tr id="<?php echo $data['id_menu']?>">
                                  <td>
                                    <input type="checkbox" name="id[]" class="chk_boxes1" value="<?php echo $data['id_menu']?>">
                                  </td>
                                   <td width="20%">
                                    <p>  <?php echo $data['nama_menu']; ?></p>
                                           <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']?>" class="img-thumbnail" width='60%'>
                                           
                                           
                                                                      


                                    </td>
                                    <td> <p>
                                        
                                         

                                             <?php 
                                            $id_chart=$data['id_chart'];
                                             if ($data['jenis']=='Snack') {
                                                $query3="SELECT v.* FROM pilih_varian vp, varian v WHERE v.id_varian=vp.id_varian AND vp.id_chart='$id_chart'";

                                                $result3=mysqli_query($db,$query3);
                                                      if (mysqli_num_rows($result3)<1) {
                                                        # code...
                                                      }else{
                                                            echo "<p><b>Varian :</b></p>";
                                                             while($data3=mysqli_fetch_array($result3)){

                                                             echo '- '.$data3['varian'].'<br>';
                                                              }
                                                      }

                                               
                                               
                                               

                                             }else{

                                              echo
                                              nl2br(str_replace('', '', htmlspecialchars( $data['deskripsi'])));
                                             } ?>
                                           <?php  ?>
                                         </td>

                                           <?php 
                                            $id_chart=$data['id_chart'];
                                            $id_menu=$data['id_menu'];
                                             if ($data['jenis']=='Snack') {?>
                                              <td>
                                              <?php
                                                $query3="SELECT v.harga FROM pilih_varian vp, varian v WHERE v.id_varian=vp.id_varian AND vp.id_chart='$id_chart'";

                                                $result3=mysqli_query($db,$query3);
                                                      if (mysqli_num_rows($result3)<1) {
                                                        # code...
                                                      }else{
                                                            echo "<p>Per Varian</p>";
                                                             while($data3=mysqli_fetch_array($result3)){

                                                             echo 'Rp. '.number_format($data3['harga'])."<br>";
                                                              }
                                                      }?>

                                               
                                               
                                               </td>

                                             <?php }else{?>



                                             <td>Rp. <?php echo number_format($data['harga']) ?>
                                        
                                           <?php }?>



                                      <td width="7%"><?php echo $data['jumlah']; ?> 
                                      [<a href="s_e_jumlah_pesan.php?id=<?php echo $data['id_chart']?>">
                                        <i class="fa fa-pencil-alt fa-xs text-primary"></i></a>]
                                      </td>
                                        <?php 
                                            $id_chart=$data['id_chart'];
                                             if ($data['jenis']=='Snack') {

                                              ?>

                                              <td>
                                                <?php
                                                $nya=0;
                                                $query3="SELECT v.* FROM pilih_varian vp, varian v WHERE v.id_varian=vp.id_varian AND vp.id_chart='$id_chart'";

                                                $result3=mysqli_query($db,$query3);
                                                      if (mysqli_num_rows($result3)<1) {
                                                        # code...
                                                      }else{
                                                             while($data3=mysqli_fetch_array($result3)){
                                                              $jumlah=$data['jumlah'];
                                                             $hargavarian=$data3['harga'];
                                                             $harganya=$jumlah* $hargavarian;
                                                             $nya+=$harganya;
                                                             
                                                              }
                                                              echo 'Rp. '.number_format($nya);
                                                              ?>
                                                              

                                                              <?php
                                                              
                                                      }?>
                                                
                                              </td>






                                               <?php }else{?>
                                      <td>Rp. <?php 
                                                $jumlah=$data['jumlah'];
                                                $harga=$data['harga'];
                                                $totalharga=$harga*$jumlah;




                                    echo number_format($totalharga) ?></td>
                                  <?php } ?>
                                    <td align="center">
                                    
                                    <a href="h_keranjang.php?id=<?php echo $data['id_chart']?>" class="btn btn-danger btn-sm">Hapus</a>                                    
                                      
                                    </td>

                                </tr>





                               
                     <?php } ?>

        

                           
                        </tbody>
                    </table> 
                   
                    <div class="right">
                        <button type="submit" name="pesan2" id='pesan2' class="btn btn-primary btn-sm">Pesan</button>
                    </div>
                     </form>
<?php }?>




 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center"></h2>


               
                     
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

 <script src="datatabel/jquery-1.12.0.min.js"></script>
  <script src="datatabel/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $('.check_all').click(function(){
      $('.chk_boxes1').prop('checked',this.checked);
      
    });



  }



    );
  </script>
</body>
</html>