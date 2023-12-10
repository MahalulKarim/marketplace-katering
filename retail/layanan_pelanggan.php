<?php include 'atas1.php';
?>
<div class="container pt-5 mb-5">
	</div>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-8">
<h2>Hallo apa yang bisa kami bantu?</h2>
  	<p></p>
<div class="btn-group-vertical">
     
       <a href="#" class="btn btn-outline-primary"  data-target="#chat" data-toggle="modal">Chat Dengan Kami?</a>

</div>
<div class="modal fade" id="chat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">


				  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
				    <div class="modal-content">
				      <div class="modal-header bg-warning" style="height: 60px">
				      	   <p>Admin</p>
				      	<p class="modal-title"></p>

				      	<button type="button" class="close btn-danger" data-dismiss="modal">X</button>
				      </div>
				      <div class="modal-body">
				      	   <div class="col">
		    				<div class="card-body">
		    					<?php 
		    					

		    					$iduser=$hasil['id_user'];
		    					$query3="SELECT ct.id_chat, c.* FROM chatroom ct, chat c WHERE c.id_chat=ct.id_chat AND ct.id_user='$iduser'";
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
		    						<p style="font-size: 9px;padding-top:4px;"><?php echo $data3['tgl_jam'];?></p>
		    					</div>
		    					</div>
		    					</div>
							          <?php	}
							          	
							          }
		    					?>
		    				
		        			
		   					 </div>
		
						</div>
				      </div>

				      <div class="modal-footer">
				      	<div class="col-md-12 p-2">
				      		 <form method="POST" action="kirim_pesan.php">
				      		<div class="form-group">
				      			
		        			  <textarea class="form-control form-control-sm"  id="username" name="pesan" placeholder="Ketikan pesan.." style="background: #DCDCDC;resize:none;height:70px;" required=""></textarea>
		      			</div>
				      	</div>
				      	 
		       
				      	  <button type="submit" class="btn btn-primary btn-sm" name="kirim" >Kirim</button>
				      	 
                        

						      </form>
						       <?php $iduser=$hasil['id_user'];
						    					$query4="SELECT * FROM chatroom WHERE id_user='$iduser'";
											        $result4=mysqli_query($db,$query4);
													$data4= mysqli_fetch_array($result4);
											          if (mysqli_num_rows($result4) < 1) {
											          }else{?>

											          	
											          	  <a href="h_pesan.php?id=<?php echo $data4['id_chat'];?>" class="btn btn-danger btn-sm" >Hapus Semua Pesan</a>
											       <?php   }
											 ?>
								      	
				                     </div>
								      </div>
								  </div>
						  </div>



    </div>

  </div>
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