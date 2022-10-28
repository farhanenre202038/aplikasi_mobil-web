<?php
    $title = 'Pengaturan';
    require 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
    $id = $_SESSION['id'];
    $admin = mysqli_query($koneksi,"SELECT * FROM tbl_login WHERE id='$id'");
    $data = mysqli_fetch_assoc($admin);
?>
    <div class="card">
        <div class="card-body">
            <center>
                <h2>Pengaturan</h2>
                <hr>
            </center>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nama Lengkap</label>
                    <h3><?= $data['nama_user'];?></h3>
                </div>
                 <div class="col-md-6">
                    <label for="">Username</label>
                    <h3><?= $data['username'];?></h3>
                </div>
            </div>
        </div>
    </div>
<?php
    require 'template/footer.php';
?>