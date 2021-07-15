<?php
$books = [
    [
        "judul" => "7 Habits of Highly Effective People",
        "pengarang" => "Stephen R. Covey",
        "tahun" => "1989",
        "penerbit" => "Free Press",
        "sampul" => "7habits.jpg"
    ],
    [
        "judul" => "Atomic Habit",
        "pengarang" => "James Clear",
        "tahun" => "2018",
        "penerbit" => "Gramedia",
        "sampul" => "atomic.jpg"
    ],
    [
        "judul" => "Rich Dad Poor Dad",
        "pengarang" => "Robert T Kiyosaki",
        "tahun" => "1997",
        "penerbit" => "gramedia",
        "sampul" => "rich.jpg"
    ],
    [
        "judul" => "Thnik and Grow Rich",
        "pengarang" => "Napoleon Hill",
        "tahun" => "1937",
        "penerbit" => "Gramedia",
        "sampul" => "think.jpg"
    ],
    [
        "judul" => "Mans Search For Meaning",
        "pengarang" => "Viktor Frankl",
        "tahun" => "1946",
        "penerbit" => "Gramedia",
        "sampul" => "victor.jpg"
    ]

];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>
    <h1>Daftar Buku</h1>

    <ul>
        <?php foreach ($books as $book) : ?>
            <li><a href="latihan2.php?judul=<?= $book["judul"]; ?>&pengarang=<?= $book["pengarang"]; ?>&tahun=<?= $book["tahun"]; ?>&penerbit=<?= $book["penerbit"]; ?>&sampul=<?= $book["sampul"]; ?>"><?= $book["judul"]; ?></a></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>