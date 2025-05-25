<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];

// Cek jika ada gambar baru diupload
if ($_FILES['gambar']['name'] != '') {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, 'assets/img/' . $gambar);

    $query = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi', kategori='$kategori', gambar='$gambar' WHERE id=$id";
} else {
    $query = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi', kategori='$kategori' WHERE id=$id";
}

mysqli_query($conn, $query);
header("Location: kelola_produk.php");
exit;
?>
