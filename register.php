<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - E-commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
          <h4>Register Account</h4>
        </div>
        <div class="card-body">
          <form action="register_proses.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto Profil</label>
              <input type="file" class="form-control" name="foto" accept="image/*" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
            </div>
          </form>
          <div class="text-center mt-3">
            Sudah punya akun? <a href="login.php" class="text-decoration-none">Login di sini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
