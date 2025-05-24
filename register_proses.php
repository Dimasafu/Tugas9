<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $created_at = date("Y-m-d H:i:s");

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "assets/img/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    move_uploaded_file($tmp, $folder . $foto);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO user (nama, email, phone, username, foto, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nama, $email, $phone, $username, $foto, $password, $created_at);

    if ($stmt->execute()) {
        header("Location: login.php?success=registered");
    } else {
        echo "Gagal daftar: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: register.php");
    exit;
}
?>
