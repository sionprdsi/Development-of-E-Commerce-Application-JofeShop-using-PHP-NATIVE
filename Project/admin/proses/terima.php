<?php
include '../../koneksi/koneksi.php';
$inv = $_GET['inv'];

$result = mysqli_query($conn, "SELECT * from pemesanan where invoice = '$inv'");

while ($row = mysqli_fetch_assoc($result)) {
	$kodep = $row['kode_produk'];

	mysqli_query($conn, "UPDATE pemesanan SET status = 'Pesanan Baru', status = 'Pesanan Diterima' WHERE invoice = '$inv'");
	header('Location: ../produksi.php');
	die;
}

?>
