<?php 
include "headerfooter/atas_cs.php";

?>

        <h3  style="font-family: Arial Black;" ><p class="fa fa-dashboard"></p> Dashboard</h3>
        <div class="pull-right">
       
        
        </div>
        <div class="pull-right">
          <div class="pt-3">
            
          </div>
        </div>
        
        <div  class="mt-5">
          <hr style="border: 1px solid #417e9d;width: 100%;">
          </div>
           <div class="row mt">
          <div class="col-lg-12">
          <h4>Selamat datang <?php echo $_SESSION['username'];?></h4>
          </div>
        </div>

           <div class="row mt">
            
            
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel grey-panel">
                 <div class="panel-body">
                  <h5>Respon Penjual</h5>
                  <?php
                    include "koneksi.php";
                    $query="SELECT p.* FROM pertanyaan p, user u WHERE p.id_user=u.id_user AND u.type_user='penjual'";
                    $result=mysqli_query($db,$query);
                    $respon_penjual = mysqli_num_rows($result);
                  ?>
                  <h3>
                    
                    <?php echo $respon_penjual;?>
                  </h3>
                  
                    
                  <p class="text center"> Respon </p>
                </div>
              </div>
            </div>

                 <div class="col-md-2 col-sm-2 mb">
              <div class="panel grey-panel">
                <div class="panel-body">
                  <h5>Respon Pembeli</h5>
                  <?php
                    $query="SELECT p.* FROM pertanyaan p, user u WHERE p.id_user=u.id_user AND u.type_user='pembeli'";
                    $result=mysqli_query($db,$query);
                    $respon_pembeli = mysqli_num_rows($result);
                  ?>
                  <h3>
                    <?php echo $respon_pembeli;?>
                  </h3>
                  
                  <p class="text center"> Respon </p>
                </div>
              </div>

            </div>
            <div class="col-md-2 col-sm-2 mb">
              <div class="panel grey-panel">
                <div class="panel-body">
                  <h5>Topik Pertanyaan Penjual</h5>
                   <?php
                    $query="SELECT * FROM `topik_pertanyaan`";
                    $result=mysqli_query($db,$query);
                    $topik_pertanyaan = mysqli_num_rows($result);
                  ?>
                  <h3>
                    <?php echo $topik_pertanyaan;?>

                  </h3>
                  <p class="text center"> Topik</p>
                </div>
              </div>
            </div>
              <div class="col-md-2 col-sm-2 mb">
              <div class="panel grey-panel">
                <div class="panel-body">
                  <h5>Topik Pertanyaan Pembeli</h5>
                   <?php
                    $query="SELECT * FROM `topik_pertanyaan`";
                    $result=mysqli_query($db,$query);
                    $topik_pertanyaan = mysqli_num_rows($result);
                  ?>
                  <h3>
                    <?php echo $topik_pertanyaan;?>

                  </h3>
                  <p class="text center"> Topik</p>
                </div>
              </div>
            </div>
           
           
            
             
            
              
          </div>
<?php include 'headerfooter/bawah.php'?>