<?php
session_start();
include '../koneksi.php';

// proteksi admin
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

// ambil halaman
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #198754 0%, #157347 100%) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
            border-bottom: 3px solid #0f5132;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
        }

        .navbar .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar .nav-link:hover {
            color: #d1e7dd !important;
            transform: translateY(-1px);
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #d1e7dd;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar .nav-link:hover::after {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            background: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=dashboard">
                <i class="fas fa-cog me-2"></i>Portal Admin
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php?page=dashboard" class="nav-link">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=artikel" class="nav-link">
                            <i class="fas fa-newspaper me-1"></i>Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?page=kategori" class="nav-link">
                            <i class="fas fa-tags me-1"></i>Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link text-danger">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">

        <?php
        switch ($page) {

            case 'dashboard':
                include "dashboard.php";
                break;

            case 'artikel':
                include "artikel/artikel.php";
                break;
            case 'tambah_artikel':
                include "artikel/tambah_artikel.php";
                break;
            case 'edit_artikel':
                include "artikel/edit_artikel.php";
                break;
            case 'hapus_artikel':
                include "artikel/hapus_artikel.php";
                break;

            case 'kategori':
                include "kategori/kategori.php";
                break;
            case 'tambah_kategori':
                include "kategori/tambah_kategori.php";
                break;
            case 'edit_kategori':
                include "kategori/edit_kategori.php";
                break;
            case 'hapus_kategori':
                include "kategori/hapus_kategori.php";
                break;

            default:
                echo "<h4>Halaman tidak ditemukan</h4>";
                break;
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>