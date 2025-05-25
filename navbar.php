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
<nav class="navbar navbar-expand navbar-light bg-light sticky-top" style="margin-left: 250px; z-index: 1030;">
  <div class="container-fluid">
    <span class="navbar-brand">Dashboard</span>
    <div class="d-flex align-items-center">
      <span class="me-3">Halo, <?= htmlspecialchars($user['nama']) ?></span>
      <img src="assets/img/<?= $user['foto'] ?>" alt="Foto Profil" width="40" height="40" class="rounded-circle me-3">
      <a href="login.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>