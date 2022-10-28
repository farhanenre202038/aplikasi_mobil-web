<?php
    require 'db/mobile_koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
    session_start();
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $history = mysqli_query($koneksi,"SELECT * FROM view_history WHERE id_pelanggan='$id_pelanggan'");
    while ($row = mysqli_fetch_assoc($history)){ 
?>
        <div class="container-fluid mt-3">
            <div class="row align-items-center" data-toggle="modal" data-target="#nota<?= $row['no_pengambilan'];?>">
                <div class="col-3">
                    <center>
                        <img src="img/icon-car.png" alt="" width="80%">
                    </center>
                </div>
                <div class="col-9">
                    <h6><?= $row['nama_mobil'];?> - <?= $row['no_plat'];?></h6>
                    <span>Mobil sudah dikembalikan</span>
                    <br>
                    <i><small class="text-muted"><?= $row['tgl_pengembalian'];?></small></i>
                </div>
            </div>
            <hr>
        </div>
        <!-- modal detail -->
    <div class="modal fade" id="nota<?= $row['no_pengambilan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <img src="img/success.png" alt="" width="30%">
                        <h4>Pembayaran Rental Mobil <br> Lunas</h4>
                    </center>
                       <hr>
                    <p class=""><b>No. Pengambilan: <?= $row['no_pengambilan']; ?> </b></p>
                        <div class="row">
                            <div class="col-6">
                                <p>
                                Total Pembayaran
                                <h5>Rp. <?=number_format($row['total_bayar']);?></h5>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                Tanggal Pembayaran
                                <h5><?=$row['tgl_pengembalian'];?></h5>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <p class=""><b>Rincian Rental Mobil</b></p>
                        <div class="row">
                            <div class="col-6">
                                <p><?= $row['nama_mobil']; ?> - <?= $row['no_plat']; ?></p>
                            </div>
                            <div class="col-6">
                                 <p class="text-right">Rp. <?=number_format($row['harga_sewa']);?>/Hari</p>
                            </div>
                        </div>
                        <hr>
                   <div class="row">
                            <div class="col-6">
                                <h6 class="text-muted text-left">Harga Rental Mobil</h6>
                                <h6 class="text-muted text-left">Lama Rental</h6>
                                <h6 class="text-muted text-left">Biaya Sewa Mobil</h6>
                                <h6 class="text-muted text-left">Biaya Sopir</h6>
                                <hr>
                                <h6>Total Pembayaran</h6>
                            </div>
                            <div class="col-6">
                                 <h6 class="text-muted text-right">Rp. <?=number_format($row['harga_sewa']);?>/Hari</h6>
                                 <h6 class="text-muted text-right"><?=$row['lama_rental'];?>Hari</h6>
                                 <h6 class="text-muted text-right">Rp. <?=number_format($row['bayar_sewa']);?></h6>
                                 <h6 class="text-muted text-right">Rp. <?=number_format($row['biaya_sopir']);?></h6>
                                 <hr>
                                 <h5 class="text-right">Rp. <?=number_format($row['total_bayar']);?></h5>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
    require 'template/footer.php';
?>