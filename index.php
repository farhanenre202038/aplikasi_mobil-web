<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <title>Rental Mobil</title>
  </head>

  <style>
        .navbar{
        padding: 0.5pc 0.5pc 0.5pc 1.5pc;
        border-style: none none solid none;
        border-color: #fdb606;
        border-width: 5px;
    }
    .text-custome{
      font-family: 'Montserrat', sans-serif;
      color: #fdb606;
    }
     .card{
        box-shadow: 3px 3px 10px -5px;
        border: none;
    }
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 60px;
      padding-top: 10px;
    }
    body {
      position: relative;
    }

    body::after {
      content: '';
      display: block;
      height: 50px; /* Set same as footer's height */
    }
    h3{
       border-style: none none none solid;
        border-color: #fdb606;
        border-width: 5px;
    }
    h4{
       border-style: solid none none none;
        border-color: #17a2b8!important;
        border-width: 5px;
    }
  </style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="index.php">IDAMAN MOBIL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#beranda">Beranda <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#fitur">Fitur App</a>
                <a class="nav-item nav-link active" href="#">Pusat Bantuan</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="beranda" class="jumbotron jumbotron-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <center>
                    <img src="img/app.png" alt="" width="50%">
                    </center>
                </div>
                 <div class="col-md-6">
                     <center>
                        <br>
                        <h1 class="text-custome">APLIKASI RENTAL MOBIL</h1>
                        <button class="btn btn-info" data-target="#app" data-toggle="modal"><i class="fab fa-google-play"></i> Play </button>
                     </center>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
              <div class="card-body">
                 <h3 id="fitur">Fitur Aplikasi Rental Mobil</h3>
                 <br>
                 <div class="row">
                   <div class="col-md-4  mt-3">
                       <center>
                       <img src="img/fitur_mobile.gif" width="50%">
                       <br><br>
                       <h4> Pemesanan Mobil</h4>
                     </center> 
                   </div>
                   <div class="col-md-4  mt-3">
                     <center>
                       <img src="img/fitur_mobil2.gif" width="50%">
                         <br><br>
                       <h4>History Pembayaran</h4>
                     </center>
                   </div>
                     <div class="col-md-4  mt-3">
                     <center>
                       <img src="img/fitur-profil.gif" width="50%">
                         <br><br>
                       <h4>Update Data Profil</h4>
                     </center>
                   </div>
                 </div>
          </div>
      </div>
    </div>
    
    <!-- modal app -->
    <div class="modal fade" id="app" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <center>
            <p>Scan Qr Code dibawah Ini</p>
            <img src="img/qrcode.svg" alt="" width="50%">
            <p>Rental Mobil 100%</p>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<br><br>
 <footer class="bg-dark text-white">
    <p class="text-center">2021 &copy; 202038 Muhammad Farhan Enre & 202014 Ichsan Maulana Adnan</p>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>