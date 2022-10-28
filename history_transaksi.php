<?php
    $title = 'Data Transaksi';
    require 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
    $total = mysqli_query($koneksi,"SELECT SUM(total_bayar) FROM tbl_history");
    $jumlah = mysqli_fetch_array($total);
?>
    <div class="card">
        <div class="card-body">
            <center><h2>HISTORY TRANSAKSI MOBIL</h2></center>
            <hr>
            <table id="example" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>No. Transaksi</th>
                        <th>Nama</th>
                        <th>No. Polisi</th>
                        <th>Mobil</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $user = mysqli_query($koneksi,"SELECT * FROM tbl_history");
                    while ($row = mysqli_fetch_assoc($user)){                         
                    // $tgl_pengembalian = $row['tgl_pengembalian'];
                    // $dataTime = new DateTime($tgl_pengembalian);
                    // $tanggal_pengembalian = $dataTime ->format('Y-m-d');
                ?>
                    <tr>
                        <td><?= $row['no_pengambilan'];?></td>
                        <td><?= $row['nama_pelanggan'];?></td>
                        <td><?= $row['no_plat'];?></td>
                        <td><?= $row['nama_mobil'];?></td>
                        <td><?= $row['tgl_pengembalian'];?></td>
                        <td>Rp.<?= number_format($row['total_bayar']);?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <hr>
            <h4><b>Total : <?= "Rp." . number_format($jumlah['SUM(total_bayar)']) ;?></b></p>
        </div>
    </div>
<?php
    require 'template/footer.php';
?>