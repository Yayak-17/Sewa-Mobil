<?php
$result = $koneksi->query("SELECT * FROM sewa INNER JOIN mobil ON mobil.id_mobil = sewa.id_mobil INNER JOIN 
    penyewa ON penyewa.id_penyewa = sewa.id_penyewa INNER JOIN 
    sopir ON sopir.id_sopir = sewa.id_sopir INNER JOIN jaminan ON jaminan.id_jaminan = sewa.id_jaminan INNER JOIN bayar ON bayar.id_sewa = sewa.id_sewa
    WHERE sewa.id_penyewa = ".$_SESSION['id_penyewa']." ");
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
<table class='table table-striped table-hover'>
    <thead bgcolor='#d9edf7'>
    <tr>
        <th>Penyewa</th>
        <th>Merek</th>
        <th>Nama Mobil</th>
        <th>Warna</th>
        <th>No Polisi</th>
        <th>Lama Sewa</th>
        <th>Harga Sewa</th>
        <th>Status Bayar</th>
        <th>Tanggal Bayar</th>
        <th>Total Bayar</th>
        <th>Kurang</th>
    </tr>
    </thead>
    <tbody bgcolor='#fff'>
    <?php
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $rs["nama_penyewa"]?></td>
            <td><?php echo $rs["merek"]?></td>
            <td><?php echo $rs["nama_mobil"]?></td>
            <td><?php echo $rs["warna"]?></td>
            <td><?php echo $rs["no_polisi"]?></td>
            <td><?php echo $rs["lama_sewa"]?> Jam</td>
            <td><?php echo $rs["harga_sewa"]?></td>
            <td><?php echo $rs["status_bayar"]?></td>
            <td><?php echo $rs["tgl_bayar"]?></td>
            <td><?php echo $rs["total_bayar"]?></td>
            <td><?php echo $rs["kurang"]?></td>
            <?php
            if ($rs['status_bayar'] == "DP"){
                ?>
            <?php }?>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>