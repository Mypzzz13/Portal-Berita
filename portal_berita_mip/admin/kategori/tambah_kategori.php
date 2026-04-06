<?php
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);

    mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
    header("Location: index.php?page=kategori");
}
?>

<h3>Tambah Kategori</h3>

<div class="card shadow">
    <div class="card-body">

        <form method="POST">
            <input type="text" name="nama" class="form-control mb-3" placeholder="Nama kategori" required>

            <button name="submit" class="btn btn-success">Simpan</button>
        </form>

    </div>
</div>