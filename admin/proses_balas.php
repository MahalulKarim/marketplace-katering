<?php

include "koneksi.php";
if(isset($_POST['simpan'])){
    
$id_user=$_POST['id_user'];
$balas=$_POST['balas'];
date_default_timezone_set('Asia/Jakarta');
  $tanggal=date("Y/m/d H:i:s");
$query="INSERT INTO `balaslapor` SET id_user='$id_user',tanggal='$tanggal',isi='$balas'";
$result=mysqli_query($db,$query);
if($query)
{
    header('location:detail_lapor.php?id=<?php echo $id_user; ?>');
}
}
