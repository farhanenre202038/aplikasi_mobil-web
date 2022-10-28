<?php
    require 'db/mobile_koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
    session_start();
    date_default_timezone_set("Asia/Makassar");
    $tgl_pengembalian = date('Y-m-d');
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $pesan = mysqli_query($koneksi,"SELECT * FROM view_transaksi WHERE id_pelanggan='$id_pelanggan'");
    $cek = mysqli_num_rows($pesan);
?>
   <?php if($cek > 0){ ?>
        <?php while ($row = mysqli_fetch_assoc($pesan)){ ?>
        <div class="container-fluid mt-3">
         <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <img src="../mobil/<?= $row['foto_mobil']; ?>" alt="" width="100%">
                    </div>
                    <div class="col-6">
                        <i><small class="text-muted">Kode Pengambilan :</small></i>
                        <h3 class="text-info text-center" data-toggle="modal" data-target="#kode<?= $row['no_pengambilan']; ?>"><?= $row['no_pengambilan']; ?></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <th><small>Mobil</small></th>
                                    <td>:</td>
                                    <td><small><?= $row['nama_mobil']; ?></small></td>
                                </tr>
                                  <tr>
                                    <th><small>No.Polisi</small></th>
                                    <td>:</td>
                                    <td><small><?= $row['no_plat']; ?></small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <?php
                    if($row['status_rental'] == '1'){ ?>
                                <a href="models/batal_mobil.php?no_pengambilan=<?= $row['no_pengambilan'] ?>&no_plat=<?= $row['no_plat'] ?>" class="btn btn-danger btn-block">Batal Rental</a>  
                                <center>
                                    <small>Batas Pengambilan Mobil 1Hari</small>
                                </center> 
                    <?php }else{ ?>
                        <?php if($row['status_rental'] == '2') { ?>
                                 <div class="alert alert-danger" role="alert">
                                    <center>Kembalikan Di Tanggal <?= $row['tgl_pengembalian']; ?></center>
                                </div>
                                 <center><small>Hubungi Kami Jika Ingin di Perpanjang</small></center>
                            <?php }else{ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <center>Kembalikan Di Tanggal <?= $row['tgl_pengembalian']; ?></center>
                                    </div>
                                <center>
                                    <i><small data-toggle="modal" data-target="#nota_mobil<?= $row['no_pengambilan'];?>">Klik Untuk Cek Pembayaran</small></i>
                                </center>
                            <?php } ?>
                    <?php } ?>
            </div>
        </div>
        <div class="card" style="margin-top: 10px;"></div>
    </div>
    <div class="modal fade" id="kode<?= $row['no_pengambilan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <center>
                <i><small class="text-muted">Kode Pengambilan :</small></i>
                    <h1><?= $row['no_pengambilan'] ?></h1>
                    <i><small class="text-muted">Berikan Kode Pengambilan Ini pada Admin</small></i>
            </center>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
     <div class="modal fade" id="nota_mobil<?= $row['no_pengambilan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <br>
                        <img src="img/failed.png" alt="" width="20%">
                        <br><br>
                        <h4>Pembayaran Rental Mobil <br> Belum Lunas</h4>
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
                                Tanggal Kembali Mobil
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
                <h6>Total Pembayaran</h4>
            </div>
            <div class="col-6">
                    <h6 class="text-muted text-right">Rp. <?=number_format($row['harga_sewa']);?>/Hari</h6>
                    <h6 class="text-muted text-right"><?=$row['lama_rental'];?>Hari</h6>
                    <h6 class="text-muted text-right">Rp. <?=number_format($row['bayar_sewa']);?></h6>
                    <h6 class="text-muted text-right">Rp. <?=number_format($row['biaya_sopir']);?></h6>
                    <hr>
                    <h6 class="text-right">Rp. <?=number_format($row['total_bayar']);?></h6>
                </div>
            </div>
            <center>
                <i><small>Abaikan Jika Sudah Bayar</small></i>
            </center>
                </div>
            </div>
        </div>
    </div>
   <?php } ?>
<?php }else{ ?>
       <div class="container-fluid mt-3">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img src="img/habis.gif" alt="" width="25%">
                        <br> <br>
                        <h4>Aktivitas Tidak Ada</h4>
                    </center>
                </div>
                <div class="card" style="margin-top: 10px;"></div>
            </div>
       </div>
    <?php } ?>
    
<?php 
    require 'template/footer.php';
?>