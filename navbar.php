<?php
// navbar.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}
$user = $_SESSION['user'];
?>
<nav class="navbar navbar-expand sticky-top navbar-custom">
  <div class="container-fluid">
    <span class="navbar-brand text-light">Welcome</span>
    <div class="d-flex align-items-center">
      <span class="me-3 text-light">Halo, <?= htmlspecialchars($user['nama']) ?></span>
      <img src="assets/img/<?= $user['foto'] ?>" alt="Foto Profil" width="40" height="40" class="rounded-circle me-3">
      <a href="login.php" class="btn btn-warning btn-sm">Logout</a>
    </div>
  </div>
</nav>