<?php
    require 'db/mobile_koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
?>
<style>
    .carousel-inner{
        border-radius: 20px;
    }
</style>
    <div class="container-fluid mt-3">
        <marquee behavior="" direction=""><a href="https://saweria.co/farhanenre202038" target="_blank" class="text-dark">Klik untuk dukung Kami di | https://saweria.co/farhanenre202038</a></marquee>
        <hr>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $iklan = mysqli_query($koneksi,"SELECT * FROM tbl_iklan");
                    while ($row = mysqli_fetch_assoc($iklan)){  
                ?>
                <div class="carousel-item <?= $row['active'];?>">
                   <a href="<?= $row['link'];?>" target="_blank">
                        <img class="d-block w-100" src="../iklan/<?= $row['iklan'];?>" alt="First slide">
                   </a>
                </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        <div class="car"></div>
         <div class="card" style="margin-top: 30px;">
             <div class="card-body">
                <h3 class="text-center">Loading...</h3>
             </div>
         </div>
    </div>
<?php
    require 'template/footer.php';
?>
<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>


<script>
        $(document).ready(function( ) {
            berhasil();
        })

        function berhasil(){
            setTimeout(function(){
                ubah();
                berhasil();
            }, 1000);
        }

        function ubah(){
            $.getJSON("get_mobil.php", function(data){
                $(".car").empty();
                $.each(data.back, function() {
                    $(".car").append("<div class='card mt-3'>"+
                    "<div class='card-body'>"+
                    " <img src='../mobil/"+this['foto_mobil']+"' alt="+this['foto_mobil']+" width='100%'>"+
                    "<h4>"+this['nama_mobil']+" - <span class='badge badge-danger'>Rp."+this['harga_sewa']+"-.</span></h4>"+
                    "<div class='row'>"+
                    "<div class='col-6'>"+
                    "<span><i class='fas fa-car'></i> "+this['nama_merk']+"</span><br><span><i class='fas fa-car'></i>"+this['nama_type']+"</span>"+
                    "</div>"+
                    "<div class='col-6'>"+
                    "<span><i class='fas fa-users'></i> "+this['jumlah_kursi']+" Kursi</span> <br> <span><i class='far fa-calendar-check'></i> "+this['tahun_beli']+"</span>"+
                    "</div>"+
                    "</div> <br>"+
                    "<a href='transaksi_mobil.php?no_plat="+this['no_plat']+"' class='btn btn-primary btn-block'>Pesan Mobil</a>"
                    );
                });
            });
        }
    </script>