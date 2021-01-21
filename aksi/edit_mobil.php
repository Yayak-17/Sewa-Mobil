<?php
include 'koneksi.php';
$id_mobil = $_GET['id_mobil'];

$query = $koneksi->query("SELECT *  FROM mobil WHERE id_mobil = {$id_mobil}");

$result = $query->fetch_object();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit mobil</title>
    <style>
        body {
            background-image:url(../asset/img/bg.jpg);
            background-size:cover;
        }
    </style>
</head>

<body>
<table class='table table-striped table-hover'>
    <thead bgcolor='#d9edf7'
    <tbody>
    <form action="update_mobil.php?id_mobil=<?= $id_mobil ?>" method="POST">
        <tr>
            <td>No Polisi</td>
            <td>:</td>
            <td><input type="text" name="no_polisi" value="<?= $result->no_polisi ?>"></td>
        </tr>
        <tr>
            <td>Merek</td>
            <td>:</td>
            <td><input type="text" name="merek" value="<?= $result->merek ?>"></td>
        </tr>
        <tr>
            <td>Nama Mobil</td>
            <td>:</td>
            <td><input type="text" name="nama_mobil" value="<?= $result->nama_mobil ?>"></td>
        </tr>
        <tr>
            <td>Warna mobil</td>
            <td>:</td>
            <td><input type="text" name="warna" value="<?= $result->warna ?>"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="number" name="harga" value="<?= $result->harga ?>"></td>
        </tr>
        </thead>
        <tr>
            <td><button type="submit">Simpan</button></td>
            <td><a href="../index.php">Kembali</a></td>
        </tr>


    </form>
    </tbody>
</table>
</body>

</html>