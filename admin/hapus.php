<?php
include "koneksi.php";
// hapus menu
 if(isset($_GET['id_menu'])){
          $id_menu=$_GET['id_menu'];
           $query1="SELECT * FROM menu WHERE id_menu='$id_menu'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['gambar'];
           $sqldel="DELETE FROM menu WHERE id_menu='$id_menu'";
          		$querydel=mysqli_query($db,$sqldel);
          		if($querydel){              
                unlink("../asset/user/gambar/toko/menu/".$namagambar);
          			header('location:produk.php');	
          		}else{
          		header('location:produk.php');	
          		}

}elseif(isset($_GET['id_menu2'])){
          $id_menu=$_GET['id_menu2'];
           $query1="SELECT m.*,u.id_user FROM menu m, user u WHERE u.id_user=m.id_user AND m.id_menu='$id_menu'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['gambar'];
           $user=$data1['id_user'];
           $sqldel="DELETE FROM menu WHERE id_menu='$id_menu'";
           $querydel=mysqli_query($db,$sqldel);
           if($querydel){

           unlink("../asset/user/gambar/toko/menu/".$namagambar);
           header('location:profil_toko.php?id='.$user);  
           }else{
          header('location:profil_toko.php?id='.$user);
           }
          		



}elseif (isset($_GET['id_menu3'])) {
     $id_menu=$_GET['id_menu3'];
           $query1="SELECT m.*,u.id_user FROM menu m, user u WHERE u.id_user=m.id_user AND m.id_menu='$id_menu'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['gambar'];
           $user=$data1['id_user'];
           $sqldel="DELETE FROM menu WHERE id_menu='$id_menu'";
           $querydel=mysqli_query($db,$sqldel);
           if($querydel){

           unlink("../asset/user/gambar/toko/menu/".$namagambar);
           header('location:profil_toko_baned.php?id='.$user);  
           }else{
          header('location:profil_toko_baned.php?id='.$user);
           }
 
// hapus penjual  
}elseif(isset($_GET['id_user'])){
          $id_user=$_GET['id_user'];
           $query1="SELECT * FROM user WHERE id_user='$id_user'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['foto'];
           unlink("../asset/user/gambar/user/foto/".$namagambar);
           $sqldel="DELETE FROM user WHERE id_user='$id_user'";
          		$querydel=mysqli_query($db,$sqldel);
          		if($querydel){
          			header('location:data_toko.php');	
          		}else{
          		header('location:data_toko.php');	
          		}
// hapus pembeli
}elseif(isset($_GET['id_user1'])){
          $id_user=$_GET['id_user1'];
           $query1="SELECT * FROM user WHERE id_user='$id_user'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['foto'];
           unlink("../asset/user/gambar/user/foto/".$namagambar);
           $sqldel="DELETE FROM user WHERE id_user='$id_user'";
          		$querydel=mysqli_query($db,$sqldel);
          		if($querydel){
          			header('location:data_pembeli.php');	
          		}else{
          		header('location:data_pembeli.php');	
          		}
// hapus komplain
}elseif(isset($_GET['id_komplain'])){
          $id_komplain=$_GET['id_komplain'];
           $query1="SELECT * FROM komplain WHERE id_komplain='$id_komplain'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['foto'];
           unlink("../asset/user/gambar/komplain/".$namagambar);
           $sqldel="DELETE FROM komplain WHERE id_komplain='$id_komplain'";
          		$querydel=mysqli_query($db,$sqldel);
          		if($querydel){
          			header('location:laporan.php');	
          		}else{
          		header('location:laporan.php');	
          		}
// hapus jenis
}elseif(isset($_GET['id_jenis'])){
          $id_jenis=$_GET['id_jenis'];
           $sqldel="DELETE FROM jenis WHERE id_jenis='$id_jenis'";
              $querydel=mysqli_query($db,$sqldel);
              if($querydel){
                header('location:data_jenis.php'); 
              }else{
              header('location:data_jenis.php'); 
              }
}elseif(isset($_GET['id_kirim'])){
            $id_kirim=$_GET['id_kirim'];
            $query1="SELECT * FROM pengiriman WHERE id_kirim='$id_kirim' AND status='belum terkirim'";
            $result1=mysqli_query($db,$query1);
            $data1 = mysqli_num_rows($result1);
                 if($data1<1)
                  {
                    $sqldel="DELETE FROM pengiriman WHERE id_kirim='$id_kirim'";
                    $querydel=mysqli_query($db,$sqldel);
                    if($querydel){
                      header('location:data_pengiriman.php'); 
                      }else{
                      header('location:data_pengiriman.php'); 
                      }
                        }
                         echo '<script>alert("Pesanan Ini Belum Terkrim!");window.location="data_pengiriman.php"</script>';
//hapus data pembayaran
}elseif(isset($_GET['id_pembayaran'])){
            $id_bayar=$_GET['id_pembayaran'];
            $query1="SELECT * FROM pembayaran WHERE id_pembayaran='$id_bayar' AND status='belum terbayar'";
            $result1=mysqli_query($db,$query1);
            $data1 = mysqli_num_rows($result1);
                 if($data1<1)
                  {
                    $sqldel="DELETE FROM pembayaran WHERE id_pembayaran='$id_bayar'";
                    $querydel=mysqli_query($db,$sqldel);
                    if($querydel){
                      header('location:data_pembayaran.php'); 
                      }else{
                      header('location:data_pembayaran.php'); 
                      }
                        }
                         echo '<script>alert("Pembayaran Ini Belum Tervalidasi!");window.location="data_pembayaran.php"</script>';
//hapus pesan
}elseif(isset($_GET['id_chat'])){
             $id_chat = $_GET['id_chat'];


            $query1 = "DELETE FROM `chat` WHERE id_chat='$id_chat'";
            $result1 = mysqli_query($db, $query1);
                            if ($result1) {
                                 
                                            $query3 = "DELETE FROM `chatroom` WHERE id_chat='$id_chat'";
                                        $result3 = mysqli_query($db, $query3); 
                                        if($result3){
                                            echo "<script type='text/javascript'>
                                            alert('Pesan Berhasil dihapus!');window.location='data_pesan.php'</script>
                                            ";

                                     } else {
                                        
                                      
                                              echo "<script type='text/javascript'>
                                            alert('Pesan');window.location='data_pesan.php'</script>
                                            ";
                                           }
                                        } 

}elseif(isset($_GET['id_bank'])){
          $id_bank=$_GET['id_bank'];
           $sqldel="DELETE FROM bank WHERE id_bank='$id_bank'";
              $querydel=mysqli_query($db,$sqldel);
              if($querydel){
                header('location:data_bank.php'); 
              }else{
              header('location:data_bank.php'); 
              }

}else{


}


?>