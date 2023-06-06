<?php

include 'header.php';

?>
<?php
if (isset($_SESSION['user'])) {
    header('location:index.php');
    exit();
}

$error = isset($_GET['error']) ? $_GET['error'] : 0;

?>

<?php if ($error == 1): ?>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only"></span>Kesalahan:
        NAMA PENGGUNA / KATA SANDI YANG ANDA MASUKKAN TIDAK BENAR ATAU SALAH!
    </div>
<?php endif; ?>


<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <h2 class="text-center pb-4 pt-5 mb-0"
        style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Crimson Text', serif; font-size: 3.5rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
        <b>MASUK</b>
    </h2>
    <div style="width:400px; position: relative; left: 30%; ">
        <form action="proses/login.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pengguna</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan username"
                    name="username" style="width: 500px;">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Kata Sandi</label>
                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan password"
                    name="pass" style="width: 500px;">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>
                Masuk</button>
            <a href="admin/index.php" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span> Login
                Admin</a>
        </form>

        <?php if (isset($error_msg)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <div class="mt-4">
            <p>
                <i class="fa fa-user-circle"></i> Belum punya akun?
                <a href="register.php" class="register-link">Daftar di sini</a>.
            </p>
        </div>

    </div>
</div><br><br>
<!-- Animasi ketika input focus -->
<style>
    .form-control:focus {
        border-color: #6C5B7B !important;
        box-shadow: 0 0 0 0.2rem rgba(108, 91, 123, 0.25) !important;
    }
</style>
<!-- Animasi ketika tombol hover -->
<style>
    .btn:hover {
        color: #fff !important;
        background-color: #6C5B7B !important;
        border-color: #6C5B7B !important;
    }
</style>
<!-- Style untuk checkbox -->
<style>
    .form-check-input:checked~.form-check-label::before {
        background-color: #6C5B7B !important;
        border-color: #6C5B7B !important;
    }
</style>

<?php

include 'footer.php';

?>