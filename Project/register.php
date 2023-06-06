<?php

include 'header.php';

?>

<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <h2 class="text-center pb-4 pt-5 mb-0"
        style="border-bottom: 2px solid #6C5B7B; padding: 10px; margin-bottom: 100px; font-family: 'Crimson Text', serif; font-size: 3.5rem; color: #333; text-shadow: 2px 2px #ccc; width: 100%;">
        <b>DAFTAR</b>
    </h2>
    <form action="proses/register.php" method="POST" onsubmit="return validateForm()">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="nama"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email"
                        required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username"
                        name="username" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telp">Nomor Telepon</label>
                    <input type="number" class="form-control" id="telp" placeholder="+62" name="telp" required>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="konfirmasi">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Konfirmasi Password" name="konfirmasi" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-check-circle"></i> Daftar
        </button>

        <div class="mt-4" style="margin-top: 10px;">
            <p>Sudah mempunyai akun? <a href="user_login.php">Login Disini</a>.</p>
        </div>

    </form>
</div>

<script>
    function validateForm() {
        var nama = document.forms["myForm"]["exampleInputPassword1"].value;
        var email = document.forms["myForm"]["exampleInputPassword1"].value;
        var username = document.forms["myForm"]["exampleInputPassword1"].value;
        var telp = document.forms["myForm"]["exampleInputPassword1"].value;
        var password = document.forms["myForm"]["exampleInputPassword1v"].value;
        var konfirmasi = document.forms["myForm"]["exampleInputPassword1"].value;

        // Validasi nama
        if (nama == "") {
            alert("Nama harus diisi");
            return false;
        }

        // Validasi email
        if (email == "") {
            alert("Email harus diisi");
            return false;
        } else if (!validateEmail(email)) {
            alert("Format email tidak valid");
            return false;
        }

        // Validasi username
        if (username == "") {
            alert("Username harus diisi");
            return false;
        }

        // Validasi nomor telepon
        if (telp == "") {
            alert("Nomor telepon harus diisi");
            return false;
        } else if (!validatePhone(telp)) {
            alert("Format nomor telepon tidak valid");
            return false;
        }

        // Validasi password
        if (password == "") {
            alert("Kata sandi harus diisi");
            return false;
        } else if (password.length < 6) {
            alert("Kata sandi minimal 6 karakter");
            return false;
        }

        // Validasi konfirmasi password
        if (konfirmasi == "") {
            alert("Konfirmasi kata sandi harus diisi");
            return false;
        } else if (password != konfirmasi) {
            alert("Konfirmasi kata sandi tidak sesuai");
            return false;
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function validatePhone(phone) {
        var re = /^\+62\d{9,13}$/;
        return re.test(phone);
    }
</script>

<?php
include 'footer.php';
?>