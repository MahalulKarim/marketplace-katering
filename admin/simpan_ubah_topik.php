<?php
include "koneksi.php";
if( isset($_POST['edit'])){
	$id_topik=$_POST['id_topik'];
	$pertanyaan=$_POST['pertanyaan'];
	$jawaban=$_POST['jawaban'];
		$query="UPDATE `topik_pertanyaan` SET pertanyaan='$pertanyaan',jawaban='$jawaban' WHERE id_topik='$id_topik'";
			$result=mysqli_query($db,$query);
			if($result){

				header('location:data_topik_penjual.php');
				}


}elseif( isset($_POST['tambah'])){
	$pertanyaan=$_POST['pertanyaan'];
	$jawaban=$_POST['jawaban'];
		$query="INSERT INTO `topik_pertanyaan` SET pertanyaan='$pertanyaan',jawaban='$jawaban'";
			$result=mysqli_query($db,$query);
			if($result){

				header('location:data_topik_penjual.php');
				}


}else{
	header('location:data_topik_penjual.php');
}



?>