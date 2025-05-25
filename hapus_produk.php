<?php
// hapus_produk.php
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
$query = $conn->query("SELECT gambar FROM produk WHERE id = $id");
$data = $query->fetch_assoc();

// Hapus gambar
if (file_exists('assets/img/' . $data['gambar'])) {
    unlink('assets/img/' . $data['gambar']);
}

$conn->query("DELETE FROM produk WHERE id = $id");
header('Location: kelola_produk.php');
exit;
?>
