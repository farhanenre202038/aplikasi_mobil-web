<?php
  session_start();
    if ($_SESSION['status_user'] == "") {
        header("location:index.php");
    }
?>
<style>
    .navbar{
        padding: 0.5pc 0.5pc 0.5pc 1.5pc;
        border-style: none none solid none;
        border-color: #fdb606;
        border-width: 5px;
    }
    .judul{
        font-size: 40px;
    }
    .card{
        box-shadow: 3px 3px 10px -5px;
        border: none;
    }
    .list-group-item{
        border: none;
        box-shadow: 1px 1px 10px -6px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#Login"><h3 class="judul">IDAMAN MOBIL</h3>
  <small>Rental Mobil Online No 1 Di Makassar</small></a>
</nav>
<div class="container-fluid" style="margin-top: 15px;">
    <div class="row">
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="img/user.png" alt="..." class="rounded-circle" width="50">
                                </div>
                                <div class="col-9">
                                    <h6><?= $_SESSION['nama_user'];?></h6>
                                    <marquee behavior="10" direction=""><span class="text-success"><?= $_SESSION['status_user'];?></span></marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="list-group">
                        <a href="dashboard.php" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        <a href="merk_type.php" class="list-group-item list-group-item-action"><i class="fas fa-columns"></i> Data Merk & Type</a>
                        <a href="data_mobil.php" class="list-group-item list-group-item-action"><i class="fas fa-car"></i> Data Mobil</a>
                        <a href="data_pelanggan.php" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> Data Pelanggan</a>
                        <a href="data_transaksi.php" class="list-group-item list-group-item-action"><i class="fas fa-money-check-alt"></i> Data Transaksi</a>
                        <hr>
                        <a href="history_transaksi.php" class="list-group-item list-group-item-action"><i class="fas fa-money-check-alt"></i> History Transaksi</a>
                        <a href="iklan.php" class="list-group-item list-group-item-action"><i class="fas fa-ad"></i> Data Iklan</a>
                        <!-- <a href="pengaturan.php" class="list-group-item list-group-item-action"><i class="fas fa-users-cog"></i> Pengaturan</a> -->
                        <a href="models/logout.php" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-4">
