<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
     <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg></script>
    <title>Rental Mobil | Login</title>
  </head>
  <style>
      body{
          background-color: #c9effa;
          background-size: cover;
      }
      .cus-h2{
        font-family: 'Fugaz One', cursive;
        color: #17a2b8 !important;
        font-size: 40px;
        margin-top: 40px;
      }
      .form-control{
          border: none;
          background-color: #c9effa;
          border-style: none none solid none;
          border-color: #fdb606;
      }
      .container-fluid{
        margin-top: 10pc;
      }
  </style>
  <body>
     <div class="container-fluid">
          <center><h2 class="cus-h2"><i class="fas fa-users"></i> Login</h2><br></center>
          <form action="models/cek_login.php" method="POST">
             <div class="form-group">
                  <small>Username</small>
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" required="">
             </div>
               <div class="form-group">
                  <small>Password</small>
                  <input type="password" class="form-control" name="password" placeholder="Masukkan Username Anda" required="">
             </div>
             <br>
             <button class="btn btn-info btn-block" name="login_mobile">Login</button>
             <br>
             <center><a href="daftar_mobile.php">Buat Akun</a></center>
          </form>
     </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>