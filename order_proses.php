<?php
include("config/koneksi.php");
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Mardasilva | Restaurant</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="customer/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="customer/assets/css/main.css" />
    <noscript>
      <link rel="stylesheet" href="customer/assets/css/noscript.css" />
    </noscript>
  </head>
  <body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- Header -->
      <header id="header" class="alt">
        <a href="index.php" class="logo">
          <strong> レストラン</strong>
          <span>Mrdslvsfr</span>
        </a>
        <nav>
          <a href="#menu">Menu</a>
        </nav>
      </header>
      <!-- Menu -->
      <nav id="menu">
        <ul class="links">
          <li>
            <a href="index.php">Home </a>
          </li>
          <li class="active">
            <a href="order.php">Order Now</a>
          </li>
          <!-- <li>
            <a href="menu.php">Menu</a>
          </li> -->
          <li>
            <a href="about-us.php">About Us</a>
          </li>
          <!-- <li><a href="blog.php">Blog</a></li><li><a href="testimonials.php">Testimonials</a></li> -->
          <li>
            <a href="contact.php">Contact Us</a>
          </li>
        </ul>
      </nav>
      <!-- Main -->
      <div id="main" class="alt">
        <!-- One -->
        <section id="one">
          <div class="inner">
            <header class="major">
              <h1>Order Now</h1>
            </header>
            <span class="image main">
              <img src="customer/images/book-table-fullscreen-1-1920x700.jpg" alt="" />
            </span>
          </div>
        </section>
      </div>
      <!-- Contact -->
      <?php 
      if(!empty($_GET['nomor_transaksi'])) {
        
      }else {
      ?>
      <script>
          window.alert('Anda harus masukan nama terlebih dahulu xD');
          window.location.href='order.php';
      </script>  
      <?php
      }
      ?>

      <section id="contact">
        <div class="inner">
          <section>
            <form action="" method="POST">
              <div class="fields">
                <div class="field half">
                  <label for="jumlah_menu">Jumlah Pesanan</label>
                  <input style="text-align:center;" type="text" name="jumlah_menu" placeholder="Jumlah Menu">
                  <input type="hidden" name="nomor_transaksi" value="<?= $_GET['nomor_transaksi']; ?>" />
                </div>
                <div class="field half">
                  <?php
                  $nomor_transaksi = $_GET['nomor_transaksi'];
                  $query = $koneksi->query("SELECT * FROM transaksi 
                                            WHERE nomor_transaksi = '$nomor_transaksi'");
                  $hasil= $query->fetch_object();
                  ?>
                  <label for="name">Nama</label>
                  <input style="text-align:center;" type="text" name="nama_pembeli" value="<?= $hasil->nama_pembeli ?>" placeholder="Nama Pembeli" disabled>
                </div>
                <div class="field">
                  <select name="id_menu">Menu </label>
                    <option value="">--Pilih Menu--</option> 
                    <?php
                      $query_select_menu = $koneksi->query('SELECT * FROM menu');
                        while ($hasil_select_menu= $query_select_menu->fetch_object()) {
					          ?>
                    <option value="<?= $hasil_select_menu->id_menu?>"> <?= $hasil_select_menu->nama_menu?> </option> 
                    <?php
                    }
					          ?>
                  </select>
                </div>
                <div class="field half">
                  <button type="submit" class="btn btn-success"> Tambah </button>
                </div>

               
                <div class="field">
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
                    if(!empty($_POST['nomor_transaksi']) && (!empty($_POST['jumlah_menu'])&& (!empty($_POST['id_menu'])))) {
                      $nomor_transaksi         = $_POST['nomor_transaksi'];
                      $query_select_transaksi  = $koneksi->query("SELECT * FROM transaksi WHERE nomor_transaksi='$nomor_transaksi'");
                      $id_transaksi            = $query_select_transaksi->fetch_object()->id_transaksi ;
                      $id_menu                 = $_POST['id_menu'];
                      $query_select_menu       = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                      $harga_menu              = $query_select_menu->fetch_object()->harga_menu ;
                      $jumlah_menu             = $_POST['jumlah_menu'];
                      $total_harga             = $harga_menu * $jumlah_menu ;

                      $query_insert_dt = $koneksi->query("INSERT INTO detail_transaksi 
                                                      VALUES ('', '$id_transaksi', '$id_menu',
                                                      '$jumlah_menu', '$total_harga')");
                      if ($query_insert_dt) 
                      {
                            ?>
                                <script>
                                      window.alert('Data berhasil disimpan!');
                                      window.location.href='order_proses.php?nomor_transaksi=<?= $nomor_transaksi ?>';
                                </script>
                            <?php
                      }
                      else
                      {
                            ?>
                                <script>
                                      window.alert('Data gagal disimpan!');
                                      window.location.href='';
                                </script>
                            <?php
                      }

                    }
                    ?>
                    <?php
                    $no =1;
                    $query_select_dt = $koneksi->query("SELECT * FROM detail_transaksi 
                                                        JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
                                                        JOIN menu ON detail_transaksi.id_menu = menu.id_menu
                                                        WHERE transaksi.nomor_transaksi = '$_GET[nomor_transaksi]'
                                                         ");
                    if(!empty($query_select_dt->num_rows)) {
                      while ($hasil_select_dt = $query_select_dt->fetch_object()) { ?>
                      <tr>
                        <td style="text-align: center;"><?= $no ?></td>
                        <td style="text-align: center;"><?= $hasil_select_dt->nama_menu ?></td>
                        <td style="text-align: center;"><?= $hasil_select_dt->harga_menu ?></td>
                        <td style="text-align: center;"><?= $hasil_select_dt->jumlah_menu ?></td>
                        <td style="text-align: center;"><?= $hasil_select_dt->total_harga ?></td>
                        <td>
                          <a class="btn btn-danger" href="order-delete.php?id_detail_transaksi=<?= $hasil_select_dt->id_detail_transaksi ?>&nomor_transaksi=<?= $hasil_select_dt->nomor_transaksi ?>">
                          X</a>
                        </td>
                      <tr>
                    <?php  
                    $no++;
                    } 
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
                
      </form>
      <tr>
            <td colspan="6">
                <div class="d-grid">
                <form action="order-final.php" method="post">
                        <input value=" <?= $id_transaksi ?>" type="text" name="id_transaksi" hidden>
                        <input value=" <?= $grand_total ?>" type="text" name="grand_total" hidden>
                        <button class="btn btn-primary" type="submit"><b>Selesaikan Transaksi</b></button>
                    </form>
                </div>
            </td>
        </tr>     
          </section>
          <section class="split">
            <section>
              <div class="contact-method">
                <span class="icon alt fa-envelope"></span>
                <h3>Email</h3>
                <a href="#">mardasilva85@gmail.com</a>
              </div>
            </section>
            <section>
              <div class="contact-method">
                <span class="icon alt fa-phone"></span>
                <h3>Phone</h3>
                <span>+65 896-6520-7575</span>
                <br>
                <span>+62 857-1795-5664</span>
              </div>
            </section>
            <section>
              <div class="contact-method">
                <span class="icon alt fa-home"></span>
                <h3>Address</h3>
                <span>Summarecon Mall Bekasi <br> Jl. Boulevard Ahmad Yani, Marga Mulya, Kec. Bekasi Utara <br> Kota Bekasi </span>
              </div>
            </section>
          </section>
        </div>
      </section>
      <!-- Footer -->
      <footer id="footer">
        <div class="inner">
          <ul class="icons">
            <li>
              <a href="#" class="icon alt fa-twitter">
                <span class="label">Twitter</span>
              </a>
            </li>
            <li>
              <a href="#" class="icon alt fa-facebook">
                <span class="label">Facebook</span>
              </a>
            </li>
            <li>
              <a href="#" class="icon alt fa-instagram">
                <span class="label">Instagram</span>
              </a>
            </li>
            <li>
              <a href="#" class="icon alt fa-linkedin">
                <span class="label">LinkedIn</span>
              </a>
            </li>
          </ul>
          <ul class="copyright">
            <li>Copyright © 2020 Company Mrdslv :</li>
            <li>
              <a href="https://www.phpjabbers.com/">PMardasilva safrilia</a>
            </li>
          </ul>
        </div>
      </footer>
    </div>
    <!-- Scripts -->
    <script src="customer/assets/js/jquery.min.js"></script>
    <script src="customer/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="customer/assets/js/jquery.scrolly.min.js"></script>
    <script src="customer/assets/js/jquery.scrollex.min.js"></script>
    <script src="customer/assets/js/browser.min.js"></script>
    <script src="customer/assets/js/breakpoints.min.js"></script>
    <script src="customer/assets/js/util.js"></script>
    <script src="customer/assets/js/main.js"></script>
  </body>
</html>