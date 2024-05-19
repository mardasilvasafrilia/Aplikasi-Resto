<!--DESAIN INVOICE-->
<?php
include('../../config/koneksi.php');

$id_transaksi = $_GET['id_transaksi'];
$query_select_tr = $koneksi->query("SELECT * FROM transaksi WHERE
                                    id_transaksi = '$id_transaksi'");
$hasil_select_tr = $query_select_tr->fetch_object();

$query_select_dt = $koneksi->query("SELECT * FROM detail_transaksi 
                                    JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
                                    JOIN menu ON detail_transaksi.id_menu = menu.id_menu
                                    WHERE transaksi.id_transaksi = '$id_transaksi'
                                    ");
$waktu_transaksi  = $hasil_select_tr->waktu_transaksi;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>INVOICE <?= $hasil_select_tr->nomor_transaksi ?></title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <div id="company">
        <h2 class="name">Mardasilva Resto</h2>
        <div>Summarecon Mall Bekasi </div>
        <div>Kota Bekasi, 17143, (0896)-6520-7575</div>
        <div><a href="mailto:mrdslvresto@gmail.com">mrdslvresto@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">(-Nama Pelanggan-)</h2>
          <div class="address">Kp.pintu air rt.04/07 no. 16</div>
          <div class="email"><a href="mailto:mrdslvresto@gmail.com">mrdslvresto@gmail.com</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice:  <?= $waktu_transaksi; ?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
          <th>No</th>
          <th>Nama Menu</th>
          <th>Deskripsi Menu</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Total</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <?php
          $no = 1;
          while ($hasil_select_dt = $query_select_dt->fetch_object()) {
            
          

          ?>
     </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no"><?= $no ?></td>
            <td class="desc"><?= $hasil_select_dt->nama_menu ?></td>
            <td class="unit"><?= $hasil_select_dt->deskripsi_menu ?></td>
            <td class="qty"><?= $hasil_select_dt->harga_menu ?></td>
            <td class="qty"><?= $hasil_select_dt->jumlah_menu ?></td>
            <td class="total"><?= $hasil_select_dt->total_harga ?></td>
          </tr>
          
        </tbody>
      <?php
      $no++;
        }
        ?>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>Rp. <?= number_format($hasil_select_tr->grand_total_harga,2,".",".") ?></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>

<script>
  window.print();
</script>