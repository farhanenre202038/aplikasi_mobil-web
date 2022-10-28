<?php
    require 'db/mobile_koneksi.php';
    session_start();

    $sql = mysqli_query($koneksi, "SELECT * FROM view_mobil WHERE status_rental='0'");
    $back = array();

    while ($row = mysqli_fetch_array($sql)) {
       array_push($back, array('no_plat'=> $row[0], 'nama_mobil'=> $row[1], 'tahun_beli'=> $row[2], 'jumlah_kursi'=> $row[3], 'status_rental'=> $row[4], 'harga_sewa'=> $row[5], 'foto_mobil'=> $row[6], 'nama_merk'=> $row[9], 'nama_type'=> $row[10]));
    }
    echo json_encode(array("back" => $back));
?>