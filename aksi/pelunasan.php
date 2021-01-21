<?php
include "koneksi.php";
$id     = $_GET['id_bayar'];
$tgl    = date("Y-m-d", mktime(date("m"),date("d"),date("Y")));

$sql1 = mysqli_query($koneksi, "SELECT * FROM bayar WHERE id_bayar ='".$id."'");

$rs     = $sql1->fetch_array(MYSQLI_ASSOC);
$total  = $rs['total_bayar'] + $rs['kurang'];

$sql = mysqli_query($koneksi, "UPDATE bayar SET status_bayar='Lunas', kurang='0',total_bayar='".$total."', tgl_bayar='".$tgl."' 
        WHERE id_bayar='".$id."'");
$rs = mysqli_query($koneksi, $sql);
header("location: ../index.php?tab=bayar&jenis=lunas")
?>