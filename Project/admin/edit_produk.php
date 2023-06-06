<?php
session_start();
include '../koneksi/koneksi.php';
if (!isset($_SESSION['admin'])) {
    header('location:halaman_utama.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Admin | JoFe Bakkery</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <link href="../image/logo/JOfe BAkery-modified.png" rel="shortcut icon" />
    <!-- Custom styling plus plugins -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col" style="background-color: #5600c2;
    background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
    background-size: 200% 200%;
    animation: wave 5s ease-in-out infinite;">
                <div class="left_col scroll-view" style="background-color: #5600c2;
    background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
    background-size: 200% 200%;
    animation: wave 5s ease-in-out infinite;">
                    <div class="navbar nav_title" style="background-color: #5600c2;
    background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
    background-size: 200% 200%;
    animation: wave 5s ease-in-out infinite;">
                        <a href="halaman_utama.php" class="site_title">
                            <i class="fa fa-home"></i>
                            <span
                                style="font-family: 'Pacifico', cursive; font-size: 24px; color: white; text-transform: uppercase;">JoFe
                                Bakery</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Mengelola Informasi</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-edit"></i> Teks <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="halaman_beranda.php">Halaman Beranda</a></li>
                                        <li><a href="halaman_about.php">Halaman Tentang Toko</a></li>
                                    </ul>
                                </li><br>

                                <h3>Mengelola Data</h3>
                                <li><a href="m_produk.php"><i class="fa fa-tags"></i>Data Produk</a></li>
                                <li><a href="m_customer.php"><i class="fa fa-user"></i>Data Costumer</a></li><br>

                                <h3>Mengelola Pesanan</h3>
                                <li><a><i class="fa fa-bar-chart-o"></i> Detail Pesanan <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="produksi.php">Pemesanan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small" style="background-color: #5600c2;
    background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
    background-size: 200% 200%;
    animation: wave 5s ease-in-out infinite;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-muted">© 2023 JoFe Bakery</span>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="https://www.instagram.com/jofe_bakery/" target="_blank"><i
                                                    class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-right: 100px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> JoFe
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="proses/logout.php"><i
                                            class="fa fa-sign-out pull-right"></i>Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <?php
            $kode_produk = $_GET['kode'];
            $kode = mysqli_query($conn, "SELECT * from produk where kode_produk = '$kode_produk'");
            $data = mysqli_fetch_assoc($kode);
            ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="container py-4" style="background-color: #f8f9fa">
                    <h2 class="text-center pb-4" style="font-size: 28px;">
                        <b>Ubah Produk</b>
                    </h2>
                    <hr>
                    <form action="proses/edit_produk.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group d-flex flex-column align-items-center mb-4">
                            <label for="exampleInputFile"><img src="../image/produk/<?= $data['image']; ?>"
                                    width="150"></label>
                            <input type="file" id="exampleInputFile" name="files">
                            <p class="help-block mt-2">Pilih gambar untuk produk (maks. 2MB, format: JPEG, PNG, atau
                                GIF)</p>
                        </div>
                        <hr>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Produk</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Nama Produk" disabled
                                        value="<?= $data['kode_produk']; ?>">
                                    <input type="hidden" name="kode" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Nama Produk" value="<?= $data['kode_produk']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Masukkan Nama Produk" name="nama" value="<?= $data['nama']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        placeholder="masukkan Harga" name="harga" value="<?= $data['harga']; ?>">
                                    <p class="help-block mt-2">Isi Harga tanpa menggunakan Titik(.) atau Koma (,)</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <textarea name="desk" class="form-control" rows="16"><?= $data['deskripsi']; ?></textarea>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <button type="submit" class="btn btn-success btn-block"><i class='fa fa-save'></i>
                                        Simpan Perubahan</button>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <a href="m_produk.php" class="btn btn-danger btn-block">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->

        <!-- /footer content -->
    </div>
    </div>

    <!-- compose -->

    <!-- /compose -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>


</body>

</html>