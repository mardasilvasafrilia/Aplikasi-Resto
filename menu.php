<?php
include("config/koneksi.php");

// ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mardasilva | Restaurant</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="customer/assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="customer/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="customer/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">
					<a href="index.php" class="logo"><strong> レストラン</strong> <span>Mrdslvsfr</span></a>
					<nav>
						<a href="#menu">Menu</a>
					</nav>
				</header>

				<!-- Menu -->
				<nav id="menu">
					<ul class="links">
		                <li> <a href="index.php">Home </a> </li>

		                <li> <a href="order.php">Order Now</a> </li>

		                <!-- <li class="active"> <a href="menu.php">Menu</a> </li> -->

		                <li> <a href="about-us.php">About Us</a> </li>

		                <!-- <li> <a href="blog.php">Blog</a> </li>

		                <li> <a href="testimonials.php">Testimonials</a> </li> -->

		                <li><a href="contact.php">Contact Us</a></li>
            		</ul>
				</nav>

				<!-- Main -->
					<div id="main" class="alt">
					
						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Menu </h1>
									</header>
								</div>
							</section>
							<section class="tiles">
							<?php
                    
                    $nama_kategori_menu = $_GET['nama_kategori_menu'];
                    $query = $koneksi->query('SELECT * FROM menu JOIN kategori_menu ON menu.id_kategori_menu = kategori_menu.id_kategori_menu WHERE kategori_menu.nama_kategori_menu = "'. $nama_kategori_menu . '"');
                    if (isset($_GET['nama_kategori_menu'])) 
					{
						if($query->num_rows == 0) {
							echo 'Not found';
						}
					}
					while ($result = $query->fetch_object()) {
                    ?>
					
								<article>
									<span class="image">
										<img class="img-fluid rounded-3" src="assets/image/<?= $result->foto_menu?>" alt="">
									</span>
									<header class="major">
										<h3><?= $result->nama_menu ?></h3>

										<p><strong><?=$result->harga_menu ?></strong></p>

										<p><?=$result->deskripsi_menu ?></p>
										
										<p><?=$result->status_menu ?></p>
									
										<div class="major-actions">
											<a href="order.php" class="button small next">Order Now</a>
										</div>
									
									</header>
								</article>
								<?php
                    }
                    ?>
							
<!-- 
								<article>
									<span class="image">
										<img src="customer/images/product-2-720x480.jpg" alt="" />
									</span>
									<header class="major">
										<h3>Caramelized Banana Pudding</h3>

										<p><strong>$ 12.00</strong></p>

										<p>This dressed-up banana pudding features bananas caramelized in brown sugar, butter, and cinnamon.</p>

										<div class="major-actions">
											<a href="#" class="button small next">Order Now</a>
										</div>
									</header>
								</article> -->

								<!-- <article>
									<span class="image">
										<img src="customer/images/product-3-720x480.jpg" alt="" />
									</span>
									<header class="major">
										<h3>Caramelized Banana Pudding</h3>

										<p><strong>$ 12.00</strong></p>

										<p>This dressed-up banana pudding features bananas caramelized in brown sugar, butter, and cinnamon.</p>

										<div class="major-actions">
											<a href="#" class="button small next">Order Now</a>
										</div>
									</header>
								</article>

								<article>
									<span class="image">
										<img src="customer/images/product-4-720x480.jpg" alt="" />
									</span>
									<header class="major">
										<h3>Caramelized Banana Pudding</h3>

										<p><strong>$ 12.00</strong></p>

										<p>This dressed-up banana pudding features bananas caramelized in brown sugar, butter, and cinnamon.</p>

										<div class="major-actions">
											<a href="#" class="button small next">Order Now</a>
										</div>
									</header>
								</article>

								<article>
									<span class="image">
										<img src="customer/images/product-5-720x480.jpg" alt="" />
									</span>
									<header class="major">
										<h3>Caramelized Banana Pudding</h3>

										<p><strong>$ 12.00</strong></p>

										<p>This dressed-up banana pudding features bananas caramelized in brown sugar, butter, and cinnamon.</p>

										<div class="major-actions">
											<a href="#" class="button small next">Order Now</a>
										</div>
									</header>
								</article>

								<article>
									<span class="image">
										<img src="customer/images/product-6-720x480.jpg" alt="" />
									</span>
									<header class="major">
										<h3>Caramelized Banana Pudding</h3>

										<p><strong>$ 12.00</strong></p>

										<p>This dressed-up banana pudding features bananas caramelized in brown sugar, butter, and cinnamon.</p>

										<div class="major-actions">
											<a href="#" class="button small next">Order Now</a>
										</div>
									</header>
								</article> -->


							</section>

					</div>

				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="icons">
							<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						</ul>
						<ul class="copyright">
							<li>Copyright © 2020 Company Mrdslv :</li>
							<li> <a href="https://www.phpjabbers.com/">Mardasilva safrilia</a></li>
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
