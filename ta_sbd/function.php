<?php
$conn = mysqli_connect("localhost","root","","ta_sbd");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
    }
    return $rows;
}

function cari($keyword) {
    $query = "SELECT * FROM coffee WHERE lower(nama_coffee) like lower ('%$keyword%')";
    return query($query);
}
?>