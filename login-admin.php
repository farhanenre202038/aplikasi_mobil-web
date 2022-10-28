<script>
    let securityKey = prompt("Masukan Security Key","");
    const data = securityKey;
    if(data == '0'){
        alert('Security Key Benar :}');
    }else{
        alert('Security Key Salah :{');document.location='index.php';
    }
</script>

<?php
    $title = "Login";
    require 'template/header.php';
    error_reporting(0);
    session_start();
    if ($_SESSION['status_user'] == "offline") {
        header("location:dashboard.php");
    }
?>
<style>
    .custome-h3{
        font-family: 'Roboto', sans-serif;
    }
    .card{
        box-shadow: 3px 3px 10px -5px;
        border: none;
    }
    .navbar{
        padding: 0.5pc 0.5pc 0.5pc 1.5pc;
        border-style: none none solid none;
        border-color: #fdb606;
        border-width: 5px;
    }
    .judul{
        font-size: 40px;
    }
    body{
        background-color: #c9effa;
    }
    img{
        width: 100%;
    }
 
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#Login"><h3 class="judul">IDAMANA MOBIL</h3>
  <small>Rental Mobil Online No 1 Di Makassar</small></a>
</nav>
    <div class="container" style="margin-top: 70px;">
      <div class="row">
            <div class="col-md-7">
            <img class="img" src="img/img-login-min.png" alt="" >
         </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                   <center><h3 class="custome-h3">Sign In</h3></center>
                   <hr>
                   <form action="models/cek_login.php" method="POST">
                       <div class="form-group">
                           <label for="">Username</label>
                           <input type="text" class="form-control" name="username" placeholder="Username Anda">
                           <small class="form-text text-muted">Username terdaftar</small>
                        </div>
                         <div class="form-group">
                           <label for="">Password</label>
                           <input type="password" class="form-control" name="password" placeholder="Password Anda">
                       </div>
                       <hr>
                       <button type="submit" name="login" class="btn btn-success btn-block">Log In</button>
                       <a href="index.php" class="btn btn-primary btn-block">View</a>
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php
    require 'template/footer.php';
?>
