<?php
// sidebar.php
?>
<div class="sidebar d-flex flex-column p-3 sidebar-custom" style="width: 250px; height: 100vh; position: fixed;">
  <h4 class="mb-4 text-light">E-Commerce</h4>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="dashboard.php" class="nav-link text-light">Home</a>
    </li>
    <li>
      <a class="nav-link text-light" data-bs-toggle="collapse" href="#productMenu" role="button">
        Product
      </a>
      <div class="collapse ms-3" id="productMenu">
        <a href="tambah_produk.php" class="d-block nav-link text-white">Tambah Produk</a>
        <a href="kelola_produk.php" class="d-block nav-link text-white">Kelola Produk</a>
      </div>
    </li>
  </ul>
</div>