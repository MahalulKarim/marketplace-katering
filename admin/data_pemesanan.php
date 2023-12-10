<?php include 'headerfooter/atas.php'?>
       <h3><i class="fa fa-cubes"></i> Data Pemesanan</h3>
       <hr style="border: 1px solid #417e9d;">
       
          <!-- page end-->
          <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            
            <th>Nama Pembeli</th>
            <th>Menu</th>
            <th>Katering</th>
            <th>Jumlah</th>
            <th>Total Bayar</th>
            <th>Tgl Pesan</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
          include 'koneksi.php';
         $query="SELECT p.*,u.nama,m.id_menu,m.nama_menu FROM pemesanan p,user u, menu m WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu";
                       $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              
              <td><?php echo $data['nama_menu']; ?></td>
               <td>

                <?php 
                 $id=$data['id_menu'];
                  $query1="SELECT u.nama_katering as nama1 FROM user u,menu m WHERE u.id_user=m.id_user AND m.id_menu='$id'";
                       $result1=mysqli_query($db,$query1);
                  $data1=mysqli_fetch_array($result1);
                  echo $data1['nama1'];


         ?></td>
               <td><?php echo $data['jumlah']; ?></td>               
                 <td>Rp. <?php echo number_format($data['total_bayar']) ; ?></td>
                <td><?php echo $data['tgl_pemesanan']; ?></td>
                <td><?php echo $data['status']; ?></td> 
              <td align="center">
                <div class="btn-group">
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_pemesanan']; ?>"><i class="fa fa-info"></i></a>
                </div>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_pemesanan']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Pemesanan</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $id = $data['id_pemesanan']; 

                        $query1="SELECT p.*,m.nama_menu, m.gambar FROM pemesanan p,menu m WHERE p.id_menu=m.id_menu AND p.id_pemesanan='$id' ";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        } ?>
                        
                                   
                        <div class="col-md-6 ml-auto">
                        <img src="../asset/user/gambar/toko/menu/<?php echo $data1['gambar']; ?>" width="60%">
                       </div>
                       <div class="col-md-6 ml-auto">
                        <h4>Nama Menu</h4>
                        <h5><?php echo $data1['nama_menu']?></h5>
                         
                        <p></p>
                        <h4>Alamat Kirim</h4>
                        <h5><?php echo $data1['alamat_pesan']; ?> </h5>
                        <p></p>

                        <h4>Status</h4>
                        <h5><?php echo $data1['status']; ?> </h5>
                        <p></p>
                        
                       </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                         
                         
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                       
                  
                </div>
              </div>
            </div>
          <?php               
          } 
          ?>
        </tbody>
      </table> 
       

<?php include 'headerfooter/bawah.php'?>