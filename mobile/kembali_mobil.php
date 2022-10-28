<?php
    require 'template/header.php';
    require 'template/navbar.php';
    include 'db/mobile_koneksi.php';
    $no_pengambilan = $_GET['no_pengambilan'];
    $kembali = mysqli_query($koneksi,"SELECT * FROM view_transaksi WHERE no_pengambilan='$no_pengambilan'");
    $row = mysqli_fetch_assoc($kembali);
?>

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h3><?= $row['no_pengambilan']; ?> - <?= $row['nama_mobil']; ?></h3> 
                <div class="alert alert-primary" role="alert">
                    <i><small class="text-muted text-right">Tanggal Pengambilan : <?= $row['tgl_pengambilan']; ?></small></i>
                    <br>
                    <i><small class="text-muted text-right">Harga Rental Mobil : Rp.<?= number_format($row['harga_sewa']); ?>/Hari</small></i>
                     <br>
                    <i><small class="text-muted text-right">Harga Sewa Sopir : Rp.<?= number_format($row['biaya_sopir']); ?>/Hari</small></i>
                </div>
                <form action="models/proses_kembali.php" method="POST">
                    <input type="hidden" name="tgl_ambil" class="form-control" value="<?= $row['tgl_pengambilan'];?>" readonly id="tanggalAmbil">
                    <input type="hidden" name="biaya_sopir" class="form-control" value="<?= $row['biaya_sopir'];?>" readonly id="biayasopir">
                    <input type="hidden" name="harga_sewa" class="form-control" value="<?= $row['harga_sewa'];?>" readonly id="biayamobil">
                    <input type="hidden" name="no_plat" class="form-control" value="<?= $row['no_plat'];?>" readonly>
                    <input type="hidden" name="id_pelanggan" class="form-control" value="<?= $row['id_pelanggan'];?>" readonly>
                    <input type="hidden" name="no_pengambilan" class="form-control" value="<?= $row['no_pengambilan'];?>" readonly>
                    <small>Tanggal Pengembalian Fix :</small>
                    <input type="date" name="tanggalkembalireal" class="form-control" id="tanggalreal" onchange="HitungInterval()">
                    <small>Lama Rental :</small>
                    <input type="text" name="lama_rental" class="form-control" readonly id="lama" onclick="HitungTotal()">
                    <small>Total Biaya Sewa Mobil :</small>
                    <input type="text" name="bayar_sewa" class="form-control" readonly id="biayasewa">
                    <small>Total Biaya Sewa Sopir :</small>
                    <input type="text" name="biaya_sopir" class="form-control" readonly id="totalbiayasopir">
                    <small>Total Biaya :</small>
                    <input type="text" name="total_bayar" class="form-control" readonly id="total">
                    <br>
                    <button class="btn btn-primary btn-block" name="kembali_mobil" type="submit">Serahkan</button>
                </form>
            </div>
        </div>
        <br>
    </div>

<?php
    require 'template/footer.php';
?>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script>
function HitungInterval() {
var start = moment(document.getElementById('tanggalAmbil').value),
end = moment(document.getElementById('tanggalreal').value);

document.getElementById('lama').value = end.diff(start, 'days') + 1;

document.getElementById('biayasewa').value = eval(document.getElementById('biayamobil').value) * eval(document.getElementById('lama').value)
document.getElementById('totalbiayasopir').value = eval(document.getElementById('biayasopir').value) * eval(document.getElementById('lama').value)
document.getElementById('total').value = eval(document.getElementById('biayasewa').value) + eval(document.getElementById('totalbiayasopir').value)

}

function HitungTotal() {
document.getElementById('biayasewa').value = eval(document.getElementById('biayamobil').value) * eval(document.getElementById('lama').value)
}
</script>