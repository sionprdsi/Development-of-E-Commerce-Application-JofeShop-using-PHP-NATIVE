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
    echo "<script>alert('TIDAK ADA GAMBAR YANG DIPILIH');</script>";
    header("Refresh:0; url=../tm_produk.php");
    exit();
}

$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
    echo "<script>alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');</script>";
    header("Refresh:0; url=../tm_produk.php");
    exit();
}

if($size_gambar > 1000000){
    echo "<script>alert('UKURAN GAMBAR TERLALU BESAR');</script>";
    header("Refresh:0; url=../tm_produk.php");
    exit();
}

$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

if (move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru)) {
    $result = mysqli_query($conn, "INSERT INTO produk VALUES('$kode','$nm_produk','$namaGambarBaru','$desk','$harga')");
}

if($result){
    echo "<script>alert('PRODUK BERHASIL DITAMBAHKAN');</script>";
    header("Refresh:0; url=../m_produk.php");
    exit();
}
?>
