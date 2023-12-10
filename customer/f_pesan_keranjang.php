
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title><link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asset/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/user/css/daftar_customer.css">
     <link rel="stylesheet" href="../asset/user/css/style01.css">


    <script src="../asset/user/js/jquery.js"></script>
    <script src="../asset/user/js/bootstrap.js"></script>

    <script src="../asset/user/js/popper.js"></script>

</head>

<body>





<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../f_login.php?pesan=belumlogin");
} 
include "../koneksi.php";
$username = $_SESSION['username'];
// cari user
$kode = "SELECT * FROM user WHERE username='$username' ";
$cari = mysqli_query($db, $kode);
$hasil = mysqli_fetch_array($cari);
if (mysqli_num_rows($cari) < 1) {
}

  if(isset($_POST['pesan'])){
    $jumlah=$_POST['jumlah'];
    $id=$_POST['id'];$query = "SELECT * FROM menu WHERE id_menu='$id'";
                    $result = mysqli_query($db, $query);
                    $data = mysqli_fetch_array($result);
                    if (mysqli_num_rows($result) < 1) {
                    }

 

  ?>
        <div class="container justify-content-center pt-5">
          <div class="row justify-content-center">
            
            
         
  <div class="col-md-8 pt-1 " >
    
             <form class="form-container  pesan" method="POST" action="s_pesanan.php" enctype="multipart/form-data">
                    <h5 class="font-weight-bold col-md-12 text-center">Lengkapi Detail Pesanan</h5><br>
                    <input type="hidden" name="id_menu" value="<?php echo $data['id_menu']?>">
                    <input type="hidden" name="id_user" value="<?php echo $hasil['id_user']?>">
                    <div class="row g-3">
                          <div class="col">   
                            <table>
                                <tr>
                                    <th>Nama Menu</th>
                                    <td> : </td>
                                    <td><?php echo $data['nama_menu']?></td>
                                </tr>
                                <tr>
                                     <th>Harga Satuan</th>
                                    <td> : </td>
                                    <td>Rp. <?php echo number_format($data['harga'])?> / Qty</td>
                                </tr>
                                 <tr>
                                    <th>Jumlah Pesan</th>
                                    <td> : </td>
                                    <td><?php echo $jumlah?></td>
                                </tr>
                                  <tr>
                                    <th>Total Harga</th>
                                    <td> : </td>
                                    <td>Rp. <?php echo number_format($total=$data['harga']*$jumlah);?>
                                      
                                    </td>
                                </tr>
                            </table>
                       </div>
                        </div>

                        <hr>
                     <div class="row g-3">
                            
                        
                        <div class="col-md-4">
                            
                             <input type="hidden" class="form-control form-control-sm" required="" name='jumlah' value="<?php echo $jumlah?>">
                               <input type="hidden" class="form-control form-control-sm bg-white"  name="total_bayar" value="<?php echo $total?>">

                             <p>Pemesanan Untuk</p>
                             <label for="inputEmail4" class="form-label">Tanggal  :</label>
                             <input type="date" class="form-control form-control-sm"  autocomplete="off" name='tgl_pemesanan' required="" >
                              <label for="inputEmail4" class="form-label">Jam  :</label>
                             <input type="time" class="form-control form-control-sm"  autocomplete="off" name='jam_pemesanan'  required="" >


                               



                        </div>
                         
                        </div>
                        <br>
                        <div class="row g-3">
                         <div class="col-6">
                        <label for="inputAddress" class="form-label">Alamat Kirim :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pesan" autocomplete="off" required><?php echo $hasil['alamat']?></textarea>
                        <p style="text-align: center;font-size: 12px">*Ubah jika dikirim ke alamat yang berbeda</p>
                        </div>
                       
                       
                    </div>
                 </br>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" name="pesan" onclick="return confirm('Apakah Anda Yakin Dengan Pesanan Anda?')">Pesan</button>
                    <?php echo "<a class='btn btn-danger' href=\"javascript:history.go(-1)\" >Batal</a>";?>               
                </div>
                </form>
        

               
            </div>
             </div>

        </div>
      <?php  }elseif (isset($_POST['keranjang'])) {
                   $id=$_POST['id'];
                          $id_user=$hasil['id_user'];
                          $jumlah=$_POST['jumlah'];

                          $query = "SELECT * FROM chart WHERE id_menu='$id' AND id_user='$id_user' AND status='0'";
                                          $result = mysqli_query($db, $query);
                                          $data = mysqli_fetch_array($result);
                                          if (mysqli_num_rows($result) < 1) {
                                            $query1 = "INSERT INTO `chart` SET id_menu='$id',id_user='$id_user',jumlah='$jumlah'";
                                            $result1 = mysqli_query($db, $query1);
                                            if($result1){
                                             
                                                   echo "<script type='text/javascript'>
                                                   alert('Menu Berhasil Disimpan Ke Keranjang');window.location='javascript:history.go(-1)'</script>";
                                            }

                                          }else{
                                              $jumlah1=$data['jumlah'];
                                              $tambah=$jumlah1 + $jumlah;
                                             $query1 = "UPDATE `chart` SET jumlah='$tambah' WHERE id_menu='$id' AND id_user='$id_user'";
                                            $result1 = mysqli_query($db, $query1);
                                            if($result1){
                                             
                                                   echo "<script type='text/javascript'>
                                                   alert('Menu Berhasil Disimpan Ke Keranjang');window.location='javascript:history.go(-1)'</script>";
                                            }
                                          }

}elseif (isset($_POST['pesan2'])) {

                        if(empty($_POST['id'])){ echo "<script type='text/javascript'>
                                                   alert('Menu tidak ada yang dipilih');window.location='javascript:history.go(-1)'</script>";
                            }else{?>
                                  <form method="POST" action="s_pesanan.php" enctype="multipart/form-data">
                              <?php

                                  $a=$_POST['id'];
                                  $id_user=$hasil['id_user'];
                                    $semua=count($_POST['id']);
                                    ?><input type="hidden" name="jmlpsn" value="<?php echo $semua?>"><?php
                                    for ($x=0; $x<$semua ; $x++) { 
                                      $b=$a[$x];

                                       $query1="SELECT p.*,j.jenis FROM menu p, jenis j WHERE p.id_jenis=j.id_jenis AND p.id_menu='$b'";
                                                          $result1=mysqli_query($db,$query1);
                                                          $data1=mysqli_fetch_array($result1);
                                                            $query2="SELECT * FROM chart WHERE id_menu='$b' AND id_user='$id_user' AND status='0'";
                                                            $result2=mysqli_query($db,$query2);
                                                            $data2=mysqli_fetch_array($result2);
                                                            $jumlah=$data2['jumlah'];
                                                            $data2['id_chart'];  


                                                          ?>
                                                          <div class="container justify-content-center pt-5">
                                                          <div class="row justify-content-center">
                                                            <div class="col-md-8 pt-1 " >
                                                              <div class="form-container pesan">
                                                                      
                                                                    
                                                                  <h5 class="font-weight-bold col-md-12 text-center">Lengkapi Detail Pesanan</h5><br>
                                                                   <input type="hidden" name="id_chart<?php echo $x?>" value="<?php echo $data2['id_chart']?>">
                                                                      <input type="hidden" name="id_menu<?php echo $x?>" value="<?php echo $data1['id_menu']?>">
                                                                      <input type="hidden" name="id_user<?php echo $x?>" value="<?php echo $hasil['id_user']?>">
                                                                              <div class="row g-3">
                                                                                    <div class="col">   
                                                                                      <table>
                                                                                          <tr>
                                                                                              <th>Nama Menu</th>
                                                                                              <td> : </td>
                                                                                              <td><?php echo $data1['nama_menu']?></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                               <th>Varian Dipilih [Harga]</th>
                                                                                              <td> : </td>
                                                                                              <td>
                                                                                                <?php
                                                                                                if($data1['jenis']=='Snack'){
                                                                                                  
                                                                                                  $id_user=$hasil['id_user'];


  
                                      

 $query3="SELECT v.*,c.*,vp.id_varian FROM pilih_varian vp, varian v, chart c WHERE v.id_varian=vp.id_varian AND
                                                                      vp.id_chart=c.id_chart AND c.id_menu='$b' AND c.status='0' AND c.id_user='$id_user'";

                                                $result3=mysqli_query($db,$query3);
                                                      if (mysqli_num_rows($result3)<1) {
                                                        # code...
                                                      }else{
                                                            $no=1;
                                                             while($data3=mysqli_fetch_array($result3)){

                                                             echo $data3['varian'].$no++.' [ Rp. '.number_format($data3['harga']).'] ';
                                                              }
                                                      }





                                                                                                }else{

                                                                                                  echo "Rp. ".number_format($data1['harga']).'/Qty';
                                                                                                }

                                                                                                ?>



                                                                                              </td>
                                                                                          </tr>
                                                                                           <tr>
                                                                                              <th>Jumlah Pesan</th>
                                                                                              <td> : </td>
                                                                                              <td><?php echo $jumlah?></td>
                                                                                          </tr>
                                                                                            <tr>
                                                                                              <th>Total Harga</th>
                                                                                              <td> : </td>
                                                                                              <td>
                                                                                              <?php
                                                                                              $id_user=$hasil['id_user'];
                                                                                              $b;
                                                                                              $nya=0;
                                                                                               if($data1['jenis']=='Snack'){

                                                                      $query7="SELECT v.*,c.*,vp.id_varian FROM pilih_varian vp, varian v, chart c WHERE v.id_varian=vp.id_varian AND
                                                                      vp.id_chart=c.id_chart AND c.id_menu='$b' AND c.status='0' AND c.id_user='$id_user'";
                                                                      $result7=mysqli_query($db,$query7);
                                                                      if(mysqli_num_rows($result7)<1){

                                                                      }else{
                                                                        while ($data7=mysqli_fetch_array($result7)) {
                                                                         $data7['varian'];
                                                                         $harganya=$data7['harga']*$jumlah;
                                                                         $nya+=$harganya;
                                                                        }
                                                                        echo 'Rp.'.number_format($nya);
                                                                      }



                                                                                                
                                                                                               }else{

                                                                   $harga=$data1['harga'];
                                                                    $totalharga=$harga*$jumlah;




                                                              echo 'Rp'.number_format($totalharga);
                                                                                               }
                                                                                                ?>                                                                                            
                                                                                              </td>



                                                                                          </tr>
                                                                                      </table>
                                                                                 </div>
                                                                                  </div>

                                                                                  <hr>
                                                                               <div class="row g-3">
                                                                                      
                                                                                  
                                                                                  <div class="col-md-4">
                                                                                      
                                                                                       <input type="hidden" class="form-control form-control-sm" required="" name='jumlah<?php echo $x?>' value="<?php echo $jumlah?>">

                                                                                         <input type="hidden" class="form-control form-control-sm bg-white"  name="total_bayar<?php echo $x?>" value="<?php 

                                                                                         if($data1['jenis']=='Snack'){
                                                                                          echo $nya;
                                                                                         } else{echo $totalharga;}?>">



                                                                                           <p>Pemesanan Untuk</p>
                                <label for="inputEmail4" class="form-label">Tanggal  :</label>
                             <input type="date" class="form-control form-control-sm"  autocomplete="off" name='tgl_pemesanan<?php echo $x?>'  required="" >
                              <label for="inputEmail4" class="form-label">Jam  :</label>
                             <input type="time" class="form-control form-control-sm"  autocomplete="off" name='jam_pemesanan<?php echo $x?>'  required="" >

                                                                                        



                                                                                  </div>
                                                                                   
                                                                                  </div>
                                                                                  <br>
                                                                                  <div class="row g-3">
                                                                                   <div class="col-6">
                                                                                  <label for="inputAddress" class="form-label">Alamat Kirim :</label>
                                                                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pesan<?php echo $x?>" autocomplete="off" required><?php echo $hasil['alamat']?></textarea>
                                                                                  <p style="text-align: center;font-size: 12px">*Ubah jika dikirim ke alamat yang berbeda</p>
                                                                                  </div>
                                                                                 
                                                                                 
                                                                              </div>
                                                                           </br>
                                                                              <div class="col-md-4">
                                                                                         
                                                                          </div>
                                                                          </div>
                                                                  

                                                                         
                                                                      </div>
                                                                       </div>

                                                                  </div>
                                                          
                                    <?php }?>
                                                                          <div class="container justify-content-center">
                                                          <div class="row justify-content-center">
                                                            <div class="col-md-8 pt-1 " >
                                                                          <div class="form-container pesan">
                                                                           <button type="submit" class="btn btn-primary" name="pesan2">Pesan</button>
                                                                              <?php echo "<a class='btn btn-danger' href=\"javascript:history.go(-1)\" >Batal</a>";?>   
                                                                          </form>
                                                                    </div>
                                                                  </div>
                                                                  </div>
                                                                </div>
                                <?php }

                       
                }




                elseif(isset($_POST['keranjang3'])){
                   if(empty($_POST['varian'])){

                     echo "<script type='text/javascript'>
                alert('Pilih Varian!');window.location='javascript:history.go(-1)'</script>";
                    
                    }else{
                  $id_menu=$_POST['id_menu'];
                   $id_user=$hasil['id_user'];
                    $id=$_POST['id'];
                    $jumlah=$_POST['jumlah'];

                   
                    $varian=$_POST['varian'];

                    
                    $kabeh=0;
                    $query2="SELECT * FROM chart WHERE id_menu='$id' AND id_user='$id_user' AND status='0'";
                    $result2=mysqli_query($db,$query2);
                                                           
                  if(mysqli_num_rows($result2)<1){
                           $hitung = count($varian);
                           $query6="INSERT INTO chart SET id_user=$id_user,id_menu='$id_menu',jumlah='$jumlah'";
                            $result6=mysqli_query($db,$query6);
                            if($result6){
                                  $query5="SELECT max(id_chart) as max FROM chart";
                                  $result5=mysqli_query($db,$query5);
                                  $data=mysqli_fetch_array($result5);
                                  $id_chart=$data['max'];
                                  }
                                     for($i=0;$i<$hitung;$i++){
                                            //nah akan tampil
                                            $varian[$i];
                                            $query1="INSERT INTO pilih_varian SET id_varian='$varian[$i]',id_chart='$id_chart'";
                                            $result1=mysqli_query($db,$query1);
                                            if($result1){
                                               echo "<script type='text/javascript'>
                                                   alert('Menu Berhasil Disimpan Ke Keranjang');window.location='javascript:history.go(-1)'</script>";
                                            }
                                          }              
         
                    }else{
                            $hitung = count($varian);
                            $data2=(mysqli_fetch_array($result2));
                            $id_chart2=$data2['id_chart'];
                           $query8="UPDATE `chart` SET jumlah='$jumlah' WHERE id_menu='$id' AND id_user='$id_user' AND status='0'";
                           $result8=mysqli_query($db,$query8); 

                           for($i=0;$i<$hitung;$i++){
                                            //nah akan tampil
                                            $varian[$i];
                                            $query1="DELETE FROM pilih_varian WHERE id_chart='$id_chart2'";
                                            $result1=mysqli_query($db,$query1);
                                            } 
                            for($i=0;$i<$hitung;$i++){
                                            //nah akan tampil
                                            $varian[$i];
                                            $query9="INSERT INTO pilih_varian SET id_varian='$varian[$i]',id_chart='$id_chart2'";
                                            $result9=mysqli_query($db,$query9);
                                            } 

                             if ($result8) {


                               echo "<script type='text/javascript'>
                                                   alert('Menu Berhasil Disimpan Ke Keranjang');window.location='javascript:history.go(-1)'</script>";


                               
                             }else{
                               echo "no ok";
                             }

                     
                         }

                 
                  
            

                 

                

      }
    }elseif(isset($_POST['pesan3'])){
    $jumlah=$_POST['jumlah'];
    $id=$_POST['id'];
    
    if(empty($_POST['varian'])){

                     echo "<script type='text/javascript'>
                alert('Pilih Varian!');window.location='javascript:history.go(-1)'</script>";
    }else{
      $varian=$_POST['varian'];
    $hitung=count($varian);
    
    
    $query = "SELECT p.*, j.* FROM menu p,jenis j WHERE j.id_jenis=p.id_jenis AND p.id_menu='$id'";
                    $result = mysqli_query($db, $query);
                    $data = mysqli_fetch_array($result);
                    if (mysqli_num_rows($result) < 1) {
                    }

 

  ?>
        <div class="container justify-content-center pt-5">
          <div class="row justify-content-center">
            
            
         
  <div class="col-md-8 pt-1 " >
    
             <form class="form-container  pesan" method="POST" action="s_pesanan.php" enctype="multipart/form-data">
                    <h5 class="font-weight-bold col-md-12 text-center">Lengkapi Detail Pesanan</h5><br>
                    <input type="hidden" name="id_menu" value="<?php echo $data['id_menu']?>">
                    <input type="hidden" name="id_user" value="<?php echo $hasil['id_user']?>">
                    <div class="row g-3">
                          <div class="col">   
                            <table>
                                <tr>
                                    <th>Nama Menu</th>
                                    <td> : </td>
                                    <td><?php echo $data['nama_menu']?></td>
                                </tr>
                                 <?php
                                       if($data['jenis']=='Snack'){
                                         $id_user=$hasil['id_user'];

                                       ?>

                                <tr>
                                    <th>Varian Dipilih</th>
                                    <td> : </td>
                                    <td>
                                    <?php
                                    $no=1;
                                    for($i=0;$i<$hitung;$i++){
                                            $query3="SELECT * FROM varian WHERE id_varian='$varian[$i]'";
                                             $result3=mysqli_query($db,$query3);
                                             $data3=mysqli_fetch_array($result3);
                                               echo "[".$no++."] ".$data3['varian'].". "; 
                                             }?>
                                    </td>
                                </tr>

                              <?php }?>


                                <tr>
                                     <th>Harga Satuan</th>
                                    <td> : </td>
                                    <td>

                                       <?php
                                       $no=1;
                                       if($data['jenis']=='Snack'){
                                         $id_user=$hasil['id_user'];
                                          for($i=0;$i<$hitung;$i++){
                                            $query3="SELECT * FROM varian WHERE id_varian='$varian[$i]'";
                                             $result3=mysqli_query($db,$query3);
                                             $data3=mysqli_fetch_array($result3);
                                             echo  "[".$no++."] Rp.".$data3['harga'].".  ";

                                          }
                                          

                                               
                                                    }else{}?>





                                      / Varian



                                    </td>
                                </tr>
                                 <tr>
                                    <th>Jumlah Pesan</th>
                                    <td> : </td>
                                    <td><?php echo $jumlah?></td>
                                </tr>
                                  <tr>
                                    <th>Total Harga</th>
                                    <td> : </td>
                                    <td>
                                      <?php
                                         if($data['jenis']=='Snack'){
                                          $nya=0;
                                            for($i=0;$i<$hitung;$i++){
                                          $query4="SELECT * FROM varian WHERE id_varian='$varian[$i]'";
                                             $result4=mysqli_query($db,$query4);
                                             $data4=mysqli_fetch_array($result4);
                                             $harganya=$data4['harga']*$jumlah;
                                             $nya+=$harganya;
                                           }

                                         }

                                      ?>



                                      Rp. <?php echo number_format($nya);?>
                                      
                                    </td>
                                </tr>
                            </table>
                       </div>
                        </div>

                        <hr>
                     <div class="row g-3">
                            
                        
                        <div class="col-md-4">
                            <?php for($i=0;$i<$hitung;$i++){?>
                              <input type="hidden" class="form-control form-control-sm" required="" name='varian[]' value="<?php echo $varian[$i]?>">

                              <?php
                                            
                                             }?>

                             <input type="hidden" class="form-control form-control-sm" required="" name='jumlah' value="<?php echo $jumlah?>">
                               <input type="hidden" class="form-control form-control-sm bg-white"  name="total_bayar" value="<?php echo $nya?>">
                               <p>Pemesanan Untuk</p>
                                <label for="inputEmail4" class="form-label">Tanggal  :</label>
                             <input type="date" class="form-control form-control-sm"  autocomplete="off" name='tgl_pemesanan'  required="" >
                              <label for="inputEmail4" class="form-label">Jam  :</label>
                             <input type="time" class="form-control form-control-sm"  autocomplete="off" name='jam_pemesanan'  required="" >
                                



                        </div>
                         
                        </div>
                        <br>
                        <div class="row g-3">
                         <div class="col-6">
                        <label for="inputAddress" class="form-label">Alamat Kirim :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pesan" autocomplete="off" required><?php echo $hasil['alamat']?></textarea>
                        <p style="text-align: center;font-size: 12px">*Ubah jika dikirim ke alamat yang berbeda</p>
                        </div>
                       
                       
                    </div>
                 </br>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" name="pesan4" onclick="return confirm('Apakah Anda Yakin Dengan Pesanan Anda?')">Pesan</button>
                    <?php echo "<a class='btn btn-danger' href=\"javascript:history.go(-1)\" >Batal</a>";?>               
                </div>
                </form>
        

               
            </div>
             </div>

        </div>
      <?php  } }

      else{
         echo "404 object not found";

      }





      ?>

</body> <script src="js/jquery.js"></script>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('jumlah').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);

          if (!isNaN(result)) {
             document.getElementById('total').value = "Rp. ".concat(result);
        }    
}
</script>



</html>