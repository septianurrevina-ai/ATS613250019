<?php
include "cek_login.php";
include "koneksi.php";

$id = (int) $_GET['id'];

mysqli_query($koneksi, "DELETE FROM mobil019 WHERE no_id=$id");

header("Location: index.php");
exit;
?>