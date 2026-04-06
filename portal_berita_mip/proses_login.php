<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$captcha  = $_POST['captcha'];

// cek captcha
if ($captcha != $_SESSION['captcha']) {
    $_SESSION['error'] = "Captcha salah!";
    header("Location: login.php");
    exit;
}

// cek user
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    // redirect berdasarkan role
    if ($data['role'] == 'admin') {
        header("Location: admin/index.php?page=dashboard");
    } else {
        header("Location: user/dashboard.php?role=user");
    }
} else {
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
}
