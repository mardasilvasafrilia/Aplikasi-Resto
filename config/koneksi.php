<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'resto';

$koneksi = mysqli_connect($host,$username,$password,$database);

if ($koneksi->connect_error) {
     die("Koneksi Gagal !".$koneksi->connect_error);
}
?>