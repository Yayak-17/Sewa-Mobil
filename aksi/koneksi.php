<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sewamobil";
$koneksi = mysqli_connect($host, $username, $password, $database);

if ($koneksi) {
//    echo "connected";
} else {
    echo "Server not connected";
}
?>