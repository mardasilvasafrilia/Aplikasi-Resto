<?php
$nomor_transaksi    = $_POST['nomor_transaksi'];
$id_transaksi       = $_POST['id_transaksi'];
$id_menu            = $_POST['id_menu'];
$harga_menu         = $_POST['harga_menu'];
$jumlah_menu        = $_POST['jumlah_menu'];

$total_harga        = $harga_menu * $jumlah_menu;

$query_update_tr = $koneksi->query("UPDATE detail_transaksi
                                    SET jumlah_menu = '$jumlah_menu',
                                        total_harga = '$total_harga'
                                        WHERE 
                                        id_transaksi = '$id_transaksi' AND 
                                        id_menu = '$id_menu'
                                        ");

if ($query_update_tr) {
    ?>
    <script>
        // window.alert('Data Berhasil di UPDATE');
        window.location.href='?page=transaksi_detail-create&nomor_transaksi=<?= $nomor_transaksi ?>';
    </script>
    <?php

}
?>