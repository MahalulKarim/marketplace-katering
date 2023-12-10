<?php
//Include file koneksi ke database
include 'atas.php';?>
<div class="container pt-5">
	
</div>
<div class="container pt-5">
	
</div>
<?php 
//menerima nilai dari kiriman form 
if(isset($_POST['kirim'])){
	$chat=$_POST['pesan'];
	$tgl_jam=date('YmdHis');
	$id_user=$hasil['id_user'];
	

				$query="SELECT * FROM chatroom WHERE id_user='$id_user'";
				$result=mysqli_query($db,$query);
				$data = mysqli_fetch_array($result);
				if (mysqli_num_rows($result) < 1) {
							 $query1="INSERT INTO chatroom SET id_user='$id_user'";
							$result1=mysqli_query($db,$query1);
							if ($result1) {

									$query2="SELECT * FROM chatroom WHERE id_user='$id_user'";
									$result2=mysqli_query($db,$query2);
									$data2 = mysqli_fetch_array($result2);
									if (mysqli_num_rows($result2) < 1) {

										}else{
										$id_chat=$data2['id_chat'];

										$sql="insert into chat (id_chat,chat,tgl_jam,status) 
													values('$id_chat','$chat','$tgl_jam','0')";
										$has=mysqli_query($db,$sql);
										echo "<script type='text/javascript'>
                    	alert('Pesan Terkirim!');window.location='layanan_pelanggan.php'</script>
                    	";

					}
				}
			}else{


				$id_chat=$data['id_chat'];

				$sql="insert into chat (id_chat,chat,tgl_jam,status) 
							values('$id_chat','$chat','$tgl_jam','0')";
				$has=mysqli_query($db,$sql);
				echo "<script type='text/javascript'>
                    	alert('Pesan Terkirim!');window.location='layanan_pelanggan.php'</script>
                    	";
}

}elseif(isset($_POST['kirim2'])){
	$id_user=$hasil['id_user'];
	$pesan=$_POST['pesan'];
	$id_user2=$_POST['id_user2'];
	$id_menu=$_POST['id_menu'];

	$tgl_jam=date('YmdHis');

	$query="INSERT INTO chatroom SET id_user='$id_user', type='1'";
	$result=mysqli_query($db,$query);
	if ($result) {
		$query2="SELECT * FROM chatroom ORDER BY id_chat DESC LIMIT 1";
		$result2=mysqli_query($db,$query2);
		if ($result2) {
			$data=mysqli_fetch_array($result2);
			$id_chat=$data['id_chat'];
			$query3="INSERT INTO chat2 SET id_chat='$id_chat',id_user2='$id_user2',id_menu='$id_menu',pesan='$pesan',tgl_jam='$tgl_jam',status=0";
			$result3=mysqli_query($db,$query3);
			if ($result3) {
				echo "<script type='text/javascript'>
                    	alert('Pesan Terkirim!');window.location='javascript:history.go(-1)'</script>
                    	";
			}else{
				echo "gagal";
			}
		}
		
	}


}elseif (isset($_POST['kirim3'])) {
		$id_chat=$_POST['id_chat'];
		$pesan=$_POST['pesan'];
		echo $id_user2=$_POST['id_user2'];
		$id_menu=$_POST['id_menu'];
		$tgl_jam=date('YmdHis');
		if($id_user2==$hasil['id_user']){

			$status=1;
		}else{
			$status=0;
		}


		$query3="INSERT INTO chat2 SET id_chat='$id_chat',id_user2='$id_user2',id_menu='$id_menu',pesan='$pesan',tgl_jam='$tgl_jam',status=$status";
			$result3=mysqli_query($db,$query3);
			if ($result3) {
				echo "<script type='text/javascript'>
                    	alert('Pesan Terkirim!');window.location='chat.php'</script>
                    	";
			}else{
				echo "gagal";
			}
	
}elseif (isset($_POST['kirim4'])) {
		$id_chat=$_POST['id_chat'];
		$pesan=$_POST['pesan'];
		$id_user2=$hasil['id_user'];
		$id_menu=$_POST['id_menu'];
		$tgl_jam=date('YmdHis');


		$query3="INSERT INTO chat2 SET id_chat='$id_chat',id_user2='$id_user2',id_menu='$id_menu',pesan='$pesan',tgl_jam='$tgl_jam',status=1";
			$result3=mysqli_query($db,$query3);
			if ($result3) {
				echo "<script type='text/javascript'>
                    	alert('Pesan Terkirim!');window.location='chat.php'</script>
                    	";
			}else{
				echo "gagal";
			}
	
}elseif(isset($_POST['kirim5'])){
	$id_user=$_POST['id_user'];
	$pesan=$_POST['pesan'];
	$id_user2=$hasil['id_user'];
	$id_menu=$_POST['id_menu'];

	$tgl_jam=date('YmdHis');


	$query="INSERT INTO `chatroom`(`id_user`, `type`) VALUES ('$id_user','1')";
	$result=mysqli_query($db,$query);
	if ($result){
		$query2="SELECT * FROM chatroom ORDER BY id_chat DESC LIMIT 1";
		$result2=mysqli_query($db,$query2);
		if ($result2) {
			$data=mysqli_fetch_array($result2);
			$id_chat=$data['id_chat'];
			$query3="INSERT INTO chat2 SET id_chat='$id_chat',id_user2='$id_user2',id_menu='$id_menu',pesan='$pesan',tgl_jam='$tgl_jam',status=1";
			$result3=mysqli_query($db,$query3);
			if ($result3) {
				echo "<script type='text/javascript'>
                    	alert('Pesan Terkirim!');window.location='javascript:history.go(-1)'</script>
                    	";
			}else{
				echo "gagal";
			}
		}
		
	}else{
		echo "sd";
	}


}





?>