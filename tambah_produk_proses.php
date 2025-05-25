<?php
session_start();
include 'db.php';

// Cek apakah user login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Ambil data dari form
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];

// Upload gambar
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$folder = 'uploads/';
$path = $folder . basename($gambar);

// Cek dan upload file
if (move_uploaded_file($tmp, $path)) {
    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO produk (nama, harga, deskripsi, kategori, gambar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $nama, $harga, $deskripsi, $kategori, $gambar);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: kelola_produk.php?pesan=berhasil");
        exit;
    } else {
        echo "Gagal menyimpan ke database.";
    }
} else {
    echo "Gagal mengupload gambar.";
}
?>
