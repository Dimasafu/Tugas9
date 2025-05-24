<?php
session_start();
include 'db.php';

$email = trim($_POST['email']);
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    header("Location: login.php?error=emptyfields");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=wrongpassword");
        exit();
    }
} else {
    header("Location: login.php?error=emailnotfound");
    exit();
}
