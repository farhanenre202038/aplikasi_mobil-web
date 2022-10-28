<?php
    $title = "Data Merk & Type";
    require 'template/header.php';
    require 'template/navbar.php';
    require 'db/koneksi.php';
?>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#input_merk">&plus; Merk Mobil</button>
            <center><h2>DATA MERK MOBIL</h2></center>
            <hr>
            <table id="example" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th>Kode Merk</th>
                        <th>Nama Merk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $merk = mysqli_query($koneksi,"SELECT * FROM tbl_merk");
                    while ($row = mysqli_fetch_assoc($merk)){ ?>
                    <tr>
                        <td><?= $row['kode_merk'];?></td>
                        <td><?= $row['nama_merk'];?></td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#update_merk<?= $row['kode_merk'];?>"><i class="far fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fas fa-backspace"></i></button>
                        </td>
                    </tr>
                    <!-- Update merk -->
                    <div class="modal fade" id="update_merk<?= $row['kode_merk'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Merk Mobil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $kode_merk = $row['kode_merk'];
                                $ubahmerk = mysqli_query($koneksi,"SELECT * FROM tbl_merk WHERE kode_merk='$kode_merk'");
                                while ($data = mysqli_fetch_assoc($ubahmerk)) { 
                            ?>
                            <form action="models/input_merk_type.php" method="POST">
                                <div class="form-group">
                                    <label for="">Kode Merk</label>
                                    <input type="text"  name="kode_merk" class="form-control" value="<?= $data['kode_merk']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Merk</label>
                                    <input type="text" name="nama_merk" class="form-control" value="<?= $data['nama_merk']; ?>">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update_merk">Save</button>
                            </form>
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Update merk -->
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#input_type">&plus; Type Mobil</button>
            <center><h2>DATA TYPE MOBIL</h2></center>
            <hr>
            <table id="example1" class="table table-striped table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th>ID Type</th>
                        <th>Type Mobil</th>
                        <th>Merk Mobil</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $type = mysqli_query($koneksi,"SELECT * FROM view_merk");
                    while ($row = mysqli_fetch_assoc($type)){ 
                ?>
                    <tr>
                        <td><?= $row['id_type'];?></td>
                        <td><?= $row['nama_type'];?></td>
                        <td><?= $row['nama_merk'];?></td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#update_type<?= $row['id_type'];?>"><i class="far fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fas fa-backspace"></i></button>
                        </td>
                    </tr>
                    <!-- Update type -->
                    <div class="modal fade" id="update_type<?= $row['id_type'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Merk Mobil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $id_type = $row['id_type'];
                                $ubahtype = mysqli_query($koneksi,"SELECT * FROM tbl_type WHERE id_type='$id_type'");
                                while ($data = mysqli_fetch_assoc($ubahtype)) { 
                            ?>
                            <form action="models/input_merk_type.php" method="POST">
                                <div class="form-group">
                                    <label for="">ID type</label>
                                    <input type="text"  name="id_type" class="form-control" value="<?= $data['id_type']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama type</label>
                                    <input type="text" name="nama_type" class="form-control" value="<?= $data['nama_type']; ?>">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update_type">Save</button>
                            </form>
                            <?php } ?>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Update type -->
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<!-- modal merk -->
<div class="modal fade" id="input_merk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Merk Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="models/input_merk_type.php" method="POST">
            <div class="form-group">
                <label for="">Kode Merk</label>
                <input type="text" name="kode_merk" class="form-control" placeholder="Masukkan kode merk">
            </div>
               <div class="form-group">
                <label for="">Nama Merk</label>
                <input type="text" name="nama_merk" class="form-control" placeholder="Masukkan nama merk">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="input_merk">Save</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!-- modal merk -->
<!-- modal type -->
<div class="modal fade" id="input_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Type Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="models/input_merk_type.php" method="POST">
            <div class="form-group">
                <label for="">ID Type</label>
                <input type="text" name="id_type" class="form-control" placeholder="Masukkan ID type">
            </div>
               <div class="form-group">
                <label for="">Nama Type</label>
                <input type="text" name="nama_type" class="form-control" placeholder="Masukkan nama type">
            </div>
               <div class="form-group">
                <label for="">Kode Merk</label>
                <select name="kode_merk" class="form-control" id="">
                    <option value="" selected disabled>:: Pilih Merk Mobil ::</option>
                    <?php
                        $optionmerk = mysqli_query($koneksi,"SELECT * FROM tbl_merk");
                        while ($merk = mysqli_fetch_assoc($optionmerk)) {
                            echo '<option value="' . $merk['kode_merk'] . '">' . $merk['kode_merk'] . ' - ' . $merk['nama_merk'] . '</option>';
                        }
                    ?>
                </select>
            </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="input_type">Save</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!-- modal type -->
<?php
    require 'template/footer.php';
?>