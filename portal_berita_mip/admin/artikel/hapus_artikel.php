<?php
include '../koneksi.php';

$id = $_GET['id'];

// ambil gambar
$data = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT gambar FROM artikel WHERE id_artikel=$id"
));

// hapus file gambar
if ($data['gambar'] && file_exists("../img/" . $data['gambar'])) {
    unlink("../img/" . $data['gambar']);
}

// hapus database
mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel=$id");

header("Location: index.php?page=artikel");
exit;
