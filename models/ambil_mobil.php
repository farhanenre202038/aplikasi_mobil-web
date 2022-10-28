<?php
    require '../db/koneksi.php';

   if(isset($_POST['ambil_mobil'])){
        $no_plat = $_POST['no_plat'];
        $no_pengambilan = $_POST['no_pengambilan'];

     $kode = mysqli_query($koneksi,"SELECT * FROM view_transaksi WHERE no_pengambilan='$no_pengambilan' and no_plat='$no_plat'");
     $cek = mysqli_num_rows($kode);

     if($cek > 0){
        $query = mysqli_query($koneksi,"UPDATE tbl_mobil SET status_rental='2' WHERE no_plat='$no_plat'");
        header("location:../data_transaksi.php?benar");
     }else{
        header("location:../data_transaksi.php?salah");
     }
   }
 
?>