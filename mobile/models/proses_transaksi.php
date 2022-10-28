<?php
    include '../db/mobile_koneksi.php';
     if(isset($_POST['buat_transaksi'])){
        date_default_timezone_set("Asia/Makassar");
        $no_pengambilan = $_POST['no_pengambilan'];
        $no_plat = $_POST['no_plat'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $tgl_pengambilan = $_POST['tanggal_pengambilan'];
        $dataTime = new DateTime($tgl_pengambilan);
        $tanggal_pengambilan = $dataTime ->format('Y-m-d');
        $tanggal_pengembalian = date('Y-m-d', strtotime( $_POST['tanggal_pengembalian']));
        $lama_rental = $_POST['lama_rental'];
        if(isset($_POST['biaya_sopir'])){
            $biaya_sopir = '20000';
        }

        $sqlpelanggan = "UPDATE tbl_pelanggan set status='1' WHERE id_pelanggan='" . $id_pelanggan . "'";
        $updatepelanggan = mysqli_query($koneksi, $sqlpelanggan);

        $sqlmobil = "UPDATE tbl_mobil set status_rental='1' WHERE no_plat='" . $no_plat . "'";
        $updatemobil = mysqli_query($koneksi, $sqlmobil);

        $transaksi = mysqli_query($koneksi,"INSERT INTO tbl_transaksi VALUES('$no_pengambilan','$no_plat','$id_pelanggan','$tanggal_pengambilan','$tanggal_pengembalian','$lama_rental','$biaya_sopir','0','0')");
        if($transaksi){
            header("location: ../data_mobil.php");
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        }
     }


?>