<?php
include '../koneksi/koneksi.php';
if(isset($_POST['pesan'])){
$kd_cs = $_POST['kode_cs'];
$nama = $_POST['nama'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['almt'];
$kopos = $_POST['kopos'];
$tanggal = date('Y-m-d');

$kode = mysqli_query($conn, "SELECT invoice from pemesanan order by invoice desc");
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

$status = "PESANAN BARU";
$order = mysqli_query($conn, "INSERT INTO pemesanan (invoice, kode_customer, tanggal, alamat, kota, kode_pos, status, provinsi) VALUES ('$format', '$kd_cs', '$tanggal', '$alamat', '$kota', '$kopos', '$status', '$prov')");

$ambil_pemesanan= mysqli_query($conn, "SELECT * FROM pemesanan ORDER BY invoice DESC LIMIT 1");
$inv = mysqli_fetch_assoc($ambil_pemesanan);


while ($row = mysqli_fetch_assoc($keranjang)) {
    $kd_produk = $row['kode_produk'];
    $nama_produk = $row['nama_produk'];
    $qty = $row['qty'];
    $harga = $row['harga'];
    $all_produk .= $nama_produk . " (" . $qty . " pcs), ";
    // $invoice_id = mysqli_query($conn, "SELECT invoice FROM pemesanan ORDER BY invoice DESC LIMIT 1");
    $invoice_id =$inv['invoice'];
    $detail_pesanan = mysqli_query($conn, "INSERT INTO detail_pesanan (invoice, kode_produk, harga_detail_pesanan, qty) VALUES ('$invoice_id', '$kd_produk', '$harga', '$qty')");
}

$all_produk = rtrim($all_produk, ", ");
$del_keranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");

if ($del_keranjang) {
    // parameter nama, produk, dan alamat pada URL WhatsApp
    $message = "Halo JoFe Bakery, saya tertarik untuk memesan produk\n" . $all_produk . "\n\nNama: " . $nama . "\nAlamat: " . $alamat . ", " . $kopos . ", " . $kota . ", " . $prov . "\nTolong informasi lebih lanjut.";
    $url = "https://wa.me/6282116154550?text=" . urlencode($message);

    header("Location: $url");
    exit;
}}
?>
