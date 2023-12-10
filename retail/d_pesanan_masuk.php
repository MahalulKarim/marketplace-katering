
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
    <h4 class="text-center">Pesanan Masuk</h4>
  <div class="row mx-auto">

    <div class="col-12">

      <table id="dataTables" class="display" cellspacing="0" width="100%">
        <thead>
            <tr  class="table-primary">
                <th>No</th>
                <th>Pemesan</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Tgl Kirim</th>
                <th>Biaya Kirim</th>
                <th>Total Bayar</th> 
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
       <tbody>
         <?php
      $id=$hasil['id_user'];
      $query2="SELECT p.id_user as id ,p.id_pemesanan,p.id_menu,p.jumlah,p.tgl_pemesanan,p.total_bayar,p.biaya_kirim,p.kode,p.status as stat,m.*,u.nama,j.jenis FROM pemesanan p, menu m,user u,jenis j WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND m.id_user='$id' AND m.id_jenis=j.id_jenis AND p.status!='terkirim' AND p.status!='di batalkan'";
      $result2=mysqli_query($db,$query2);
      $no=1;
      while ($data2=mysqli_fetch_array($result2)) {
       
     
    ?>
        <tr>
           <td><?php echo $no++?></td>
                    <td align="center"><?php echo $data2['nama'];?></td>
                    <td align="center"><?php echo $data2['nama_menu'];?></td>
                    <td align="center"><?php echo $data2['jumlah'];?></td>
                    <td align="center"><?php
                                        $tanggal = $data2['tgl_pemesanan'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                    <td align="center"><?php 
                                        if ($data2['biaya_kirim']=='0') {
                                          echo "Belum di isi";
                                        }else{


                                      echo 'Rp. '.number_format($data2['biaya_kirim']);
                                        }

                    ?></td>
                    <td align="center">Rp. <?php echo number_format($data2['total_bayar']+$data2['biaya_kirim']+$data2['kode'])?></td>
                       <td align="center"><?php echo $data2['stat']?></td>
          <td>

            <div class="btn-group mr-5" role="group" aria-label="Basic example">
             <a href="#detail<?php echo $data2['id_pemesanan'];?>" class="btn btn-success btn-sm" data-toggle="modal">
                  Detail
                </a>
             <?php 
                    if($data2['stat']=='menunggu'){?>
                       <a href="#terima<?php echo $data2['id_pemesanan'];?>" class="btn btn-primary btn-sm" data-toggle="modal">
                  Terima Pesanan
                </a>
                     
                      
                      <a href="terima_pesanan.php?id2=<?php echo $data2['id_pemesanan']?>" class="btn btn-danger btn-sm" >Tidak Tersedia</a>  
                    <?php }else{
                        $id_pemesanan = $data2['id_pemesanan'];
                        $query3="SELECT u.* FROM pemesanan p, pembayaran u WHERE u.id_pemesanan
                        =p.id_pemesanan AND p.id_pemesanan='$id_pemesanan' ";
                        $result3=mysqli_query($db,$query3);
                        $data3=mysqli_fetch_array($result3);
                        if(mysqli_num_rows($result3) <1 )
                        {
                         
                        }else{?>
                          <a href="#bukti_bayar<?php echo $data3['id_pembayaran'];?>" class="btn btn-primary btn-sm" data-toggle="modal">
                          Bukti Bayar
                          </a>
                          <?php
                          
                        }  
                        
                    }
                    date_default_timezone_set("Asia/Jakarta");

                    ?>
               
                
               
              </div>

          </td>
        </tr>


 <div class="modal" tabindex="-1" id="detail<?php echo $data2['id_pemesanan'];?>">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Pesanan</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                   <?php
                        $id = $data2['id_pemesanan']; 

                        $query1="SELECT p.*,u.* FROM pemesanan p, user u WHERE u.id_user=p.id_user AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                <div class="row">
                  <div class="col-md-6">
                       <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']?>" class="img-thumbnail" alt="..">
                  </div>
                  <div class="col-md-3">

                    <p>
                      <b>
                        Nama Pemesan:
                      </b> 
                      
                    </p>
                     <p>
                      <b>
                        Alamat Pemesan:
                      </b> 
                      
                    </p> 
                     <p>
                      <b>
                        Status Pembayaran:
                      </b> 
                      
                    </p>  
                    <?php
                    $no1=1; if ($data2['jenis']=='Snack') {
                      echo "<b>Varian:</b>".$id;
                       $query5="SELECT v.* FROM pilih_varian vp, varian v WHERE v.id_varian=vp.id_varian AND vp.id_pemesanan='$id'";
                              $result5=mysqli_query($db,$query5);
                              while($data5=mysqli_fetch_array($result5)){
                                echo "<p>".$no1++.". ".$data5['varian']." </p>";
                              }



                    }else{}?>
                   
                  </div>
                  <div class="col-md-3">
                    <p>
                      
                      <?php echo $data1['nama']?>
                    </p>
                     <p>
                       
                      <?php echo $data1['alamat_pesan']?>
                    </p> 
                     <p>
                       
                       <?php
                        $query3="SELECT p.*,u.* FROM pemesanan p, pembayaran u WHERE u.id_pemesanan
                        =p.id_pemesanan AND p.id_pemesanan='$id' ";
                        $result3=mysqli_query($db,$query3);
                        $data3=mysqli_fetch_array($result3);
                        if(mysqli_num_rows($result3) <1 )
                        {
                          echo "Belum dibayar";
                        }else{
                          echo $data3['status'];
                        }  
                        ?>
                    </p>
                    <p>
                     
                     <a href="f_laporkan.php?id=<?php echo $data1['id_user']?>" class="btn btn-danger btn-sm" >Laporkan</a>
                   </p>


                  
                  </div>

                 
                </div>
              </div>
                   
                  
                      
                        <div class="modal-footer"> 
                          <?php 
                          $idmenu=$data1['id_menu'];
                          $iduser=$data1['id_user'];

                          $query6="SELECT * FROM chatroom c, chat2 ch WHERE ch.id_menu='$idmenu' AND c.id_user='$iduser'";
                          $result6=mysqli_query($db,$query6);
                          if(mysqli_num_rows($result6)<1){?>

                             <form method="POST" action="kirim_pesan.php">
                            <input type="hidden" name="id_user" value="<?php echo $data1['id_user']?>">
                            <input type="hidden" name="id_menu" value="<?php echo $data1['id_menu']?>">
                         

                          
                          <textarea class="form-control form-control-sm ml-4 mr-4"  id="username" name="pesan" placeholder="Ketikan pesan.." style="background: #DCDCDC;resize:none;height:70px;" required=""></textarea>
                          
                          <input type="submit" name="kirim5" type="button" class="btn btn-info btn-sm mr-4" value="Kirim">
                          </form>

                            <?php

                          }else{?>
                              <a href="chat.php" class="btn btn-info btn-sm mr-4">Chat</a>


                            <?php

                          }
                          ?>
                         
                        </div>
                        




                    
                    
              </div>
            </div>
      </div>



<div class="modal" tabindex="-1" id="terima<?php echo $data2['id_pemesanan'];?>">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Terima Pesanan</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                   <?php
                        $id = $data2['id_pemesanan']; 

                        $query1="SELECT p.*,u.* FROM pemesanan p, user u WHERE u.id_user=p.id_user AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                <div class="row">
                  
                  <div class="col-md-3">

                    <p>
                      <b>
                        Nama Pemesan:
                      </b> 
                      
                    </p>
                     <p>
                      <b>
                        Alamat Pemesan:
                      </b> 
                      
                    </p> 
                     <p>
                      <b>
                        Status Pembayaran:
                      </b> 
                      
                    </p>  
                   
                  </div>
                  <div class="col-md-3">
                    <p>
                      
                      <?php echo $data1['nama']?>
                    </p>
                     <p>
                       
                      <?php echo $data1['alamat_pesan']?>
                    </p> 
                     <p>
                       
                       <?php
                        $query3="SELECT p.*,u.* FROM pemesanan p, pembayaran u WHERE u.id_pemesanan
                        =p.id_pemesanan AND p.id_pemesanan='$id' ";
                        $result3=mysqli_query($db,$query3);
                        $data3=mysqli_fetch_array($result3);
                        if(mysqli_num_rows($result3) <1 )
                        {
                          echo "Belum dibayar";
                        }else{
                          echo $data3['status'];
                        }  
                        ?>
                    </p>
                                         
                  </div>
                   <div class="col-md-4">
                     <form method="POST" action="terima_pesanan.php">
                            <input type="hidden" name="id_pemesanan" value="<?php echo $data1['id_pemesanan']?>">
                         

                          <div class="col-md-12">
                              <label>Masukan Ongkir:</label>                          
                              <input type="number" name="ongkir" class="form-control" required>
                              </br>
                               <input type="submit" name="terima" type="button" class="btn btn-info btn-sm mr-4" value="Terima">
                          </form>
                          </div>

                          
                          
                         
                   </div>
                   

                 
                </div>
              </div>
                   
                  
                      

                    
                    
              </div>
            </div>
      </div>



<div class="modal" tabindex="-1" id="bukti_bayar<?php echo $data3['id_pembayaran'];?>">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Bukti Bayar</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                 <div class="row">
                    <div class="col-md-8">
                       <img src="../asset/user/gambar/user/bayar/<?php echo $data3['bukti_bayar']?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-3">
                      <b>Kode Bayar : </b><p><?php echo $data1['kode']?></p>
                      <b>Nama : </b><p><?php echo $data3['atas_nama']?></p>
                      <b>No Rek : </b><p><?php echo $data3['no_rek']?></p>
                      <b>Total Bayar : </b><p>Rp. <?php echo number_format($data3['total_bayar']);?></p>
                      <b>Jumlah Tf : </b><p>Rp. <?php echo number_format($data3['jml_tf']);?></p>
                      <b>Tgl Bayar : </b><p><?php echo $data3['tgl_bayar']?></p>
                      <b>Ket : </b><p><?php echo $data3['ket_bayar']?></p>

                      <p><b>Status : </b><?php echo $data3['status']?></p>
                        <?php 
                          if ($data3['status']=='pending') {?>
                               <a href="validasi_bayar.php?id=<?php echo $data3['id_pembayaran']?>" class="btn btn-primary btn-sm">Validasi</a>

                            <?php
                            
                          }
                         ?>
                                        
                    </div>
                </div>
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


<p class="pt-4"></p>
<p class="pt-4"></p>

<hr style="border: 1px solid #FFC82B;"> 
<h4 class="text-center">Pesanan Terkirim</h4>
  <div class="row mx-auto">
    <div class="col-12">

      <table id="data" cellspacing="0" width="100%">
        <thead>
            <tr  class="table table-success">
                <th>No</th>
                <th>Pemesan</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Tgl Kirim</th>
                <th>Total Bayar</th> 
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
       <tbody>
         <?php
      $id=$hasil['id_user'];
      $query2="SELECT p.id_user as id ,p.id_pemesanan,p.id_menu,p.jumlah,p.tgl_pemesanan,p.total_bayar,pem.total_bayar as tot,p.status as stat,m.*,u.nama FROM pemesanan p, pembayaran pem, menu m,user u WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND pem.id_pemesanan=p.id_pemesanan AND m.id_user='$id' AND p.status='terkirim'";
      $result2=mysqli_query($db,$query2);
      $no=1;
      while ($data2=mysqli_fetch_array($result2)) {
       
     
    ?>
        <tr>
           <td><?php echo $no++?></td>
                    <td align="center"><?php echo $data2['nama'];?></td>
                    <td align="center"><?php echo $data2['nama_menu'];?></td>
                    <td align="center"><?php echo $data2['jumlah'];?></td>
                    <td align="center"><?php
                                        $tanggal = $data2['tgl_pemesanan'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                    <td align="center">Rp. <?php echo number_format($data2['tot'])?></td>
                       <td align="center"><?php echo $data2['stat']?></td>
          <td>
             <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#detail<?php echo $data2['id_pemesanan'];?>" class="btn btn-success btn-sm" data-toggle="modal">
                  Detail
                </a>
                
               
              </div>

          </td>
        </tr>


 <div class="modal" tabindex="-1" id="detail<?php echo $data2['id_pemesanan'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Pesanan</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                   <?php
                        $id = $data2['id_pemesanan']; 

                        $query1="SELECT p.*,u.* FROM pemesanan p, user u WHERE u.id_user=p.id_user AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                <div class="row">
                  <div class="col-md-5">
                       <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']?>" class="img-thumbnail" >
                  </div>
                  <div class="col-md-3">

                    <p>
                      <b>
                        Nama Pemesan
                      </b> 
                      
                    </p>
                     <p>
                      <b>
                        Alamat Pemesan
                      </b> 
                      
                    </p> 
                     <p>
                      <b>
                        Status Pembayaran
                      </b> 
                      
                    </p>  
                    <p>
                      <b>
                        Feedback
                      </b> 
                      
                    </p>   
                  </div>
                  <div class="col-md-3">
                    <p>
                      
                      : <?php echo $data1['nama']?>
                    </p>
                     <p>
                       
                      : <?php echo $data1['alamat']?>
                    </p> 
                     <p>
                       
                       <?php
                        $query3="SELECT p.*,u.* FROM pemesanan p, pembayaran u WHERE u.id_pemesanan
                        =p.id_pemesanan AND p.id_pemesanan='$id' ";
                        $result3=mysqli_query($db,$query3);
                        $data3=mysqli_fetch_array($result3);
                        if(mysqli_num_rows($result3) <1 )
                        {
                          echo ": Belum dibayar";
                        }else{
                          echo ": ".$data3['status'];
                        }  
                        ?>
                    </p>
                    <p>
                                     
                    <?php
                       
                        $query3="SELECT * FROM feedback WHERE id_pemesanan='$id'";
                        $result3=mysqli_query($db,$query3);
                        if (mysqli_num_rows($result3)<1) {
                            echo ": Feedback tidak diisi";
                        }else{
                            $data3=mysqli_fetch_array($result3);
                            echo ": ".$data3['isi'];
                        }
                    ?>
                  </p>
                  </div>
                 
                  </div>
                  <div class="modal-footer">
                     <a href="f_laporkan.php?id=<?php echo $data1['id_user']?>" class="btn btn-primary btn-sm" >Laporkan</a>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                     </div>
              </div>
            </div>
      </div>

<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->


                  <!--  <?php
                        $id = $data2['id_pemesanan']; 

                        $query1="SELECT u.* FROM user u, pemesanan p WHERE u.id_user=p.id_user AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?> -->

      <?php } ?>
      </tbody>
    </table>
</div>



</div>

<p class="pt-4"></p>
<p class="pt-4"></p>
<hr style="border: 1px solid #FFC82B;" > 
<h4 class="text-center">Pesanan Dibatalkan</h4>
  <div class="row mx-auto">
    <div class="col-12">

      <table id="data2" class="display" cellspacing="0" width="100%">
        <thead>
            <tr  class="table table-secondary">
                <th>No</th>
                <th>Pemesan</th>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Tgl Kirim</th>
                <th>Total Bayar</th> 
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
       <tbody>
         <?php
      $id=$hasil['id_user'];
      $query2="SELECT p.id_user as id ,p.id_pemesanan,p.id_menu,p.jumlah,p.tgl_pemesanan,p.total_bayar,p.status as stat,m.*,u.nama FROM pemesanan p, menu m,user u WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND m.id_user='$id' AND p.status='di batalkan'";
      $result2=mysqli_query($db,$query2);
      $no=1;
      while ($data2=mysqli_fetch_array($result2)) {
       
     
    ?>
        <tr>
           <td><?php echo $no++?></td>
                    <td align="center"><?php echo $data2['nama'];?></td>
                    <td align="center"><?php echo $data2['nama_menu'];?></td>
                    <td align="center"><?php echo $data2['jumlah'];?></td>
                    <td align="center"><?php
                                        $tanggal = $data2['tgl_pemesanan'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                    <td align="center">Rp. <?php echo number_format($data2['total_bayar'])?></td>
                       <td align="center"><?php echo $data2['stat']?></td>
          <td>
             <div class="btn-group" role="group" aria-label="Basic example">
                <a href="#detail<?php echo $data2['id_pemesanan'];?>" class="btn btn-success btn-sm" data-toggle="modal">
                  Detail
                </a>
                
               
              </div>

          </td>
        </tr>


 <div class="modal" tabindex="-1" id="detail<?php echo $data2['id_pemesanan'];?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Pesanan</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              <div class="modal-body">
                   <?php
                        $id = $data2['id_pemesanan']; 

                        $query1="SELECT p.*,u.* FROM pemesanan p, user u WHERE u.id_user=p.id_user AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                <div class="row">
                  <div class="col-md-5">
                       <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']?>" class="img-thumbnail" >
                  </div>
                  <div class="col-md-3">

                    <p>
                      <b>
                        Nama Pemesan:
                      </b> 
                      
                    </p>
                     <p>
                      <b>
                        Alamat Pemesan:
                      </b> 
                      
                    </p> 
                     <p>
                      <b>
                        Status Pembayaran:
                      </b> 
                      
                    </p>   
                  </div>
                  <div class="col-md-3">
                    <p>
                      
                      <?php echo $data1['nama']?>
                    </p>
                     <p>
                       
                      <?php echo $data1['alamat']?>
                    </p> 
                     <p>
                       
                       <?php
                        $query3="SELECT p.*,u.* FROM pemesanan p, pembayaran u WHERE u.id_pemesanan
                        =p.id_pemesanan AND p.id_pemesanan='$id' ";
                        $result3=mysqli_query($db,$query3);
                        $data3=mysqli_fetch_array($result3);
                        if(mysqli_num_rows($result3) <1 )
                        {
                          echo "Belum dibayar";
                        }else{
                          echo $data3['status'];
                        }  
                        ?>
                    </p>
                  </div>
                 
                  </div>
                  <div class="modal-footer">
                     <a href="f_laporkan.php?id=<?php echo $data1['id_user']?>" class="btn btn-primary btn-sm" >Laporkan</a>
                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                     </div>
              </div>
            </div>
      </div>

<!--AKHIR MENAMPILKAN SEMUA DATA DAN MEMASUKAN KE KOTAK menu-->


                  <!--  <?php
                        $id = $data2['id_pemesanan']; 

                        $query1="SELECT u.* FROM user u, pemesanan p WHERE u.id_user=p.id_user AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?> -->

      <?php } ?>
      </tbody>
    </table>
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
  $(document).ready(function() {
    $('#data1').DataTable();
  } );
  </script>

 <script>
  $(document).ready(function() {
    $('#data2').DataTable();
  } );
  </script>
   
</body>
</html>