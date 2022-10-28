<?php
    include '../db/koneksi.php';
    if(isset($_POST['kembali_mobil'])){
        $no_pengambilan = $_POST['no_pengambilan'];
        $no_plat        = $_POST['no_plat'];
        
        $data = mysqli_query($koneksi,"SELECT * FROM view_transaksi WHERE no_pengambilan='$no_pengambilan'");
        $row = mysqli_fetch_assoc($data);
        date_default_timezone_set("Asia/Makassar");
         $no_pengambilan1 = $row['no_pengambilan'];
         $no_plat1 = $row['no_plat'];  
         $id_pelanggan = $row['id_pelanggan'];
         $nama_pelanggan = $row['nama_pelanggan'];
         $nama_mobil = $row['nama_mobil'];
         $tgl_pengambilan = $row['tgl_pengambilan'];
         $tgl_pengembalian = $row['tgl_pengembalian'];
         $biaya_sopir = $row['biaya_sopir'];
         $bayar_sewa = $row['bayar_sewa'];
         $total_bayar = $row['total_bayar'];  
         $lama_rental = $row['lama_rental'];

         $history = mysqli_query($koneksi,"INSERT INTO tbl_history VALUES('','$no_pengambilan1','$id_pelanggan','$no_plat1','$nama_pelanggan','$nama_mobil','$tgl_pengambilan','$tgl_pengembalian','$biaya_sopir','$bayar_sewa','$total_bayar','$lama_rental')");

         $sqlmobil = "UPDATE tbl_mobil set status_rental='0' WHERE no_plat='" . $no_plat . "'";
         $updatemobil = mysqli_query($koneksi, $sqlmobil);

         $dltransaksi = mysqli_query($koneksi,"DELETE FROM tbl_transaksi WHERE no_pengambilan='$no_pengambilan'");
         
        if($history){
            header("location: ../data_transaksi.php");
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        }
    }
?>