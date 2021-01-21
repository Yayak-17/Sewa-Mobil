<?php
$result = $koneksi->query("SELECT * FROM mobil");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<div class="col-md-10 col-md-offset-1">
    <table class='table table-striped table-hover'>
        <thead bgcolor='#d9edf7'>
        <tr>
            <th>No Polisi</th>
            <th>Merek</th>
            <th>Nama Mobil</th>
            <th>Jenis</th>
            <th>Warna</th>
            <th>Status</th>
            <th>Harga</th>


        </tr>
        </thead>
        <tbody bgcolor='#fff'>
        <?php
        while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $rs["no_polisi"] ?></td>
                <td><?php echo $rs["merek"] ?></td>
                <td><?php echo $rs["nama_mobil"] ?></td>
                <td><?php echo $rs["jenis"] ?></td>
                <td><?php echo $rs["warna"] ?></td>
                <td><?php echo $rs["status_mobil"] ?></td>
                <td>Rp. <?php echo $rs["harga"] ?>/Jam</td>
            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
</div>
</body>

</html>