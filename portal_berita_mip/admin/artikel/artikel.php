<?php
include '../koneksi.php';

// pagination
$limit = 5;
$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$start = ($page - 1) * $limit;

// search
$search = isset($_GET['search']) ? $_GET['search'] : '';

// query join kategori
$query = "SELECT artikel.*, kategori.nama_kategori 
          FROM artikel 
          LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
          WHERE judul LIKE '%$search%' 
          ORDER BY id_artikel DESC 
          LIMIT $start, $limit";

$result = mysqli_query($conn, $query);

// total data
$total = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT COUNT(*) as total FROM artikel WHERE judul LIKE '%$search%'"
))['total'];

$totalPage = ceil($total / $limit);
?>

<h3 class="mb-3">📄 Data Artikel</h3>

<div class="card shadow">
    <div class="card-body">

        <!-- TOP BAR -->
        <div class="d-flex flex-wrap justify-content-between mb-3 gap-2">
            <a href="index.php?page=tambah_artikel" class="btn btn-success">
                + Tambah Artikel
            </a>

            <form method="GET" class="d-flex">
                <input type="hidden" name="page" value="artikel">
                <input type="text" name="search" class="form-control me-2"
                    placeholder="Cari judul..." value="<?= $search ?>">
                <button class="btn btn-primary">Cari</button>
            </form>
        </div>

        <!-- TABLE -->
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Views</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = $start + 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <img src="../img/<?= $row['gambar']; ?>"
                                    class="rounded"
                                    style="width:70px; height:50px; object-fit:cover;">
                            </td>

                            <td class="text-start"><?= $row['judul']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['penulis']; ?></td>
                            <td><?= $row['views']; ?></td>

                            <td class="text-nowrap">
                                <a href="index.php?page=edit_artikel&id=<?= $row['id_artikel'] ?>"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                <a href="index.php?page=hapus_artikel&id=<?= $row['id_artikel'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus artikel ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <nav>
            <ul class="pagination justify-content-center mt-3">
                <?php for ($i = 1; $i <= $totalPage; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link"
                            href="index.php?page=artikel&p=<?= $i ?>&search=<?= $search ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>
</div>