<?php
    $title = 'Data Mobil';
    require 'template/header.php';
    require 'template/navbar.php';
    require 'db/koneksi.php';
?>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#inputmobil"><i class="fas fa-plus-circle"></i> Mobil</button>
            <center><h2>DATA MOBIL</h2></center>
            <hr>
            <table id="example" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th>No Polisi</th>
                        <th>Merk Mobil</th>
                        <th>Type Mobil</th>
                        <th>Status Rental</th>
                        <th>Foto Mobil</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mobil = mysqli_query($koneksi,"SELECT * FROM view_mobil");
                        while ($row = mysqli_fetch_assoc($mobil)){
                    ?>
                        <tr>
                            <td><?= $row['no_plat']; ?></td>
                            <td><?= $row['nama_merk']; ?></td>
                            <td><?= $row['nama_type']; ?></td>
                            <td class="text-center"><?php
                                if ($row['status_rental'] == '0') {
                                // Jika status mobil Kosong Maka tampilkan label kosong
                                    echo '<h5><span class="badge badge-success">Tersedia</span></h5>';
                                    } else {
                                    echo '<h5><span class="badge badge-danger">Tidak Tersedia</span></h5>';
                                    }
                                ?>
                            </td>
                            <td><img src="mobil/<?= $row['foto_mobil']; ?>" alt="" width="100"></td>
                            <td>
                                <button class="btn btn-warning" data-target="#ubah_mobil<?= $row['no_plat'];?>" data-toggle="modal"><i class="far fa-edit"></i></button>
                                <a href="models/proses_hapus.php?hapus_mobil&no_plat=<?= $row['no_plat'];?>"  onClick="return confirm('Klik Ok Jika Anda Ingin Menghapusnya')" class="btn btn-danger" name="hapus_mobil"><i class="fas fa-backspace"></i></a>
                                <button class="btn btn-info" data-toggle="modal" data-target="#detail_mobil<?= $row['no_plat'];?>"><i class="fas fa-info-circle"></i></button>
                            </td>
                        </tr>
                        <!-- modal update mobil -->
                        <div class="modal fade" id="ubah_mobil<?= $row['no_plat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-car"></i> Input Mobil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                    $no_plat = $row['no_plat'];
                                    $ubahmobil = mysqli_query($koneksi,"SELECT * FROM view_mobil WHERE no_plat='$no_plat'");
                                    while ($data = mysqli_fetch_assoc($ubahmobil)) { 
                                ?>
                                <form action="models/proses_mobil.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Nomor Polisi</label>
                                    <input type="text" class="form-control" name="no_plat" value="<?= $data['no_plat']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Mobil</label>
                                    <input type="text" class="form-control" name="nama_mobil" value="<?= $data['nama_mobil']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Merk Mobil</label>
                                            <select name="kode_merk" id="merk1" class="form-control merk_mobil">
                                                <option value="<?= $data['kode_merk']; ?>"selected><?= $data['nama_merk']; ?></option>
                                                <?php
                                                    $merkmobil = mysqli_query($koneksi,"SELECT * FROM tbl_merk");
                                                    while($opsi = mysqli_fetch_assoc($merkmobil)){
                                                        echo '<option value="' . $opsi['kode_merk'] . '">' . $opsi['nama_merk'] . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Type Mobil</label>
                                        <select name="id_type" id="type1" class="form-control type_mobil">
                                            <option value="<?= $data['id_type']; ?>"selected><?= $data['nama_type']; ?></option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tahun Beli</label>
                                            <input type="text" class="form-control" name="tahun_beli" value="<?= $data['tahun_beli']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Jumlah Kursi</label>
                                            <select name="jumlah_kursi" id="" class="form-control">
                                                <option value="<?= $data['jumlah_kursi']; ?>" selected><?= $data['jumlah_kursi']; ?> Kursi</option>
                                                <option value="1">1 Kursi</option>
                                                <option value="2">2 Kursi</option>
                                                <option value="3">3 Kursi</option>
                                                <option value="4">4 Kursi</option>
                                                <option value="5">5 Kursi</option>
                                                <option value="6">6 Kursi</option>
                                                <option value="7">7 Kursi</option>
                                                <option value="8">8 Kursi</option>
                                                <option value="9">9 Kursi</option>
                                            </select>
                                    </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="">Harga Sewa</label>
                                        <input type="text" class="form-control" name="harga_sewa" value="<?= $data['harga_sewa']; ?>">
                                        <small class="text-muted">Tidak Pakai Rp. dan koma</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto Mobil</label>
                                        <input type="checkbox" type="checkbox" name="ubah_foto" value="true"> Ceklis Ubah Foto
                                        <input type="file" class="form-control" name="foto_mobil" value="<?= $data['foto_mobil']; ?>">
                                        <input type="checkbox" type="checkbox" name="ubah_foto" value="true"> Ceklis Ubah Foto
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update_mobil" class="btn btn-primary">Save</button>
                            </form>
                            <?php } ?>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" id="detail_mobil<?= $row['no_plat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Mobil - <?= $row['nama_mobil']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   <div class="row d-flex align-items-center">
                                       <?php
                                            $no_plat = $row['no_plat'];
                                            $detail = mysqli_query($koneksi,"SELECT * FROM view_mobil WHERE no_plat='$no_plat'");
                                            while ($qdetail = mysqli_fetch_assoc($detail)){
                                       ?>
                                        <div class="col-md-6">
                                            <img src="mobil/<?= $qdetail['foto_mobil']; ?>" alt="" width="100%" class="">
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item">Nama Mobil : <?= $qdetail['nama_mobil']; ?></li>
                                                <li class="list-group-item">Merk Mobil : <?= $qdetail['nama_merk']; ?></li>
                                                <li class="list-group-item">Nomor Polisi : <?= $qdetail['no_plat']; ?></li>
                                                <li class="list-group-item">Jumlah Kursi : <?= $qdetail['jumlah_kursi']; ?> Kursi</li>
                                                <li class="list-group-item">Tahun Beli : <?= $qdetail['tahun_beli']; ?></li>
                                            </ul>
                                        </div>
                                       <?php } ?>
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
    <!-- modal update mobil -->
    <!-- modal input mobil -->
<div class="modal fade" id="inputmobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-car"></i> Input Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="models/proses_mobil.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Nomor Polisi</label>
            <input type="text" class="form-control" name="no_plat" placeholder="XX XX XX" required="">
        </div>
         <div class="form-group">
            <label for="">Nama Mobil</label>
            <input type="text" class="form-control" name="nama_mobil" placeholder="Masukkan Nama Mobil" required="">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Merk Mobil</label>
                    <select name="kode_merk" id="merk" class="form-control">
                        <option disabled selected>:: Pilih Merek Mobil ::</option>
                        <?php
                            $merkmobil = mysqli_query($koneksi,"SELECT * FROM tbl_merk");
                            while($opsi = mysqli_fetch_assoc($merkmobil)){
                                echo '<option value="' . $opsi['kode_merk'] . '">' . $opsi['nama_merk'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                    <label for="">Type Mobil</label>
                   <select name="id_type" id="type" class="form-control">
                       <option disabled selected>:: Pilih Type Mobil ::</option>
                   </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tahun Beli</label>
                    <input required="" type="text" class="form-control" name="tahun_beli" placeholder="Masukkan Tahun Beli">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Jumlah Kursi</label>
                    <select required="" name="jumlah_kursi" id="" class="form-control">
                        <option disabled selected>:: Pilih Jumlah Kursi ::</option>
                        <option value="1">1 Kursi</option>
                        <option value="2">2 Kursi</option>
                        <option value="3">3 Kursi</option>
                        <option value="4">4 Kursi</option>
                        <option value="5">5 Kursi</option>
                        <option value="6">6 Kursi</option>
                        <option value="7">7 Kursi</option>
                        <option value="8">8 Kursi</option>
                        <option value="9">9 Kursi</option>
                    </select>
             </div>
            </div>
        </div>
            <div class="form-group">
                <label for="">Harga Sewa</label>
                <input type="text" required="" class="form-control" name="harga_sewa" placeholder="Masukkan Harga Sewa">
            </div>
            <div class="form-group">
                <label for="">Foto Mobil</label>
                <input type="file" class="form-control" name="foto_mobil">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="input_mobil" class="btn btn-primary">Save</button>
      </form>
    </div>
    </div>
  </div>
</div>
<?php
    require 'template/footer.php';
?>
<!-- javascript -->
