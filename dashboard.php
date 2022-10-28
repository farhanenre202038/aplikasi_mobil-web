<?php
    $title = "Dashboard";
    include 'db/koneksi.php';
    require 'template/header.php';
    require 'template/navbar.php';
?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <center>
                    <h5 class="card-title">MOBIL KOSONG</h5>
                    <h3 class="card-subtitle mb-2 text-muted car"></h3>
                </center>
            </div>
        </div>
    </div>
     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                  <center>
                    <h5 class="card-title">TRANSAKSI MASUK</h5>
                    <h3 class="card-subtitle mb-2 text-muted transaksi"></h3>
                </center>
            </div>
        </div>
    </div>
     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                 <center>
                    <h5 class="card-title">JUMLAH USER</h5>
                    <h3 class="card-subtitle mb-2 text-muted user"></h3>
                </center>
            </div>
        </div>
    </div>
</div>
 <br>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Grafik Jumlah
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Pendapatan
            </div>
            <div class="card-body">
              <h5>
                <?php
                $total = mysqli_query($koneksi,"SELECT SUM(total_bayar) FROM tbl_history");
                $jumlah = mysqli_fetch_array($total);

                echo "Rp." . number_format($jumlah['SUM(total_bayar)']);
                ?>
              </h5>
            </div>
        </div>
        <br>
         <div class="card">
            <div class="card-header">
                Mobil 
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                <?php
                    $type = mysqli_query($koneksi,"SELECT * FROM tbl_mobil WHERE status_rental='0'");
                    while ($row = mysqli_fetch_assoc($type)){ 
                ?>
                    <li class="list-group-item"><?= $row['nama_mobil']; ?> <span class="badge badge-success text-right">Tersedia</span></li>
                <?php } ?>
                </ul>
            </div>
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
                data();
                user();
                berhasil();
            }, 1000);
        }

        function ubah(){
            $.getJSON("get_dashboard.php", function(data){
                $(".car").empty();
                $.each(data.back, function() {
                    $(".car").append(""+this['status_rental']+"");
                });
            });
        }

          function data(){
            $.getJSON("get_transaksi.php", function(a){
                $(".transaksi").empty();
                $.each(a.kembali, function() {
                    $(".transaksi").append(""+this['no_pengambilan']+"");
                });
            });
        }
          function user(){
            $.getJSON("get_user.php", function(u){
                $(".user").empty();
                $.each(u.user, function() {
                    $(".user").append(""+this['id_pelanggan']+"");
                });
            });
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Data Mobil", "History Transaksi", "Data Pelanggan"],
				datasets: [{
					label: 'My First dataset',
					data: [
					<?php 
					$jumlah_teknik = mysqli_query($koneksi,"select * from tbl_mobil");
					echo mysqli_num_rows($jumlah_teknik);
					?>, 
					<?php 
					$jumlah_ekonomi = mysqli_query($koneksi,"select * from tbl_history");
					echo mysqli_num_rows($jumlah_ekonomi);
					?>, 
					<?php 
					$jumlah_fisip = mysqli_query($koneksi,"select * from tbl_pelanggan");
					echo mysqli_num_rows($jumlah_fisip);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
