<?php
include '../config.php';

$pesan = "";

if (isset($_POST['simpan'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Cek email sudah ada
    $cek = mysqli_prepare($konek, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($cek, "s", $email);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);

    if (mysqli_stmt_num_rows($cek) > 0) {
        $pesan = "<div class='alert alert-warning'>Email sudah terdaftar. Gunakan email lain.</div>";
    } else {
        $pass_hash = md5($password);

        $query = "INSERT INTO users (username, email, password, level) VALUES (?, ?, ?, 'admin')";
        $stmt = mysqli_prepare($konek, $query);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $pass_hash);

        if (mysqli_stmt_execute($stmt)) {
            $pesan = "<div class='alert alert-success'>Admin berhasil ditambahkan.</div>";
        } else {
            $pesan = "<div class='alert alert-danger'>Terjadi kesalahan: " . mysqli_error($konek) . "</div>";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_stmt_close($cek);
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Admin | Superadmin</title>
    <link rel="stylesheet" href="../path-to-bootstrap.css">
    <link rel="stylesheet" href="../path-to-bootstrap-icons.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Admin Baru</h3>

    <?= $pesan; ?>

    <form action="" method="post">
        <!-- Username -->
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <div class="form-floating flex-grow-1">
                <input id="username" type="text" name="username" class="form-control" placeholder="Username" required />
                <label for="username">Username</label>
            </div>
        </div>

        <!-- Email -->
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <div class="form-floating flex-grow-1">
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" required />
                <label for="email">Email</label>
            </div>
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <div class="form-floating flex-grow-1">
                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required />
                <label for="password">Password</label>
            </div>
        </div>

        <button type="submit" name="simpan" class="btn btn-success">Simpan Admin</button>
        <a href="./?p=dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
