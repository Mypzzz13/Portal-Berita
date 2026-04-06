<?php
include '../koneksi.php';

// ambil data kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// proses simpan
if (isset($_POST['submit'])) {

    $judul       = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi         = mysqli_real_escape_string($conn, $_POST['isi']);
    $penulis     = mysqli_real_escape_string($conn, $_POST['penulis']);
    $id_kategori = mysqli_real_escape_string($conn, $_POST['id_kategori']);

    // upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../img/" . $gambar);

    $gambar = mysqli_real_escape_string($conn, $gambar);

    // insert ke database
    mysqli_query($conn, "INSERT INTO artikel 
        (judul, isi, gambar, penulis, id_kategori) 
        VALUES 
        ('$judul','$isi','$gambar','$penulis','$id_kategori')");

    // redirect
    header("Location: index.php?page=artikel");
    exit;
}
?>

<h3 class="mb-3">Tambah Artikel</h3>

<div class="card shadow">
    <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

            <!-- JUDUL -->
            <div class="mb-3">
                <label class="form-label">Judul Artikel</label>
                <input type="text" name="judul" class="form-control"
                    placeholder="Masukkan judul artikel" required>
            </div>

            <!-- PENULIS -->
            <div class="mb-3">
                <label class="form-label">Nama Penulis</label>
                <input type="text" name="penulis" class="form-control"
                    value="<?= $_SESSION['username']; ?>" required>
            </div>

            <!-- KATEGORI -->
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
                        <option value="<?= $k['id_kategori']; ?>">
                            <?= $k['nama_kategori']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- ISI -->
            <div class="mb-3">
                <label class="form-label">Isi Artikel</label>
                <textarea name="isi" class="form-control" rows="5"
                    placeholder="Tulis isi artikel di sini..." required></textarea>
            </div>

            <!-- GAMBAR -->
            <div class="mb-3">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>

            <!-- BUTTON -->
            <button type="submit" name="submit" class="btn btn-success">
                Simpan
            </button>
            <a href="index.php?page=artikel" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>