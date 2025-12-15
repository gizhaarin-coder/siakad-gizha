<?php
session_start();
require 'config.php';

$message = "";

// STEP 1: cek email
if (isset($_POST['cek_email'])) {
    $email = mysqli_real_escape_string($konek, $_POST['email']);

    $cek = mysqli_query($konek, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['reset_email'] = $email;
    } else {
        $message = "Email tidak ditemukan";
    }
}

// STEP 2: reset password
if (isset($_POST['reset_password'])) {
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if ($password != $confirm) {
        $message = "Password tidak sama";
    } else {
        $email = $_SESSION['reset_email'];
        $hash  = md5($password);

        mysqli_query($konek, "UPDATE users SET password='$hash' WHERE email='$email'");
        unset($_SESSION['reset_email']);

        $message = "Password berhasil diubah. <a href='index.php'>Login</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f9;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        padding: 30px 25px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .box h3 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    input:focus {
        outline: none;
        border-color: #007bff;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    .msg {
        margin-top: 15px;
        text-align: center;
        color: red;
        font-size: 14px;
    }

    .msg a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }
</style>

</head>
<body>
<div class="box">
    <h3>Lupa Password</h3>

    <?php if (!isset($_SESSION['reset_email'])): ?>
        <!-- FORM EMAIL -->
        <form method="post">
            <input type="email" name="email" placeholder="Masukkan email" required>
            <button type="submit" name="cek_email">Lanjut</button>
        </form>
    <?php else: ?>
        <!-- FORM PASSWORD BARU -->
        <form method="post">
            <input type="password" name="password" placeholder="Password baru" required>
            <input type="password" name="confirm" placeholder="Ulangi password" required>
            <button type="submit" name="reset_password">Simpan Password</button>
        </form>
    <?php endif; ?>

    <?php if ($message): ?>
        <div class="msg"><?= $message ?></div>
    <?php endif; ?>
</div>
</body>
</html>
