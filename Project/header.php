<?php

session_start(); // memulai sesi pada halaman PHP.
include 'koneksi/koneksi.php'; // memasukkan file koneksi.php yang berfungsi untuk membuat koneksi antara script PHP dengan database yang akan digunakan.
if (isset($_SESSION['kd_cs'])) { // Ini adalah awal dari struktur kondisional if-else. Kondisi yang dicek di sini adalah apakah variabel $_SESSION['kd_cs'] sudah di-set atau belum. isset() adalah fungsi PHP yang digunakan untuk mengecek apakah sebuah variabel sudah di-set atau belum.

	$kode_cs = $_SESSION['kd_cs']; // Jika variabel $_SESSION['kd_cs'] sudah di-set, maka nilai dari variabel tersebut akan disimpan ke dalam variabel $kode_cs. Variabel $kode_cs nantinya akan digunakan dalam pengolahan data selanjutnya pada halaman PHP tersebut.
	// kd_cs adalah singkatan dari "kode customer service".

}

?>

<!DOCTYPE html>
<html>

<head>
	<title>JoFe - Bakery</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link href="image/logo/JOfe BAkery-modified.png" rel="shortcut icon" />
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<style>
		.custom-navbar {
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 1;
		}

		body {
			padding-top: 5%;
			/* adjust this value according to your navbar height */
		}

		/* NAVBAR */
		.navbar-center {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.navbar-nav {
			margin: 0;
			padding: 0;
		}

		.top {
			border-bottom: 2px solid;
			border-image: linear-gradient(to right, #8a2be2, #4169e1);
			border-image-slice: 1;
		}

		.custom-navbar {
			height: 30px;
			font-size: 20px;
			padding-top: 30px;
			padding-bottom: 70px;
			font-family: "Montserrat";
		}

		.navbar-nav>li {
			margin-left: 10px;
			margin-right: 10px;
			list-style: none;
			display: inline-block;
		}

		.navbar-nav>li>a {
			background: none;
			color: linear-gradient(to bottom right, #6C5B7B, #355C7D) !important;
			text-decoration: none;
			display: block;
			padding: 10px;
			transition: background-color 0.3s ease;
		}

		.navbar-nav>li>a:hover,
		.navbar-nav>li.active>a {
			background-color: #eee;
			color: #555 !important;
		}

		.dropdown-menu {
			background-color: #f9f9f9;
			border: none;
			box-shadow: 50px 50px 100px rgba(5, 5, 5, 5.2);
		}

		.dropdown-menu>li>a {
			color: #555;
			display: block;
			padding: 10px;
			text-decoration: none;
			transition: background-color 0.3s ease;
		}

		.dropdown-menu>li>a:hover {
			background-color: #eee;
		}

		/* keranjang */
		.badge-sion {
			background: linear-gradient(to right, #8a2be2, #698CF3);
			color: #fff;
			font-size: 16px;
			padding: 6px 10px;
			border-radius: 20px;
			display: inline-block;
			box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.5);
			animation: badge-flip 12s ease-in-out infinite;
		}

		/* @keyframes badge-flip {
			0% {
				transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
			}

			100% {
				transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
			}
		} */
	</style>

</head>

<body>
	<div class="container-fluid"
		style="background: linear-gradient(to bottom right, #5600c2, #2A4FA6); display: flex;	padding: 40px; 	text-align: center;  justify-content: space-between;">
		<div class="logo">
			<img src="image/logo/JOfe BAkery-modified.png" alt="JoFe - Shop">
			<span style="font-family: 'Pacifico', cursive; font-size: 27px;">JoFe Bakery</span>
		</div>
		<div class="content">
			<h2 style="font-family: 'Pacifico', cursive;">Kenikmatan Kuliner di JoFe Bakery</h2>
			<p style="font-family: 'Dekko', cursive; font-size: 20px;">Sambutlah kenikmatan kuliner yang tiada duanya di JoFe Bakery! Kami menghadirkan berbagai hidangan lezat
				yang menggoda selera Anda. Mulai dari kue-kue istimewa hingga Kue kering yang memanjakan lidah, Setiap
				hidangan kami adalah
				perpaduan sempurna antara rasa yang lezat, tekstur yang menggoda, dan presentasi yang memukau. Dari
				klasik hingga kreasi baru yang mengguncang lidah, setiap kunjungan ke JoFe Bakery adalah petualangan
				kuliner yang menggetarkan selera Anda. Mari bergabung dalam perjalanan kuliner kami dan nikmati
				pengalaman yang memuaskan di JoFe Bakery!</p>
		</div>
	</div>

	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: 'Montserrat', sans-serif;
		}

		.logo {
			display: block;
			margin: 0 auto;
			max-width: 300px;
			height: auto;
			margin-bottom: 20px;
		}

		.logo img {
			width: 100%;
			height: auto;
			margin-top: 90px;
			margin-bottom: 20px;
		}

		.logo span {
			font-size: 36px;
			color: #fff;
			font-family: 'Montserrat';
		}

		.content {
			margin-top: 90px;
			float: left;
			margin-left: 10%;
			text-align: left;
		}

		.content h2 {
			color: #fff;
			font-family: 'Montserrat';
			font-size: 36px;
			margin-bottom: 60px;
		}

		.content p {
			color: #fff;
			font-family: 'Montserrat';
			font-size: 24px;
			margin-bottom: 30px;
		}

		.cta-button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #fff;
			color: #5600c2;
			font-size: 20px;
			font-family: 'Montserrat';
			text-decoration: none;
			border-radius: 5px;
		}

		.cta-button:hover {
			background-color: #5600c2;
			color: #fff;
		}

		@media (max-width: 768px) {
			.container {
				padding: 20px;
			}

			.logo img {
				width: 70%;
				margin-top: 30px;
			}

			.logo span {
				font-size: 24px;
			}

			.content {
				float: none;
				margin-left: 0;
			}

			.content h2 {
				font-size: 30px;
				margin-bottom: 10px;
			}

			.content p {
				font-size: 20px;
				margin-bottom: 20px;
			}

			.cta-button {
				font-size: 18px;
			}
		}
	</style>

	<!-- Nabvar -->
	<nav class="navbar navbar-default custom-navbar"
		style="border-bottom: 8px solid linear-gradient(to bottom right, #6C5B7B, #355C7D);">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="container-fluid navbar-center">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Beranda</a></li>
						<li><a href="produk.php">Produk</a></li>
						<li><a href="about.php">Tentang Kami</a></li>

						<?php

						if (isset($_SESSION['kd_cs'])) {
							$kode_cs = $_SESSION['kd_cs'];
							$cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
							$value = mysqli_num_rows($cek);

							?>

							<li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i>
									<b class="badge badge-sion">
										<?= $value ?>
									</b></a></li>

							<?php

						} else {
							echo "<li><a href='keranjang.php'><i class='glyphicon glyphicon-shopping-cart'></i> <span class='badge badge-sion'>0</span></a></li>";
						}
						if (!isset($_SESSION['user'])) {

							?>

						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>
									Masuk
									<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="user_login.php"><i class="fa fa-sign-in"></i> Masuk</a></li>
									<li><a href="register.php"><i class="fa fa-user-plus"></i> Daftar</a></li>
								</ul>
							</li>
							</li>
							<?php
						} else {
							?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>
									<?= $_SESSION['user']; ?> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="proses/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
											Keluar</a></li>
								</ul>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- END Nabvar -->