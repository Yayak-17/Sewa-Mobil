<?php
$result = $koneksi->query("SELECT sewa.id_sewa AS 
        id_sewa, id_bayar, tgl_bayar, status_bayar, total_bayar, kurang, penyewa.nama_penyewa AS 
        penyewa, mobil.merek AS merek, mobil.no_polisi AS no_polisi, mobil.nama_mobil AS nama_mobil, mobil.warna AS
        warna, sewa.lama_sewa AS lama_sewa, harga_sewa FROM sewa, bayar, mobil, penyewa WHERE sewa.id_sewa = bayar.id_sewa AND 
        mobil.id_mobil=sewa.id_mobil AND penyewa.id_penyewa = sewa.id_penyewa  ORDER BY id_sewa ASC");
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
        <th>No</th>
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
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody bgcolor='#fff'>
    <?php
    $no=1;
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $rs["penyewa"]?></td>
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
                <td><a onClick="return lunasi('<?php echo $rs["penyewa"]?>', '<?php echo $rs["no_polisi"]?>', '<?php echo $rs["kurang"]?>','lunas<?php echo $rs["id_bayar"] ?>')" href="aksi/pelunasan.php?id_bayar=<?php echo $rs['id_bayar']?>" id="lunas<?php echo $rs['id_bayar'] ?>">Lunasi</a></td>
            <?php }?>
        </tr>
        <?php
        $no++;
    }
    ?>
    </tbody>
</table>

</body>
</html>