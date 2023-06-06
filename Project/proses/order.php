<?php
include '../koneksi/koneksi.php';

$kd_cs = $_POST['kode_cs'];
$nama = $_POST['nama'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['almt'];
$kopos = $_POST['kopos'];
$tanggal = date('y-m-d');

$kode = mysqli_query($conn, "SELECT invoice from produksi order by invoice desc");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['invoice'], 3, 4);
$add = (int) $num + 1;
if (strlen($add) == 1) {
	$format = "INV000" . $add;
} else if (strlen($add) == 2) {
	$format = "INV00" . $add;
} else if (strlen($add) == 3) {
	$format = "INV0" . $add;
} else {
	$format = "INV" . $add;
}

$all_produk = "";
$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd_cs'");

while ($row = mysqli_fetch_assoc($keranjang)) {
	$kd_produk = $row['kode_produk'];
	$nama_produk = $row['nama_produk'];
	$qty = $row['qty'];
	$harga = $row['harga'];
	$status = "PESANAN BARU";
	$all_produk .= $nama_produk . " (" . $qty . " pcs), ";
	$order = mysqli_query($conn, "INSERT INTO produksi (invoice, kode_customer, kode_produk, nama_produk, qty, harga, status, tanggal, provinsi, kota, alamat, kode_pos, terima, tolak) VALUES ('$format','$kd_cs','$kd_produk','$nama_produk','$qty','$harga','$status','$tanggal','$prov','$kota','$alamat','$kopos','0','0')");
}

$all_produk = rtrim($all_produk, ", ");
$del_keranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");

if ($del_keranjang) {

	// parameter nama, produk, dan alamat pada URL WhatsApp
	$message = "Halo JoFe Bakery, saya tertarik untuk memesan produk\n" . $all_produk . "\n\nNama: " . $nama . "\nAlamat: " . $alamat . ", " . $kota . ", " . $prov . "\nTolong informasi lebih lanjut.";
	$url = "https://wa.me/6282116154550?text=" . urlencode($message);

	header("Location: $url");
	exit;

}
?>
