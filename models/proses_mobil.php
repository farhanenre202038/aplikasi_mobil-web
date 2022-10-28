<?php
    include '../db/koneksi.php';

     if(isset($_POST['input_mobil'])){
        $no_plat        = $_POST['no_plat'];
        $nama_mobil     = $_POST['nama_mobil'];
        $kode_merk      = $_POST['kode_merk'];
        $id_type        = $_POST['id_type'];
        $tahun_beli     = $_POST['tahun_beli'];
        $jumlah_kursi   = $_POST['jumlah_kursi'];
        $status_rental  = "0";
        $harga_sewa     = $_POST['harga_sewa'];
        $foto_mobil     = $_FILES['foto_mobil']['name'];
        $source         = $_FILES['foto_mobil']['tmp_name'];
        $ukuran         = $_FILES['foto_mobil']['size'];
        $folder         ='../mobil/';

        if($ukuran > 1000000){
            echo'<script>document.location="../data_mobil.php?gambar";</script>';
        }else{
            move_uploaded_file($source, $folder . $foto_mobil);
        }

        $querymobil = mysqli_query($koneksi,"INSERT INTO tbl_mobil VALUES('$no_plat','$nama_mobil','$kode_merk','$id_type','$tahun_beli','$jumlah_kursi','$status_rental','$harga_sewa','$foto_mobil')");
        if ($querymobil) {
        echo"<script>alert('DATA BERHASIL DI INPUT');document.location='../data_mobil.php';</script>";
        }
     }

      if(isset($_POST['update_mobil'])){
        $no_plat        = $_POST['no_plat'];
        $nama_mobil     = $_POST['nama_mobil'];
        $kode_merk      = $_POST['kode_merk'];
        $id_type        = $_POST['id_type'];
        $tahun_beli     = $_POST['tahun_beli'];
        $jumlah_kursi   = $_POST['jumlah_kursi'];
        $status_rental  = "0";
        $harga_sewa     = $_POST['harga_sewa'];
        // $foto_mobil     = $_FILES['foto_mobil']['name'];
        // $source         = $_FILES['foto_mobil']['tmp_name'];
        // $ukuran         = $_FILES['foto_mobil']['size'];
        // $folder         ='../mobil/';
           if(isset($_POST['ubah_foto'])){
               $foto_mobil     = $_FILES['foto_mobil']['name'];
               $source         = $_FILES['foto_mobil']['tmp_name'];
               $folder         ='../mobil/';

               move_uploaded_file($source, $folder . $foto_mobil);

                $ubahmerk = mysqli_query($koneksi,"UPDATE tbl_mobil SET foto_mobil='$foto_mobil' WHERE no_plat='$no_plat'");
          }
        // if($ukuran > 1000000){
        //     echo'<script>document.location="../data_mobil.php?gambar";</script>';
        // }else{
        //     move_uploaded_file($source, $folder . $foto_mobil);
        // }

        $querymobil = mysqli_query($koneksi,"UPDATE tbl_mobil SET nama_mobil='$nama_mobil',kode_merk='$kode_merk',id_type='$id_type',tahun_beli='$tahun_beli',jumlah_kursi='$jumlah_kursi',status_rental='$status_rental',harga_sewa='$harga_sewa' WHERE no_plat='$no_plat'");
        if ($querymobil) {
        echo"<script>alert('DATA BERHASIL DI UBAH');document.location='../data_mobil.php';</script>";
        }
     }
?>