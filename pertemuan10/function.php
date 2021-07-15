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

?>