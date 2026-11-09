<?php
include "cek_login.php";
include "koneksi.php";
include "header.php";

$query = mysqli_query($koneksi, "SELECT * FROM mobil019 ORDER BY no_id ASC");
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Data Kendaraan</h4>
    <a href="tambah.php" class="btn btn-success">+ Tambah Data</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nomor Kendaraan</th>
            <th>Jenis Kendaraan</th>
            <th>Pemilik</th>
            <th>Tahun Pembuatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nomor_kendaraan']) ?></td>
            <td><?= $row['jenis_kendaraan'] ?></td>
            <td><?= htmlspecialchars($row['pemilik']) ?></td>
            <td><?= $row['tahun_pembuatan'] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['no_id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                <a href="hapus.php?id=<?= $row['no_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "footer.php"; ?>