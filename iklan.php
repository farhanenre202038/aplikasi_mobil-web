<?php
    $title = "Iklan";
    include 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
?>

    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#iklan">&plus;Iklan</button>
            <center>
                <h2>Banner Iklan</h2>
                <hr>
            </center>
            <table id="example" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th>Kode Iklan</th>
                        <th>Label Iklan</th>
                        <th>Tanggal Upload</th>
                        <th>Iklan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $iklan = mysqli_query($koneksi,"SELECT * FROM tbl_iklan");
                        while ($row = mysqli_fetch_assoc($iklan)){  
                    ?>
                    <tr>
                        <td><?= $row['kode_iklan']; ?></td>
                        <td><?= $row['nama_iklan']; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td>
                            <center>
                                <img src="iklan/<?= $row['iklan']; ?>" alt="" width="200px">
                            </center>
                        </td>
                        <td>
                            <button class="btn btn-danger" data-target="#hapus_iklan<?=$row['kode_iklan'];?>" data-toggle="modal"><i class="fas fa-backspace"></i></button>
                        </td>
                    </tr>
                      <div class="modal fade" id="hapus_iklan<?=$row['kode_iklan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Iklan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="models/proses_iklan.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" name="kode_iklan" value="<?=$row['kode_iklan'];?>">
                                    <center>
                                        <h3>Apa anda Ingin Hapus Iklan ?</h3>
                                    </center>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                        <button type="submit" name="hapus_iklan" class="btn btn-primary">Ya</button>
                                      </form>
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
    <!-- modal iklan -->
    <div class="modal fade" id="iklan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal Iklan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="models/proses_iklan.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Label Iklan</label>
                <input type="text" class="form-control" name="nama_iklan" required="" placeholder="Masukkan Label Iklan">
            </div>
             <div class="form-group">
                <label for="">Gambar Iklan</label>
                <input type="file" class="form-control" name="iklan" required="">
                <small class="text-muted"><i>Ukuran iklan 540 x 194</i></small>
            </div>
            <div class="form-group">
                <label for="">Link Iklan</label>
                <input type="text" class="form-control" name="link" required="" placeholder="https://">
                <small class="text-muted"><i>Contoh :https://www.xxx.id/xxx</i></small>
            </div>
            <div class="form-group">
                    <?php
                    $data = mysqli_query($koneksi,"SELECT * FROM tbl_iklan");
                    $op = mysqli_fetch_assoc($data);
                    if($op['active'] == 'active'){?>
                        <input type="hidden" class="form-control" name="active" value="Iklan" readonly>
                    <?php }else{ ?>
                        <input type="hidden" class="form-control" name="active" value="active" readonly>
                  <?php  } ?>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="upload_iklan" class="btn btn-primary">Upload</button>
    </div>
        </form>
      </div>
    </div>
  </div>
</div>
       
<?php
    require 'template/footer.php';
?>