<?php
    include '../db/koneksi.php';
    // Input Data Merk & Type
    if(isset($_POST['input_merk'])){
        $kode_merk = $_POST['kode_merk'];
        $nama_merk = $_POST['nama_merk'];
        // query input
        $querymerk = mysqli_query($koneksi,"INSERT INTO tbl_merk VALUES('$kode_merk','$nama_merk')");
        if ($querymerk) {
        echo"<script>alert('DATA BERHASIL DI INPUT');document.location='../merk_type.php';</script>";
        }
    }

    if(isset($_POST['input_type'])){
        $id_type = $_POST['id_type'];
        $nama_type = $_POST['nama_type'];
        $kode_merk = $_POST['kode_merk'];
        // query input
        $querytype = mysqli_query($koneksi,"INSERT INTO tbl_type VALUES('$id_type','$nama_type','$kode_merk')");
        if ($querytype) {
        echo"<script>alert('DATA BERHASIL DI INPUT');document.location='../merk_type.php';</script>";
        }
    }
    // Input Data Merk & Type
    // Ubah Data Merk & Type
    if(isset($_POST['update_merk'])){
        $kode_merk = $_POST['kode_merk'];
        $nama_merk = $_POST['nama_merk'];
        // query input
        $ubahmerk = mysqli_query($koneksi,"UPDATE tbl_merk SET nama_merk='$nama_merk' WHERE kode_merk='$kode_merk'");
        if ($ubahmerk) {
        echo"<script>alert('DATA BERHASIL DI UBAH');document.location='../merk_type.php';</script>";
        }
    }
     if(isset($_POST['update_type'])){
        $id_type = $_POST['id_type'];
        $nama_type = $_POST['nama_type'];
        // query input
        $ubahtype = mysqli_query($koneksi,"UPDATE tbl_type SET nama_type='$nama_type' WHERE id_type='$id_type'");
        if ($ubahtype) {
        echo"<script>alert('DATA BERHASIL DI UBAH');document.location='../merk_type.php';</script>";
        }
    }
?>