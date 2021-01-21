<?php
include "koneksi.php";

$nama   = $_POST["nama"];
$gender = $_POST["gender"];
$alamat = $_POST["alamat"];
$no_tlp = $_POST["no_tlp"];
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO penyewa (nama_penyewa, gender, alamat_penyewa, notlp_penyewa, username, password) VALUES 
        ('".$nama."', '".$gender."', '".$alamat."', '".$no_tlp."', '".$username."', '".$password."')";

$result = mysqli_query($koneksi, $sql) OR DIE ("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");
if ($result)
    header("location: ../index.php?tab=penyewa&jenis=tbh");

?>