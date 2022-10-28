<?php
    session_start();
    include '../db/mobile_koneksi.php';
    session_destroy();
    header("location:../index.php");
?>