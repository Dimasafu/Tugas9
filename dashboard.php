<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];

// Filter dan pencarian
$search = $_GET['search'] ?? '';
$filter = $_GET['kategori'] ?? '';

$query = "SELECT * FROM produk WHERE 1=1";

if ($search) {
    $query .= " AND nama LIKE '%$search%'";
}
if ($filter) {
    $query .= " AND kategori = '$filter'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2 class="mb-4">Produk Tersedia</h2>

            <!-- Form Pencarian dan Filter -->
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-6">
                    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="form-control" placeholder="Cari nama produk...">
                </div>
                <div class="col-md-4">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Komputer & Aksesoris" <?= $filter == 'Komputer & Aksesoris' ? 'selected' : '' ?>>Komputer & Aksesoris</option>
                        <option value="Fashion" <?= $filter == 'Fashion' ? 'selected' : '' ?>>Fashion</option>
                        <option value="Elektronik" <?= $filter == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </form>

            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="assets/img/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['nama'] ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['nama'] ?></h5>
                                <p class="card-text"><?= substr($row['deskripsi'], 0, 100) ?>...</p>
                                <p class="text-muted">Kategori: <?= $row['kategori'] ?></p>
                                <p class="fw-bold text-success">Rp<?= number_format($row['harga']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
