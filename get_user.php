<?php 
  require 'db/koneksi.php';
    session_start();

    $transaksi = mysqli_query($koneksi, "SELECT count(id_pelanggan) as id_pelanggan FROM tbl_pelanggan");
    $user = array();

    $row = mysqli_fetch_assoc($transaksi);
       array_push($user, array('id_pelanggan'=> $row['id_pelanggan']));
    echo json_encode(array("user" => $user));
?>