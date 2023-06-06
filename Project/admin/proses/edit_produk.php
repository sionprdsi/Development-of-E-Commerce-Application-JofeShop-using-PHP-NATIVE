<?php 
include '../../koneksi/koneksi.php';

$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$harga = $_POST['harga'];
$desk = $_POST['desk'];
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

if($eror === 4){
	$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

	if($result){
		header('Location: ../m_produk.php?kode='.$kode);
		exit;
	}
}

$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
    header('Location: ../edit_produk.php?kode='.$kode);
    exit;
}

if($size_gambar > 1000000){
    header('Location: ../tm_produk.php');
    exit;
}

$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

$gambar = mysqli_query($conn, "SELECT image FROM produk WHERE kode_produk = '$kode'");
$tgambar = mysqli_fetch_assoc($gambar);
if (file_exists("../../image/produk/".$tgambar['image'])) {
	unlink("../../image/produk/".$tgambar['image']);
	move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);

	$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

	if($result){
		header('Location: ../m_produk.php');
		exit;
	}
} else {
	move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);

	$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru', deskripsi = '$desk', harga = '$harga' WHERE kode_produk = '$kode'");

	if($result){
		header('Location: ../m_produk.php');
		exit;
	}
}
?>
