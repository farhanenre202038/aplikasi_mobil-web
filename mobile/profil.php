<?php
    require 'db/mobile_koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
    session_start();
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $profil = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id_pelanggan'");
    while ($row = mysqli_fetch_assoc($profil)){ 
?>
  <div class="container-fluid mt-3">
      <center>
          <img src="img/user1.png" alt="" width="30%">
      </center>
      <form action="models/proses_profil.php" method="POST">
        <input type="hidden" class="form-control" name="id_pelanggan" value="<?= $row['id_pelanggan']; ?>">
        <small>Nama</small>
        <input type="text" class="form-control" name="nama_pelanggan" value="<?= $row['nama_pelanggan']; ?>">
        <small>Email</small>
        <input type="text" class="form-control" name="email" value="<?= $row['email']; ?>">
        <small>Nomor Whatsapp</small>
        <input type="text" class="form-control" name="telpon" value="<?= $row['telpon']; ?>">
        <small>Alamat</small>
        <input type="text" class="form-control" name="alamat" value="<?= $row['alamat']; ?>">
        <br>
        <button type="submit" class="btn btn-primary btn-block" name="ubah_profil">Simpan</button>
        <a href="models/logout.php" class="btn btn-danger btn-block" name="keluar">Logout</a>
    </form>
    </div>
<?php
    }
    require 'template/footer.php';
?>