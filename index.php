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
		                <li class="active"> <a href="index.php">Home </a> </li>

		                <li> <a href="order.php">Order Now</a> </li>

		                <li> <a href="about-us.php">About Us</a> </li>

		                <!-- <li> <a href="blog.php">Blog</a> </li>

		                <li> <a href="testimonials.php">Testimonials</a> </li> -->

		                <li><a href="contact.php">Contact Us</a></li>
            		</ul>
				</nav>

				<!-- Banner -->
					<section id="banner" class="major">
						<div class="inner">
							<header class="major">
								<h1>レストラン マルダシルバ </h1>
								<h1>Restaurant Mardasilva</h1>
							</header>
							<div class="content">
								<p>If your stomach is full, thinking will be easy, even if you feel a little sleepy</p>
								<ul class="actions">
									<li><a href="order.php" class="button next scrolly">Order food</a></li>
								</ul>
							</div>
						</div>
					</section>

				<!-- Main -->
				<div id="main">
					
					
					<!-- About us -->
					<section>
						<div class="inner">
							<header class="major">
								<h2>About Restaurant Mardasilva</h2>
							</header>
							<p>Restoran Mardasilva telah berdiri sejak tahun 2022 hingga saat ini. Kami bergerak di bidang pengelolaan makanan tertentu yaitu Jepang,
								 dimana alasan didirikannya restoran ini adalah hasil survei bahwa makanan Jepang telah mendunia, 
								 menarik para pecinta makanan dengan rasa, aroma dan teksturnya yang luar biasa. Masakan Jepang menawarkan beragam rasa yang 
								 menggoda selera dan meninggalkan kesan mendalam.</p>
							<ul class="actions">
								<li><a href="about-us.php" class="button next">Read more</a></li>
							</ul>
						</div>
					</section>
					<!-- Packages -->
					<section class="tiles">
						<?php
							include("config/koneksi.php");
							$querySelectKategori = $koneksi->query("SELECT * FROM kategori_menu");
							while ($resultSelectKategori = $querySelectKategori->fetch_object()) {
                		?>
						<article>
						
							<span class="image">
								<img  src="assets/image/kategori_menu/<?= $resultSelectKategori->foto_kategori_menu ?>" alt="gambar_kategori">
							</span>
							<a href="menu.php?nama_kategori_menu=<?= $resultSelectKategori->nama_kategori_menu?>">
							<header class="major">
								<h3><?= $resultSelectKategori-> nama_kategori_menu?></h3>

								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum incidunt, aperiam nostrum et. Voluptas vel labore numqua.</p> -->

								<div class="major-actions">
									<a href="menu.php?nama_kategori_menu=<?= $resultSelectKategori->nama_kategori_menu?>" class="button small next">Show the menu</a>
								</div>
							</header>
						</article>
							<?php
							}
							?>
					</section>

					<!-- Testimonials -->
					<!-- <section>
						<div class="inner">
							<header class="major">
								<h2>Testimonials</h2>
							</header>
							<div class="row">
								<div class="col-6">
									<p><em>"Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt."</em></p>
									<p><strong>- John Doe</strong></p>
									
								</div>

								<div class="col-6">
									<p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores temporibus dolorum minus repudiandae, eaque error corporis aliquam, architecto amet itaque nobis. Omnis itaque est dolore, a nostrum numquam. Quae, facilis."</em></p>
									<p><strong>- Jack Smith</strong></p>
								</div>
							</div>
							<ul class="actions">
								<li><a href="testimonials.php" class="button next">Read more</a></li>
							</ul>
						</div>
					</section> -->

					<!-- Blog Posts -->
					<!-- <section class="tiles">
						<article>
							<span class="image">
								<img src="customer/images/blog-1-720x480.jpg" alt="" />
							</span>
							<header class="major">
								<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</h3>

								<p><br> <span>John Doe</span> | <span>12/06/2020 10:30 </span> | <span>114</span></p>

								<div class="major-actions">
									<a href="blog-details.php" class="button small next scrolly">Read Blog</a>
								</div>
							</header>
						</article>
						<article>
							<span class="image">
								<img src="customer/images/blog-2-720x480.jpg" alt="" />
							</span>
							<header class="major">
								<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</h3>

								<p><br> <span>John Doe</span> | <span>12/06/2020 10:30 </span> | <span>114</span></p>

								<div class="major-actions">
									<a href="blog-details.php" class="button small next scrolly">Read Blog</a>
								</div>
							</header>
						</article>
						<article>
							<span class="image">
								<img src="customer/images/blog-3-720x480.jpg" alt="" />
							</span>
							<header class="major">
								<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</h3>

								<p><br> <span>John Doe</span> | <span>12/06/2020 10:30 </span> | <span>114</span></p>

								<div class="major-actions">
									<a href="blog-details.php" class="button small next scrolly">Read Blog</a>
								</div>
							</header>
						</article>
					</section>
				</div> -->
							
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