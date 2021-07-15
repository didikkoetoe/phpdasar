<?php 

$conn = mysqli_connect("localhost" , "root" , "" , "buku");

function read ($qury) {
    global $conn;
    $rows = [];
    $result = mysqli_query($conn, $qury);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function create ($post) {
    global $conn;
    
    $judul = htmlspecialchars($post["judul"]);
    $pengarang = htmlspecialchars($post["pengarang"]);
    $tahun = htmlspecialchars($post["tahun"]);
    $penerbit = htmlspecialchars($post["penerbit"]);
    $gambar = htmlspecialchars($post["gambar"]);

    $query = "INSERT INTO buku VALUES(
        '', '$judul' , '$pengarang', '$tahun' , '$penerbit', '$gambar')";
    
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
        
}

function delete ($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM buku WHERE id=$id");
    return mysqli_affected_rows($conn);
}

?>