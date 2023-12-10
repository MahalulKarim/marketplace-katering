<?php include "headerfooter/atas.php";?>
<h3><i class="fa fa-headphones"></i> Customer Service</h3>
<hr style="border: 1px solid #417e9d;">
<div class="row mt text-center">
 <div class="col-md-2  text-center">
   <?php include "headerfooter/menusamping.php"?>
  </div>

  <div class="col-md-9 text-left">
     <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalform" ><i class="fa fa-plus"></i> Tambah Topik</a>
        <p></p>
  <?php
  include 'koneksi.php';
  ?>
       <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Id</th>
            <th>pertanyaan</th>
            <th>jawaban</th>
            <th class="text-center">Aksi</th>                            
          </tr>
        </thead> 
        <tbody> 
          <?php
          

          $query="SELECT * FROM `topik_pertanyaan`";
        $result=mysqli_query($db,$query);
        $no=1;
        while ($data=mysqli_fetch_array($result))
          {

        
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_topik']; ?></td>
              <td align="left"><?php echo $data['pertanyaan']; ?></td>
              <td align="left"><?php echo $data['jawaban']; ?></td>
              <td align="center">
                <div class="btn-group">
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $data['id_topik']; ?>"><i class="fa fa-edit"></i></a>
                <a href="hapus_topik_penjual.php?id=<?php echo $data['id_topik']; ?>"
                  onclick="return confirm('Yakin Hapus Data <?php echo $data['id_topik']; ?>?')"
                 class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id_topik']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Topik</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <?php
                        $id = $data['id_topik']; 

                        $query1="SELECT * FROM `topik_pertanyaan` WHERE id_topik='$id'";
                        $result1=mysqli_query($db,$query1);
                        $data1=mysqli_fetch_array($result1);
                        if(mysqli_num_rows($result1) <1 )
                        {
                          die("Data Tidak Ditemukan..");
                        }  
                        ?>
                         <form class="cmxform form-horizontal style-form" method="post" action="simpan_ubah_topik.php">
                          <input type="hidden" name="id_topik" value="<?php echo $data1['id_topik']?>">
                              <div class="form-group">
                                <div class="col-lg-10">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan" value="<?php echo $data1['pertanyaan']?>">
                              </div>
                            </div>
                              <div class="form-group">
                                 <div class="col-lg-10">
                                <label >Jawaban</label>
                                <textarea class="form-control " id="ccomment" name="jawaban"><?php echo $data1['jawaban']?></textarea>
                              </div>
                              </div>
                            </div>
                            <p></p>
                          <div class="modal-footer">
                              <button type="submit" name="edit" class="btn btn-info">Ubah</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                          </div>
                        </div>

                </div>
              </div>



            </div>
            <div class="modal fade" id="myModaltambah" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Topik</h4>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                            <form class="cmxform form-horizontal style-form" method="post" action="simpan_ubah_topik.php">
                              <div class="form-group">
                                <div class="col-lg-10">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="pertanyaan">
                              </div>
                            </div>
                              <div class="form-group">
                                 <div class="col-lg-10">
                                <label >Jawaban</label>
                                <textarea class="form-control " id="ccomment" name="jawaban"></textarea>
                              </div>
                              </div>
                            </div>
                            <p></p>
                          <div class="modal-footer">
                              <button type="submit" name="tambah" class="btn btn-info">Tambah</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </form>
                          </div>
                        </div>

                </div>
              </div>

          <?php               
          } 
          ?>

        </tbody>
      </table> 
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
                           <form action="simpan_topik.php" class="form-horizontal style-form" method="POST">
                              <div class="form-group">
                                <div class="col-lg-10">
                                  <label></label>

                                  <input class="form-control" type="text" name="jenis" placeholder="Pertanyaan" autocomplete="off" required> <br>
                                </div>

                                <div class="col-lg-10">
                                  <textarea placeholder="Jawaban" class="form-control"></textarea>
                                </div>
                             </div>
                       </div>
                      </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" name="simpan" class="btn btn-info">Tambah</button>
                            </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                  </div>
              </div>
            </div>
    <!-- /form-panel -->
  </div>
  <!-- /col-lg-12 -->
</div>
<?php include "headerfooter/bawah.php" ?>