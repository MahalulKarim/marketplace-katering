<?php
//Include file koneksi ke database
include 'headerfooter/atas.php';
include 'koneksi.php';
//menerima nilai dari kiriman form 
if(isset($_POST['kirim'])){
	$chat=$_POST['pesan'];
	$tgl_jam=date('YmdHis');
	$id_chat=$_POST['id_chat'];

							 $query="INSERT INTO chat SET id_chat='$id_chat', chat='$chat', tgl_jam='$tgl_jam', status='1'";
							$result=mysqli_query($db,$query);
							if ($result) {
										echo "<script type='text/javascript'>
                    					alert('Pesan Terkirim!');window.location='data_pesan.php'</script>";

					
				
									}else{

										echo "<script type='text/javascript'>
						                    	alert('Pesan Tidak Terkirim!');window.location='data_pesan.php'</script>";
											}

}





?>