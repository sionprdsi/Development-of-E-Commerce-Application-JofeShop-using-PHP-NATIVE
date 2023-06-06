<!-- HALO !
SAYA SION PARDOSI
DARI INSTITUT TEKNOLOGI DEL -->

<!DOCTYPE html>
<html>

<head>
  <title>Login Admin</title>
  <link href="../image/logo/JOfe BAkery-modified.png" rel="shortcut icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #5600c2;
      background-image: linear-gradient(45deg, #5600c2 25%, #2A4FA6 50%, #5600c2 75%);
      background-size: 200% 200%;
      animation: wave 5s ease-in-out infinite;
    }

    @keyframes wave {
      0% {
        background-position: 0% 50%;
      }

      100% {
        background-position: 100% 50%;
      }
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .form-group label {
      font-weight: bold;
    }

    .animated {
      animation-duration: 1s;
      animation-fill-mode: both;
    }

    .fadeInUp {
      animation-name: fadeInUp;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translate3d(0, 100%, 0);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    /* Responsive styling */
    @media (min-width: 576px) {

      /* Adjust card width */
      .card {
        max-width: 400px;
      }
    }

    @media (min-width: 768px) {

      /* Center card horizontally */
      .row {
        display: flex;
        justify-content: center;
      }

      /* Adjust card width */
      .card {
        max-width: 500px;
      }
    }

    @media (min-width: 992px) {

      /* Adjust card width */
      .card {
        max-width: 600px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="col-lg-4 col-md-6">
        <div class="card p-4 animated fadeInUp">
          <div class="card-body">
            <div class="text-center mb-4">
              <img src="../image/logo/JOfe BAkery-modified.png" alt="Logo" width="100">
            </div>
            <h4 class="card-title mb-4">LOGIN ADMIN</h4>
            <form action="proses/login.php" method="POST">
              <div class="form-group">
                <label for="username">Nama User</label>
                <input type="text" class="form-control" name="user" id="username" required>
              </div>
              <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" class="form-control" name="pass" id="password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block mt-4">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tambahkan jQuery dan Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html