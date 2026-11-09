<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

$pesan = "";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM member_019 WHERE email='$email' AND password='$password' AND aktive='1'");

    if (mysqli_num_rows($query) == 1) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $data['id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['nama'] = $data['nama'];
        header("Location: index.php");
        exit;
    } else {
        $pesan = "Email atau password salah, atau akun tidak aktif";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Rental Mobil Revina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Login Rental Mobil</h4>

                        <?php if ($pesan != "") { ?>
                            <div class="alert alert-danger"><?= $pesan ?></div>
                        <?php } ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>