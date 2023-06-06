<?php
include 'header.php';

// Pagination
$resultsPerPage = 6; // Jumlah produk per halaman
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini, default = 1
$startFrom = ($page - 1) * $resultsPerPage; // Indeks awal data yang akan ditampilkan

// Query untuk mengambil data produk
$query = "SELECT * FROM produk LIMIT $startFrom, $resultsPerPage";
$result = mysqli_query($conn, $query);

?>

<!-- PRODUK -->
<div class="container" style="margin-top: 100px;">
  <h2 class="text-center pb-4 pt-5 mb-0"
    style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Crimson Text', serif; font-size: 3.8rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
    <b>PRODUK</b>
  </h2>
  <div class="alert alert-warning" role="alert">
    <b>Penting! :</b> Seluruh pesanan produk adalah pre-order.
  </div>
  <div class="row">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail" style="border: 2px solid #ddd; padding: 10px;">
          <img src="image/produk/<?= $row['image']; ?>" style="width:100%; height: 300px; object-fit: cover;">
          <div class="caption">
            <h3 style="font-size: 1.5rem; font-weight: bold;">
              <?= $row['nama']; ?>
            </h3>
            <h4 style="font-size: 1.2rem; font-weight: bold; color: black;">
              <?= 'Rp. ' . number_format($row['harga']) . '/ Kg'; ?>
            </h4>
            <div class="row">
              <div class="col-md-6">
                <a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-primary btn-block"
                  role="button"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
              </div>
              <?php if (isset($_SESSION['kd_cs'])) { ?>
                <div class="col-md-6">
                  <a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1"
                    class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Beli
                  </a>
                </div>
              <?php } else { ?>
                <div class="col-md-6">
                  <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i
                      class="glyphicon glyphicon-shopping-cart"></i> Beli</a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>

  <!-- Pagination kami -->

  <style>
    .pagination {
      margin-top: 20px;
      list-style-type: none;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination li {
      margin-right: 5px;
    }

    .pagination li a {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 30px;
      height: 30px;
      background-color: #f8f9fa;
      color: #000;
      text-decoration: none;
      border-radius: 50%;
      transition: background-color 0.3s ease;
    }

    .pagination li a:hover {
      background: linear-gradient(to bottom right, #5600c2, #2A4FA6);
      color: #fff;
    }

    .pagination .active a {
      background: linear-gradient(to bottom right, #5600c2, #2A4FA6);
      color: #fff;
    }

    .pagination .disabled a {
      opacity: 0.5;
      pointer-events: none;
    }
  </style>

  <ul class="pagination">
    <?php
    $query = "SELECT COUNT(*) as total FROM produk";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalPages = ceil($row['total'] / $resultsPerPage); // Jumlah total halaman
    
    // Tombol sebelumnya
    if ($page > 1) {
      echo "<li><a href='produk.php?page=" . ($page - 1) . "'>&#8249;</a></li>";
    } else {
      echo "<li class='disabled'><a>&#8249;</a></li>";
    }

    // Membuat link halaman
    for ($i = 1; $i <= $totalPages; $i++) {
      $activeClass = ($i == $page) ? 'active' : '';
      echo "<li class='" . $activeClass . "'><a href='produk.php?page=" . $i . "'>" . $i . "</a></li>";
    }

    // Tombol selanjutnya
    if ($page < $totalPages) {
      echo "<li><a href='produk.php?page=" . ($page + 1) . "'>&#8250;</a></li>";
    } else {
      echo "<li class='disabled'><a>&#8250;</a></li>";
    }
    ?>
  </ul>

</div>

<?php
include 'footer.php';
?>