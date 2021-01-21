<?php
include "koneksi.php";

$id_sewa    = $_GET['id_sewa'];
$denda      = 0;
$sql        = "SELECT * FROM sewa where id_sewa='".$id_sewa."'";
$result     = mysqli_query($koneksi, $sql);
$rs         = $result->fetch_array(MYSQLI_ASSOC);

$tgl         = $rs['tgl_sewa'];
$jam         = $rs['lama_sewa'];
$id_jaminan  = $rs['id_jaminan'];
$id_mobil    = $rs['id_mobil'];
$id_sopir    = $rs['id_sopir'];

$hari = intval ($jam/24);
$hari = $hari + 1;

$tanggal     = date("Y-m-d", strtotime("+$hari days",strtotime($tgl)));
$tglSekarang = date("Y-m-d", mktime(date("m"),date("d"),date("Y")));

if($tglSekarang > $tanggal){

    $selisih = strtotime($tglSekarang) - strtotime($tanggal);
    $hari    = $selisih / (60*60*24);
    $denda   = 100000 * $hari;
}

$kembali = "INSERT INTO pengembalian (id_sewa, tgl_kembali, denda) VALUES ('".$id_sewa."', '".$tglSekarang."', '".$denda."')";
$rs = mysqli_query($koneksi, $kembali) OR DIE ("error kembali");

$updateMobil = "UPDATE mobil SET status_mobil='Tidak Disewa' WHERE id_mobil='".$id_mobil."'";
$rs = mysqli_query($koneksi, $updateMobil) OR DIE ("error mobil");


//if (!empty($id_sopir)) {
if ($id_sopir > 1) {
    $updateSopir = "UPDATE sopir SET status_sopir='Tidak Disewa' WHERE id_sopir='".$id_sopir."'";
    $rs = mysqli_query($koneksi, $updateSopir) OR DIE ("error sopir");
}

header("location: ../index.php?tab=kembali&jenis=$denda");
?>