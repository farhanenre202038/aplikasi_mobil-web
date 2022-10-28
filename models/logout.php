<?php
    session_start();
    include '../db/koneksi.php';
    $query = mysqli_query($koneksi,"UPDATE tbl_login SET status_user='offline'");
    session_destroy();
    header("location:../login-admin.php");
?>