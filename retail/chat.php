<?php include 'atas1.php';
?>
<div class="container pt-5 mb-5">
	</div>

<div class="container-fluid pt-5">
  <div class="row">
  	

    <div class="col-md-8 ml-5">
<h4 class="mb-4">Pesan</h4>
<table class="table">
<?php
	$id_user=$hasil['id_user'];	
	$query="SELECT c.*,p.id_menu,p.nama_menu,u.id_user,ch.id_user2 FROM chatroom c,menu p,chat2 ch,user u WHERE u.id_user=ch.id_user2 AND p.id_menu=ch.id_menu AND ch.id_chat=c.id_chat AND c.id_user='$id_user' GROUP BY c.id_chat";
	$result=mysqli_query($db,$query);
	if (mysqli_num_rows($result)<1) {

		$query="SELECT ch.*,p.id_menu,p.nama_menu,c.id_user2 FROM chatroom ch, menu p, chat2 c WHERE ch.id_chat=c.id_chat AND  p.id_menu=c.id_menu AND c.id_user2='$id_user'  GROUP BY ch.id_chat" ;
		$result=mysqli_query($db,$query);
	}
	while($data=mysqli_fetch_array($result)){
	

    


?>

	<tr>
		<td>
			

			<a href="#" class="btn btn-primary btn-sm ml-4"  data-target="#chat<?php echo $data['id_chat']?>" data-toggle="modal"><?php echo $data['nama_menu'];?> > </a>
		</td>
	</tr>
  	
  		
 

<div class="modal fade" id="chat<?php echo $data['id_chat']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">



				  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
				    <div class="modal-content">
				      <div class="modal-header" style="height: 60px;background-color: #a4d9ff">
				      	<?php
				      	 $id=$data['id_user'];
				      		$query7="SELECT * FROM user WHERE id_user='$id'";
				      		$result7=mysqli_query($db,$query7);
				      		if (mysqli_num_rows($result7)<1) {
				      			# code...
				      		}else{
				      			$data7=mysqli_fetch_array($result7);
				      		}
				      	?>
				      	  
				      	<p class="modal-title"><b><?php 
				      	if($data7['nama_katering']==''){
				      		 echo $data7['nama'];
				      	}else{
				      		echo $data7['nama_katering'];
				      	}?>
				      		

				      </b>
				      	</p>

				      	<button type="button" class="close btn-danger" data-dismiss="modal">X</button>
				      </div>
				      <div class="modal-body">
				      	   <div class="col">
		    				<div class="card-body">




		    					<?php 
		    					$id_user=$hasil['id_user'];

		    					$query5="SELECT * FROM chatroom WHERE id_user='$id_user'";
		    					$result5=mysqli_query($db,$query5);
		    					if(mysqli_num_rows($result5)<1){

		    						$idchat=$data['id_chat'];
		    					$query3="SELECT * FROM chat2 WHERE id_chat='$idchat'";
							        $result3=mysqli_query($db,$query3);
							        while ($data3=mysqli_fetch_array($result3))
							          {
							          	if($data3['status']=='1'){

							          	?>
							          	
							          	<div class="text-left">
							          		<div class="col-md-12 p-2">
							          			<div class="chat p-2 ml-5">
							          			
							          				<?php echo $data3['pesan'];?>

							          				<p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
							          			</div>
							          			
							          		</div>
		    						
		    						</div>
		    					
		    					<?php 							          	
							          		
							          	}else{?>
							          	

							          			<div class="text-left">
							          				<div class="col-md-12 p-2">
							          					<div class="chat2 p-2 mr-5 borderless">
		    						<?php echo $data3['pesan'];?>
		    						<p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
		    					</div>
		    					</div>
		    					</div>
							          <?php	}
							          	
							          }
							      
		    					// didini





		    					}else{





		    					$idchat=$data['id_chat'];
		    					$query3="SELECT * FROM chat2 WHERE id_chat='$idchat'";
							        $result3=mysqli_query($db,$query3);
							        while ($data3=mysqli_fetch_array($result3))
							          {
							          	if($data3['status']=='0'){

							          	?>
							          	
							          	<div class="text-right">
							          		<div class="col-md-12 p-2">
							          			<div class="chat p-2 ml-5">

							          				<?php echo $data3['pesan'];?>

							          				<p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
							          			</div>
							          			
							          		</div>
		    						
		    						</div>
		    					
		    					<?php 							          	
							          		
							          	}else{?>
							          	

							          			<div class="text-left">
							          				<div class="col-md-12 p-2">
							          					<div class="chat2 p-2 mr-5 borderless">
		    						<?php echo $data3['pesan'];?>
		    						<p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
		    					</div>
		    					</div>
		    					</div>
							          <?php	}
							          	
							          }
							      }
							      
		    					?>
		    				
		        			
		   					 </div>
		
						</div>
				      </div>

				      <div class="modal-footer">
				      	<div class="col-md-12 p-2">
				      		 <form method="POST" action="kirim_pesan.php">
				      		 	
                   				<input type="hidden" name="id_chat" value="<?php echo $data['id_chat']?>">
				      		 	<input type="hidden" name="id_user2" value="<?php echo $data['id_user2']?>">
				      		 	<input type="hidden" name="id_menu" value="<?php echo $data['id_menu']?>">
				      		<div class="form-group">
				      			
		        			  <textarea class="form-control form-control-sm"  id="username" name="pesan" placeholder="Ketikan pesan.." style="background: #DCDCDC;resize:none;height:70px;" required=""></textarea>
		      			</div>
				      	</div>
				      	 
		       
				      	  <button type="submit" class="btn btn-primary btn-sm" name="kirim3" >Kirim</button>
				      	 
                        

						      </form>
						      

											          	
											          	  <a href="h_pesan.php?id2=<?php echo $data['id_chat'];?>" class="btn btn-danger btn-sm" >Hapus Semua Pesan</a>
											   
								      	
				                     </div>
								      </div>
								  </div>
						  </div>



    </div>

  </div>



       <?php  } ?>
      

</table>


</div>






	
	
			
	




<script src="js2/jquery.js"></script>
<script src="js2/popper.js"></script>
<!-- 
   <script type="text/javascript">
        $(document).ready(function(){

         $('#tampil').load("tampil.php");

            $("#Submit").click(function(){
                var data = $('#form').serialize();
                $.ajax({
                    type	: 'POST',
                    url	: "insert.php",
                    data: data,

                    cache	: false,
                    success	: function(data){
                        $('#tampil').load("tampil.php");
                    }
                });
            });
        });
    </script> -->
  
</body>
</html>