<?php
// $students = [
//     ["Didik Prabowo", "892536748", "Tehnik informatika", "Daniel@gmail.com"],
//     ["Joko abc", "32858965", "Tehnik mesin", "joko@gmail.com"]
// ];

// Array Associtive
// Definisinya seperti array numeric
// key nya adalah string yang kita buay sendiri
$mahasiswa = [
    [
        "nama" => "Didik Prabowo",
        "nim" => "7458926576",
        "jurusan" => "Tehnik informatika",
        "email" => "daniel@gmail.com",
        "gambar" => "think.jpg"
    ],
    [
        "nama" => "Joko budi",
        "nim" => "4256764647",
        "jurusan" => "Tehnik mesin",
        "email" => "joko@gmail.com",
        "gambar" => "7habits.jpg"
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $maha) : ?>
        <ul>
            <li>
                <img src="../image/<?= $maha["gambar"]; ?>" alt="">
            </li>
            <li>Nama : <?= $maha["nama"]; ?></li>
            <li>nim : <?= $maha["nim"]; ?></li>
            <li>jurusan : <?= $maha["jurusan"]; ?></li>
            <li>email : <?= $maha["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>