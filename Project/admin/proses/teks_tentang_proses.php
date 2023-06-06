<?php
include 'header.php';

// Tampilkan data tentang dari database
$query = "SELECT * FROM tentang";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Jika tombol 'Simpan' ditekan
if (isset($_POST['simpan'])) {
  $content = $_POST['content'];

  // Update data tentang pada database
  $query = "UPDATE tentang SET content = '$content' WHERE id = 1";
  mysqli_query($conn, $query);

  // Jika gambar diunggah
  if (isset($_FILES['image'])) {
    $target_dir = "image/teks_about/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check jika file gambar valid
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
      echo "File yang diunggah bukan gambar.";
    }

    // Check jika file gambar sudah ada
    if (file_exists($target_file)) {
      $uploadOk = 0;
      echo "File gambar sudah ada.";
    }

    // Check ukuran file
    if ($_FILES["image"]["size"] > 500000) {
      $uploadOk = 0;
      echo "Ukuran file gambar terlalu besar.";
    }

    // Check jika file gambar valid
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      $uploadOk = 0;
      echo "Format file gambar tidak didukung.";
    }

    // Upload file gambar
    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $_FILES['image']['name'];
        $query = "UPDATE tentang SET image = '$image' WHERE id = 1";
        mysqli_query($conn, $query);
        echo "File " . basename($_FILES["image"]["name"]) . " berhasil diunggah.";
      } else {
        echo "Terjadi kesalahan saat mengunggah file gambar.";
      }
    }
  }

  // Refresh halaman setelah data berhasil disimpan
  header('Location: halaman_about.php');
  exit(); // Pastikan untuk keluar dari script setelah mengarahkan
}

// Jika tombol 'Hapus' ditekan
if (isset($_POST['hapus'])) {

  // Hapus data tentang dari database
  $query = "DELETE FROM tentang WHERE id = 1";
  mysqli_query($conn, $query);

  // Hapus file gambar jika ada
  $image = $row['image'];
  if ($image != "") {
    $target_dir = "image/teks_about/";
    $target_file = $target_dir . $image;
    unlink($target_file);
  }

  // Refresh halaman setelah data berhasil dihapus
  header('Location: halaman_about.php');
  exit(); // Pastikan untuk keluar dari script setelah mengarahkan
}
?>

<div class="container-fluid py-5" style="background-color= #f9f9f9; margin-top: 100px;">

  <div class="row">
    <div class="col-md-6">
      <img src="image/teks_about/<?= $row['image']; ?>"
        style="width:100%; height: 320px; object-fit: cover; border-radius: 5px;">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="content">Teks</label>
          <textarea class="form-control" id="content" name="content" rows="8"><?= $row['content']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="image">Gambar</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        <button type="submit" class="btn btn-danger" name="hapus"
          onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
      </form>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>