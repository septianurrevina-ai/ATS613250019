<?php
include "cek_login.php";
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nomor = mysqli_real_escape_string($koneksi, $_POST['nomor_kendaraan']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis_kendaraan']);
    $pemilik = mysqli_real_escape_string($koneksi, $_POST['pemilik']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun_pembuatan']);

    mysqli_query($koneksi, "INSERT INTO mobil019 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) VALUES ('$nomor', '$jenis', '$pemilik', '$tahun')");

    header("Location: index.php");
    exit;
}

include "header.php";
?>

<h4 class="mb-3">Tambah Data Kendaraan</h4>

<form method="POST">
    <div class="mb-3">
        <label>Nomor Kendaraan</label>
        <input type="text" name="nomor_kendaraan" class="form-control" maxlength="12" required>
    </div>
    <div class="mb-3">
        <label>Jenis Kendaraan</label>
        <select name="jenis_kendaraan" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="Sedan">Sedan</option>
            <option value="Pickup">Pickup</option>
            <option value="Truk">Truk</option>
            <option value="Bemo">Bemo</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Pemilik</label>
        <input type="text" name="pemilik" class="form-control" maxlength="50" required>
    </div>
    <div class="mb-3">
        <label>Tahun Pembuatan</label>
        <input type="text" name="tahun_pembuatan" class="form-control" maxlength="4" pattern="[0-9]{4}" title="Isi 4 digit angka" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>

<?php include "footer.php"; ?>