<?php include 'headerfooter/atas.php'?>
 <?php 
          include 'koneksi.php';

          
          if(isset($_GET['id'])){
            $id=$_GET['id'];
            $cari="SELECT * FROM user WHERE id_user='$id'";
            $kode=mysqli_query($db,$cari);
            $hasilnya=mysqli_fetch_array($kode);



           
          }?>
       <h4> Data Penjualan <?php echo $hasilnya['nama_katering']?></h4>
       <hr style="border: 1px solid #417e9d;">
       
          <!-- page end-->
         
           <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <form action="#" class="form-horizontal style-form" method="GET">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group">
                  <label class="control-label col-md-3"></label>
                  <div class="col-md-4">
                     <span class="help-block">Per Tanggal</span>
                    <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                      <input type="date" class="form-control dpd1" name="dari" required="">
                      <span class="input-group-addon">s/d</span>
                      <input type="date" class="form-control dpd2" name="sampai" required="">

                    </div>
                    <br>
                  <input type="submit" name="lihat" class="btn btn-primary btn-sm">
                  </div>
                </div>

              </form>
              <!-- <h4><i class="fa fa-angle-right"></i> Data Penjualan</h4> -->
              
              <table class="table">
                <thead>
                  <tr>
                      <th width="10">No</th>
                      
                      <th>Nama Pembeli</th>
                      <th>Menu</th>
                      <th>Jumlah</th>
                      <th>Total Bayar</th>
                      <th>Tgl Pesan</th>
                      <th>Status</th>                        
                    </tr>
                </thead>
                 <tbody>
         <?php
         if (isset($_GET['lihat'])) {
          $dari=$_GET['dari'];
          $sampai=$_GET['sampai'];
          $id=$_GET['id'];
          $query="SELECT p.*,u.nama,m.id_menu,m.nama_menu FROM pemesanan p,user u, menu m WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND p.status='terkirim' AND m.id_user='$id' AND p.tgl_pemesanan BETWEEN '$dari' AND '$sampai'";
           
         }else{
         
         $query="SELECT p.*,u.nama,m.id_menu,m.nama_menu FROM pemesanan p,user u, menu m WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND p.status='terkirim' AND m.id_user='$id'";
         }
                       $result=mysqli_query($db,$query);
                       $no=1; $kabeh=0;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              
              <td><?php echo $data['nama_menu']; ?></td>
              
               <td><?php echo $data['jumlah']; ?></td>               
                 <td>Rp. <?php echo number_format($data['total_bayar']) ; $kabeh += $data['total_bayar']; ?></td>
                <td><?php echo $data['tgl_pemesanan']; ?></td>
                <td><?php echo $data['status']; ?></td> 
              
            </tr>
            <!-- Modal Edit Mahasiswa-->
            
          <?php               
          } 
          ?>
          <tr>
            <td colspan="4" align="right">
              <b>Total :</b>
            </td>
          <td>
            <b>
            Rp. <?php echo number_format($kabeh);?>
          </b>
          </td>
          <td colspan="2">
            
          </td>
          </tr>
        </tbody>
              </table>
    </div>
  </div>
</div>
<?php include 'headerfooter/bawah.php'?>