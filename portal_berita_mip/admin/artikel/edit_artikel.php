<?php
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT * FROM artikel WHERE id_artikel=$id"
));

$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if (isset($_POST['submit'])) {

    $judul       = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi         = mysqli_real_escape_string($conn, $_POST['isi']);
    $penulis     = mysqli_real_escape_string($conn, $_POST['penulis']);
    $id_kategori = mysqli_real_escape_string($conn, $_POST['id_kategori']);

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../img/" . $gambar);

        $gambar = mysqli_real_escape_string($conn, $gambar);

        mysqli_query($conn, "UPDATE artikel SET 
            judul='$judul',
            isi='$isi',
            penulis='$penulis',
            id_kategori='$id_kategori',
            gambar='$gambar'
            WHERE id_artikel=$id");
    } else {
        mysqli_query($conn, "UPDATE artikel SET 
            judul='$judul',
            isi='$isi',
            penulis='$penulis',
            id_kategori='$id_kategori'
            WHERE id_artikel=$id");
    }

    header("Location: index.php?page=artikel");
    exit;
}
?>

<h3 class="mb-3">✏️ Edit Artikel</h3>

<div class="card shadow">
    <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control"
                    value="<?= $data['judul']; ?>">
            </div>

            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control"
                    value="<?= $data['penulis']; ?>">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control">
                    <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
                        <option value="<?= $k['id_kategori']; ?>"
                            <?= ($k['id_kategori'] == $data['id_kategori']) ? 'selected' : '' ?>>
                            <?= $k['nama_kategori']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Isi Artikel</label>
                <textarea name="isi" class="form-control" rows="5"><?= $data['isi']; ?></textarea>
            </div>

            <div class="mb-3">
                <img src="../img/<?= $data['gambar']; ?>" width="120" class="mb-2">
                <input type="file" name="gambar" class="form-control">
            </div>

            <button name="submit" class="btn btn-primary">Update</button>
            <a href="index.php?page=artikel" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>