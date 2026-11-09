<?php
include "cek_login.php";
include "koneksi.php";

$id = (int) $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM mobil019 WHERE no_id=$id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $nomor = mysqli_real_escape_string($koneksi, $_POST['nomor_kendaraan']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis_kendaraan']);
    $pemilik = mysqli_real_escape_string($koneksi, $_POST['pemilik']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun_pembuatan']);

    mysqli_query($koneksi, "UPDATE mobil019 SET nomor_kendaraan='$nomor', jenis_kendaraan='$jenis', pemilik='$pemilik', tahun_pembuatan='$tahun' WHERE no_id=$id");

    header("Location: index.php");
    exit;
}

include "header.php";
?>

<h4 class="mb-3">Ubah Data Kendaraan</h4>

<form method="POST">
    <div class="mb-3">
        <label>Nomor Kendaraan</label>
        <input type="text" name="nomor_kendaraan" class="form-control" maxlength="12" value="<?= htmlspecialchars($data['nomor_kendaraan']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Jenis Kendaraan</label>
        <select name="jenis_kendaraan" class="form-select" required>
            <?php
            $pilihan = ["Sedan", "Pickup", "Truk", "Bemo"];
            foreach ($pilihan as $p) {
                $selected = ($data['jenis_kendaraan'] == $p) ? "selected" : "";
                echo "<option value='$p' $selected>$p</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Pemilik</label>
        <input type="text" name="pemilik" class="form-control" maxlength="50" value="<?= htmlspecialchars($data['pemilik']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Tahun Pembuatan</label>
        <input type="text" name="tahun_pembuatan" class="form-control" maxlength="4" pattern="[0-9]{4}" title="Isi 4 digit angka" value="<?= $data['tahun_pembuatan'] ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>

<?php include "footer.php"; ?>