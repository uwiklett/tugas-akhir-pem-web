<?php
//koneksi ke database
//syntax connect nama localhost , username admin, password admin, nama database
$koneksi = mysqli_connect("localhost", "root", "", "psh");

//ambil data dari tabel database 
$result = mysqli_query($koneksi, "SELECT * FROM lamongan");//koneksi database, ambil data apa ?

//ambil data (fetch) lamongan dari objek result
//pertama mysqli_fetch_row(); // mengembalikan array angka
//kedua mysqli_fetch_assoc(); // mengembalikan array huruf
//ketiga mysqli_fetch_array(); // mengembaikan array angka dan huruf
//keempat mysqli_fetch_object(); //

//while ( $lmg = mysqli_fetch_row($result) ){//($result[1]) array ke 1 
  //  var_dump ($lmg[1]);
//} 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Info Database</title>
</head>
<body>
    <h1>Daftar Orang Yang daftar</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No</td>
            <td>Aksi</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Email</td>
            <td>Alamat</td>
        </tr>
        <?php  $i = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result) ) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td>
                <a href="">Ubah</a>
                <a href="">Delete</a>
            </td>
            <td><?php echo $row["Nama"]; ?></td>
            <td><?php echo $row["Jenis Kelamin"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td><?php echo $row["Tempat Tinggal"]; ?></td>
        </tr>
        <?php  $i++; ?>
        <?php endwhile; ?>
    </table>
</body>
</html>