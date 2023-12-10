<?php
include "koneksi.php";


if(isset($_POST['simpan'])){
    $id_user=$_POST['id_user'];
				$kode  =trim($_POST['kode_bank']);
				$nama_bank  =trim($_POST['nama_bank']);
				$nama  =trim($_POST['nama']);
				$rek  =trim($_POST['no_rek']);

					if(empty($kode)||empty($nama_bank)||empty($nama)||empty($rek)){
						echo "<script type='text/javascript'>
					    alert('Data Tidak Boleh Kosong!');window.location='data_bank.php'</script>
					                    	";
					}else{


                $query="INSERT INTO `bank` SET id_user='$id_user',kode_bank='$kode',nama_bank='$nama_bank',nama='$nama',no_rek='$rek'";
				$result=mysqli_query($db,$query);
				if($query)
				{
				    echo '<script>alert("Data Bank Berhasil Ditambah!");window.location="data_bank.php"</script>';
				}
			}
                            
                           



                            


				

}elseif(isset($_POST['simpan_edit'])){

    $id_user=$_POST['id_user'];
			$id=$_POST['id'];
			$kode  =trim($_POST['kode_bank']);
			$nama_bank  =trim($_POST['nama_bank']);
			$nama  =trim($_POST['nama']);
			$rek  =trim($_POST['no_rek']);
			if(empty($kode)||empty($nama_bank)||empty($nama)||empty($rek)){
			echo "<script type='text/javascript'>
		    alert('Data Tidak Boleh Kosong!');window.location='data_bank.php'</script>";
			}else{
			$query="UPDATE `bank` SET id_user='$id_user',kode_bank='$kode',nama_bank='$nama_bank',nama='$nama',no_rek='$rek' WHERE id_bank='$id'";
			$result=mysqli_query($db,$query);
			if($query)
			{
			    header('location:data_bank.php');
			}
		}

}else{

}

?>