<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "portal_berita_uts";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
