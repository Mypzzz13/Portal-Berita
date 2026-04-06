<?php
include 'koneksi.php';

// kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// ambil artikel trending
$artikel = mysqli_query($conn, "
    SELECT artikel.*, kategori.nama_kategori 
    FROM artikel 
    LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
    ORDER BY views DESC
");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trending - Portal Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

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
            background: linear-gradient(135deg, #198754 0%, #157347 100%) !important;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1) !important;
            border-bottom: 3px solid #0f5132;
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 1rem !important;
        }

        .navbar .nav-link:hover {
            color: #d1e7dd !important;
            transform: translateY(-2px);
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #d1e7dd;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar .nav-link:hover::after {
            width: 80%;
        }

        .navbar-toggler {
            border: none;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Search Form Enhancement */
        .navbar .form-control {
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s ease;
        }

        .navbar .form-control:focus {
            background: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            transform: scale(1.02);
        }

        .navbar .btn-light {
            border-radius: 25px;
            border: none;
            background: white;
            color: #198754;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar .btn-light:hover {
            background: #d1e7dd;
            transform: scale(1.05);
        }

        .navbar .btn-dark {
            border-radius: 25px;
            background: rgba(0, 0, 0, 0.8);
            border: 2px solid white;
            transition: all 0.3s ease;
        }

        .navbar .btn-dark:hover {
            background: white;
            color: #198754;
            transform: scale(1.05);
        }

        /* BUTTON */
        .btn-primary {
            background-color: #198754;
            border: none;
        }

        .btn-primary:hover {
            background-color: #157347;
        }

        /* CARD */
        .card {
            border: none;
            border-radius: 12px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

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
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <!-- MENU KATEGORI -->
                <ul class="navbar-nav me-auto">
                    <?php while ($k = mysqli_fetch_assoc($kategori)):
                        // Function to get appropriate icon based on category name
                        $icon = 'fas fa-tag'; // default icon
                        $cat_name = strtolower($k['nama_kategori']);

                        if (strpos($cat_name, 'politik') !== false) $icon = 'fas fa-landmark';
                        elseif (strpos($cat_name, 'ekonomi') !== false || strpos($cat_name, 'bisnis') !== false) $icon = 'fas fa-chart-line';
                        elseif (strpos($cat_name, 'olahraga') !== false || strpos($cat_name, 'sport') !== false) $icon = 'fas fa-trophy';
                        elseif (strpos($cat_name, 'teknologi') !== false || strpos($cat_name, 'tech') !== false) $icon = 'fas fa-microchip';
                        elseif (strpos($cat_name, 'hiburan') !== false || strpos($cat_name, 'entertainment') !== false) $icon = 'fas fa-film';
                        elseif (strpos($cat_name, 'kesehatan') !== false || strpos($cat_name, 'health') !== false) $icon = 'fas fa-heartbeat';
                        elseif (strpos($cat_name, 'pendidikan') !== false || strpos($cat_name, 'education') !== false) $icon = 'fas fa-graduation-cap';
                        elseif (strpos($cat_name, 'internasional') !== false) $icon = 'fas fa-globe';
                        elseif (strpos($cat_name, 'nasional') !== false) $icon = 'fas fa-flag';
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?kategori=<?= $k['id_kategori']; ?>">
                                <i class="<?= $icon ?> me-1"></i><?= $k['nama_kategori']; ?>
                            </a>
                        </li>
                    <?php endwhile; ?>

                    <li class="nav-item">
                        <a class="nav-link text-warning" href="trending.php">
                            <i class="fas fa-fire me-1"></i>Trending
                        </a>
                    </li>
                </ul>

                <!-- SEARCH -->
                <form class="d-flex me-3" method="GET" action="index.php">
                    <input class="form-control me-2" type="text" name="search"
                        placeholder="Cari berita...">
                    <button class="btn btn-light">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <!-- LOGIN -->
                <a href="login.php" class="btn btn-dark ms-2">
                    <i class="fas fa-sign-in-alt me-1"></i>Login
                </a>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4 main-content">

        <h3 class="mb-4">🔥 Trending News</h3>

        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($artikel)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow h-100">

                        <img src="img/<?= $row['gambar']; ?>" class="card-img-top">

                        <div class="card-body">
                            <small class="text-muted">
                                <?= $row['nama_kategori']; ?> | 👁 <?= $row['views']; ?>
                            </small>

                            <h5 class="mt-2 fw-bold"><?= $row['judul']; ?></h5>

                            <p class="text-muted small">
                                <?= substr($row['isi'], 0, 100); ?>...
                            </p>

                            <a href="detail.php?id=<?= $row['id_artikel']; ?>"
                                class="btn btn-success btn-sm">
                                Baca
                            </a>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

    <!-- FOOTER -->
    <footer class="text-center p-3">
        <small>© <?= date('Y'); ?> Portal Berita</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>