<?php
    include '../db/koneksi.php';
    $no_plat = $_GET['no_plat'];
    $no_pengambilan = $_GET['no_pengambilan'];

    $batal = mysqli_query($koneksi,"DELETE FROM tbl_transaksi WHERE no_pengambilan='$no_pengambilan'");
      
    $sqlmobil = "UPDATE tbl_mobil set status_rental='0' WHERE no_plat='" . $no_plat . "'";
    $updatemobil = mysqli_query($koneksi, $sqlmobil);

    if($batal){
        header("location: ../data_transaksi.php");
    }else{
        echo "ERROR";
    }
?>