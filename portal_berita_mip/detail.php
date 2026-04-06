<?php
include 'koneksi.php';

// ambil kategori untuk navbar
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// ambil id artikel
$id = $_GET['id'];

// tambah views
mysqli_query($conn, "UPDATE artikel SET views = views + 1 WHERE id_artikel=$id");

// ambil data artikel + kategori
$data = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT artikel.*, kategori.nama_kategori 
    FROM artikel 
    LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
    WHERE id_artikel=$id
"));

// trending
$trending = mysqli_query($conn, "
    SELECT * FROM artikel ORDER BY views DESC LIMIT 5
");
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= $data['judul']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background: #f5f6fa;
        }

        .main-content {
            flex: 1;
        }

        /* NAVBAR */
        .navbar {
            background-color: #198754 !important;
        }

        /* ARTICLE IMAGE */
        .article-img {
            max-height: 400px;
            object-fit: cover;
            width: 100%;
            border-radius: 10px;
        }

        /* CARD */
        .card {
            border-radius: 12px;
            border: none;
        }

        /* FOOTER */
        footer {
            background: #198754;
            color: white;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-globe-americas me-2 text-warning"></i>
                <span class="text-white">Portal</span>
                <span class="text-warning">Berita</span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                ☰
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto">
                    <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?kategori=<?= $k['id_kategori']; ?>">
                                <?= $k['nama_kategori']; ?>
                            </a>
                        </li>
                    <?php endwhile; ?>

                    <li class="nav-item">
                        <a class="nav-link text-warning" href="index.php">🔥 Trending</a>
                    </li>
                </ul>

                <a href="login.php" class="btn btn-dark">Login</a>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4 main-content">
        <div class="row">

            <!-- ARTIKEL -->
            <div class="col-md-8">

                <div class="card shadow p-3">

                    <h2 class="fw-bold"><?= $data['judul']; ?></h2>

                    <p class="text-muted">
                        <?= $data['nama_kategori']; ?> |
                        👁 <?= $data['views']; ?> views
                    </p>

                    <img src="img/<?= $data['gambar']; ?>" class="article-img mb-3">

                    <p style="text-align: justify;">
                        <?= nl2br($data['isi']); ?>
                    </p>

                    <a href="index.php" class="btn btn-secondary mt-3">← Kembali</a>

                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">

                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white">
                        🔥 Trending
                    </div>

                    <div class="card-body">
                        <?php while ($t = mysqli_fetch_assoc($trending)): ?>
                            <div class="mb-3">
                                <a href="detail.php?id=<?= $t['id_artikel']; ?>" class="text-decoration-none">
                                    <b><?= $t['judul']; ?></b>
                                </a>
                                <br>
                                <small class="text-muted">👁 <?= $t['views']; ?> views</small>
                            </div>
                            <hr>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="text-center p-3">
        <small>© <?= date('Y'); ?> Portal Berita</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>