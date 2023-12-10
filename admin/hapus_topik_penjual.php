<?php
include "koneksi.php";
if( isset($_GET['id'])){
	$id=$_GET['id'];
		$query="DELETE FROM `topik_pertanyaan` WHERE id_topik='$id'";
			$result=mysqli_query($db,$query);
			if($result){

				header('location:data_topik_penjual.php');
				}


}



?>