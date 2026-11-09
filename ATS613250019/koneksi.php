<?php
$koneksi = mysqli_connect("localhost", "root", "", "ATS613250019");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>