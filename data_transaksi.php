<?php
    $title = 'Data Transaksi';
    require 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
?>
    <div class="card">
        <div class="card-body">
            <center><h2>DATA TRANSAKSI MOBIL</h2></center>
            <hr>
            <table id="example" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>No. Transaksi</th>
                        <th>Nama</th>
                        <th>Tanggal Ambil</th>
                        <th>Tanggal Fix</th>
                        <th>No. Polisi</th>
                        <th>Mobil</th>
                        <th>Status Pesanan</th>
                        <!-- <th>Total Bayar</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $tanggalhariini = date('d-m-Y');
                    $user = mysqli_query($koneksi,"SELECT * FROM view_transaksi");
                    while ($row = mysqli_fetch_assoc($user)){              
                    // $tgl_pengembalian = $row['tgl_pengembalian'];
                    // $dataTime = new DateTime($tgl_pengembalian);
                    // $tanggal_pengembalian = $dataTime ->format('Y-m-d');
                ?>
                    
                    <tr>
                        <td><?= $row['no_pengambilan'];?></td>
                        <td><?= $row['nama_pelanggan'];?></td>
                        <td><?= $row['tgl_pengambilan'];?></td>
                        <td><?= $row['tgl_pengembalian'];?></td>
                        <td><?= $row['no_plat'];?></td>
                        <td><?= $row['nama_mobil'];?></td>
                        <td class="text-center">
                            <?php if($row['status_rental'] == '1'){ ?>
                               <span class="badge badge-pill badge-info">Pengambilan</span>
                            <?php }else if($row['status_rental'] == '2'){ ?>
                                <span class="badge badge-pill badge-warning">Diambil</span>
                            <?php }else if($row['status_rental'] == '3'){ ?>
                                <span class="badge badge-pill badge-success">Pengembalian</span>
                            <?php }else{ ?>
                        
                            <?php } ?>
                        </td>
                        <!-- <td>Rp.<?= number_format($row['total_bayar']);?></td> -->
                        <td>
                            <?php if($row['status_rental'] == '1'){ ?>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#ambil_mobil<?= $row['no_plat'];?>"><i class="fas fa-qrcode"></i></button>
                                <a href="https://api.whatsapp.com/send?phone=<?= $row['telpon']; ?>&text=Selamat%20Datang%2C%20Saya%20dari%20IDAMAN%20MOBIL%20ingin%20menyampaikan%20segera%20melakukan%20tahap%20pengambilan%20mobil%20sebelum%20tanggal%20<?= $row['tgl_pengambilan']; ?>" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                                <a href="models/batal_mobil.php?no_pengambilan=<?= $row['no_pengambilan'] ?>&no_plat=<?= $row['no_plat'] ?>" class="btn btn-danger"><i class="fas fa-ban"></i></a>
                            <?php }else if($row['status_rental'] == '2'){ ?>
                                <a href="kembali_mobil.php?no_pengambilan=<?= $row['no_pengambilan'];?>" class="btn btn-primary"><i class="far fa-calendar-alt"></i></a>
                             <a href="https://api.whatsapp.com/send?phone=<?= $row['telpon']; ?>&text=Terima%20Kasih%20🙏%2C%20Sudah%20melakukam%20tahap%20pengambilan%20mobil%20di%20tanggal%20<?= $tanggalhariini; ?>" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                                <?php }else if($row['status_rental'] == '3'){ ?>
                                <button class="btn btn-success " data-toggle="modal" data-target="#kembali_mobil<?= $row['no_plat'];?>"><i class="fas fa-route"></i></button>
                                 <a href="kembali_mobil.php?no_pengambilan=<?= $row['no_pengambilan'];?>" class="btn btn-danger"><i class="far fa-calendar-alt"></i></a>
                                 <a href="https://api.whatsapp.com/send?phone=<?= $row['telpon']; ?>&text=Lakukan%20pengembalian%20mobil%20di%20tanggal%20<?= $row['tgl_pengembalian']; ?>%0Adan%20lakukan%20pembayaran%20Rental%20Mobil%20Rp.<?= number_format($row['total_bayar']); ?>" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                                <button class="btn btn-info " data-toggle="modal" data-target="#nota_mobil<?= $row['no_plat'];?>"><i class="fas fa-receipt"></i></button>
                            <?php }else{ ?>
                                 <!-- <a href="note_mobil.php?no_pengambilan=<?= $row['no_pengambilan'];?>" class="btn btn-danger"><i class="fas fa-print"></i></a> -->
                            <?php } ?>
                        </td>
                    </tr>
                 
                    <div class="modal fade" id="ambil_mobil<?= $row['no_plat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Pengambilan Mobil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="models/ambil_mobil.php" method="POST">
                                    <label for="">Info Buat Admin:</label>
                                    <i>
                                        <small>
                                            <ol type="1">
                                                <li>Sebelum Anda Input Kode Harap Meminta KTP Sebagai Jaminan</li>
                                                <li>Pastikan KTP Pemilik Sama Dengan Orangnya dan NIK yang Terdaftar</li>
                                                <li>Pembayaran Di Lakukan Ketika Mobil Dikembalikan</li>
                                            </ol>
                                        </small>
                                    </i>
                                    <div class="form-group">
                                        <i><label for="">Kode Pengambilan :</label></i>
                                        <input type="hidden" name="no_plat" class="form-control" value="<?= $row['no_plat'];?>" required>
                                        <input type="text" name="no_pengambilan" class="form-control" placeholder="Masukkan Kode Pengambilan" required>
                                        <i><small class="text-muted">Kode pengambilan di dapat dari pelanggan</small></i>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="ambil_mobil" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- modal kembali mobil -->
                           <div class="modal fade" id="kembali_mobil<?= $row['no_plat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><h3>Mobil <?= $row['nama_mobil']; ?> - <?= $row['no_plat']; ?></h3></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="models/kembali_mobil.php" method="POST">
                                    <center>
                                        <input type="hidden" name="no_plat" class="form-control" value="<?= $row['no_plat']; ?>">
                                        <input type="hidden" name="no_pengambilan" class="form-control" value="<?= $row['no_pengambilan']; ?>">
                                        <h5>Apakah Mobil Sudah Kembali Dan Pembayaran Lunas?</h5>
                                    </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
                                <button type="submit" name="kembali_mobil" class="btn btn-primary">Ya</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- modal detail -->
                    <div class="modal fade" id="nota_mobil<?= $row['no_plat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h4>Total Pembayaran</h4>
                            </div>
                            <div class="col-6">
                                 <h6 class="text-muted text-right">Rp. <?=number_format($row['harga_sewa']);?>/Hari</h6>
                                 <h6 class="text-muted text-right"><?=$row['lama_rental'];?>Hari</h6>
                                 <h6 class="text-muted text-right">Rp. <?=number_format($row['bayar_sewa']);?></h6>
                                 <h6 class="text-muted text-right">Rp. <?=number_format($row['biaya_sopir']);?></h6>
                                 <hr>
                                 <h4 class="text-right">Rp. <?=number_format($row['total_bayar']);?></h4>
                            </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php
    require 'template/footer.php';
?>