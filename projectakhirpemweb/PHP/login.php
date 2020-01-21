<?php
    require '../PHP/func.php';

    if (isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1){
            //cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["Password"])){
                header("Location: ../html/home.html");
                exit;
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <title>Masuk</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="loginbox">
    <h1>Masuk Di sini</h1>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Masukkan Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Masukkan Password">
            <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic;">Username / Password salah!!</p>
            <?php endif; ?>
            <button type="submit" name="login">Masuk</button>
            <a href="registrasi.php">Tidak Punya Akun ?</a>
        </form>

    </div>
</body>
</html>