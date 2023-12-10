<?php include 'headerfooter/atas.php'?>
        <h3><i class="fa fa-ban"></i> Data Banned Pembeli</h3>
        <hr style="border: 1px solid #417e9d;">
      
          <!-- page start-->
         
              <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Nama</th>
            <th>Tanggal Banned</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php
          include "koneksi.php";
       $query="SELECT b.*,u.* FROM banned b, user u WHERE b.id_user=u.id_user AND u.type_user='pembeli' AND u.status='non aktif'";
        $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['tgl_banned']; ?></td>
              <td align="center">
                <div class="btn-group">
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_user'];?>"><i class="fa fa-info"></i></a>
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
                    <h4 class="modal-title">Detail Banned</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $id = $data['id_user']; 
                        $query1="SELECT b.*,u.* FROM banned b,user u WHERE b.id_user=u.id_user AND u.id_user='$id' AND u.type_user='pembeli'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                                   
                        <div class="col-md-8 ml-auto">
                         <img src="../asset/user/gambar/user/foto/<?php echo $data1['foto']; ?>" width="60%">
                       </div>
                       <div class="col-md-3 ml-auto">
                        
                        
                        <h4>Keterangan</h4>
                        <h5><?php echo $data1['ket']?></h5>
                        <p></p>
                        
                       </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <a href="profil_baned_pembeli.php?id=<?php echo $data1['id_user']?>" class="btn btn-success">Lihat Profil</a>
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