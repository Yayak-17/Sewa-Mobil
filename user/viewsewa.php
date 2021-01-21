<?php
$sql = "SELECT * FROM sewa INNER JOIN mobil ON mobil.id_mobil = sewa.id_mobil INNER JOIN 
    penyewa ON penyewa.id_penyewa = sewa.id_penyewa INNER JOIN 
    sopir ON sopir.id_sopir = sewa.id_sopir INNER JOIN jaminan ON jaminan.id_jaminan = sewa.id_jaminan
    WHERE sewa.id_penyewa = ".$_SESSION['id_penyewa']." ORDER BY id_sewa ASC";

$rsSewa = mysqli_query($koneksi, $sql) OR DIE (mysqli_error($koneksi));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="col-md-10 col-md-offset-1">
    <table class='table table-striped table-hover'>
        <thead bgcolor='#d9edf7'>
    <tr>
        <th>Penyewa</th>
        <th>No Polisi</th>
        <th>Merek</th>
        <th>Nama Mobil</th>
        <th>Warna</th>
        <th>Sopir</th>
        <th>Jaminan</th>
        <th>No Jaminan</th>
        <th>Atas Nama</th>
        <th>Tanggal Sewa</th>
        <th>Lama Sewa</th>
        <th>Harga Sewa</th>
    </tr>
    </thead>
    <tbody bgcolor='#fff'>
    <?php
    while($rs = $rsSewa->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $rs["nama_penyewa"]?></td>
            <td><?php echo $rs["no_polisi"]?></td>
            <td><?php echo $rs["merek"]?></td>
            <td><?php echo $rs["nama_mobil"]?></td>
            <td><?php echo $rs["warna"]?></td>
            <td><?php echo $rs["nama_sopir"]?></td>
            <td><?php echo $rs["jenis_jaminan"]?></td>
            <td><?php echo $rs["no_jaminan"]?></td>
            <td><?php echo $rs["atas_nama"]?></td>
            <td><?php echo $rs["tgl_sewa"]?></td>
            <td><?php echo $rs["lama_sewa"]?> Jam</td>
            <td><?php echo $rs["harga_sewa"]?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>

</body>
</html>