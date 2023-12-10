<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    
				$jenis  =trim($_POST['jenis']);
				if(empty($jenis)){
						echo "<script type='text/javascript'>
					    alert('Data Tidak Boleh Kosong!');window.location='data_jenis.php'</script>
					                    	";
					}else{




				$query1="SELECT * FROM jenis WHERE jenis='$jenis'";
				$result1 = mysqli_query($db, $query1);
                $data1 = mysqli_num_rows($result1);
                if($data1<1){
                             $query="INSERT INTO `jenis` SET jenis='$jenis'";
				$result=mysqli_query($db,$query);
				if($query)
				{
				    header('location:data_jenis.php');
				}
                            }
                            echo '<script>alert("Kategori Ini Sudah Ada!");window.location="data_jenis.php"</script>';

	}

                            


				

}elseif(isset($_POST['simpan_edit'])){

			$id=$_POST['id'];
			$jenis  =trim($_POST['jenis']);
				if(empty($jenis)){
						echo "<script type='text/javascript'>
					    alert('Data Tidak Boleh Kosong!');window.location='data_jenis.php'</script>
					                    	";
					}else{
			$query="UPDATE `jenis` SET jenis='$jenis' WHERE id_jenis='$id'";
			$result=mysqli_query($db,$query);
			if($query)
			{
			    header('location:data_jenis.php');
			}
		}

}else{

}

?>