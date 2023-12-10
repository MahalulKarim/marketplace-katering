  <?php include 'headerfooter/atas.php'?>
 
         <h3><i class="fa fa-exclamation-triangle"></i> Data Komplain User</h3>
       <hr>
       
          <!-- page end-->
          <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Nama</th>
            <th>Tanggal Komplain</th>
            <th>Komplain</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
          include 'koneksi.php';
         $query="SELECT k.*,u.nama FROM komplain k, user u WHERE k.id_user=u.id_user";
                  $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['tgl_komplain']; ?></td>

              <td><?php echo $data['komplain']; ?></td>
              <td align="center">
                <div class="btn-group">
                   <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_komplain']; ?>"><i class="fa fa-info"></i></a>
                 <a href="hapus.php?id_komplain=<?php echo $data['id_komplain']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_komplain']; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Komplain</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row text-center">
                        <?php
                        $id = $data['id_komplain']; 

                        $query1="SELECT * FROM komplain WHERE id_komplain='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                            <div class="col-md-8 ml-auto">
                              <h4>Gambar</h4>
                        <img src="../asset/user/gambar/komplain/<?php echo $data1['foto']?>" width="100%" class='img-thumbnail'>
                       </div>   
                       <div class="col-md-3 ml-auto">     
                       
                        <h4>komplain</h4>
                        <h5><?php echo $data1['komplain']?></h5>
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
        <?php include 'headerfooter/bawah.php'?>