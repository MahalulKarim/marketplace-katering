<?php include 'headerfooter/atas.php' ?>
<h3><i class="fa fa-money"></i> Data Pembayaran</h3>
<hr style="border: 1px solid #417e9d;">

<!-- page end-->
<table id="dt" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th width="10">No</th>
      <th>Pemesan</th>
      <th>Menu</th>
      <th>Tgl Bayar</th>
      <th>Status Pembayaran</th>
      <th>Status Pemesanan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'koneksi.php';
    $query = "SELECT pe.*,p.id_pemesanan,p.status as status1,u.nama,m.nama_menu FROM pembayaran pe,pemesanan p,menu m, user u WHERE pe.id_pemesanan=p.id_pemesanan AND p.id_menu=m.id_menu AND p.id_user=u.id_user AND pe.status!='pending'";
    $result = mysqli_query($db, $query);
    $no = 1;
    while ($data = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['nama_menu']; ?></td>
        <td><?php echo $data['tgl_bayar']; ?></td>
        <td><?php echo $data['status']; ?></td>
        <td><?php echo $data['status1']; ?></td>
        <td>
          <?php if($data['status1']=='terkirim' && $data['status']=='terbayar'){
                  $idpemesanan=$data['id_pemesanan']; 
                  $que="SELECT * FROM bayar WHERE id_pemesanan='$idpemesanan'";
                  $resu=mysqli_query($db,$que);
                  $dat=mysqli_fetch_assoc($resu);
                  if(mysqli_num_rows($resu)<1){?>
                      <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_pembayaran']; ?>">Bayar Ke Penjual</a>

                      <?php }else{

                          }
               }elseif($data['status']=='komplit'){?>
                        <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1<?php echo $data['id_pemesanan']; ?>">Lihat Bukti Bayar</a>

                          <?php }else{

          }?>

        </td>
      
      </tr>
      <div class="modal fade" id="myModal<?php echo $data['id_pembayaran']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Bayar Ke Penjual</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $query3 ="SELECT max(id_bayar) as idTerbesar FROM bayar";
                        $result3 = mysqli_query($db,$query3);
                        $data3 = mysqli_fetch_array($result3);
                        $id_bayar = $data3['idTerbesar'];
                        $tambah = $id_bayar+1;
                        $id = $data['id_pembayaran']; 

                        $query1="SELECT p.*,pe.*,m.*,u.* FROM pemesanan p, pembayaran pe,menu m,user u WHERE p.id_pemesanan=pe.id_pemesanan AND m.id_menu=p.id_menu AND m.id_user=u.id_user AND pe.id_pembayaran='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        } ?>
                        
                                   
                        
                       <div class="col-md-12 ml-auto">
                        <h5>Tanggal : <?php echo $tanggal=date('Y-m-d')?></h5>
                      </div>
                      <div class="col-md-12 ml-auto">
                        <h5>ID Pembayaran : <?php echo $tambah?></h5>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <h5>Nama Menu</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['nama_menu']?></h5>
                      </div>

                      <div class="col-md-4 ml-auto">
                        <h5>Penjual </h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['nama']?></h5>
                      </div>

                      <div class="col-md-4 ml-auto">
                        <h5>Pembeli</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data['nama']; ?></h5>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <h5>Alamat Kirim</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['alamat_pesan']; ?></h5>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <h5>Harga</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5>Rp. <?php echo number_format($data1['harga']); ?></h5>
                      </div>
                       <div class="col-md-4 ml-auto">
                        <h5>Jumlah</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['jumlah']; ?></h5>
                      </div>
                       <div class="col-md-4 ml-auto">
                        <h5>Total Bayar</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5> Rp. <?php echo number_format($data1['total_bayar']) ; ?></h5>
                      </div>


                         <!--  <?php
                            $iduser=$data1['id_user']; 
                            $query2="SELECT * FROM bank WHERE id_user='$iduser'";
                            $result2=mysqli_query($db,$query2);
                            $data2=mysqli_fetch_array($result2);
                            if(mysqli_num_rows($result2)<1){

                            }else{
                              $data2['no_rek'];
                            }
                          ?> -->
                            
                         
                        
                        </div>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="simpan_bayar.php">
                            <input type="hidden" name="id_bayar" value="<?php echo $tambah?>">
                            <input type="hidden" name="id_pemesanan" value="<?php echo $data['id_pemesanan']?>">
                            <input type="hidden" name="total" value="<?php echo $data1['total_bayar']?>">
                            <input type="hidden" name="tgl_bayar" value="<?php echo $tanggal?>">
                            
                              <input type="submit" value="Bayar" name="bayar" class="btn btn-info btn-sm">

                          </form>

                       
                         
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
                       
                  
                </div>
              </div>
            </div>


            <div class="modal fade" id="myModal1<?php echo $data['id_pemesanan']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">PEMBAYARAN</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $idbayar= $data['id_pemesanan'];
                        $query3 ="SELECT * FROM bayar WHERE id_pemesanan='$idbayar'";
                        $result3 = mysqli_query($db,$query3);
                        $data3 = mysqli_fetch_array($result3);
                        $id = $data['id_pembayaran']; 

                        $query1="SELECT p.*,pe.*,m.*,u.* FROM pemesanan p, pembayaran pe,menu m,user u WHERE p.id_pemesanan=pe.id_pemesanan AND m.id_menu=p.id_menu AND m.id_user=u.id_user AND pe.id_pembayaran='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        } ?>
                        
                                   
                        
                       <div class="col-md-12 ml-auto">
                        <h5>Tanggal : <?php echo $data3['tgl_bayar']?></h5>
                      </div>
                      <div class="col-md-12 ml-auto">
                        <h5>ID Pembayaran : <?php echo $data3['id_bayar']?></h5>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <h5>Nama Menu</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['nama_menu']?></h5>
                      </div>

                      <div class="col-md-4 ml-auto">
                        <h5>Penjual </h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['nama']?></h5>
                      </div>

                      <div class="col-md-4 ml-auto">
                        <h5>Pembeli</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data['nama']; ?></h5>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <h5>Alamat Kirim</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['alamat_pesan']; ?></h5>
                      </div>
                      <div class="col-md-4 ml-auto">
                        <h5>Harga</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5>Rp. <?php echo number_format($data1['harga']); ?></h5>
                      </div>
                       <div class="col-md-4 ml-auto">
                        <h5>Jumlah</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5><?php echo $data1['jumlah']; ?></h5>
                      </div>
                       <div class="col-md-4 ml-auto">
                        <h5>Total Bayar</h5>
                      </div>
                       <div class="col-md-2 ml-auto">
                        <h5>:</h5>

                       </div>
                      <div class="col-md-4 ml-auto text-left">
                         <h5> Rp. <?php echo number_format($data1['total_bayar']) ; ?></h5>
                      </div>


                         <!--  <?php
                            $iduser=$data1['id_user']; 
                            $query2="SELECT * FROM bank WHERE id_user='$iduser'";
                            $result2=mysqli_query($db,$query2);
                            $data2=mysqli_fetch_array($result2);
                            if(mysqli_num_rows($result2)<1){

                            }else{
                              $data2['no_rek'];
                            }
                          ?> -->
                            
                         
                        
                        </div>
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="cetak_bayar.php">


                            <input type="hidden" name="id_bayar" value="<?php echo $tambah?>">
                            <input type="hidden" name="tgl" value="<?php echo $data3['tgl_bayar']?>">
                            <input type="hidden" name="menu" value="<?php echo $data1['nama_menu']?>">
                            <input type="hidden" name="penjual" value="<?php echo $data1['nama']?>">

                            <input type="hidden" name="pembeli" value="<?php echo $data['nama'];?>">
                            <input type="hidden" name="alamat" value="<?php echo $data1['alamat_pesan']; ?>">

                            <input type="hidden" name="harga" value="<?php echo $data1['harga']; ?>">


                            <input type="hidden" name="jumlah" value="<?php echo $data1['jumlah']; ?>">

                            <input type="hidden" name="total" value="<?php echo $data1['total_bayar']?>">
                            
                              <input type="submit" value="Cetak" name="cetak" class="btn btn-info btn-sm">

                          </form>

                       
                         
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
                       
                  
                </div>
              </div>
            </div>
     
    <?php
    }
    ?>
  </tbody>
</table>

<?php include 'headerfooter/bawah.php' ?>