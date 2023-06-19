<?php

include 'header.php';

$kd = mysqli_real_escape_string($conn, $_GET['kode_cs']);
$cs = mysqli_query($conn, "SELECT * FROM customer WHERE kode_customer = '$kd' ");
$rows = mysqli_fetch_assoc($cs);

?>

<style>
	#total {
		text-align: right;
		font-weight: bold;
		background-color: #f5f5f5;
		padding: 10px;
	}

	.highlighted {
		border-top: 2px solid #ccc;
		border-bottom: 2px solid #ccc;
		color: #333;
	}
</style>

<div class="container" >
	<h2 class="text-center pb-4 pt-5 mb-0"
		style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; margin-top: 100px; font-family: 'Crimson Text', serif; font-size: 3.8rem;  color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
		<b>DETAIL PESANAN ANDA</b>
	</h2>
	<div class="row">
		<div class="col-md-6">
			<h4><b>Daftar Pesanan</b></h4>
			<table class="table table-stripped">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total Harga</th>
				</tr>

				<?php

				$result = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd' ");
				$no = 1;
				$hasil = 0;
				while ($row = mysqli_fetch_assoc($result)) {

					?>

					<tr>
						<td>
							<?= $no; ?>
						</td>
						<td>
							<?= $row['nama_produk']; ?>
						</td>
						<td>Rp.
							<?= number_format($row['harga']); ?>
						</td>
						<td>
							<?= $row['qty']; ?>
						</td>
						<td>Rp.
							<?= number_format($row['harga'] * $row['qty']); ?>
						</td>
					</tr>

					<?php

					$total = $row['harga'] * $row['qty'];
					$hasil += $total;
					$no++;

				}
				?>
				<tr>
					<td colspan="7" id="total" class="highlighted">
						Harga Akhir =
						<?= number_format($hasil); ?>
					</td>
				</tr>

			</table>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<div class="row">
		<div class="col-md-6 bg-success">
			<h5><i class="fas fa-check"></i> Pastikan Pesanan Anda Sudah Benar</h5>
		</div>
	</div>
	<div class="container my-5" style>
		<div class="row">
			<div class="col-md-6">
				<div class="card bg-light">
					<div class="card-body">
						<div class="card-body border border-danger p-4">
							<h5 class="card-title"><i class="fas fa-user"></i> Pemesanan</h5>
							<p class="card-text">Untuk pemesanan lebih lanjut melalui platform
								e-commerce kami, silakan lengkapi form di bawah ini:</p>
							<p>pastikan semua terisi dan silahkan lanjutkan pemesanan Anda dengan menekan tombol
								<b>Pesan Sekarang</b> yang akan melanjutkan anda ke link <b>WhatsApp Kami!</b>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card bg-light">
					<h5 class="card-title"><i class="fas fa-bullhorn"></i> Pemberitahuan:</h5>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Tipe Pengiriman</th>
								<th>Area Pengiriman</th>
								<th>Metode Pembayaran</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Pengiriman</td>
								<td>Sekitaran Kab. Toba</td>
								<td>Hanya melalui <b>via WhatsApp</b></td>
							</tr>
							<tr>
								<td>Pembelian Offline</td>
								<td>Daerah toko</td>
								<td>Tunai</td>
							</tr>
						</tbody>
					</table>
					<p class="card-text">Untuk pembelian offline, silakan datang langsung ke <a href="about.php">toko
							kami</a>.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-3" style=" ">
		<div class="col-md-6 bg-warning">
			<h5><i class="fas fa-pencil-alt"></i> Isi Form Dibawah Ini</h5>
		</div>
	</div>

	<form action="proses/order.php" method="POST">
		<input type="hidden" name="kode_cs" value="<?= $kd; ?>">
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" style="width: 557px;"
				value="<?= isset($_POST['nama']) ? $_POST['nama'] : $rows['nama']; ?>">
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="provinsi">Provinsi</label>
					<select class="form-control" id="provinsi" name="prov" required>
						<option value="Sumatra Utara">Sumatra Utara</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="kota">Pilih Kota / Kecamatan</label>
					<select class="form-control" id="kota" name="kota" required>
						<option value="Balige">Balige</option>
						<option value="Borbor">Borbor</option>
						<option value="Habinsaran">Habinsaran</option>
						<option value="Laguboti">Laguboti</option>
						<option value="Nassau Parmaksian">Nassau Parmaksian</option>
						<option value="Pintu Pohan Meranti">Pintu Pohan Meranti</option>
						<option value="Porsea">Porsea</option>
						<option value="Siantar Narumonda">Siantar Narumonda</option>
						<option value="Sigumpar">Sigumpar</option>
						<option value="Silaen">Silaen</option>
						<option value="Tampahan">Tampahan</option>
					</select>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="almt" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="kodepos">Kode Pos</label>
					<input type="text" class="form-control" id="kodepos" placeholder="Kode Pos" name="kopos" required>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="1" id="konfirmasi" name="konfirmasi" required>
				<label class="form-check-label" for="konfirmasi">
					Apakah sudah yakin?
				</label>
			</div>
		</div>
		<button type="submit" class="btn btn-success" name="pesan"><i class="fas fa-shopping-cart"></i> Pesan Sekarang</button>
		<a href="keranjang.php" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
	</form>

</div>
</div>
</div>

<style>
	input[type=text],
	select {
		padding: 12px 20px;
		margin: 8px 0;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		background-color: #f8f8f8;
	}

	input[type=checkbox] {
		margin-top: 16px;
	}

	.card-body.border-danger {
		border-width: 3px;
		border-style: solid;
		border-color: #dc3545;
		background-color: #f8d7da;
		color: black;
		padding: 20px;
		margin: 10px;
	}
</style>

<?php
include 'footer.php';
?>