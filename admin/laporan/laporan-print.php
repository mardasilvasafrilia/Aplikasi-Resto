<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <!-- fontawesome -->
    <link href="../../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../assets/fontawesome/css/solid.css" rel="stylesheet">

</head>
<body>
        <?php
        include("../../config/koneksi.php");
        $tgl_awal = $_GET['tgl_awal'];
        $tgl_akhir = $_GET['tgl_akhir'];

        $query_select_tr = $koneksi->query("SELECT * FROM transaksi 
                                            JOIN user ON transaksi.id_user = user.id_user
                                            WHERE waktu_transaksi 
                                            BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'");
    

        // var_dump($hasil_query_tr);
        ?>
        <center><img src="../../assets/image/logo.png" alt="logo-resto-silva" width="300" ></center>
        <center>
            <p><span style="font-size: xx-large;">Mardasilva Resto</span></p>
            <br>
            <p>Laporan Transaksi Penjualan</p>
        </center>
        <center><p>Periode <?= $tgl_awal ?> - <?= $tgl_akhir ?></p></center>
        </a>
        <table class="table table-striped">
            <tr>
                <td>No</td>
                <td>Waktu Transaksi</td>
                <td>Nomor Invoice</td>
                <td>Grand Total Harga</td>
                <td>Nama Pembeli</td>
                <td>Nama Petugas</td>
                <td>Status Transaksi</td>
            </tr>
            <?php
            $query_select_sum = $koneksi->query("SELECT SUM(grand_total_harga) AS total_pendapatan 
            FROM transaksi
            WHERE waktu_transaksi 
            BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'");

            $total_pendapatan = $query_select_sum->fetch_object()->total_pendapatan;
            
            $no = 1;
            while($hasil_query_tr = $query_select_tr->fetch_object()) {
                ?>
                <tr>
                <td><?= $no ?></td>
                <td><?= $hasil_query_tr->waktu_transaksi ?></td>
                <td><?= $hasil_query_tr->nomor_transaksi ?></td>
                <td><?= $hasil_query_tr->grand_total_harga ?></td>
                <td><?= $hasil_query_tr->nama_pembeli ?></td>
                <td><?= $hasil_query_tr->nama_user ?></td>
                <td><?= $hasil_query_tr->status_transaksi ?></td>
            </tr>
            <?php
            $no++;
            }
            ?>
             <tr>
                <td colspan="3" style="text-align: right;"><h6>Total Pendapatan</h6></td>
                <td><h6>Rp.<?=number_format($total_pendapatan,2,",",".") ?></h6></td>
                <td colspan="3"></td>
            </tr>
   
</table>
    <style>
        .ttd-petugas{
            float: right;
            text-align: left;
            width: 250px;
        }
    </style>
    <div class="ttd-petugas">
        <p>
            Bekasi,<?= date("d M Y"); ?> <br>
            <?php session_start(); echo $_SESSION['role'] ?>
            <br><br><br>
            <?php echo $_SESSION['nama_user'] ?>
        </p>
    </div>
<script>
  window.print();
</script>
</body>
</html>

