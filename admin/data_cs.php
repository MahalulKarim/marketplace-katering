<?php include "headerfooter/atas.php";?>
<h3><i class="fa fa-headphones"></i> Customer Service</h3>
<hr style="border: 1px solid #417e9d;">
<div class="row mt text-center">
 <div class="col-md-2  text-center">
   <?php include "headerfooter/menusamping.php"?>
  </div>

  <div class="col-md-9  text-center">
        
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
             <th>Tgl dan Jam</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php
          

          $query="SELECT p.*,u.id_user,u.nama,m.nama_menu,p2.tanya,p2.tgl_jam FROM pertanyaan p, pertanyaan2 p2, user u, menu m WHERE p.id_user=u.id_user AND p.id_menu=m.id_menu AND p2.id_pertanyaan=p.id_pertanyaan AND u.type_user='penjual'";
        $result=mysqli_query($db,$query);
        $no=1;
       
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_pertanyaan']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['tanya']; ?></td>
               <td><?php echo $data['tgl_jam']; ?></td>
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

                    <?php
                    $id=$data['id_pertanyaan'];
                    $query1="SELECT p.id_pertanyaan,p2.tanya,b.balas FROM pertanyaan p, pertanyaan2 p2,balas b WHERE p.id_pertanyaan=p2.id_pertanyaan AND b.id_pertanyaan=p.id_pertanyaan AND p.id_pertanyaan='$id' ORDER BY b.jam ASC";
                     $result1=mysqli_query($db,$query1);
                    $no=1;
                   
                    while ($dat=mysqli_fetch_array($result1))
                    {
                     ?>
                      <?php echo $dat['tanya']?>
                        
                        <?php echo $dat['balas']?>
                    <?php }?>
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
    <!-- /form-panel -->
  </div>
  <!-- /col-lg-12 -->
</div>
<?php include "headerfooter/bawah.php" ?>