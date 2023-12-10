<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-5 mb-5">
    
 <h4 class="text-center">Pesanan Saya</h4>
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">
 
        </div>


       
       
            <h2 class="text-center"></h2>


            
                    <table  class="table table-warning mb-5"  >
                        <thead>
                            <tr >
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Tgl Pesan</th>
                                <th>Alamat Kirim</th>
                                <th>Biaya Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT pr.nama_menu,p.* FROM pemesanan  p, menu pr WHERE pr.id_menu=p.id_menu AND p.id_user='$iduser' AND p.status!='terkirim' AND p.status!='di batalkan'";
                            $result = mysqli_query($db, $query);
                            while ($data = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td><?php echo $data['nama_menu']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php
                                        $tanggal = $data['tgl_pemesanan'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                                    <td><?php echo $data['alamat_pesan']; ?></td>
                                    <td> <?php 
                                        if ($data['biaya_kirim']=='0') {
                                            echo "menunggu";
                                        }else{
                                    echo 'Rp'.number_format($data['biaya_kirim']);
                                    }
                                    ?></td>
                                    <td>Rp <?php echo number_format($data['total_bayar']+$data['biaya_kirim']+$data['kode']) ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td>
                                      <a href="f_pembayaran.php?id_pemesanan=<?php echo $data['id_pemesanan']?>" class="btn btn-outline-success btn-sm">Detail</a>
                                      
                                    </td>

                                </tr>
        
                     <?php } ?>

                           
                        </tbody>
                    </table> 

     <hr style="border: 1px solid #FFC82B;"> 
 <h4 class="text-center">Riwayat Pesanan</h4>

 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center"></h2>


            
                    <table  class="table table-danger mb-5"  >
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Tgl Pesan</th>
                                <th>Alamat Kirim</th>
                                <th>Biaya Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                 <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT pr.nama_menu,p.* FROM pemesanan  p, menu pr WHERE pr.id_menu=p.id_menu AND p.id_user='$iduser' AND p.status='terkirim'";
                            $result = mysqli_query($db, $query);
                            while ($data = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td><?php echo $data['nama_menu']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php
                                        $tanggal = $data['tgl_pemesanan'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                                    <td><?php echo $data['alamat_pesan']; ?></td>
                                    <td>Rp <?php echo number_format($data['biaya_kirim']) ?></td>
                                    <td>Rp <?php echo number_format($data['total_bayar']+$data['kode']) ?></td>
                                    <td><?php 

                                    if($data['status']=='terkirim'){
                                        echo "Diterima";
                                    }else{
                                         echo $data['status']; 

                                    }
                                   




                                    ?></td>
                                    <td>
                                      <a href="#" class="btn btn-outline-danger btn-sm " data-target="#menu1<?php echo $data['id_pemesanan']; ?>" data-toggle="modal">Detail</a>
                                      
                                    </td>
                                    

                                </tr>


                                 <div class="modal" tabindex="-1" id="menu1<?php echo $data['id_pemesanan'];?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan Diterima</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="row">


                  <div class="col-md-12">
                    <h5>Feedback</h5>
                    <?php
                        $id_pemesanan=$data['id_pemesanan'];
                        $query3="SELECT * FROM feedback WHERE id_pemesanan='$id_pemesanan'";
                        $result3=mysqli_query($db,$query3);
                        if (mysqli_num_rows($result3)<1) {
                            echo "<p>Feedback tidak diisi</p>";
                        }else{
                            $data3=mysqli_fetch_array($result3);
                            echo "<p>".$data3['isi']."</p>";
                        }
                    ?>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
              </div>
            </div>
        </div>
      
        
                     <?php } ?>

                           
                        </tbody>
                    </table>     
                     
    </div>

     <hr style="border: 1px solid #FFC82B;"> 
 <h4 class="text-center">Pesanan Dibatalkan</h4>

 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center"></h2>


            
                    <table  class="table table-secondary mb-5"  >
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Tgl Pesan</th>
                                <th>Alamat Kirim</th>
                                <th>Biaya Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT pr.nama_menu,p.* FROM pemesanan  p, menu pr WHERE pr.id_menu=p.id_menu AND p.id_user='$iduser' AND p.status='di batalkan'";
                            $result = mysqli_query($db, $query);
                            while ($data = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td><?php echo $data['nama_menu']; ?></td>
                                    <td><?php echo $data['jumlah']; ?></td>
                                    <td><?php
                                        $tanggal = $data['tgl_pemesanan'];
                                        echo date('d-m-Y', strtotime($tanggal));
                                        ?></td>
                                    <td><?php echo $data['alamat_pesan']; ?></td>
                                    <td>Rp <?php echo number_format($data['biaya_kirim']) ?></td>
                                    <td>Rp <?php echo number_format($data['total_bayar']+$data['biaya_kirim']+$data['kode']) ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    

                                </tr>
        
                     <?php } ?>

                           
                        </tbody>
                    </table>     
                     
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
  $(document).ready(function() {
    $('#da').DataTable();
  } );
  </script>
  <script>
  $(document).ready(function() {
    $('#dada').DataTable();
  } );
  </script>
</body>
</html>