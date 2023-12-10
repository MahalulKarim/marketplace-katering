<?php include 'headerfooter/atas.php'?>
 <h3><i class="fa fa-th"></i> Data Menu</h3>
 <hr style="border: 1px solid #417e9d;">
        
  <?php
  include 'koneksi.php';
  ?>
       <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
         
          $query="SELECT p.*,u.nama,j.jenis FROM menu p, user u, jenis j WHERE p.id_user=u.id_user AND p.id_jenis=j.id_jenis AND u.status='aktif'";
        $result=mysqli_query($db,$query);
        $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama_menu']; ?></td>
              <td><?php echo $data['jenis']; ?></td>

              <td>Rp. <?php echo  number_format($data['harga']); ?></td>
              <td align="center">
                <div class="btn-group">
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_menu']; ?>"><i class="fa fa-info"></i></a>
                <a href="hapus.php?id_menu=<?php echo $data['id_menu']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_menu']; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Menu</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $id = $data['id_menu']; 

                        $query1="SELECT p.*,u.nama_katering FROM menu p, user u WHERE p.id_menu='$id' AND p.id_user=u.id_user";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  

                        ?>
                                   
                        <div class="col-md-6 ml-auto">
                          <img src="../asset/user/gambar/toko/menu/<?php echo $data['gambar']; ?>" width="60%">
                       </div>
                       <div class="col-md-6 ml-auto">
                           <h3>Penjual</h3>
                            <h4><?php echo $data1['nama_katering']?></h4>
                            <p></p>
                            <h3>Deskripsi</h3>
                            <h4><?php  echo
                                            nl2br(str_replace('', '', htmlspecialchars( $data1['deskripsi'])));?></h4>
                            <p></p>
                              <?php 
                                if($data['jenis']=='Snack'){?>
                                  <h3>Varian </h3>
                                   <ol>
                                    <?php
                                    $query2="SELECT * FROM varian WHERE id_menu='$id'";
                                    $result2=mysqli_query($db,$query2);
                                    while($data2=mysqli_fetch_array($result2)){
                                      echo "<b><li class='pt-1'>".$data2['varian']."</li></b>";
                                        }
                                    }
                                    ?>
                              </ol>
                        
                        
                       </div>
                    </div>
                  </div>
                <div class="modal-footer">
                    <a href="profil_toko.php?id=<?php echo $data1['id_user']?>" class="btn btn-success">Lihat Penjual</a>
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
            
          <!-- page end-->
<?php include 'headerfooter/bawah.php'?>