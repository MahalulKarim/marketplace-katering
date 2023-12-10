<?php include 'headerfooter/atas.php';
include "koneksi.php";
if( !isset($_GET['id'])){
    header('location:komplain.php');
}

$id =$_GET['id'];
$query="SELECT l.*,u.username,u.id_user FROM komplain l, user u WHERE l.id_user=u.id_user AND l.id_komplain='$id'";;
$result=mysqli_query($db,$query);
$data=mysqli_fetch_array($result);
if(mysqli_num_rows($result) <1 ){
die("Data Tidak Ditemukan..");
}
?>
<div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3><img class="img-circle" src="img/profil/profil01.jpg" width="25"> <?php echo $data['username']?></h3>
            </div>
            
            </div>

            <div class="group-rom">
              
            </div>
            <div class="group-rom">
              <form method="GET" action="detail_laporan.php?id=<?php echo $id?>">
                <input type="hidden" name="id" value="<?php echo $id?>">

              <div class="chat-txt">
                <input type="text" name="balas" class="form-control">
              </div>
              <button class="btn btn-theme" type="submit" name="simpan">Send</button>
              </form>
          </div>
          </aside>
        </div>
        <?php include 'headerfooter/bawah.php'?>