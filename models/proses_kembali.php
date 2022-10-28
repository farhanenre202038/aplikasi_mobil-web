<?php
    include '../db/koneksi.php';

    if(isset($_POST['kembali_mobil'])){
        date_default_timezone_set("Asia/Makassar");
        $no_pengambilan = $_POST['no_pengambilan'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $no_plat = $_POST['no_plat'];
        $tanggalkembalireal = date('Y-m-d', strtotime($_POST['tanggalkembalireal']));
        $bayar_sewa = $_POST['bayar_sewa'];
        $biaya_sopir = $_POST['biaya_sopir'];
        $total_bayar = $_POST['total_bayar'];
        $lama_rental = $_POST['lama_rental'];

        $sqlpelanggan = "UPDATE tbl_pelanggan set status='3' WHERE id_pelanggan='" . $id_pelanggan . "'";
        $updatepelanggan = mysqli_query($koneksi, $sqlpelanggan);

        $sqlmobil = "UPDATE tbl_mobil set status_rental='3' WHERE no_plat='" . $no_plat . "'";
        $updatemobil = mysqli_query($koneksi, $sqlmobil);

        $kembali = mysqli_query($koneksi,"UPDATE tbl_transaksi SET biaya_sopir='$biaya_sopir',bayar_sewa='$bayar_sewa',total_bayar='$total_bayar',lama_rental='$lama_rental',tgl_pengembalian='$tanggalkembalireal' WHERE no_pengambilan='$no_pengambilan'");
     if($kembali){
            header("location: ../data_transaksi.php");
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        }
    }
?>