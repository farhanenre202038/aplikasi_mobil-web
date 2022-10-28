<?php
    include '../db/mobile_koneksi.php';

   if(isset($_POST['login_mobile'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $user = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE username='$username' and password='$password'");
        $cek = mysqli_num_rows($user);
    

        if($cek > 0){
            session_start();
            $row = mysqli_fetch_assoc($user);
            $_SESSION['username'];
            $_SESSION['nama_user'] = $row['nama_pelanggan'];
            $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['status'] = $row['status'];
            header("location:../data_mobil.php");
        }else{
            header("location:../login_mobile.php?salah");
        }
   }
?>