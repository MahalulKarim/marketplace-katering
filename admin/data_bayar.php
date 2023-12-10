<?php include 'headerfooter/atas.php' ?>
<h3><i class="fa fa-money"></i> Pembayaran Minggu Ini</h3>
<hr style="border: 1px solid #417e9d;">
<?php
include 'koneksi.php';
$query1 ="SELECT max(id_bayar) as idTerbesar FROM bayar";
$result1 = mysqli_query($db,$query1);
$data1 = mysqli_fetch_array($result1);
$id_bayar = $data1['idTerbesar'];

$tambah = $id_bayar+1;
if(isset($_GET['id_user'])){
  $id=$_GET['id_user'];
  $query2 ="SELECT  max(tgl_bayar) as terakhir FROM bayar WHERE id_user='$id'";
  $result2 = mysqli_query($db,$query2);  
  $data2 = mysqli_fetch_array($result2);
  $dari= $data2['terakhir']; 
  if($dari==''){
          $query3 = "SELECT min(tgl_pemesanan) as min FROM pemesanan p, menu m, user u WHERE p.id_menu=m.id_menu AND m.id_user=u.id_user AND p.status='terkirim' AND u.id_user='$id' ";
          $result3 = mysqli_query($db, $query3);
          $data3 = mysqli_fetch_array($result3); 
          $dari=$data3['min'];

  }
  $hariini=date('Y-m-d');
    
    }
    $query = "SELECT p.*,sum(p.total_bayar) as total FROM pemesanan p, menu m, user u WHERE p.id_menu=m.id_menu AND m.id_user=u.id_user AND u.id_user='$id' AND p.status='terkirim' AND tgl_pemesanan BETWEEN '$dari' and '$hariini'";
    $result = mysqli_query($db, $query);
    $no = 1;
    $data = mysqli_fetch_array($result); 
    $total=$data['total'];
    if($total==''){
       echo '<script>alert("Akun ini belum mempunyai pesanan terkirim!");window.location="data_bank.php"</script>';
    }
   

?>


     <form class="form-horizontal style-form" role="form" method="POST" action="simpan_bayar.php">
       <input type="hidden" name="id_user" value="<?php echo $id?>">
       <input type="hidden" name="tgl_bayar" value="<?php echo $hariini?>">

        <div class='row'>
            <div class='col-md-2'>
            </div>

            <div class='col-md-4'>
              <label >id Bayar</label>
              <input class="form-control" type="text" value="<?php echo $tambah; ?>" name="id_bayar" readonly>
            </div>
            <div class='col-md-4'>
              <label >Dari Tanggal</label>
              <input class="form-control" type="text" value="<?php echo $dari; ?>" name="dari_tgl" readonly>
            </div>
        </div>
        <br>
        <div class='row '>
            <div class='col-md-2'>
            </div>

            <div class='col-md-4'>
              <label >Sampai Tanggal</label>
              <input class="form-control" type="text" value="<?php echo $hariini; ?>" name="sampai_tgl" readonly>
            </div>
            <div class='col-md-4'>
               <label >Total</label>              
                  <input class="form-control" type="text" value="<?php echo $total; ?>" name="total" readonly required>
            </div>
        </div>
        <br>
         <div class='row '>
            <div class='col-md-2'>
            </div>
            <div class='col-md-4'>
                <input type="submit" class="btn btn-info btn-sm" value="Bayar" name="bayar">
              </div>

     </form>

  


          


<?php include 'headerfooter/bawah.php' ?>