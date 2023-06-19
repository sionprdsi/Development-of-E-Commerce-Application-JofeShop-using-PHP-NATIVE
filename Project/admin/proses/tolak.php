<?php 
include '../../koneksi/koneksi.php';
$inv = $_GET['inv'];
$tolak = mysqli_query($conn, "UPDATE pemesanan SET status = 'Pesanan Baru', status = 'Pesanan Ditolak' WHERE invoice = '$inv'");

if($tolak){
	header('Location: ../produksi.php');
	die;
};

?>