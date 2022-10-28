<?php
    include 'template/header.php';
    include 'template/navbar.php';
    include 'db/mobile_koneksi.php';
    session_start();
    $no_plat = $_GET['no_plat'];
    $info = mysqli_query($koneksi,"SELECT * FROM view_mobil WHERE no_plat='$no_plat'");
    $row = mysqli_fetch_assoc($info); 
    $karakter = '123456789';
    $shuffle  = substr(str_shuffle($karakter), 0, 5);
?>
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h4>MOBIL (<?= $row['nama_mobil'];?> - <?= $row['no_plat'];?>)</h4>
            </div>
        </div>
        <br>
        <div class="alert alert-primary" role="alert">
            Harga Sewa Mobil : Rp.<?= number_format($row['harga_sewa']); ?>,- /Hari
        </div>
        <form action="models/proses_transaksi.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="id_pelanggan" class="form-control" value="<?= $_SESSION['id_pelanggan'];?>" readonly>
                <input type="hidden" name="no_plat" class="form-control" value="<?= $row['no_plat'];?>" readonly>
            </div>
            <div class="form-group">
                <small>No Pengambilan</small>
                <input type="text" name="no_pengambilan" class="form-control" value="MB<?= $shuffle; ?>" readonly>
            </div>
            <div class="form-group">
                <small>Tanggal Pengambilan</small>
                <input type="date" name="tanggal_pengambilan" class="form-control" id="tanggal_ambil" required="">
            </div>
            <div class="form-group">
                <small>Tanggal Pengembalian</small>
                <input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_kembali" onchange="HitungInterval()" required="">
            </div>
            <div class="form-group">
                <small>Lama Rental</small>
                <input type="text" name="lama_rental" class="form-control" id="selisi" readonly required="">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input name="biaya_sopir" type="checkbox" class="custom-control-input" id="customCheck1" >
                    <label class="custom-control-label" for="customCheck1">Pakai Sopir</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="buat_transaksi" class="btn btn-primary btn-block">Kirim</button>
            </div>
        </form>
    </div>
<?php
    include 'template/footer.php';
?>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script>
function HitungInterval() {
    var start = moment(document.getElementById('tanggal_ambil').value),
    end = moment(document.getElementById('tanggal_kembali').value);

    document.getElementById('selisi').value = end.diff(start, 'days');
}

</script>