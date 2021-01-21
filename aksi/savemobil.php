<?php
include "koneksi.php";

$no_polisi = $_POST["no_polisi"];
$merek = $_POST["merek"];
$nama  = $_POST["nama_mobil"];
$jenis = $_POST["jenis"];
$warna = $_POST["warna"];
$harga = $_POST["harga"];

$sql = "INSERT INTO mobil (no_polisi, merek, nama_mobil, jenis, warna, harga) VALUES 
('".$no_polisi."', '".$merek."', '".$nama."', '".$jenis."', '".$warna."', '".$harga."')";

$result = mysqli_query($koneksi, $sql) OR DIE
("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

if ($result)
    header("location: ../index.php?tab=mobil&jenis=tbh");

?>