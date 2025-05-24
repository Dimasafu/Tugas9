<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login E-commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="card auth-card">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="text-center mb-3">Login</h4>
          <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
              <?php
              switch ($_GET['error']) {
                  case 'emptyfields': echo "Email dan password harus diisi!"; break;
                  case 'wrongpassword': echo "Password salah!"; break;
                  case 'emailnotfound': echo "Email tidak ditemukan!"; break;
              }
              ?>
            </div>
          <?php endif; ?>
          <form action="login_proses.php" method="POST">
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <p class="text-center mt-3">
              Belum punya akun? <a href="register.php" class="text-decoration-none">Daftar di sini</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
