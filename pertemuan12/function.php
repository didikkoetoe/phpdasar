<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "buku");

// function untuk query baca data di table buku dan mengembalikan isinya
function read($query)
{
    global $conn;
    // tangkap hasil query dari database
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function untuk menambah data
function create($post)
{
    // buat $conn menjadi global
    global $conn;
    // Tangkap data yang dikirim melalui method request $_POST yang di ganti menjadi $post
    $judul = htmlspecialchars($post["judul"]);
    $pengarang = htmlspecialchars($post["pengarang"]);
    $tahun = htmlspecialchars($post["tahun"]);
    $penerbit = htmlspecialchars($post["penerbit"]);
    $gambar = htmlspecialchars($post["gambar"]);

    // buat query untuk menambahkan data
    $query = "INSERT INTO buku VALUES (
        '', '$judul', '$pengarang', '$tahun', '$penerbit', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM buku WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function update($post)
{
    global $conn;
    // Tangkap data yang dikirim melalui method request $_POST yang di ganti menjadi $post
    $id = $post["id"];
    $judul = htmlspecialchars($post["judul"]);
    $pengarang = htmlspecialchars($post["pengarang"]);
    $tahun = htmlspecialchars($post["tahun"]);
    $penerbit = htmlspecialchars($post["penerbit"]);
    $gambar = htmlspecialchars($post["gambar"]);

    // buat query untuk menambahkan data
    $query = "UPDATE buku SET
                judul = '$judul',
                pengarang = '$pengarang',
                tahun = '$tahun',
                penerbit = '$penerbit',
                gambar = '$gambar'
            WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword)
{
    global $conn;
    $query = "SELECT * FROM buku WHERE
                judul LIKE '%$keyword%' OR
                pengarang LIKE '%$keyword%' OR
                tahun LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%'
                ";
    return read($query);
}
