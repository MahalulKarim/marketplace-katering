<?php
include "../koneksi.php";
// hapus menu
 if(isset($_GET['id'])){
          $id_menu=$_GET['id'];
           $query1="SELECT * FROM menu WHERE id_menu='$id_menu'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['gambar'];
           $sqldel="DELETE FROM menu WHERE id_menu='$id_menu'";
          		$querydel=mysqli_query($db,$sqldel);
          		if($querydel){              
                unlink("../asset/user/gambar/toko/menu/".$namagambar);
                $query="DELETE FROM varian WHERE id_menu='$id_menu'";
                $result=mysqli_query($db,$query);

                $query2="SELECT gambar FROM gambar WHERE id_menu='$id_menu'";
                $result2=mysqli_query($db,$query2);
                if (mysqli_num_rows($result2)<0) {
                  # code...
                }else{
                  $data2=mysqli_fetch_array($result2);
                  echo $namagambar2=$data2['gambar'];
                  $query3="DELETE FROM gambar WHERE id_menu='$id_menu'";
                  $result3=mysqli_query($db,$query3);
                  if ($result3) {
                    
                    unlink("../asset/user/gambar/toko/menu/".$namagambar2);
                    header('location:d_menu_saya.php'); 
                  }
                  
                }
                
          			
                header('location:d_menu_saya.php');	
          		}else{
          		header('location:d_menu_saya.php');	
          		}
//hapus Bank
}elseif(isset($_GET['id_bank'])){
          $id_bank=$_GET['id_bank'];
           $sqldel="DELETE FROM bank WHERE id_bank='$id_bank'";
           $querydel=mysqli_query($db,$sqldel);
              if($querydel){              
               
                header('location:d_rekening_saya.php'); 
              }else{
              header('location:d_rekening_saya.php'); 
              }

}
// hapus gambar menu
 elseif(isset($_GET['id_gambar'])){
          $id_gambar=$_GET['id_gambar'];
           $query1="SELECT gambar FROM gambar WHERE id_gambar='$id_gambar'";
           $result1=mysqli_query($db,$query1);
           $data1=mysqli_fetch_assoc($result1);
           $namagambar=$data1['gambar'];
           $sqldel="DELETE FROM gambar WHERE id_gambar='$id_gambar'";
              $querydel=mysqli_query($db,$sqldel);
              if($querydel){              
                unlink("../asset/user/gambar/toko/menu/".$namagambar);
                
                header('location:d_menu_saya.php'); 
              }else{
              header('location:d_menu_saya.php'); 
              }

}
// hapus varian
 elseif(isset($_GET['varian'])){
          $id_varian=$_GET['varian'];
           $sqldel="DELETE FROM varian WHERE id_varian='$id_varian'";
              $querydel=mysqli_query($db,$sqldel);
              if($querydel){              
               
                header('location:d_menu_saya.php'); 
              }else{
              header('location:d_menu_saya.php'); 
              }

}
else{
    echo "<script type='text/javascript'>
            alert('Gagal!');window.location='akun_saya.php'
            </script>";
}





?>