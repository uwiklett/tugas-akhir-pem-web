<?php
    //koneksi ke database
//syntax connect nama localhost , username admin, password admin, nama database
$koneksi = mysqli_connect("localhost", "id12309650_psh1932", "uwiklett", "id12309650_psh");

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

    function registrasi ($data)
    {
        global $koneksi;

        $username = strtolower(stripslashes($data["username"]));
        $email = strtolower($data["email"]);
        $password = mysqli_real_escape_string($koneksi,$data["password"]);
        $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

        ///cek username ada atau belum
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username");
        if (mysqli_fetch_assoc($result)){
            echo "<script> 
                alert('username sudah terdaftar !!');
            </script> ";
            return false;
        }

        if ($password != $password2 )
        {
            echo "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";

            return false;
        }

        //enskripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database

        mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$email','$password')");

        return mysqli_affected_rows($koneksi);



    }



?>