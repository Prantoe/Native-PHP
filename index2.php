<?php
include 'functions.php';
include 'koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BREMGRA GO KART</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="assets/dist/css/main.css">
</head>
<body class="hold-transition bg-light sidebar-mini layout-fixed">

<section>
		<nav class="navbar bg-info navbar-expand-lg fixed-top text-light" id="mainNav">
            <div class="container ">
                <b><a class="navbar-brand text-light" href="">BREMGRA GO KART</a></b>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
						
						<div class="collapse text-light  navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav text-light ml-auto py-4 py-md-0">
              <li class="nav-item text-light"><a class="nav-link text-light" href="/Algen">Beranda</a></li>
							<li class="nav-item text-light"><a href="jadwal.php " class="nav-link text-light">Jadwal</a></li>
							<li class="nav-item text-light"><a href="pesan.php" class="nav-link text-light">Pesan Tiket</a></li>
							<li class="nav-item text-light"><a href="p.php?m=login" class="nav-link text-light">Login</a></li>
							</ul>
						</div>
            </div>
        </nav>
	</section>
	<section>

	<br><br><br><br>
<div class="container">
      <div class="row">
        <div class="col-md-12">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img class="d-block w-100" src="https://kidsfun.co.id/assets/upload/attractions/gokart/gokart_image4_20112019081012.jpg" alt="First slide" height="500">
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="https://acekarts.com.au/assets/Uploads/drifting-around-corner.jpg" alt="First slide slide" height="500">
			</div>
		</div>
      </div>
    </div>

	</section>

<br><br><br>
<section>
<div class="container">

	  <div class="row">
	  <div class="col-xl-6 col-md-6" data-aos="zoom-out" data-aos-delay="400">
		  <div class="service-item float-right">
			<img src="https://tempat.com/blog/wp-content/uploads/2019/12/Gokart-Boyolali.jpg" alt="" width="500" style="border-radius: 24px;">
		  </div>
		</div>


		<div class="col-xl-6 col-md-6 d-flex" data-aos="zoom-out">
		  <div class="service-item position-relative">
		  <h3><b>GO KART</b></h3>

		  <p>Gokar adalah varian dari kendaraan roda empat atap terbuka sederhana dan kecil untuk olahraga motor. Gokar biasanya berpacu di sirkuit skala kecil. Balapan gokar biasanya dianggap sebagai batu loncatan untuk olahraga motor yang lebih tinggi dan lebih mahal.</p>
		  </div>
		</div>

	  </div>

	</div>
    </section>

    <br><br><br><br>

	<div style="text-align: center;">
			<h3><b>KAMI MEMILIKI YANG ANDA BUTUHKAN</b></h3>
			<h6 style="color: #6e6e6e;padding-top: 10px;">Ini jadwal yang sedang sudah terisi di tempat Go Kart kami.</h6>
			<br>
		</div>

	<div class="container">
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Sesi</th>
                    <th>Jam</th>
                    <th>Kart</th>
                </tr>
            </thead>
			<?php
			$awal = set_value('awal', date('Y-m-01'));
			$akhir = set_value('akhir', date('Y-m-31'));
			?>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT * FROM tb_jadwal j INNER JOIN tb_transaksi t ON
            t.id_transaksi=j.id_transaksi INNER JOIN tb_customer c ON c.id_cust=t.id_cust INNER JOIN tb_jam j2 ON
            j2.id_jam=t.id_jam INNER JOIN tb_kart k ON k.id_kart=j.id_kart WHERE (nm_cust LIKE '%$q%' OR no_telp LIKE
            '%$q%' OR email LIKE '%$q%') LIMIT 5");
            $no = 0;
            // var_dump($rows);
            // die();
            foreach ($rows as $row) :  ?>
            <tr>
              <td><?= ++$no ?></td>
              <td><?= $row->tanggal ?></td>
              <td><?= $row->nm_cust ?></td>
              <td><?= $row->nm_jam ?></td>
              <td><?= substr($row->mulai, 0, 5) ?>-<?= substr($row->selesai, 0, 5) ?></td>
              <td><?= $row->nm_kart ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
	<a href="jadwal.php" class="btn btn-info">Lihat Semua Jadwal</a>
	</div>

    <br><br>
    <section id="kirimsekarang" class="kirimsekarang container">
	  <div class="container">
			<div class="row ksk">
				<div class="col-md-8">
					<h3><b>Ingin bermain Go Kart?</b></h3>
				</div>
				<div class="col-md-4">
					<div>
						<b><a href="pesan.php" class="button">Pesan Tiket</a></b>
					</div>
				</div>
			</div>
	  </div>
    </section>

    <br><br><br>

	

    <section>
	<div class="container">
	<div style="text-align: center;">
			<h3><b>The Karts</b></h3>
			<h6 style="color: #6e6e6e;padding-top: 10px;">Find and prove a gokart with 4 stroke power , 350 cc and a power up to 8.4 hp / 3600 rpm, very steady driven by anyone who wants to test the adrenaline and courage themselves.</h6>
			<br>
		</div>
    <div class="row">
      <div class="col-sm-6 py-3 py-sm-0">
        <div class="card box-shadow">
          <img src="https://yogyagokart.com/assets/upload/kart/kart_09012019053155.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Gokart Double</h5>
            <p class="card-text">Requirement: For adults and children.
								Features: head rest & safety belt.
								Frame: Body iron (stronger and safer).
								Engine volume: 350CC.
								Engine: 4 strokes, single cylinder.
								Power: 8,4 hp/3600 rpm.
								Max speed: 60 km/h.
								</p>
            <a href="#" class="btn btn-info">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 py-3 py-sm-0">
        <div class="card box-shadow">
          <img src="https://yogyagokart.com/assets/upload/kart/kart_09012019053212.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Gokart Talon</h5>
            <p class="card-text">Requirement: For children aged 6-12 years.
								Features: head rest & safety belt.
								Frame: Body iron (stronger and safer).
								Engine volume: 200CC.
								Engine: 4 strokes, single cylinder.
								Power: 8,4 hp/3600 rpm.
								Max speed: 40 km/h.</p>
            <a href="#" class="btn btn-info">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
	<br>
	<div class="row">
      <div class="col-sm-6 py-3 py-sm-0">
        <div class="card box-shadow">
          <img src="https://yogyagokart.com/assets/upload/kart/kart_09012019053224.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Gokart Eagle</h5>
            <p class="card-text">Requirement: for adults / 13 years and older.
								Features: head rest & safety belt.
								Frame: Body iron (stronger and safer).
								Engine volume: 350CC.
								Engine: 4 strokes, single cylinder.
								Power: 8,4 hp/3600 rpm.
								Max speed: 60 km/h.
								</p>
            <a href="#" class="btn btn-info">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 py-3 py-sm-0">
        <div class="card box-shadow">
          <img src="https://yogyagokart.com/assets/upload/kart/kart_09012019053236.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Gokart Pro</h5>
            <p class="card-text">Requirement: For adults / professional / VIP member.
								Features: head rest & safety belt.
								Frame: Plastic body (Mild).
								Engine volume: 350CC.
								Engine: 4 strokes, single cylinder.
								Power: 8,4 hp/3600 rpm.
								Max speed: 80 km/h.</p>
            <a href="#" class="btn btn-info">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
    <br><br>

	<section>
	<footer class="footer-section">
		<div class="copyright-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-left text-lg-left">
						<div class="copyright-text text-center text-light">
                            Copyright © 2022, All Right Reserved Sistem Penjadwalan Tiket Go Kart
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</section>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

</body>
</html>
