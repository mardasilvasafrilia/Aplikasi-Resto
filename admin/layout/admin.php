<?php
include("../../config/koneksi.php");
session_start();
include('../login/login-session-cek.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>RESTORAN SILVA</title>

     <!-- bootstrap -->
     <link rel="stylesheet" href="../../assets/css/bootstrap.css">

     <!-- fontawesome -->
     <link href="../../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
     <link href="../../assets/fontawesome/css/brands.css" rel="stylesheet">
     <link href="../../assets/fontawesome/css/solid.css" rel="stylesheet">
</head>
<body>
      
     <!--header-->
     <div class="container-fluid ">
          <div class="row">
               <div class="col">
               <div  style="background-image: url('../../assets/image/logo.png');background-repeat:no-repeat;background-position:center"
                 class="p-4 p-lg-6 bg-light rounded-3 text-center">

                    <br>
                    <h1 class="display-5 fw-bold bg-light">RESTOURANT MARDASILVA</h1>
                    <br>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                         <div class="container-fluid">
                         <a class="navbar-brand" href="#">Navbar</a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                         </button>
                         <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                              <form class="d-flex" role="search">
                                   <a href="?page=logout">
                                   <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ff0000;"></i>
                                   </a>
                              </form>
                         </div>
                         </div>
                    </nav>
               </div>
          </div>
          <div class="row">
               <div class="col">
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
               </div>
          </div>
          <div class="row">
               <div class="col fixed-bottom">
                    <center>Copyright &copy; mardasilva safrilia</center>
               </div>
          </div>
     </div>
     <!--bootstrap js -->
     <script src="../../assets/js/bootstrap.bundle.js"></script>
</body>
</html>