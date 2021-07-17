<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Hubungkan dengan halaman function.php
require "function.php";

// cek apakah tombol sumbit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    // Cek apakah data sudah berhasil di tambahkan atau belum
    if (create($_POST) > 0) {
        // Jika berhasil alert berhasil dan pindah ke halaman index
        echo "<script>
        alert('Data berhasil di tambahakan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di tambahakan');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>

<body>
    <h1>Tambahkan Buku</h1>

    <ul>
        <form action="" method="POST" enctype="multipart/form-data">
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul" required autocomplete="off">
            </li>
            <li>
                <label for="pengarang">Pengarang : </label>
                <input type="text" name="pengarang" id="pengarang" required autocomplete="off">
            </li>
            <li>
                <label for="tahun">Tahun Terbit : </label>
                <input type="text" name="tahun" id="tahun" required autocomplete="off">
            </li>
            <li>
                <label for="penerbit">Penerbit : </label>
                <input type="text" name="penerbit" id="penerbit" required autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </form>
    </ul>

</body>

</html>