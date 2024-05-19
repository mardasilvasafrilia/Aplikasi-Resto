<div class="row">

    <div class="col-12 ">
        <h4 class="text-center mt-3 mb-3">Detail Menu yang sudah di pesan </h4>
        <table class="table table-striped">
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Menu</th>
                <th style="text-align: center;">Harga</th>
                <th style="text-align: center;">Jumlah</th>
                <th style="text-align: center;">Total Harga</th>
            </tr>
    <?php
    $no =1;
    $query_select_dt = $koneksi->query("SELECT * FROM detail_transaksi 
                                        JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
                                        JOIN menu ON detail_transaksi.id_menu = menu.id_menu
                                        WHERE transaksi.nomor_transaksi = '$_GET[nomor_transaksi]'
                                         ");
    while ($hasil_select_dt = $query_select_dt->fetch_object()) {
        ?>
            <tr>
                <td style="text-align: center;"><?= $no ?></td>
                <td style="text-align: center;"><?= $hasil_select_dt->nama_menu ?></td>
                <td width="15%" style="text-align: center;"><?= $hasil_select_dt->harga_menu ?></td>
            <form action="?page=transaksi_detail-update" method="POST">
                <td width="15%">
                    <input name="nomor_transaksi" value="<?= $hasil_select_dt->nomor_transaksi ?>" type="text" hidden>
                    <input name="id_transaksi" value="<?= $hasil_select_dt->id_transaksi ?>" type="text" hidden>
                    <input name="id_menu" value="<?= $hasil_select_dt->id_menu ?>" type="text" hidden>
                    <input name="harga_menu" value="<?= $hasil_select_dt->harga_menu ?>" type="number" hidden>
                    <input style="text-align: center;"type="number" name="jumlah_menu"  value="<?= $hasil_select_dt->jumlah_menu ?>">
                    <input type="submit" hidden>
                    
                </td>
            </form>
                <td width="15%" style="text-align: center;"><?= $hasil_select_dt->total_harga ?></td>
            </tr>
        <?php
        $no++;
    }                                     
    
    ?>
        <tr>
            <?php
            $query_select_tr = $koneksi->query("SELECT * FROM transaksi
                                                WHERE nomor_transaksi = '$_GET[nomor_transaksi]' ");
            $id_transaksi = $query_select_tr->fetch_object()->id_transaksi;

            $query_sum_dt = $koneksi->query("SELECT SUM(total_harga) AS grandtotal
                                            FROM detail_transaksi WHERE id_transaksi = '$id_transaksi' ");

            $grand_total = $query_sum_dt->fetch_object()->grandtotal;
            ?>
            <td colspan="3"></td>
            <td colspan="1"><b>Grand Total</b></td>
            <td colspan="2"><b>Rp. <?= number_format($grand_total,2,".",".")?></b></td>
        </tr>   
        </table>
    </div>
</div>