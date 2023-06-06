<?php 

session_start();
include '../koneksi/koneksi.php';

$username = $_POST['username'];
$password = $_POST['pass'];

$cek = mysqli_query($conn, "SELECT * FROM customer WHERE username = '$username'");
$jml = mysqli_num_rows($cek);

if ($jml == 1) {
    $row = mysqli_fetch_assoc($cek);
    $hashedPassword = $row['password'];
    $status = $row['status'];

    // Periksa apakah akun dinonaktifkan
    if ($status == 0) {
        header('location:../user_login.php?error=2');
        exit();
    }

    // Periksa kecocokan password
    if (password_verify($password, $hashedPassword)) {
        $_SESSION['user'] = $row['nama'];
        $_SESSION['kd_cs'] = $row['kode_customer'];
        header('location:../index.php');
        exit();
    }
}

header('location:../user_login.php?error=1');
exit();

?>
