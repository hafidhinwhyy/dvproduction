<?php 

$host ="localhost";
$username = "root";
$password = "";
$database = "paud";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error){
    echo "koneksi error". mysqli_connect_error();
    die;
}else{
    // echo "berhasil";
}


?>