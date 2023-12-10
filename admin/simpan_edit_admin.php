<?php
include "koneksi.php";
if(isset($_POST['simpan'])){
    
$id  =$_POST['id'];
$username=trim($_POST['username']);
$password=trim($_POST['password']);
if(empty($username)||empty($password)){
	echo "<script type='text/javascript'>
    alert('Operasi Gagal!  Username Atau Password Tidak Boleh Kosong!');window.location='form_update_admin.php'</script>
                    	";
}else{

$query="UPDATE `user` SET username='$username',password='$password' WHERE id_user='$id'";
		$result=mysqli_query($db,$query);
		if($query)
		{

		    header('location:logout.php?pesan=ubah');
		}

}
		

}
?>