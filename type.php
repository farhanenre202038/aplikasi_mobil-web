<?php
include "db/koneksi.php";
$merk = $_GET['merk'];

$type = mysqli_query($koneksi,"SELECT * FROM tbl_type WHERE kode_merk='$merk'");
echo'<option disabled selected>:: Pilih Type Mobil ::</option>';
while($opsi = mysqli_fetch_assoc($type)){
    echo '<option value="' . $opsi['id_type'] . '">' . $opsi['nama_type'] . '</option>';
}
?>