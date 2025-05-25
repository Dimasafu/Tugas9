<?php
// edit_produk.php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: kelola_produk.php');
    exit;
}

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM produk WHERE id = $id");
$produk = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Edit Produk</h2>
            <form action="edit_produk_proses.php" method="POST" enctype="multipart/form-data" class="form-produk p-4 rounded shadow-sm bg-white">
                <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="<?= $produk['nama'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?= $produk['deskripsi'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="Komputer & Aksesoris" <?= $produk['kategori'] == 'Komputer & Aksesoris' ? 'selected' : '' ?>>Komputer & Aksesoris</option>
                        <option value="Fashion" <?= $produk['kategori'] == 'Fashion' ? 'selected' : '' ?>>Fashion</option>
                        <option value="Elektronik" <?= $produk['kategori'] == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                </div>
                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>