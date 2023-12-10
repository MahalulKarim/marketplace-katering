<?php include 'headerfooter/atas.php' ?>
<h3><i class="fa fa-comments-o"></i> Data Pesan</h3>
<hr style="border: 1px solid #417e9d;">

<!-- page end-->
<table id="dt" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th width="10">No</th>
      <th>User</th>
      <th>Tipe</th>
      <th class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'koneksi.php';
    $query = "SELECT ch.id_chat as id, u.nama,u.type_user,u.foto FROM chatroom ch, user u WHERE ch.id_user=u.id_user";
    $result = mysqli_query($db, $query);
    $no = 1;
    while ($data = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['type_user']; ?></td>
        <td align="center">
          <div class="btn-group">
            <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"><i class="fa fa-info"></i></a>
             <a href="hapus.php?id_chat=<?php echo $data['id']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus semua pesan?') "><i class="fa fa-trash"></i></a>
          </div>
        </td>
      </tr>

            <div class="modal fade modal-dialog-scrollable" id="myModal<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title"><img src="../asset/user/gambar/user/foto/<?php echo $data['foto']; ?>" class="img-circle bordered "  alt="..." width="40" height="40"> <?php echo $data['nama']; ?></h4>
                  </div>
                       <div class="modal-body">
                             <div class="row">
                                <?php 
                                    $id=$data['id'];
                                    $query3="SELECT * FROM chat WHERE id_chat='$id'";
                                          $result3=mysqli_query($db,$query3);
                                          while ($data3=mysqli_fetch_array($result3))
                                            {
                                              if($data3['status']=='0'){?>
                                                <div class="col-md-12 p-2">
                                                  <div class="chat">
                                                    <?php echo $data3['chat'];?>

                                                    <p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
                                                </div> 
                                              </div>
                                      
                                      <?php }else{ ?>

                                                 <div class="col-md-12 p-2">

                                                    <div class="chat2 p-2 ml-5 borderless">
                                                      <?php echo $data3['chat'];?>
                                                       <p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
                                                    </div>
                                                  </div>
                                            <?php }
                                              
                                            } ?>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <div class="col-md-12 p-2">
                              <form method="POST" action="kirim_pesan.php">
                              <div class="form-group">
                              <input type="hidden" name="id_chat" value="<?php echo $data['id']?>">
                               <textarea class="form-control form-control-sm"  id="username" name="pesan" placeholder="Ketikan pesan.." style="background: #DCDCDC;resize:none;height:70px;" required=""></textarea>
                              </div>
                          </div>
                               <button type="submit" class="btn btn-primary btn-sm" name="kirim" >Kirim</button>
                              </form>
                    

                                    
                                      <a href="hapus.php?id_chat=<?php echo $data['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus semua pesan?') ">Hapus Semua Pesan</a>
                          </div>
                       
                  
                </div>
              </div>
            </div>

    <?php
    }
    ?>
  </tbody>
</table>

<?php include 'headerfooter/bawah.php' ?>