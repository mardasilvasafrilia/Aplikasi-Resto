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
      <section id="contact">
        <div class="inner">
          <section>
            <form action="" method="POST">
              <div class="fields">
                <!-- <div class="field half">
                  <label for="jumlah_menu">Qyantity</label>
                  <input style="text-align:center;" type="text" name="jumlah_menu" placeholder="Jumlah Menu">
                </div> -->
                <div class="field">
                  <label for="name">Masukan nama anda</label>
                  <input style="text-align:center;" type="text" name="nama_pembeli" placeholder="Nama Pembeli">
                </div>
				<div class="field">
                  <!-- <div class="field half text-right"> -->
					<ul class="actions">
						<li>
						<!-- <a href="?page=order_proses"> -->
     						<button class="btn btn-success mb-2">Tambah</button>
						</a>
						</li>
					</ul>
                  <!-- </div> -->
                </div>
			  </div>
            </form>
          </section>
		  <?php
      
		  if(!empty($_POST['nama_pembeli'])) {
        $nama_pembeli = $_POST['nama_pembeli'];
        // 
        $format_awal = 'INV/'.date('Y', time()).'/';
        $query_count_transaksi = $koneksi->query("SELECT COUNT(*) as count_transaksi FROM transaksi");
        $hasil_count_transaksi = $query_count_transaksi->fetch_object();
        $final_count_transaksi = $hasil_count_transaksi->count_transaksi + 1;
        $format_count_transaksi = sprintf('%04d', $final_count_transaksi);

        // 
        $waktu_transaksi = date('Y-m-d h:i:s', time()) ;

        $nomor_transaksi = $format_awal . $format_count_transaksi;
        $query_insert_tr = $koneksi->query("INSERT INTO transaksi VALUES('',
          '$waktu_transaksi', '$nomor_transaksi', 0, 
          '$nama_pembeli', 15,
          'onproses')
        ");

        if ($query_insert_tr) 
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
                  </script>
              <?php
        }
			// insert ke databases
			// if berhasil insert redirect ke order_prosses.php?nomor_transaksi
		  
		  }
		  ?>

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