<?php
$resultPenyewa = mysqli_query($koneksi, "SELECT * FROM penyewa");
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
            <th>No</th>
            <th>Nama Penyewa</th>
            <th>Kelamin</th>
            <th>Alamat</th>
            <th>Nomor Telpon</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody bgcolor='#fff'>
        <?php
        $no = 1;
        while($rsPenyewa = $resultPenyewa->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $rsPenyewa["nama_penyewa"]?></td>
                <td><?php echo $rsPenyewa["gender"]?></td>
                <td><?php echo $rsPenyewa["alamat_penyewa"]?></td>
                <td><?php echo $rsPenyewa["notlp_penyewa"]?></td>
                <td><?php echo $rsPenyewa["username"]?></td>
                <td>**********</td>
            </tr>
            <?php
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>