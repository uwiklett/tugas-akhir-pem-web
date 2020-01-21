<?php
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "Kamu berhasil Keluar";

header("Location: login.php");
?>