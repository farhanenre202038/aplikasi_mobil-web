<?php
    include '../db/koneksi.php';

   if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $admin = mysqli_query($koneksi,"SELECT * FROM tbl_login WHERE username='$username' and password='$password'");
        $cek = mysqli_num_rows($admin);
    

        if($cek > 0){
            session_start();
            $row = mysqli_fetch_assoc($admin);
            $_SESSION['username'];
            $_SESSION['nama_user'] = $row['nama_user'];
            $_SESSION['id'] = $row['id'];
            $query = mysqli_query($koneksi,"UPDATE tbl_login SET status_user='online'");
            $_SESSION['status_user'] = 'online';
           
            header("location:../dashboard.php?masuk");
        }else{
            header("location:../login-admin.php?gagal");
        }
   }
?>