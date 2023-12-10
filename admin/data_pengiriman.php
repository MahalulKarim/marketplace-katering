<?php include 'headerfooter/atas.php'?>
       <h3><i class="fa fa-cubes"></i> Data Pengiriman</h3>
       <hr style="border: 1px solid #417e9d;">
       
          <!-- page end-->
          <table id="dt" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="10">No</th>
            <th>Id Pesan</th>
            <th>Alamat kirim</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
          include 'koneksi.php';
         $query="SELECT pe.*,p.id_pemesanan FROM pengiriman pe,pemesanan p WHERE pe.id_pemesanan=p.id_pemesanan";
                       $result=mysqli_query($db,$query);
                       $no=1;
        while ($data=mysqli_fetch_array($result))
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id_pemesanan']; ?></td>
              <td><?php echo $data['alamat_kirim']; ?></td>
              <td><?php echo $data['status']; ?></td>
              <td align="center">
                <div class="btn-group">
                   <a href="hapus.php?id_kirim=<?php echo $data['id_kirim']?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data pengiriman ini?') "><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php               
          } 
          ?>
        </tbody>
      </table> 

<?php include 'headerfooter/bawah.php'?>