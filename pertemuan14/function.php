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

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

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
    $gambarLama = htmlspecialchars($post["gambarLama"]);

    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

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

function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];

    // Cek apakah sudah ada file yang di upload atau belum
    if ($error == 4) {
        echo "<script>
        alert('File belum di upload');
        </script>";
        return false;
    }

    // Cek apakah file yang di upload ber ekstensi jpg, jpeg, atau png
    $ekstensiFileBenar = ["jpg", "jpeg", "png"];
    $ekstensiFileUser = explode(".", $namaFile);
    $hasilEkstensiFile = strtolower(end($ekstensiFileUser));
    if (!in_array($hasilEkstensiFile, $ekstensiFileBenar)) {
        echo "<script>
        alert('Ekstensi file salah');
        </script>";
        return false;
    }

    // Cek size gambar
    if ($size > 2_000_000) {
        echo "<script>
        alert('File terlalu besar');
        </script>";
        return false;
    }
    // Lolo pengecekan gambar siap di upload
    // tapi sebelum itu ubah nama file agar tidak ada nama file yang sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $hasilEkstensiFile;

    move_uploaded_file($tmpName, '../image/' . $namaFileBaru);

    return $namaFileBaru;
}

// function register
function register ($post) {
    global $conn;

    // tampung username dan buat username menjadi tidak case sensitive
    $username = strtolower(stripslashes($post["username"]));
    // Buat agar password mampu menampung karakter kutip satu atau dua yang menyebabkan error
    $password = mysqli_real_escape_string($conn, $post["password"]);
    $password2 = mysqli_real_escape_string($conn, $post["password2"]);

    // Cek apakah username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah ada');
        </script>";
        return false;
    }
    
    // Cek apakah password yang di masukan sama atau tidak
    if ( $password != $password2 ) {
        echo "<script>
        alert('Password yang anda masukan tidak sesuai');
        </script>";
        return false;
    } 

    // Jika sama enkripsi password telebih dahulu
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // Jika semua benar, masukan user baru ke database;
    mysqli_query($conn, "INSERT INTO users VALUES(
        '', '$username', '$password')");

    return mysqli_affected_rows($conn);
}