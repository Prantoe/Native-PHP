<?php
include 'functions.php';
error_reporting(E_ALL ^ E_WARNING); 
if(empty($_SESSION[login]))
header("location:p.php?m=login");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="assets/dist/css/general.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="">
		     <b>

         <?php
            $rows = $db->get_results("SELECT * FROM tb_admin WHERE id_admin");
            foreach ($rows as $row) : ?>
            <?= $row->nm_admin ?>
            <?php endforeach; ?>

         </b>
        </a>
        
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-3">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      PANEL ADMIN
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Master Data</li>
          <li class="nav-item">
            <a href="?m=home" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Home</p>
            </a>
          </li>

		  <li class="nav-item">
            <a href="?m=customer" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Customer</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="?m=transaksi" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Transaksi</p>
            </a>
          </li>

		  <li class="nav-item">
            <a href="?m=kart" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Kart</p>
            </a>
          </li>

		  <li class="nav-item">
            <a href="?m=jam" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Jam</p>
            </a>
          </li>





		  <li class="nav-header">Proses Jadwal</li>

		  <li class="nav-item">
            <a href="?m=hitung" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Generate Jadwal</p>
            </a>
          </li>

		  <li class="nav-item">
            <a href="?m=hasil" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Hasil Jadwal</p>
            </a>
          </li>


		  <li class="nav-header">Panel Admin</li>

      <li class="nav-item">
            <a href="?m=admin" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Admin</p>
            </a>
          </li>

		  <li class="nav-item">
            <a href="aksi.php?act=logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Keluar Dari Panel</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <!-- Main row -->

		<br>

		<div class="container-fluid">
		<?php
		if (!in_array($mod, array('login', 'home', '', 'hasil')) && !_session('login'))
			$mod = 'login';
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Clarisa Kristi.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
</body>
</html>
