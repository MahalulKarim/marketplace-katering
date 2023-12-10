
		    					<?php 
		    					include 'koneksi.php';
		    					session_start();
								if ($_SESSION['status'] != "login") {
								    header("location:f_login.php?pesan=belumlogin");
								} 
		    					$username = $_SESSION['username'];
// cari user
								$kode = "SELECT * FROM user WHERE username='$username' ";
								$cari = mysqli_query($db, $kode);
								$hasil = mysqli_fetch_array($cari);
								if (mysqli_num_rows($cari) < 1) {
								}

		    					$iduser=$hasil['id_user'];
		    					$query3="SELECT * FROM chatroom ct, chat c WHERE c.id_chat=ct.id_chat AND ct.id_user='$iduser'";
							        $result3=mysqli_query($db,$query3);
							        
							        while ($data3=mysqli_fetch_array($result3))
							          {
							          	if($data3['status']=='0'){
							          	?>
							          	<div class="text-left">
							          		<div class="col-md-12 p-2">
							          			<div class="chat p-2 mr-5">
							          				<?php echo $data3['chat'];?>
							          				<p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
							          			</div>
							          			
							          		</div>
		    						
		    						</div>
		    					
		    					<?php 							          	
							          		
							          	}else{?>
							          	

							          			<div class="text-right">
							          				<div class="col-md-12 p-2">
							          					<div class="chat p-2 ml-5 borderless">
		    						<?php echo $data3['chat'];?>
		    					</div>
		    					</div>
		    					</div>
							          <?php	}
							          	
							          }
		    					?>