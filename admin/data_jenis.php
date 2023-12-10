<?php include 'headerfooter/atas.php'?>
       <h3><i class="fa fa-cubes"></i> Data Kategori</h3>
       <hr style="border: 1px solid #417e9d;">
       
          <!-- page end-->
           <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalform" ><i class="fa fa-plus"></i> Tambah Kategori</a>
           <p></p>
          <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Id</th>
            <th>Kategori</th>   
            <th class="text-center">Aksi</th>                     
          </tr>
        </thead>  
        <tbody>
          <?php 
          include 'koneksi.php';
         $query="SELECT * FROM jenis";
                       $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_jenis']; ?></td>
              <td><?php echo $data['jenis']; ?></td>
              <td align="center">
                <div class="btn-group">
                   <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalformedit<?php echo $data['id_jenis']?>"><i class="fa fa-pencil"></i></a>
                <a href="hapus.php?id_jenis=<?php echo $data['id_jenis']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kategori <?php echo $data['jenis']?> ?') "><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            <div class="modal fade" id="modalformedit<?php echo $data['id_jenis']?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Kategori</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-8 ml-auto">
                          <?php
                            $id=$data['id_jenis'];
                            $query1 = "SELECT * FROM `jenis` WHERE id_jenis='$id'";
                            $result1 = mysqli_query($db, $query1);
                            $data1 = mysqli_num_rows($result1);
                            if($data1<1){
                              echo 'zonk';
                            }
                            $data2=mysqli_fetch_array($result1);
                          ?>
                           <form action="simpan_jenis.php" class="form-horizontal style-form" method="POST">
                              <div class="form-group">
                                <div class="col-lg-10">
                                  <label></label>
                                  <input type="hidden" name="id" value="<?php echo $id?>">
                                  <input class="form-control" type="text" name="jenis" value="<?php echo $data['jenis']?>" autocomplete="off" required>
                                </div>
                             </div>
                       </div>
                      </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" name="simpan_edit" class="btn btn-info">Simpan</button>
                            </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                  </div>
              </div>
            </div>
          <?php               
          } 
          ?>
            <div class="modal fade" id="modalform" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Kategori</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-8 ml-auto">
                           <form action="simpan_jenis.php" class="form-horizontal style-form" method="POST">
                              <div class="form-group">
                                <div class="col-lg-10">
                                  <label></label>

                                  <input class="form-control" type="text" name="jenis" placeholder="Nama Kategori" autocomplete="off" required>
                                </div>
                             </div>
                       </div>
                      </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                            </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                  </div>
              </div>
            </div>
        </tbody>
      </table> 

<?php include 'headerfooter/bawah.php'?>