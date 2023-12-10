<?php include 'headerfooter/atas.php'?>
        <h3><i class="fa fa-user"></i> Data Pembeli</h3>
        <hr style="border: 1px solid #417e9d;">
          
          <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Nama</th>
            <th>No HP </th>
            <th>Email</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
          include 'koneksi.php';
         $query="SELECT * FROM `user` where status='aktif' AND type_user='pembeli'";
                       $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
               <td><?php echo $data['no_hp']; ?></td>

              <td><?php echo $data['email']; ?></td>
              <td align="center">
                <div class="btn-group">
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_user']; ?>"><i class="fa fa-info"></i></a>
                <a href="hapus.php?id_user1=<?php echo $data['id_user']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_user']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Pembeli</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $id = $data['id_user']; 

                        $query1="SELECT * FROM user WHERE id_user='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                            <div class="col-md-6 ml-auto">   
                             <img src="../asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" width="100%">
                          </div>
                       <div class="col-md-6 ml-auto">
                        <h3>Alamat</h3>
                        <h4><?php echo $data1['alamat']?></h4>
                        <p></p>
                        <h3>Jenis Kelamin</h3>
                        <h4><?php echo $data1['jk']?></h4>
                        <p></p>
                        <h3>Status</h3>
                        <h4><?php echo $data1['status']?></h4>
                        <p></p>
                       </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <a href="profil_pembeli.php?id=<?php echo $data1['id_user']?>" class="btn btn-success">Lihat Profil</a>
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