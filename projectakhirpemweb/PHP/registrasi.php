<?php

require 'func.php';

    if (isset($_POST["register"]))
    {
        if (registrasi($_POST) > 0)
        {
            echo "<script> alert('user baru berhasil ditambahkan'); </script>";
        }
        else
        {
            echo mysqli_error($koneksi);
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="registrasi.css">
</head>
<body>
    <div class="loginbox">
    <h1>Registrasi di sini</h1>
    <form action="" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan Username" required>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukkan Email" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" placeholder="Masukkan Ulang Password" required>
                <button type="submit" name="register">Daftar</button>

                <a href="login.php">Login In Here</a>
    </form>
    </div>
</body>
</html>