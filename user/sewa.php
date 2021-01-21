<?php
include "../aksi/koneksi.php";
session_start();

$id_penyewa     = $_SESSION['id_penyewa'];
$id_mobil       = $_POST['id_mobil'];
$id_sopir       = empty($_POST['id_sopir']) ? null : $_POST['id_sopir'];
$hari           = $_POST['hari'];
$jam            = $_POST['jam'];
$jenis_jaminan  = $_POST['jenis_jaminan'];
$no_jaminan     = $_POST['nomor_jaminan'];
$atas_nama      = $_POST['atas_nama'];
$bayar          = $_POST['bayar'];

$sqljaminan = "INSERT INTO jaminan (jenis_jaminan, no_jaminan, atas_nama) VALUES 
                ('" . $jenis_jaminan . "', '" . $no_jaminan . "', '" . $atas_nama . "')";
$result     = mysqli_query($koneksi, $sqljaminan)
or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");


$sqljaminan     = "SELECT * FROM jaminan WHERE no_jaminan='" . $no_jaminan . "'";
$rsjaminan      = mysqli_query($koneksi, $sqljaminan);
$rs             = $rsjaminan->fetch_array(MYSQLI_ASSOC);
$id_jaminan     = $rs['id_jaminan'];

$sqlmobil   = "SELECT * FROM mobil WHERE id_mobil='" . $id_mobil . "'";
$rsmobil    = mysqli_query($koneksi, $sqlmobil);
$rs         = $rsmobil->fetch_array(MYSQLI_ASSOC);

$harga      = $rs['harga'];
$jamhari    = $hari * 24;
$lama       = $jamhari + $jam;
$totalHarga = $harga * $lama;


if ($id_sopir > 1) {
    $totalHarga = $totalHarga + 50000;
}

$tanggal = date("Y-m-d", mktime(date("m"), date("d"), date("Y")));

if (empty($id_sopir)) {
    $sqlsewa = "INSERT INTO sewa (id_penyewa, id_mobil, id_jaminan, tgl_sewa, lama_sewa, harga_sewa) VALUES
            ('" . $id_penyewa . "','" . $id_mobil . "','" . $id_jaminan . "','" . $tanggal . "','" . $lama . "','" . $totalHarga ."')";
} else {
    $sqlsewa = "INSERT INTO sewa (id_penyewa, id_mobil, id_sopir, id_jaminan, tgl_sewa, lama_sewa, harga_sewa) VALUES
    ('" . $id_penyewa . "','" . $id_mobil . "','{$id_sopir}','" . $id_jaminan . "','" . $tanggal . "','" . $lama . "','" . $totalHarga . "')";
}

$result = mysqli_query($koneksi, $sqlsewa) OR DIE
("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");


$sqlsewa    = "SELECT id_sewa FROM sewa ORDER BY id_sewa DESC";
$rssewa     = mysqli_query($koneksi, $sqlsewa);
$rs         = $rssewa->fetch_array(MYSQLI_ASSOC);
$id_sewa    = $rs['id_sewa'];

$status_bayar   = "Lunas";
$kurang         = 0;
if ($bayar < $totalHarga) {
    $status_bayar   = "DP";
    $kurang         = $totalHarga - $bayar;
}

$sqlbayar = "INSERT INTO bayar (id_sewa, tgl_bayar, status_bayar, total_bayar, kurang) VALUES
            ('" . $id_sewa . "', '" . $tanggal . "', '" . $status_bayar . "','" . $bayar . "', '" . $kurang . "')";
$rs = mysqli_query($koneksi, $sqlbayar);


if ($id_sopir > 1) {
    $updateSopir    = "UPDATE sopir SET status_sopir='Disewa' WHERE id_sopir='" . $id_sopir . "'";
    $rs             = mysqli_query($koneksi, $updateSopir);
}
header("location: index.php?tab=sewa&jenis=tbh");