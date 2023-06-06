<?php
include 'header.php';
$kode = mysqli_real_escape_string($conn, $_GET['produk']);
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
$row = mysqli_fetch_assoc($result);

?>

<div class="container" style="margin-top: 100px;">
    <h2 class="text-center pb-4 pt-5 mb-0"
        style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Crimson Text', serif; font-size: 3.5rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
        <b>DETAIL PRODUK</b>
    </h2>

    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="image/produk/<?= $row['image']; ?>" width="400">
            </div>
        </div>

        <div class="col-md-8">
            <form action="proses/add.php" method="GET">
                <input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
                <input type="hidden" name="produk" value="<?= $kode; ?>">
                <input type="hidden" name="hal" value="2">
                <table class="table table-striped">
                    <tbody style="color:black;">
                        <tr>
                            <td><b>Nama</b></td>
                            <td>
                                <?= $row['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Harga</b></td>
                            <td>Rp.
                                <?= number_format($row['harga']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Deskripsi</b></td>
                            <td>
                                <?= $row['deskripsi']; ?>
                            </td>
                        </tr>
                        <?php
                        if (isset($_POST['submit'])) {
                            // Tangkap nilai jumlah yang diubah melalui modal
                            $jml = $_POST['jml'];
                            // Redirect kembali ke halaman sebelumnya
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            exit;
                        }
                        ?>
                        <tr>
                            <td><b>Jumlah</b></td>
                            <td>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="1" name="jml" value="1"
                                        style="width: 129%;" readonly id="jumlah">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-warning" style="color: black;"
                                            data-toggle="modal" data-target="#ubahModal">
                                            <i class="fa fa-pencil"></i> Ubah Jumlah Pesanan
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ubahModalLabel">Ubah Jumlah Pesanan anda</h4>
                            </div>
                            <div class="modal-body">
                                <input class="form-control" type="number" min="1" name="jml" value="1"
                                    style="width: 155px;" id="ubahJumlah">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Batal
                                </button>

                                <!-- Tambahkan tombol submit di modal -->
                                <?php
                                if (isset($_SESSION['user'])) {
                                    ?>
                                    <button type="submit" class="btn btn-success" name="submit">
                                        <i class="fa fa-cart-plus"></i> Simpan dan Tambahkan ke Keranjang
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-6">
                                        <a href="keranjang.php" class="btn btn-success btn-block" role="button">
                                            <i class="fa fa-cart-plus"></i> Tambahkan ke Keranjang
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>
                        Tambahkan ke Keranjang</button>
                    <?php
                } else {
                    ?>
                    <div class="col-md-6">
                        <a href="keranjang.php" class="btn btn-success btn-block" role="button"><i
                                class="glyphicon glyphicon-shopping-cart"></i> Tambahkan ke Keranjang</a>
                    </div>
                    <?php
                }
                ?>

                <a href="produk.php" class="btn btn-primary"> Kembali Belanja</a>

        </div>
        </form>
    </div>


</div>

<style>
    .btn-primary {
        color: #fff;
        border-color: #9666f1;
    }
</style>

<?php
include 'footer.php';
?>