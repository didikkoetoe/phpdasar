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
    $gambar = $post["gambar"];

    $query = "INSERT INTO teman VALUES (
                '', '$nama', '$alamat', '$jurusan', '$birthday', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function upload()
// {
//     $name = $_FILES["name"];
//     $error = $_FILES["error"];
//     $tmpName = $_FILES["tmp_name"];

//     // Cek apakah ada file yang di upload atau tidak
//     if ($error === 4) {

//     }
// }
