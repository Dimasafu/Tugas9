<?php
session_start();

// Konfigurasi koneksi
$host = 'localhost';
$user = 'root';
$password = ''; // Ganti jika password MySQL kamu tidak kosong
$dbname = 'ecommerce1'; // Ganti sesuai nama database kamu
$port = 3308;

// Buat koneksi
$conn = new mysqli($host, $user, $password, $dbname, 3308);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tangkap input dari form
$email = trim($_POST['email']);
$password = $_POST['password'];

// Validasi input kosong
if (empty($email) || empty($password)) {
    header("Location: login.php?error=emptyfields");
    exit();
}

// Siapkan dan jalankan query
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah user ditemukan
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Password cocok, set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Redirect ke dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Password salah
        header("Location: login.php?error=wrongpassword");
        exit();
    }
} else {
    // Email tidak ditemukan
    header("Location: login.php?error=emailnotfound");
    exit();
}

$stmt->close();
$conn->close();
?>
