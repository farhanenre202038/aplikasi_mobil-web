<?php
    include '../db/koneksi.php';

    if(isset($_GET['hapus_mobil'])){
        $no_plat = $_GET['no_plat'];
        
        $hapus = mysqli_query($koneksi,"DELETE FROM tbl_mobil WHERE no_plat='$no_plat'");
        
        if($hapus){
            header("location: ../data_mobil.php");
        }else{
            echo "ERROR";
        }
    }

     if(isset($_GET['hapus_user'])){
        $id_pelanggan = $_GET['id_pelanggan'];
        
        $hapus = mysqli_query($koneksi,"DELETE FROM tbl_pelanggan WHERE id_pelanggan='$id_pelanggan'");
        
        if($hapus){
            header("location: ../data_pelanggan.php");
        }else{
            echo "ERROR";
        }
    }
?>