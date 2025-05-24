<?php
session_start();
include 'db.php';

// Proteksi halaman
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Tambah Produk</h2>
            <form action="tambah_produk_proses.php" method="POST" enctype="multipart/form-data" class="form-produk">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="Komputer & Aksesoris">Komputer & Aksesoris</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Elektronik">Elektronik</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Tambah Produk</button>
            </form>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
