<?php include 'headerfooter/atas.php' ?>
<h3><i class="fa fa-money"></i> Data Pembayaran Masuk</h3>
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
    $query = "SELECT pe.*,p.id_pemesanan,p.kode,p.biaya_kirim,p.status as status1,u.nama,m.nama_menu,p.total_bayar as jumlah FROM pembayaran pe,pemesanan p,menu m, user u WHERE pe.id_pemesanan=p.id_pemesanan AND p.id_menu=m.id_menu AND p.id_user=u.id_user AND pe.status!='komplit'";
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
          <?php if($data['status']=='pending'){?>
               <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1<?php echo $data['id_pemesanan']; ?>">Lihat Bukti Bayar</a>
            <?php
                
               }else{?>
                  <a href="#" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $data['id_pemesanan']; ?>">Lihat Bukti Bayar</a>
                <?php

                }?>

        </td>
      
      </tr>
      <div class="modal fade" id="myModal1<?php echo $data['id_pemesanan']; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Bukti Bayar</h5>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="../asset/user/gambar/user/bayar/<?php echo $data['bukti_bayar']?>" class="img-thumbnail">
                       
                      </div>
                      <div class="col-md-6">
                        <h4>Data Transfer</h4>
                        <h5>Atas Nama: <?php echo $data['atas_nama']?></h5>
                        <h5>No Rek: <?php echo $data['no_rek']?></h5>
                        <hr>
                        <h4>Data Bayar</h4>
                        <h5>Tanggal Bayar: <?php echo $data['tgl_bayar']?></h5>
                        <h5>Jumlah Bayar: Rp. <?php echo number_format($data['jumlah'])?></h5>
                        <h5>Kode Bayar: <?php echo $data['kode']?></h5>
                        <h5>Ongkir: Rp. <?php echo number_format($data['biaya_kirim'])?></h5>
                        <h5>Total Bayar: Rp. <?php echo number_format($data['total_bayar'])?></h5>
                        <h5>Jumlah Transfer: Rp. <?php echo number_format($data['jml_tf'])?></h5>
                        <h5>Keterangan: <?php echo $data['ket_bayar']?></h5>
                         <h4>Status : <?php echo $data['status']?></h4>
                      </div>
                       
                        
                      
                            
                         
                        
                    </div>
                  </div>
                        <div class="modal-footer">
                          <?php 
                              if ($data['status']=='pending') {?>
                                <a href="validasi_pembayaran.php?id=<?php echo $data['id_pembayaran']?>" class="btn btn-primary btn-sm">Valid</a>
                                <a href="validasi_pembayaran.php?id2=<?php echo $data['id_pembayaran']?>" class="btn btn-danger btn-sm" onclick="return konfirm('Pembayaran Akan di Hapus !')">Tidak Valid</a>
                                <?php
                                }

                           ?>                       
                         
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
                       
                  
                </div>
              </div>
            </div>


       <div class="modal fade" id="myModal2<?php echo $data['id_pemesanan']; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Bukti Bayar</h5>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="../asset/user/gambar/user/bayar/<?php echo $data['bukti_bayar']?>" class="img-thumbnail">
                       
                      </div>
                      <div class="col-md-6">
                        <h4>Data Transfer</h4>
                        <h5>Atas Nama: <?php echo $data['atas_nama']?></h5>
                        <h5>No Rek: <?php echo $data['no_rek']?></h5>
                        <hr>
                        <h4>Data Bayar</h4>
                        <h5>Tanggal Bayar: <?php echo $data['tgl_bayar']?></h5>
                        <h5>Jumlah Bayar: Rp. <?php echo number_format($data['jumlah'])?></h5>
                        <h5>Kode Bayar: <?php echo $data['kode']?></h5>
                        <h5>Ongkir: Rp. <?php echo number_format($data['biaya_kirim'])?></h5>
                        <h5>Total Bayar: Rp. <?php echo number_format($data['total_bayar'])?></h5>
                        <h5>Jumlah Transfer: Rp. <?php echo number_format($data['jml_tf'])?></h5>
                        <h5>Keterangan: <?php echo $data['ket_bayar']?></h5>
                         <h4>Status : <?php echo $data['status']?></h4>
                      </div>
                       
                        
                      
                            
                         
                        
                    </div>
                  </div>
                        <div class="modal-footer">
                          <?php 
                              if ($data['status']=='terbayar') {?>
                                <a href="validasi_pembayaran.php?id2=<?php echo $data['id_pembayaran']?>" class="btn btn-danger btn-sm">Batal Validasi</a>
                                <?php
                                }

                           ?>                       
                         
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