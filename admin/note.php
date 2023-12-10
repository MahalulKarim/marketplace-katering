 <div class="modal fade" id="myModal<?php echo $data['id_pembayaran']; ?>" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Validasi Pembayaran</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <?php
                $id = $data['id_pembayaran'];

                $query1 = "SELECT pe.*,p.* FROM pembayaran pe,pemesanan p WHERE pe.id_pemesanan=p.id_pemesanan AND id_pembayaran='$id'";
                $result1 = mysqli_query($db, $query1);
                $data1 = mysqli_fetch_array($result1);
                if (mysqli_num_rows($result1) < 1) {
                  die("Data Tidak Ditemukan..");
                }
                ?>

                <div class="col-md-8 ml-auto">
                  <h5>Bukti Bayar</h5>
                  <img src="img/tf/tf.jpg">
                </div>
                <div class="col-md-3 ml-auto">

                  <form method="post" action="validasi_pembayaran.php">
                    <input type="hidden" name="id_pembayaran" value="<?php echo $data1['id_pembayaran'] ?>">
                    <div class="form-group">
                      <label for="">Status</label>
                      <input type="text" class="form-control form-control-sm" value="<?php echo $data1['status'] ?>" readonly>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                  <?php if ($data1['status'] == 'belum terbayar') { ?>

                     <button type="submit" class="btn btn-success" name="validasi">Validasi</button>
                    <?php } else { ?>

                       <button type="submit" class="btn btn-success" name="batal_validasi">Batal Validasi</button>
                       <?php } ?>


                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                       </form>
            </div>


          </div>
        </div>
      </div>