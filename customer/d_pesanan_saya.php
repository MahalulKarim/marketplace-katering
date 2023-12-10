<?php include "atas1.php"?>

  <!-- body start -->
  <div class="container-fluid pt-5">
    </div>
    <div class="container-fluid pt-4 mb-5">
    
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
                                <th>Tgl Pemesanan</th>
                                <th>Alamat Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT pr.nama_menu,pr.status as stat,pr.id_jenis,j.jenis,p.* FROM pemesanan  p, menu pr,jenis j WHERE pr.id_menu=p.id_menu AND j.id_jenis=pr.id_jenis AND p.status!='kosong' AND p.status!='terkirim' AND p.status!='di batalkan' AND p.id_user='$iduser'";
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
                                    <td>
                                      <?php 
                                      
                                        echo "Rp. ".number_format($data['total_bayar']);
                                    
                                      ?>

                                      </td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td>
                                    <?php
                                      if($data['status']=='menunggu'){?>
                                         <a href="detail_pemesanan.php?id_pemesanan=<?php echo $data['id_pemesanan']?>" class="btn btn-outline-success btn-sm">Detail</a>

                                        <?php


                                      }elseif($data['status']=='kosong'){?>
                                         <a href="h_pesanan.php?id=<?php echo $data['id_pemesanan']?>" class="btn btn-outline-danger btn-sm">Hapus</a>

                                        <?php
                                        }else{?>
                                         <a href="f_pembayaran.php?id_pemesanan=<?php echo $data['id_pemesanan']?>" class="btn btn-outline-success btn-sm">Detail</a>

                                        <?php



                                        }



                                    ?>
                                    

                                     
                                      
                                    </td>

                                </tr>
        
                     <?php } ?>

                           
                        </tbody>
                    </table> 

     <hr style="border: 1px solid #FFC82B;"> 
 <h4 class="text-center">Pesanan Diterima</h4>

 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center"></h2>


            
                    <table class="display table table-warning mb-5" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Tgl Pesan</th>
                                <th>Alamat Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT p.*,pr.nama_menu,pem.total_bayar as total FROM pemesanan p, menu pr, pembayaran pem WHERE pr.id_menu=p.id_menu AND pem.id_pemesanan=p.id_pemesanan AND p.id_user='$iduser' AND p.status='terkirim'";
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
                                    <td>Rp <?php echo number_format($data['total']) ?></td>
                                    <td><?php if($data['status']=='terkirim'){
                                      echo 'Diterima';
                                    }else{
                                      echo $data['status'];
                                    }; ?></td>
                                    

                                </tr>
        
                     <?php } ?>

                           
                        </tbody>
                    </table> 
                    <hr style="border: 1px solid #FFC82B;"> 
 <h4 class="text-center">Pesanan Kosong</h4>

 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center"></h2>


            
                    <table class="display table table-warning mb-5" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Tgl Pesan</th>
                                <th>Alamat Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT p.*,pr.nama_menu FROM pemesanan p, menu pr WHERE pr.id_menu=p.id_menu AND p.id_user='$iduser' AND p.status='kosong'";
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
                                    <td>Rp <?php echo number_format($data['total_bayar']) ?></td>
                                    <td><?php if($data['status']=='terkirim'){
                                      echo 'Diterima';
                                    }else{
                                      echo $data['status'];
                                    }; ?></td>
                                    

                                </tr>
        
                     <?php } ?>

                           
                        </tbody>
                    </table>  
                    <hr style="border: 1px solid #FFC82B;"> 
 <h4 class="text-center">Pesanan Dibatalkan</h4>

 
 
 
<div class="container-fluid pt-2 mb-6">
        <div class="col-md-5 pt-2">

        </div>


       
       
            <h2 class="text-center"></h2>


            
                    <table class="display table table-warning mb-5" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Jumlah</th>
                                <th>Tgl Pesan</th>
                                <th>Alamat Kirim</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //menampilkan data pesanan
                            $iduser = $hasil['id_user'];
                            $query = "SELECT p.*,pr.nama_menu FROM pemesanan p, menu pr WHERE pr.id_menu=p.id_menu AND p.id_user='$iduser' AND p.status='di batalkan'";
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
                                    <td>Rp <?php echo number_format($data['total_bayar']) ?></td>
                                    <td><?php if($data['status']=='terkirim'){
                                      echo 'Diterima';
                                    }else{
                                      echo $data['status'];
                                    }; ?></td>
                                    

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