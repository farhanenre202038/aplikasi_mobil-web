<?php
    require 'db/koneksi.php';
    session_start();

    $sql = mysqli_query($koneksi, "SELECT count(status_rental) as status_rental FROM tbl_mobil WHERE status_rental='0'");
    $back = array();

    $data = mysqli_fetch_assoc($sql);
       array_push($back, array('status_rental'=> $data['status_rental']));
    echo json_encode(array("back" => $back));
?>