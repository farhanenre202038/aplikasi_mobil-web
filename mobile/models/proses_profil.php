<?php
    include '../db/mobile_koneksi.php';
    if(isset($_POST['ubah_profil'])){
        $id_pelanggan       = $_POST['id_pelanggan'];
        $nama_pelanggan     = $_POST['nama_pelanggan'];
        $email              = $_POST['email'];
        $telpon             = $_POST['telpon'];
        $alamat             = $_POST['alamat'];

        $ubahprofil = mysqli_query($koneksi,"UPDATE tbl_pelanggan SET nama_pelanggan='$nama_pelanggan',email='$email',telpon='$telpon',alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'");
        header("location:../profil.php");
    }
?>