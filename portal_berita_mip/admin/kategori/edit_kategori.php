<?php
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori=$id"));

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);

    mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori=$id");
    header("Location: index.php?page=kategori");
}
?>

<h3>Edit Kategori</h3>

<div class="card shadow">
    <div class="card-body">

        <form method="POST">
            <input type="text" name="nama" class="form-control mb-3" value="<?= $data['nama_kategori'] ?>">

            <button name="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
</div>