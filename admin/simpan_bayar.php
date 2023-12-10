<?php
include "koneksi.php";


if(isset($_POST['bayar'])){

    $id_bayar=$_POST['id_bayar'];
    $id_pemesanan=$_POST['id_pemesanan'];
	$total  =$_POST['total'];
	$tgl_bayar=$_POST['tgl_bayar'];
    $query="INSERT INTO `bayar` SET id_bayar='$id_bayar',id_pemesanan='$id_pemesanan',tgl_bayar='$tgl_bayar',total='$total',status='pending'";
	$result=mysqli_query($db,$query);
		if($query)
			{
				$query2="UPDATE pembayaran SET status='komplit' WHERE id_pemesanan='$id_pemesanan'";
				$result2=mysqli_query($db,$query2);
				if ($result2) {
					 echo '<script>alert("Pembayaran Berhasil!");window.location="data_pembayaran.php"</script>';
				}
		   
		}
                            
                           



                            


				

}

?>