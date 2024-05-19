<?php
include("../../config/koneksi.php");
session_start();
include('../login/login-session-cek.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mardasilva | Restaurant</title>
		<meta charset="utf-8" />
		<!-- bootstrap 1 -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.css">
		<!-- bootstrap 2 -->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../customer/assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../../customer/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../../customer/assets/css/noscript.css" /></noscript>
		 <!-- fontawesome -->
		 <link href="../../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
		 <link href="../../assets/fontawesome/css/brands.css" rel="stylesheet">
		 <link href="../../assets/fontawesome/css/solid.css" rel="stylesheet">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
                    <div class="container-fluid ">
                    <div class="row">
				<header id="header" class="alt">
					<a href="index.php" class="logo"><strong> <?= $_SESSION['nama_user'] ?> </strong></a>
					<nav>
						<a href="#menu">Navbar</a>
					</nav>
				</header>
                    </div>
				<!-- Menu -->
                    <div class="row">
                    <div class="col">
				<nav id="menu">
					<ul class="links">
					<li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'home'?'link-success':'' ?>" href="?page=home">Home</a>
                                   </li>
                                   <?php
                                   if ($_SESSION['role'] == 'admin') {                                       
                                   ?>
                                   <li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'role_user'?'link-success':'' ?>" href="?page=role_user">Role</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'user'?'link-success':'' ?>" href="?page=user">User</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'kategori_menu'?'link-warning':'' ?>" href="?page=kategori_menu">Kategori Menu</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'menu'?'link-danger':'' ?>" href="?page=menu">Menu</a>
                                   </li>
                                   <?php
                                   }
                                   ?>
                                   <li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'transaksi'?'link-success':'' ?>" href="?page=transaksi">Transaksi</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link <?= $_GET['page'] == 'laporan'?'link-success':'' ?>" href="?page=laporan">Laporan</a>
                                   </li>
            		</ul>
						</nav>
                              </div>
          </div>
					<!-- Packages -->
					<section class="tiles">
					<?php
                    if ($_SESSION['role'] == 'admin') {
                         if ($_GET) {
                              $page = $_GET['page'];
                              switch ($page) {
                                   case 'home':
                                        include('../home/home.php');
                                        break;
                                   case 'role_user':
                                        include('../role_user/role_user.php');
                                        break;
                                   case 'role-create':
                                        include('../role_user/role-create.php');
                                        break;
                                   case 'role-edit':
                                        include('../role_user/role-edit.php');
                                        break;
                                   case 'role-update':
                                        include('../role_user/role-update.php');
                                        break;
                                   case 'role-delete':
                                        include('../role_user/role-delete.php');
                                        break;
                                   case 'role-store':
                                        include('../role_user/role-store.php');
                                        break;
                                   case 'user':
                                        include('../user/user.php');
                                        break;
                                   case 'user-create':
                                        include('../user/user-create.php');
                                        break;
                                   case 'user-store':
                                        include('../user/user-store.php');
                                        break;
                                   case 'user-edit':
                                        include('../user/user-edit.php');
                                        break;
                                   case 'user-update':
                                        include('../user/user-update.php');
                                        break;
                                   case 'user-delete':
                                        include('../user/user-delete.php');
                                        break;
                                   case 'kategori_menu':
                                        include('../kategori_menu/kategori_menu.php');
                                        break;
                                   case 'kategori_menu-create':
                                        include('../kategori_menu/kategori_menu-create.php');
                                        break;
                                   case 'kategori_menu-store':
                                        include('../kategori_menu/kategori_menu-store.php');
                                        break;
                                   case 'kategori_menu-edit':
                                        include('../kategori_menu/kategori_menu-edit.php');
                                        break;
                                   case 'kategori_menu-update':
                                        include('../kategori_menu/kategori_menu-update.php');
                                        break;
                                   case 'kategori_menu-delete':
                                        include('../kategori_menu/kategori_menu-delete.php');
                                        break;
                                   case 'menu':
                                        include('../menu/menu.php');
                                        break;
                                   case 'menu-create':
                                        include('../menu/menu-create.php');
                                        break;
                                   case 'menu-store':
                                        include('../menu/menu-store.php');
                                        break;
                                   case 'menu-edit':
                                        include('../menu/menu-edit.php');
                                        break;
                                   case 'menu-update':
                                        include('../menu/menu-update.php');
                                        break;
                                   case 'menu-delete':
                                        include('../menu/menu-delete.php');
                                        break;
                                   case 'transaksi':
                                        include('../transaksi/transaksi.php');
                                        break;
                                   case 'transaksi-store':
                                        include('../transaksi/transaksi-store.php');
                                        break;
                                   case 'transaksi_detail-create':
                                        include('../transaksi/transaksi_detail-create.php');
                                        break;
                                   case 'transaksi_detail-store':
                                        include('../transaksi/transaksi_detail-store.php');
                                        break;
                                   case 'transaksi_detail-delete':
                                        include('../transaksi/transaksi_detail-delete.php');
                                        break;
                                   case 'transaksi_detail-update':
                                        include('../transaksi/transaksi_detail-update.php');
                                        break;
                                   case 'transaksi-detail':
                                        include('../transaksi/transaksi-detail.php');
                                        break;
                                   case 'transaksi-final':
                                        include('../transaksi/transaksi-final.php');
                                        break;
                                   case 'laporan':
                                        include('../laporan/laporan.php');
                                        break;
                                   case 'laporan-cari':
                                        include('../laporan/laporan-cari.php');
                                        break;
                                   case 'laporan-print':
                                        include('../laporan/laporan-print.php');
                                        break;
                                   case 'logout':
                                        include('../login/logout.php');
                                        break;
                                   default: 
                                        echo '<center>Halaman Tidak Ada !</center>';
                                        break;
                              }
                         }
                    }else{
                         if ($_GET) {
                              $page = $_GET['page'];
                              switch ($page) {
                                   case 'home':
                                        include('home.php');
                                        break;
                                   case 'transaksi':
                                        include('transaksi.php');
                                        break;
                                   case 'transaksi-store':
                                        include('transaksi-store.php');
                                        break;
                                   case 'logout':
                                        include('logout.php');
                                        break;
                                   default: 
                                        echo '<center>Halaman Tidak Ada !</center>';
                                        break;
                              }
                         }
                    }
                    
                    ?>
					</section>
				<!-- Footer -->
				<footer id="footer">
						<ul class="copyright">
							<li>Copyright © 2020 Company Mrdslv :</li>
							<li> <a href="https://www.phpjabbers.com/">Mardasilva safrilia</a></li>
						</ul>
				</footer>

			</div>
               </div>
     </div>
		<!-- Scripts -->
		<script src="../../customer/assets/js/jquery.min.js"></script>
			<script src="../../customer/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="../../customer/assets/js/jquery.scrolly.min.js"></script>
			<script src="../../customer/assets/js/jquery.scrollex.min.js"></script>
			<script src="../../customer/assets/js/browser.min.js"></script>
			<script src="../../customer/assets/js/breakpoints.min.js"></script>
			<script src="../../customer/assets/js/util.js"></script>
			<script src="../../customer/assets/js/main.js"></script>
		<!--bootstrap js -->
     <script src="../../assets/js/bootstrap.bundle.js"></script>
     <script src="../../assets/js/bootstrap.js"></script>
	</body>
</html>