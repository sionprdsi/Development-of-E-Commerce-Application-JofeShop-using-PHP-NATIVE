<?php
include 'koneksi/koneksi.php';

if (isset($_POST['submit1'])) {
    $id_keranjang = $_POST['id'];
    $qty = $_POST['qty'];

    $edit = mysqli_query($conn, "UPDATE keranjang SET qty = '$qty' where id_keranjang = '$id_keranjang'");

    if ($edit) {
        header('Location:keranjang.php');
        exit();
    }
}

if (isset($_GET['del'])) {
    $id_keranjang = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_keranjang = '$id_keranjang'");
    $item = mysqli_fetch_assoc($query);

    if ($item) {
        // menghapus item dari keranjang
        $del = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");

        if ($del) {
            header('Location:keranjang.php');
            exit();
        }
    } else {
        // item yang ingin dihapus tidak ditemukan di keranjang
        header('Location:keranjang.php');
        exit();
    }
}

?>
<?php include 'header.php'; ?>



<div class="container" style="margin-top: 100px; margin-bottom: 18%;">
    <h2 class="text-center pb-4 pt-5 mb-0"
        style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 150px; font-family: 'Crimson Text', serif; font-size: 3.5rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
        <b>KERANJANG</b>
    </h2>
    <table class="table table-striped">
        <?php
        if (isset($_SESSION['user'])) {
            $kode_cs = $_SESSION['kd_cs'];
            // CEK JUMLAH KERANJANG
            $cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kode_cs'");
            $jml = mysqli_num_rows($cek);

            if ($jml > 0) {
                ?>
                <thead>
                    <tr>
                        <th style="text-align:center;" scope="col">Nomor</th>
                        <th style="text-align:center;" scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th style="text-align:center" scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php
                if (isset($_SESSION['kd_cs'])) {
                    $kode_cs = $_SESSION['kd_cs'];

                    $result = mysqli_query($conn, "SELECT k.id_keranjang as keranjang, k.kode_produk as kd, k.nama_produk as nama, k.qty as jml, p.image as gambar, p.harga as hrg FROM keranjang k join produk p on k.kode_produk=p.kode_produk WHERE kode_customer = '$kode_cs'");
                    $no = 1;
                    $hasil = 0;
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                        <tbody>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['keranjang']; ?>">
                                <tr>
                                    <th style="text-align:center;" scope="row">
                                        <?= $no; ?>
                                    </th>
                                    <td style="text-align:center;"><img src="image/produk/<?= $row['gambar']; ?>" width="100"></td>
                                    <td>
                                        <?= $row['nama']; ?>
                                    </td>
                                    <td>Rp.
                                        <?= number_format($row['hrg']); ?>
                                    </td>
                                    <td><input type="number" class="form-control" style="text-align: center;"
                                            value="<?= $row['jml']; ?>" readonly></td>

                                    <td>Rp.
                                        <?= number_format($row['hrg'] * $row['jml']); ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#myModal<?= $row['keranjang']; ?>">
                                            Ubah Jumlah Pesanan
                                        </button>
                                        |
                                        <a href="keranjang.php?del=1&id=<?= $row['keranjang']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?= $row['keranjang']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        <i class="fa fa-pencil"></i> Ubah Jumlah Pesanan
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form untuk mengubah keranjang -->
                                                    <form action="keranjang.php" method="POST">
                                                        <input type="hidden" name="id" value="<?= $row['keranjang']; ?>">
                                                        <div class="form-group">
                                                            <label for="qty">Jumlah:</label>
                                                            <input type="number" class="form-control" id="qty" name="qty"
                                                                value="<?= $row['jml']; ?>" min="1">
                                                        </div>
                                                        <button type="submit" name="submit1" class="btn btn-primary">
                                                            <i class="fa fa-save"></i> Simpan Perubahan
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <i class="fa fa-times"></i> Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </form>
                        </tbody>

                        <?php
                        $sub = $row['hrg'] * $row['jml'];
                        $hasil += $sub;
                        $no++;
                    }
                }
                ?>

                <tr>
                    <td colspan="7" style="text-align: right; font-weight: bold; font-size: 17px;">Total Akhir = Rp.
                        <?= number_format($hasil); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: right; font-weight: bold;">
                        <a href="produk.php" class="btn btn-success">
                            <i class="fa fa-shopping-cart"></i> Lanjutkan Belanja
                        </a>
                        <a href="checkout.php?kode_cs=<?= $kode_cs; ?>" class="btn btn-primary">
                            <i class="fa fa-check"></i> Lanjutkan Pemesanan
                        </a>
                </tr>

                <?php
            } else {
                echo "
						<tr>
						<th scope='col'>No</th>
						<th scope='col'>Gambar</th>
						<th scope='col'>Nama</th>
						<th scope='col'>Harga</th>
						<th scope='col'>Jumlah</th>
						<th scope='col'>Total</th>
						<th scope='col'></th>
						</tr>
						<tr>
						<td colspan='7' class='text-center bg-warning'><h5><b>KERANJANG BELANJA ANDA KOSONG </b></h5></td>
						</tr>

						";
            }

        } else {
            echo "<tr>
                      <td colspan='7' class='text-center bg-danger'>
                          <h5><b><span class='glyphicon glyphicon-exclamation-sign'></span> SILAHKAN <a href='user_login.php'>MASUK</a> TERLEBIH DAHULU SEBELUM BERBELANJA</b></h5>
                      </td>
                  </tr>";
        }

        ?>


        </tbody>
    </table>
</div>
</div>




<?php
include 'footer.php';
?>