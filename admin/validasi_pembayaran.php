<?php
include "koneksi.php";
if(isset($_POST['validasi'])){
    
$id  =$_POST['id_pembayaran'];
$query="UPDATE `pembayaran` SET status='terbayar' WHERE id_pembayaran='$id'";
$result=mysqli_query($db,$query);
if($query)
		{
			header('location:data_pembayaran.php');
		}else{
    			die("Penyimpanan Gagal..");
				}
}elseif(isset($_POST['batal_validasi'])){    
		$id  =$_POST['id_pembayaran'];
		$query="UPDATE `pembayaran` SET status='belum terbayar' WHERE id_pembayaran='$id'";
		$result=mysqli_query($db,$query);
		if($query)
		{
			header('location:data_pembayaran.php');
		}else{
    			die("Penyimpanan Gagal..");
				}

}elseif (isset($_GET['id'])) {
	$id=$_GET['id'];
	$query="UPDATE `pembayaran` SET status='terbayar' WHERE id_pembayaran='$id'";
$result=mysqli_query($db,$query);
if($query)
		{
			 echo '<script>alert("Pembayaran Berhasil Di Validasi!");window.location="data_pembayaran_masuk.php"</script>';
		}else{
    			die("Penyimpanan Gagal..");
				}

}elseif (isset($_GET['id2'])) {
	echo $id=$_GET['id2'];
	$query1="SELECT bukti_bayar FROM pembayaran WHERE id_pembayaran='$id'";
	$result1=mysqli_query($db,$query1);
	$data1=mysqli_fetch_array($result1);
	$gambar=$data1['bukti_bayar'];
	$query="DELETE FROM `pembayaran` WHERE id_pembayaran='$id'";
	$result=mysqli_query($db,$query);
	if($query)
		{
			
				 unlink("../asset/user/gambar/user/bayar/".$gambar);
			 echo '<script>alert("Pembayaran Tidak Di Validasi dan di Hapus!");window.location="data_pembayaran_masuk.php"</script>';
		}else{
    			die("Gagal..");
				}

}

else{
	header('location:data_pembayaran.php');
}
?>