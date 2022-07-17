<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>BREMGRA GO KART</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
      <link
          href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

      <!-- overlayScrollbars -->
      <!-- <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
      <!-- Daterange picker -->
      <!-- <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css"> -->
      <!-- summernote -->
      <!-- <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css"> -->

      <!-- <link rel="stylesheet" href="assets/dist/css/main.css"> -->
      <!-- Favicons -->
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">BREMGRA GO KART</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul class="">
                <li class="nav-item text-light"><a class="nav-link text-light" href="/Algen">Beranda</a></li>
                <li class="nav-item text-light"><a href="jadwal.php " class="nav-link text-light">Jadwal</a></li>
                <li class="nav-item text-light"><a href="pesan.php" class="nav-link text-light">Pesan Tiket</a></li>
                <li class="nav-item text-light"><a href="p.php?m=login" class="nav-link text-light">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->


    </div>
</header><!-- End Header -->
    <br>
<div class="container">

		<div style="text-align: center;">
			<h3><b>PESAN TIKET KAMU DI SINI</b></h3>
			<h6 style="color: #6e6e6e;padding-top: 10px;">Isi form pemesanan</h6>
			<br>
		</div>
        <form action="pesan.php" method="post" name="form1">
        <tr><td>
            <p class="form-group">
                <label for="nm_cust">Nama :</label></td>
                <td><input class="form-control"  type="text" name="nm_cust" id="nm_cust" autocomplete="off" required></td>
            </p>
            </tr>
            <tr><td>
            <p class="form-group">
                <label for="telpon">Telpon :</label></td>
            <td> <input class="form-control"  type="number" name="no_telp" id="no_telp" autocomplete="off" required></td>
            </p></tr>
            <tr><td>
            <p class="form-group">
                <label for="email">Email :</label></td>
                <td><input class="form-control"  type="email" name="email" id="email" autocomplete="off" required></td>
            </p></tr>
            <tr><td>
            <input type="submit" class="btn btn-success" value="Daftar Go Kart" name="Submit" >
        </form>
        
        <?php
 
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $nm_cust = $_POST['nm_cust'];
            $no_telp = $_POST['no_telp'];
            $email = $_POST['email'];
            
            // include database connection file
            include_once("config.php");
                    
            // Insert user data into table
            $result = mysqli_query($mysqli, "INSERT INTO tb_customer(nm_cust,no_telp,email) VALUES('$nm_cust','$no_telp','$email')");
            
            // Show message when user added
            echo "<br><br><br><h3 class='text-center'>Pendaftaran Berhasil Silahkan Hubungi Admin Untuk Menentukan Waktu dan Pembayaran</h3>
            <a href='https://api.whatsapp.com/send?phone=62811493175&text=Mohon%20Melengkapi%20Form%20Pendaftaran%20Booking%0ATanggal%20Booking%20%3A%20%0ANama%20yang%20sudah%20didaftarkan%20%3A%20%0ASesi%20%3A%20%0AHarga%20%3A%20Rp.%20100.000%2Fsesi%0ASilahkan%20melakukan%20pembayaran%20dan%20mengirim%20bukti%20pembayaran.'class='center btn btn-info' target='_blank'>Hubungi via Whatsapp</a>";
        }
        ?>

        </div>
        </div>


        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
