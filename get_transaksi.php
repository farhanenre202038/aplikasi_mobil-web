<?php 
  require 'db/koneksi.php';
    session_start();

    $transaksi = mysqli_query($koneksi, "SELECT count(no_pengambilan) as no_pengambilan FROM tbl_transaksi");
    $kembali = array();

    $row = mysqli_fetch_assoc($transaksi);
       array_push($kembali, array('no_pengambilan'=> $row['no_pengambilan']));
    echo json_encode(array("kembali" => $kembali));
?>