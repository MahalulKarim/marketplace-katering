<?php include 'headerfooter/atas_cs.php'?>
 <h3><i class="fa fa-angle-table"></i>Respon Pembeli</h3>
  <hr>
        
  <?php
  include 'koneksi.php';
  ?>
       <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Pertanyaan</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php
          

          $query="SELECT p.*,u.id_user,u.nama,m.nama_menu FROM pertanyaan p, user u, menu m WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND u.type_user='pembeli'";
        $result=mysqli_query($db,$query);
        $no=1;
       
        while ($data=mysqli_fetch_array($result))
          {

        
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_pertanyaan']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['pertanyaan']; ?></td>
              <td align="center">
                <div class="btn-group">
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_pertanyaan']; ?>">Balas</a>
                </div>
              </td>
            </tr>
            <!-- Modal BALAS-->
            <div class="modal fade" id="myModal<?php echo $data['id_pertanyaan']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                
                    <h4 class="modal-title">Nama Penjual</h4>
                      <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                    <a href="profil_toko.php?id=<?php echo $data['id_user']?>" class="btn btn-success pull-right">Profil Penjual</a>

                 
                    
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $id=$data['id_pertanyaan']; 

                        $query1="SELECT p.*,u.nama FROM pertanyaan p, user u WHERE p.id_user=u.id_user AND p.id_pertanyaan='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");

                        } 

                          
                        ?>
                        
                        <div class="container overflow-hidden">
 


                       <div class="col-md-3">
                         <p style="text-align: left;"><?php echo $data1['nama'];?> : </p>
                        <div class="panel grey-panel">
                          <div class="panel-body">
                            <h5><?php echo $data1['pertanyaan']?></h5>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                       <p></p>
                     </div>
                     <div class="row">
                      <div class="container overflow-hidden" style="text-align: right;">
                        <div class="col-md-3">
                         
                        <div class="panel">
                          <div class="panel-body">
                            <h5></h5>
                          </div>
                          
                        </div>
                       </div>
                       <div class="col-md-3">
                        <?php
                        $id=$data['id_pertanyaan']; 

                        $query3="SELECT * FROM balas WHERE id_pertanyaan='$id'";
                        $result3=mysqli_query($db,$query3);
                        while($data3=mysqli_fetch_array($result3)){?>

                        
                        

                        <p style="text-align: right;">CS : </p>
                        <div class="panel grey-panel">
                          <div class="panel-body">
                            <h5><?php echo $data3['jawaban']?></h5>
                          </div>

                        

                        </div>
                        <?php } ?>
                          
                           <form method="post" action="proses_balas_pertanyaan_pembeli.php">
                            <input type="hidden"  name="id_pertanyaan" value="<?php echo $data1['id_pertanyaan']?>" readonly>
                            <div class="form group">

                              <input type="text" name="jawaban" class="form-control">
                            </div>
                            <br>
                            <button type="submit" name="balas" class="btn btn-info">Kirim</button>
                          
                          </form>
                         
                       </div>
                        </div>
                        </div>
                      </div>
                        <div class="modal-footer">
                          <a href="profil_toko.php?id=<?php echo $data1['id_pertanyaan']?>" class="btn btn-success">Lihat Toko</a>
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