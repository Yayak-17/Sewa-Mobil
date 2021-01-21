<?php
include "koneksi.php";
$tbl    = $_GET['tbl'];
$id     = $_GET['id'];

if($tbl=="mobil")
    $sql = "DELETE FROM mobil WHERE id_mobil='".$id."'";
if($tbl=="sopir")
    $sql = "DELETE FROM sopir WHERE id_sopir='".$id."'";

if ($query = mysqli_query($koneksi, $sql))
    header("location: ../index.php?tab=".$tbl."&jenis=hapus");


?>