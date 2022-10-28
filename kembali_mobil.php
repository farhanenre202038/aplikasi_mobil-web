<?php
    $title = 'Atur Tanggal';
    require 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
    date_default_timezone_set("Asia/Makassar");
    $no_pengambilan = $_GET['no_pengambilan'];
    $kembali = mysqli_query($koneksi,"SELECT * FROM view_transaksi WHERE no_pengambilan='$no_pengambilan'");
    $data = mysqli_fetch_assoc($kembali);
?>
    <div class="card">
        <div class="card-body">
             <h3><?= $data['no_pengambilan']; ?> - <?= $data['nama_mobil']; ?></h3> 
                <div class="alert alert-primary" role="alert">
                    <i><h5 class="text-muted">Tanggal Pengambilan: <?= $data['tgl_pengambilan']; ?></h5></i>
                    <i><h5 class="text-muted">Tanggal Pengembalian Pertama: <?= $data['tgl_pengembalian']; ?></h5></i>
                    <i><small class="text-muted">Harga Rental Mobil : Rp.<?= number_format($data['harga_sewa']); ?>/Hari</small></i>
                     <br>
                    <i><small class="text-muted">Harga Sewa Sopir : Rp.20,000/Hari</small></i>
                </div>
            <form action="models/proses_kembali.php" method="POST">                           
                <input type="hidden" name="tgl_ambil" class="form-control" value="<?= $data['tgl_pengambilan'];?>" readonly id="tanggalAmbil">
                <?php if($data['biaya_sopir'] == '0') { ?>
                    <input type="hidden" name="biaya_sopir" class="form-control" value="<?= $data['biaya_sopir'];?>" readonly id="biayasopir">
                <?php }else{ ?>
                    <input type="hidden" name="biaya_sopir" class="form-control" value="20000" readonly id="biayasopir">
                <?php } ?>
                <input type="hidden" name="harga_sewa" class="form-control" value="<?= $data['harga_sewa'];?>" readonly id="biayamobil">
                <input type="hidden" name="no_plat" class="form-control" value="<?= $data['no_plat'];?>" readonly>
                <input type="hidden" name="id_pelanggan" class="form-control" value="<?= $data['id_pelanggan'];?>" readonly>
                <input type="hidden" name="no_pengambilan" class="form-control" value="<?= $data['no_pengambilan'];?>" readonly>
                <label>Tanggal Pengembalian Fix :</label>
                <input type="date" name="tanggalkembalireal" class="form-control" id="tanggalreal" onchange="HitungInterval()">
                <label>Lama Rental :</label>
                <input type="text" name="lama_rental" class="form-control" readonly id="lama" onclick="HitungTotal()">
                <label>Total Biaya Sewa Mobil :</label>
                <input type="text" name="bayar_sewa" class="form-control" readonly id="biayasewa">
                <label>Total Biaya Sewa Sopir :</label>
                <input type="text" name="biaya_sopir" class="form-control" readonly id="totalbiayasopir">
                <label>Total Biaya :</label>
                <input type="text" name="total_bayar" class="form-control" readonly id="total">
                <br>
                <a href="data_transaksi.php" class="btn btn-warning" name="kembali_mobil">Kembali</a>
                <button class="btn btn-primary" name="kembali_mobil">Kirim</button>
            </form>
        </div>
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