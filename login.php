<DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    <?php if (isset($_GET['error'])): ?>
      <div style="color:red; margin-bottom:10px;">
        <?php
        switch ($_GET['error']) {
            case 'emptyfields':
                echo "Email dan password harus diisi!";
                break;
            case 'wrongpassword':
                echo "Password salah!";
                break;
            case 'emailnotfound':
                echo "Email tidak ditemukan!";
                break;
        }
        ?>
      </div>
    <?php endif; ?>

    <div class="auth-container">
      <div class="auth-card">
        <div class="auth-img d-none d-md-block"></div>
        <div class="auth-form">
          <h4 class="fw-bold text-center">LOG IN</h4>
          <p class="text-center">Welcome back! Please enter your detail</p>
          <form method="POST" action="login_process.php">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Input your email...">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" placeholder="********">
            </div>
            <div class="mb-3 text-end">
              <a href="#" class="text-muted">Forgot password?</a>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">LOG IN</button>
            </div>
            </form>
            <div class="text-center my-3">
              <hr>
              <span class="text-muted">Or continue with</span>
            </div>
            <div class="row gx-2">
              <div class="col-4">
                <button class="btn btn-outline-dark w-100"><img src="https://img.icons8.com/color/16/google-logo.png" class="me-2">Google</button>
              </div>
              <div class="col-4">
                <button class="btn btn-outline-dark w-100"><img src="https://img.icons8.com/color/16/facebook-new.png" class="me-2">Facebook</button>
              </div>
              <div class="col-4">
                <button class="btn btn-outline-dark w-100"><img src="https://img.icons8.com/color/16/apple-logo.png" class="me-2">Apple</button>
              </div>
            </div>
            <div class="text-center mt-3">
        <span class="text-muted">Don't have account? <a href="register.php" class="text-primary fw-bold">Sign Up</a></span>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>