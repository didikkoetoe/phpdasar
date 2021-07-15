<?php 

require "function.php";

$id = $_GET["id"];

$book = read("SELECT * FROM buku WHERE id=$id")[0];

if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        echo "<script>
        alert('data berhasil di edit');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal di edit');
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
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambahkan Buku</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <label for="judul">Judul Buku : </label>
                <input type="text" name="judul" id="judul" autocomplete="off" required placeholder="<?= $book["judul"]; ?>" value="<?= $book["judul"]; ?>">
            </li>
            <li>
                <label for="pengarang">Pengarang : </label>
                <input type="text" name="pengarang" id="pengarang" autocomplete="off" required placeholder="<?= $book["pengarang"]; ?>" value="<?= $book["pengarang"]; ?>">
            </li>
            <li>
                <label for="tahun">Tahun Terbit : </label>
                <input type="text" name="tahun" id="tahun" autocomplete="off" required placeholder="<?= $book["tahun"]; ?>" value="<?= $book["tahun"]; ?>">
            </li>
            <li>
                <label for="penerbit">Penerbit : </label>
                <input type="text" name="penerbit" id="penerbit" autocomplete="off" required placeholder="<?= $book["penerbit"]; ?>" value="<?= $book["penerbit"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" autocomplete="off" required placeholder="<?= $book["gambar"]; ?>" value="<?= $book["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
    
</body>
</html>