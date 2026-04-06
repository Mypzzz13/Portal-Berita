<?php
// pastikan session aktif
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../koneksi.php';

// ================== QUERY DATA ==================

// total artikel
$totalArtikel = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as total FROM artikel")
)['total'];

// total kategori
$totalKategori = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as total FROM kategori")
)['total'];

// total user
$totalUser = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) as total FROM users")
)['total'];

// artikel terbaru
$artikel = mysqli_query(
    $conn,
    "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5"
);
?>

<style>
    body {
        background: #f5f6fa !important;
    }
</style>

<h3 class="mb-3">Dashboard Admin 👋</h3>
<p>Selamat datang, <b><?= $_SESSION['username']; ?></b></p>

<!-- ================== CARD ================== -->
<div class="row">

    <!-- ARTIKEL -->
    <div class="col-md-4 col-12 mb-3">
        <div class="card text-white bg-primary shadow h-100">
            <div class="card-body">
                <h5>📰 Total Artikel</h5>
                <h2><?= $totalArtikel; ?></h2>
            </div>
        </div>
    </div>

    <!-- KATEGORI -->
    <div class="col-md-4 col-12 mb-3">
        <div class="card text-white bg-success shadow h-100">
            <div class="card-body">
                <h5>📂 Total Kategori</h5>
                <h2><?= $totalKategori; ?></h2>
            </div>
        </div>
    </div>

    <!-- USER -->
    <div class="col-md-4 col-12 mb-3">
        <div class="card text-white bg-warning shadow h-100">
            <div class="card-body">
                <h5>👤 Total User</h5>
                <h2><?= $totalUser; ?></h2>
            </div>
        </div>
    </div>

</div>

<!-- ================== ARTIKEL TERBARU ================== -->
<div class="card mt-4 shadow">
    <div class="card-header bg-dark text-white">
        📄 Artikel Terbaru
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Views</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1;
                while ($row = mysqli_fetch_assoc($artikel)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul']; ?></td>
                        <td><?= isset($row['tanggal']) ? $row['tanggal'] : '-'; ?></td>
                        <td><?= isset($row['views']) ? $row['views'] : 0; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>

    </div>
</div>