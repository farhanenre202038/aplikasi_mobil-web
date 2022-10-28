<?php
    $title = 'Data Pelanggan';
    require 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
?>
  <div class="card">
     <div class="card-body">
            <center><h2>DATA PELANGGAN</h2></center>
            <hr>
            <table id="example" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>NIK</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telpon</th>
                        <!-- <th>Status Pesanan</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $user = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan");
                    while ($row = mysqli_fetch_assoc($user)){ ?>
                    <tr>
                        <td><?= $row['id_pelanggan'];?></td>
                        <td><?= $row['nama_pelanggan'];?></td>
                        <td><?= $row['email'];?></td>
                        <td><?= $row['alamat'];?></td>
                        <td><?= $row['telpon'];?></td>
                        <!-- <td><?= $row['status'];?></td> -->
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#update_pelanggan<?= $row['id_pelanggan'];?>"><i class="far fa-edit"></i></button>
                            <a href="models/proses_hapus.php?hapus_user&id_pelanggan=<?= $row['id_pelanggan'];?>"  onClick="return confirm('Klik Ok Jika Anda Ingin Menghapusnya')" class="btn btn-danger" name="hapus_user"><i class="fas fa-backspace"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    require 'template/footer.php';
?>