<?php
include "koneksi.php";

$id_mobil   = $_GET['id_mobil'];
$no_polisi  = $_POST['no_polisi'];
$merek      = $_POST['merek'];
$nama_mobil = $_POST['nama_mobil'];
$warna      = $_POST['warna'];
$harga      = $_POST['harga'];

$sql = "UPDATE mobil SET no_polisi = '{$no_polisi}', merek = '{$merek}', nama_mobil = '{$nama_mobil}', warna ='{$warna}', harga='{$harga}' WHERE id_mobil='{$id_mobil}'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    header("location: ../index.php?tab=mobil&jenis=update");
} else {
    die('gagal update');
}