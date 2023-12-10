<?php include 'headerfooter/atas.php'?>
       <h3><i class="fa fa-bank"></i> Data Bank</h3>
       <hr style="border: 1px solid #417e9d;">
       
          <!-- page end-->
           <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalform" ><i class="fa fa-plus"></i> Tambah Bank</a>
           <p></p>
          <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Kode Bank</th>
            <th>Nama Bank</th>
            <th>Atas Nama</th>
            <th>Pemilik</th>
            <th>No Rekening</th>   
            <th class="text-center">Aksi</th>                     
          </tr>
        </thead>  
        <tbody>
          <?php 
          include 'koneksi.php';
          $username = $_SESSION['username'];

$query1="SELECT * FROM `user` WHERE username='$username'";
$result1=mysqli_query($db,$query1);
$data1=mysqli_fetch_array($result1);
$id_user=$data1['id_user'];

         $query="SELECT b.*,u.type_user,u.id_user, u.nama as nama1 FROM bank b, user u WHERE b.id_user=u.id_user ORDER BY  u.id_user";
                       $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['kode_bank']; ?></td>
              <td><?php echo $data['nama_bank']; ?></td>
              <td><?php echo $data['nama']; ?></td>

              <td><?php echo $data['nama1']; ?></td>
              <td><?php echo $data['no_rek']; ?></td>
              <td align="center">
                <div class="btn-group">
                  <?php if ($data['type_user']=='admin'){?>
                      <a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalformedit<?php echo $data['id_bank']?>"><i class="fa fa-pencil"></i></a>
                     <a href="hapus.php?id_bank=<?php echo $data['id_bank']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus bank <?php echo $data['nama_bank']?> ?') "><i class="fa fa-trash"></i></a>

                 
                    <?php


                  }elseif($data['type_user']=='penjual'){
                    ?>
                  <a href="hapus.php?id_bank=<?php echo $data['id_bank']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus bank <?php echo $data['nama_bank']?> ?') "><i class="fa fa-trash"></i></a>
                <?php }else{

              ?>

                
              <?php }?>
                </div>
              </td>
            </tr>
            <div class="modal fade" id="modalformedit<?php echo $data['id_bank']?>" role="dialog">
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
                          <?php
                            $id=$data['id_bank'];
                            $query1 = "SELECT * FROM `bank` WHERE id_bank='$id'";
                            $result1 = mysqli_query($db, $query1);
                            $data1 = mysqli_num_rows($result1);
                            if($data1<1){
                              echo 'zonk';
                            }
                            $data2=mysqli_fetch_array($result1);
                          ?>
                           <form action="simpan_bank.php" class="form-horizontal style-form" method="POST">
                              <div class="form-group">
                                <div class="col-lg-10">

                                  <input type="hidden" name="id" value="<?php echo $id?>">
                                  <input type="hidden" name="id_user" value="<?php echo $id_user?>">
                                  <label>Kode Bank</label>
                                  <input class="form-control" type="text" name="kode_bank" value="<?php echo $data['kode_bank']?>" autocomplete="off" required>
                                </div>
                                  <div class="col-lg-10">
                                  <label>Nama Bank</label>
                                  <input class="form-control" type="text" name="nama_bank" value="<?php echo $data['nama_bank']?>" autocomplete="off" required>
                                </div>
                                <div class="col-lg-10">
                                  <label>Atas Nama</label>
                                  <input class="form-control" type="text" name="nama" value="<?php echo $data['nama']?>" autocomplete="off" required>
                                </div>
                                <div class="col-lg-10">
                                  <label>No Rek.</label>
                                  <input class="form-control" type="text" name="no_rek" value="<?php echo $data['no_rek']?>" autocomplete="off" required>
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
                    <h4 class="modal-title">Tambah Bank</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-8 ml-auto">
                           <form action="simpan_bank.php" class="form-horizontal style-form" method="POST">
                              <div class="form-group">

                                  <input class="form-control" type="hidden" name="id_user" autocomplete="off" value="<?php echo $id_user?>" required>
                                <div class="col-lg-10">
                                  <label>Kode Bank</label>

                                  <input class="form-control" type="text" name="kode_bank" autocomplete="off" required>
                                </div>
                                 <div class="col-lg-10">
                                  <label>Nama Bank</label>
                                  <input class="form-control" type="text" name="nama_bank" autocomplete="off" required>
                                </div>
                                <div class="col-lg-10">
                                  <label>Atas Nama</label>
                                  <input class="form-control" type="text" name="nama" autocomplete="off" required>
                                </div>
                                <div class="col-lg-10">
                                  <label>No Rek.</label>
                                  <input class="form-control" type="text" name="no_rek" autocomplete="off" required>
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