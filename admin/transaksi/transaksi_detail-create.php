<div class="row">
    <div class="col-4 ">
        <h4 class="text-center mt-3 mb-3">Tambah Menu Pesanan</h4>
        <form action="?page=transaksi_detail-store" method="POST">
            <input value="<?= $_GET['nomor_transaksi'] ?>" type="text" name="nomor_transaksi" hidden>
            <select name="id_menu" class="form-control text-center mb-2" required>
                <option value="">--Pilih Menu--</option>
                <?php
                $query_select_menu = $koneksi->query('SELECT * FROM menu');
                while ($hasil_select_menu= $query_select_menu->fetch_object()) {
                ?>
                <option value="<?= $hasil_select_menu->id_menu?>">
                    <?= $hasil_select_menu->nama_menu?>
                </option>
                <?php
                }
                ?>
            </select>
            <input type="number" name="jumlah_menu" class="form-control text-center mb-2" placeholder="Isikan Jumlah Menu" required>
            <div class="d-grid gap-2 mb-2">
            <button type="submit" class="btn btn-success">
                Tambah
            </button>
            </div>
        </form>
    </div>
    <div class="col-8 ">
        <h4 class="text-center mt-3 mb-3">Menu Yang Telah Dipesan</h4>
        <table class="table table-striped">
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Menu</th>
                <th style="text-align: center;">Harga</th>
                <th style="text-align: center;">Jumlah</th>
                <th style="text-align: center;">Total Harga</th>
                <th> =--=</th>
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
                    <input style="text-align: center;" class="form-control" type="number" min="1" 
                    name="jumlah_menu"  value="<?= $hasil_select_dt->jumlah_menu ?>">
                    <input type="submit" hidden>
                    
                </td>
            </form>
                <td width="15%" style="text-align: center;"><?= $hasil_select_dt->total_harga ?></td>
                <td>
                    <a href="?page=transaksi_detail-delete&id_detail_transaksi=<?= $hasil_select_dt->id_detail_transaksi ?>&nomor_transaksi=<?= $hasil_select_dt->nomor_transaksi ?>">
                        <button class="btn btn-danger" >X</button>
                    </a>
                </td>
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
        <tr>
            <td colspan="6">
                <div class="d-grid">
                    <form action="?page=transaksi-final" method="post">
                        <input value=" <?= $id_transaksi ?>" type="text" name="id_transaksi" hidden>
                        <input value=" <?= $grand_total ?>" type="text" name="grand_total" hidden>
                        <button class="btn btn-primary" type="submit"><b>Selesaikan Transaksi</b></button>
                    </form>
                </div>
            </td>
        </tr>                            
        </table>
    </div>
</div>