<?php
include 'header.php';

// Koneksi ke database
$host = 'localhost:3307';
$user = 'root';
$pass = '';
$db = 'jofeshop';
$conn = mysqli_connect($host, $user, $pass, $db);

// Query untuk mengambil data dari tabel "about_us"
$sql = "SELECT * FROM about";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  ?>

  <div class="container-fluid py-5" style="background-color: #f9f9f9; margin-top: 100px; margin-bottom: 7%;">
    <div class="row">
      <div class="col-md-6">
        <img src="image/teks_about/<?= $row['image']; ?>"
          style="width:100%; height: 750px; object-fit: cover; border-radius: 5px;">
      </div>


      <div class="col-md-6">
        <h2 style="font-weight: bold; font-family: 'Crimson Text', serif; font-size: 4.5rem;">Sejarah Toko Kami</h2>
      </div>


      <div class="col-md-6" style="margin-top: 10px;">
        <p style="font-size: 18px; font-family: 'Dekko', cursive;">
          <?= $row['content']; ?>
        </p>
        <div class="d-flex justify-content-between align-items-center mt-5">
        </div>
        <div class="mt-5">

        </div>
      </div>
    </div>
  </div>

  <?php
}

include 'footer.php';
?>
 