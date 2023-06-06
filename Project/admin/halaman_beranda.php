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
        <div class="main_container" style="background-color: #5600c2;
    background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
    background-size: 200% 200%;
    animation: wave 1s ease-in-out infinite;">
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

            <!-- HALAMAN BERANDA -->
            <div class="right_col" role="main">
                <?php
                // jika tombol submit untuk menambah data ditekan
                if (isset($_POST['submit-tambah'])) {
                    $nama = $_POST['nama'];
                    $deskripsi = $_POST['deskripsi'];

                    // query untuk menambah data ke tabel teks_promo
                    $sql = "INSERT INTO teks_promo (nama, deskripsi) VALUES ('$nama', '$deskripsi')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Data berhasil ditambahkan.')</script>";
                    } else {
                        echo "Terjadi kesalahan: ";
                    }
                }

                // jika tombol submit untuk mengupdate data ditekan
                if (isset($_POST['submit-update'])) {
                    $id = $_POST['id'];
                    $nama = $_POST['nama'];
                    $deskripsi = $_POST['deskripsi'];

                    // query untuk mengupdate data di tabel teks_promo
                    $sql = "UPDATE teks_promo SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Data berhasil diupdate.')</script>";
                    } else {
                        echo "Terjadi kesalahan: ";
                    }
                }

                // jika tombol submit untuk menghapus data ditekan
                if (isset($_POST['submit-delete'])) {
                    $id = $_POST['id'];

                    // query untuk menghapus data dari tabel teks_promo
                    $sql = "DELETE FROM teks_promo WHERE id=$id";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Data berhasil dihapus.')</script>";
                    } else {
                        echo "Terjadi kesalahan: ";
                    }
                }

                // Menampilkan data dari tabel teks_promo -->
                $sql = "SELECT * FROM teks_promo";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='container' style='margin-bottom:4%;'>
        <h1 class='text-center mb-5'  style='font-size: 35px; font-weight: bold; color: #333; text-shadow: 2px 2px #ccc; font-family: 'Helvetica Neue', sans-serif;'>
            <b> Edit teks Halaman Beranda</b>
        </h1>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                        echo "<div class='form-group'>";
                        echo "<label for='nama'><i class='fa fa-tag'></i> Nama:</label>";
                        echo "<input type='text' class='form-control' name='nama' value='" . $row["nama"] . "'>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='deskripsi'><i class='fa fa-pencil'></i> Deskripsi:</label>";
                        echo "<textarea class='form-control' name='deskripsi' rows='7'>" . $row["deskripsi"] . "</textarea>";
                        echo "</div>";
                        echo "<button type='submit' class='btn btn-primary' name='submit-update'><i class='fa fa-save'></i> Simpan Perubahan  </button>";
                        echo "                                        | 
        ";

                        echo "<button type='submit' class='btn btn-danger' name='submit-delete'><i class='fa fa-trash'></i>        Hapus</button>";
                        echo "</form>";
                    }
                } else {
                    echo "Tidak ada data.";
                }

                // Menampilkan form untuk menambah data
                echo "<form method='POST' style='margin-top:3%; margin-bottom:10%'>";
                echo "<div class='container' style='margin-bottom: px;'>
                <h1 class='text-center mb-5'  style='font-size: 35px; font-weight: bold; color: #333; text-shadow: 2px 2px #ccc; font-family: 'Helvetica Neue', sans-serif;'>
                <b>Tambah teks Halaman Beranda</b>
                </h1>";
                echo "<div class='form-group'>";
                echo "<label for='nama'><i class='fa fa-tag'></i> Nama:</label>";
                echo "<input type='text' class='form-control' name='nama'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='deskripsi'><i class='fa fa-pencil'></i> Deskripsi:</label>";
                echo "<textarea class='form-control' name='deskripsi' rows='8'></textarea>";
                echo "</div>";
                echo "<button type='submit' class='btn btn-success' name='submit-tambah'><i class='fa fa-plus-circle'></i> Tambah</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";


                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <!-- END HALAMAN BERANDA ADMIN -->

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