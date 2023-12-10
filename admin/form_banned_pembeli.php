<?php include 'headerfooter/atas.php';
include "koneksi.php";
if( !isset($_GET['id'])){
    header('location:paketmakanan.php');
}
$id =$_GET['id'];

$query="SELECT * FROM `user` WHERE id_user='$id'";
$result=mysqli_query($db,$query);
$data=mysqli_fetch_array($result);
if(mysqli_num_rows($result) <1 ){
    die("Data Tidak Ditemukan..");
}
?>
<div class="row mt">
   <div class="col-md-3">
   </div>
  <div class="col-md-6">

              <h4 class="mb  text-center"><i class="fa fa-ban"></i> Isi Keterangan Banned</h4>
              <form class="form-inline" role="form" method="POST" action="proses_banned_pembeli.php">
                <input type="hidden" name="id_user" value="<?php echo $id?>" >
             
                  <label class="sr-only">Keterangan</label>
                  <textarea class="form-control" placeholder="Keterangan" name="ket" required style="width: 100%; height: 100px"></textarea>
                <p></p>
                <button type="submit" name="simpan" class="btn btn-danger" onclick="return confirm('Yakin Banned akun <?php echo $data['nama']; ?>?')">Banned</button>
              </form>

              </div>
           
          <!-- /col-lg-12 -->
        </div>
<?php include 'headerfooter/bawah.php'?>