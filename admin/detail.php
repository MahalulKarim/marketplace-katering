<?php
include "koneksi.php";

if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $sql = mysqli_query($db, "SELECT * from produk where id_produk='$id'");
    while ($row = mysqli_fetch_array($sql)){       
?>

            <!-- Modal -->
              <form method="post" action="./application/view/save.php">
                  <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kode Paket</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['nama_produk'];?>" name="kode_paket">
                            </div>
                            </div>
                  </div>            
            </form>
        <?php } }
?>