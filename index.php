<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// ...existing code...
// index.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Gunakan include_once/require_once
include_once "config/fungsi.php";
include_once "config/koneksi.php";

// Proses logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
// // include "e-kasir/config/fungsi.php";
// if (!empty($_SESSION['username'])) {
 	@$user = $_SESSION['username'];
 	@$id_user = $_SESSION['id_user'];
// }
// $qNotif = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM pesanan WHERE is_read=0");
// $dataNotif = ($qNotif) ? mysqli_fetch_assoc($qNotif) : ['jumlah' => 0];
// $jumlah_notif = $dataNotif['jumlah'];
// $qListNotif = mysqli_query($koneksi, "SELECT id_pesanan, id_pelanggan, tanggal_pesanan FROM pesanan WHERE is_read=0 ORDER BY tanggal_pesanan DESC LIMIT 5");
// $daftarNotif = [];
// while ($row = mysqli_fetch_assoc($qListNotif)) {
//     $daftarNotif[] = $row;
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="navbar-fixed-top.css" rel="stylesheet">

	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>
	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="plugins/raphael/raphael.min.js"></script>
	<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<!-- ChartJS -->
	<!-- My CSS -->
	<link rel="stylesheet" href="styledasboard.css">
	<title>SIBO Dashboard</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminSIBO</span>
		</a>
		<ul class="side-menu top" id="sidebarMenu">
			<li class="active">
				<a href="?p=dashboard">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="?p=karyawan">
					<i class='bx  bxs-dollar-circle'></i>
					<span class="text">Manajemen Karyawan</span>
				</a>
			</li>
			<li>
				<a href="?p=list_barang">
					<i class='bx  bxs-dollar-circle'></i>
					<span class="text">List Barang</span>
				</a>
			</li>
			<li>
				<a href="?p=pesanan">
					<i class='bx  bxs-receipt'></i>
					<span class="text">Pesanan</span>
				</a>
			</li> 
			<li>
				<a href="?p=transaksi">
					<i class='bx  bxs-archive'></i>
					<span class="text">Transaksi</span>
				</a>
			</li>
			<li>
				<a href="?p=laporan">
					<i class='bx  bxs-receipt'></i>
					<span class="text">Laporan</span>
				</a>
			</li> 
		</ul>
		<ul class="side-menu">

			<li>
				<a href="index.php?logout=1" class="logout">
					<i class='bx bxs-log-in-circle'></i>
					<span class="text">Masuk</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Beranda</a>
			<form action="#">
				<div class="form-input">
					<input type="search" id="menuSearch" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<!-- Notification Bell with Dropdown -->
			<!-- <div class="dropdown" style="display:inline-block; position:relative;">
    			<a href="#" class="notification dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="notifDropdown">
        			<i class='bx bxs-bell'></i>
        			
   				</a>
    			 -->
			<a href="#" class="profile">
				<img src="source/SIBO_logo_smaller_transparent-transformed.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<!-- <h1>Dashboard</h1> -->
					<ul class="breadcrumb">
						<!-- <li>
							<a href="#">Dashboard</a>
						</li> -->
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="index.php">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>
			<?php

			if (!empty($_SESSION['username'])) {
				// $user = $_SESSION['username'];


				$p = $_GET['p'] ?? '';
				switch ($p) {

					case 'login':
						include "login.php";
						break;

					case 'dashboard':
						include "dashboardAdmin.php";
						break;

					case 'karyawan':
						include "karyawan.php";
						break;

					case 'list_barang':
						include "list_barang.php";
						break;

					case 'edit_barang':
						include "edit_barang.php";
						break;

					case 'tambah_barang':
						include "page/tambah_barang.php";
						break;

					case 'pesanan':
						include "page/pesanan.php";
						break;

					case 'transaksi':
						include "page/transaksi.php";
						break;

					case 'detail_transaksi':
						include "page/detail_transaksi.php";
						break;

					case 'laporan':
						include "page/laporan.php";
						break;

					default:
						include "dashboardAdmin.php";
						break;
				}
			} else {
				include "home.php";
			}

			?>
		</main>
		<!-- MAIN -->
	</section>
     
	<!-- CONTENT -->


	<script src="script.js"></script>
    <footer class="footer text-center py-3" style="background:#f8f9fa; border-top:1px solid #e3e3e3; position:fixed; bottom:0; left:0; width:100%; z-index:999;">
    	<span>Copyright &copy; <?= date('Y') ?> by ninoTech</span>
	</footer>
</body>

</html>