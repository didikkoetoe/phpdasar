<?php

$mahasiswa = [["Didik Prabowo", "8525676471756", "Tehnik Informatika", "daniel@gmail.com"], ["Joko Prabowo", "8525676471756", "Tehnik a", "jokol@gmail.com"], ["Rudi", "821578465", "Tehnik industri", "rudi@gmail.com"]];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>NIM: <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>email : <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach ?>
</body>

</html>