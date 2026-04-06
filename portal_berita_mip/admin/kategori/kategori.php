<?php
include '../koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM kategori");
?>

<h3>Data Kategori</h3>

<div class="card shadow">
    <div class="card-body">

        <a href="index.php?page=tambah_kategori" class="btn btn-success mb-3">
            + Tambah Kategori
        </a>

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_kategori'] ?></td>
                    <td>
                        <a href="index.php?page=edit_kategori&id=<?= $row['id_kategori'] ?>"
                            class="btn btn-warning btn-sm me-2">Edit</a>

                        <a href="index.php?page=hapus_kategori&id=<?= $row['id_kategori'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>

        </table>

    </div>
</div>