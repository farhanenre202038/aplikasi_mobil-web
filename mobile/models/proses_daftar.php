<?php
    include '../db/mobile_koneksi.php';

    if(isset($_POST['input_pelanggan'])){
        $id_pelanggan       = $_POST['id_pelanggan'];
        $nama_pelanggan     = $_POST['nama_pelanggan'];
        $username           = $_POST['username'];
        $email              = $_POST['email'];
        $password           = md5($_POST['password']);
        $alamat             = $_POST['alamat'];
        $telpon             = $_POST['telpon'];
        $status             = '0'; 

        $pelanggan = mysqli_query($koneksi,"INSERT INTO tbl_pelanggan VALUES('$id_pelanggan','$nama_pelanggan','$username','$email','$password','$alamat','$telpon','$status')");
        if ($pelanggan) {
        header("location:../index.php");
        }
    }

?>