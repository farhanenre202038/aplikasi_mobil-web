<?php
    include '../db/koneksi.php';
        date_default_timezone_set("Asia/Makassar");
        if(isset($_POST['upload_iklan'])){
        $nama_iklan     = $_POST['nama_iklan'];
        $tanggal        = date('Y-m-d');
        $active         = $_POST['active'];
        $link           = $_POST['link'];
        $iklan          = $_FILES['iklan']['name'];
        $source         = $_FILES['iklan']['tmp_name'];
        $ukuran         = $_FILES['iklan']['size'];
        $folder         ='../iklan/';

        if($ukuran > 1000000){
            echo'<script>document.location="../iklan.php?gambar";</script>';
        }else{
            move_uploaded_file($source, $folder . $iklan);
        }

        $iklanku = mysqli_query($koneksi,"INSERT INTO tbl_iklan VALUES('','$nama_iklan','$tanggal','$iklan','$active','$link')");
        if ($iklanku) {
        echo"<script>alert('IKLAN BERHASIL DI UPLOAD');document.location='../iklan.php';</script>";
        }
     }

     
     if(isset($_POST['hapus_iklan'])){
        $kode_iklan = $_POST['kode_iklan'];

         $query = mysqli_query($koneksi,"SELECT * FROM tbl_iklan WHERE kode_iklan='$kode_iklan'");
         $data  = mysqli_fetch_array($query);
         $namafile = $data['iklan'];

        $hapusiklan = mysqli_query($koneksi,"DELETE FROM tbl_iklan WHERE kode_iklan='$kode_iklan'");
        unlink('../iklan/'.$namafile);
        
        if ($hapusiklan) {
        echo"<script>alert('IKLAN SUDAH DIHAPUS');document.location='../iklan.php';</script>";
        }
     }

?>