<?php
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];

//Query untuk menampilkan semua transaksi berdasarkan tgl awal dan akhir
$query_select_tr = $koneksi->query("SELECT * FROM transaksi 
                                    JOIN user ON transaksi.id_user = user.id_user
                                    WHERE waktu_transaksi 
                                    BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'");

//menghitung jumlah trsansksi dari hasil query select transaksi  brdasarkan tgl awal dan akhir 
$jumlahtransaksi = mysqli_num_rows($query_select_tr);

//MENGHITUNG TOTAL GRAND HARGA BERDASARKAN TGL AWAL DAN AKHIR
$query_select_sum = $koneksi->query("SELECT SUM(grand_total_harga) AS total_pendapatan 
                                        FROM transaksi
                                        WHERE waktu_transaksi 
                                        BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59'");

$total_pendapatan = $query_select_sum->fetch_object()->total_pendapatan;

?>
<br>
<center>
    <img src="../../assets/image/logo.png" alt="logo-resto-silva" width="300" >
    <p><span style="font-size: xx-large;">Mardasilva Resto</span></p>
    <br>Laporan Transaksi Penjualan<br>Periode <?= $tgl_awal ?> - <?= $tgl_akhir ?></p>
</center>
<center>
    <a href="../laporan/laporan-print.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" target="_blank">
    <button class="btn btn-secondary">Print</button></a>
</center>
<table>
    <tr>
        <td>Total Pendapatan : </td>
        <td> Rp. <?= number_format($total_pendapatan,2,",",".") ?></td>
    </tr>
    <tr>
        <td>Jumlah Transaksi :</td>
        <td> <?= $jumlahtransaksi ?> Transaksi</td>
    </tr>
</table>
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
        <td colspan="3" style="text-align: right;"><h4>Total Pendapatan</h4></td>
        <td><h4>Rp. <?= number_format($total_pendapatan,2,",",".") ?></h4></td>
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
            <?php echo $_SESSION['role'] ?>
            <br><br><br>
            <?php echo $_SESSION['nama_user'] ?>
        </p>
    </div>