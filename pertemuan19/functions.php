<?php
$conn = new mysqli("localhost", "root", "", "latihan") or die(mysqli_error($conn));

function read($query)
{
    global $conn;
    $rows = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insert($post)
{
    global $conn;

    $nama = htmlspecialchars($post["nama"]);
    $alamat = htmlspecialchars($post["alamat"]);
    $jurusan = htmlspecialchars($post["jurusan"]);
    $birthday = htmlspecialchars($post["birthday"]);
    $gambar = upload();

    $query = "INSERT INTO teman VALUES (
                '', '$nama', '$alamat', '$jurusan', '$birthday', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    global $conn;
    $name = $_FILES["gambar"]["name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // Cek apakah ada file yang di upload atau tidak
    if ($error === 4) {
        echo "<script>
        alert('Belum ada foto yang upload');
        </script>";
        return false;
        die;
    }

    // Cek apakah ukuran file tidak terlau besar
    if ($size > 2_000_000) {
        echo "<script>
        alert('Ukuran file terlalu besar');
        </script>";
        return false;
        die;
    }

    // Cek ekstensi gambar
    $ekstensiGambarValid = ["jpeg", "jpg", "png"];
    $ekstensiGambarUser = explode(".", $name);
    $ekstensiFiks = strtolower(end($ekstensiGambarUser));
    if (!in_array($ekstensiFiks, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan foto');
        </script>";
        return false;
        die;
    }

    // Ubah nama foto agar tidak ada nama file gambar yang sama
    $nama = uniqid();
    $nama .= '.';
    $nama .= $ekstensiFiks;

    // Pindahkan file upload ke directory kita
    move_uploaded_file($tmpName, 'img/' . $nama);

    return $nama;
}

function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM teman WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function edit($post)
{
    global $conn;

    $id = $post["id"];
    $nama = htmlspecialchars($post["nama"]);
    $alamat = htmlspecialchars($post["alamat"]);
    $jurusan = htmlspecialchars($post["jurusan"]);
    $birthday = htmlspecialchars($post["birthday"]);
    $gambarLama = $post["gambarLama"];
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "Update teman SET
                nama = '$nama',
                alamat = '$alamat',
                jurusan = '$jurusan',
                birthday = '$birthday',
                gambar = '$gambar'
            WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    global $conn;

    $result = "SELECT * FROM teman WHERE
                nama LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                birthday LIKE '%$keyword%'";

    return read($result);
}

function register($post)
{
    global $conn;

    $username = strtolower($post["username"]);
    $email = $post["email"];
    $password = password_hash(stripslashes($post["password"]), PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES(
        '', '$username', '$email', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
