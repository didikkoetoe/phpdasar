<?php
session_start();
if (!$_SESSION["key"]) {
    header("Location: login.php");
    exit;
}

require "functions.php";
// Tangkap id
$id = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM teman WHERE id=$id");
$friend = mysqli_fetch_assoc($result);

// Cek apakah tombol Edit di tekan
if (isset($_POST["edit"])) {
    // Masukan data
    if (edit($_POST) > 0) {
        echo "<script>
        alert('Data berhasil di Update');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di update');
        document.location.href='index.php';
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
    <title>Tambah Teman</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="css/tambah.css">
    <script src="js/jquery.js"></script>
</head>

<body>
    <!-- Form Tambah -->
    <div class="container border rounded">
        <h2 class="text-center mt-3 mb-3">Edit Data</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="form" id="form">
            <input type="hidden" name="id" value="<?= $friend["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $friend["gambar"]; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Teman Anda" required autocomplete="off" value="<?= $friend["nama"]; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat :</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-search-location"></i></div>
                    <input type="text" name="alamat" id="alamat" class="form-control" autocomplete="off" placeholder="Masukan Alamat" value="<?= $friend["alamat"]; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-school"></i></div>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" autocomplete="off" placeholder="Masukan Jurusan" value="<?= $friend["jurusan"]; ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Ulang Tahun : </label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="<?= $friend["birthday"]; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <img style="width: 100px; height:100px" class="rounded mx-auto d-block" src="img/<?= $friend["gambar"]; ?>" alt="<?= $fried["nama"]; ?>">
                <div class="input-group">
                    <input type="file" name="gambar" class="form-control" value="<?= $friend["gambar"]; ?>">
                    <div class="input-group-text"><i class="fas fa-image"></i></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-3 float-end" name="edit">Edit</button>
            <a href="index.php" class="btn btn-success">Kembali</a>
        </form>
    </div>
    <!-- Ahkir Form Tambah -->

    <script src="js/bootstrap.min.js"></script>
</body>

</html>