<?php
include '../../koneksi/koneksi.php';

$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$harga = $_POST['harga'];
$desk = $_POST['desk'];
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$error = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

// Cek apakah ada perubahan pada kolom nama produk
$produk_lama = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
$data_produk_lama = mysqli_fetch_assoc($produk_lama);
$nama_produk_lama = $data_produk_lama['nama'];

if ($nm_produk !== $nama_produk_lama) {
    // Jika ada perubahan, cek apakah nama produk yang baru sudah ada di database
    $cek_nama_produk = mysqli_query($conn, "SELECT * FROM produk WHERE nama = '$nm_produk'");
    if (mysqli_num_rows($cek_nama_produk) > 0) {
        echo "<script>alert('Nama produk sudah ada, silakan masukkan nama lain');</script>";
        echo "<script>window.location.href = '../edit_produk.php?kode=".$kode."';</script>";
        exit;
    }
}

// Lanjutkan proses update
if ($error === 4) {
    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

    if ($result) {
        header('Location: ../m_produk.php?kode='.$kode);
        exit;
    }
}

$ekstensiGambar = array('jpg', 'jpeg', 'png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if (!in_array($ekstensiGambarValid, $ekstensiGambar)) {
    echo "<script>alert('Format gambar tidak valid. Hanya diperbolehkan format JPG, JPEG, dan PNG');</script>";
    echo "<script>window.location.href = '../edit_produk.php?kode=".$kode."';</script>";
    exit;
}

if ($size_gambar > 1000000) {
    echo "<script>alert('Ukuran gambar terlalu besar. Maksimum 2MB');</script>";
    echo "<script>window.location.href = '../edit_produk.php?kode=".$kode."';</script>";
    exit;
}

$namaGambarBaru = uniqid();
$namaGambarBaru .= ".";
$namaGambarBaru .= $ekstensiGambarValid;

$gambar = mysqli_query($conn, "SELECT image FROM produk WHERE kode_produk = '$kode'");
$tgambar = mysqli_fetch_assoc($gambar);
if (file_exists("../../image/produk/".$tgambar['image'])) {
    unlink("../../image/produk/".$tgambar['image']);
    move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);

    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

    if ($result) {
        header('Location: ../m_produk.php');
        exit;
    }
} else {
    move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);

    $result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

    if ($result) {
        header('Location: ../m_produk.php');
        exit;
    }
}
?>
