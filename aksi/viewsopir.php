<?php
$resultSopir = mysqli_query($koneksi, "SELECT * FROM sopir WHERE nama_sopir != 'Tanpa Sopir' ")
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
            <th>Nama Sopir</th>
            <th>Alamat</th>
            <th>Nomor Telpon</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody bgcolor='#fff'>
        <?php
        $no = 1;
        while($rs = $resultSopir->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $rs["nama_sopir"]?></td>
                <td><?php echo $rs["alamat_sopir"]?></td>
                <td><?php echo $rs["no_tlp_sopir"]?></td>
                <td><?php echo $rs["status_sopir"]?></td>

                <td>
                    <a href="aksi/hapus.php?tbl=sopir&id=<?php echo $rs['id_sopir']?>" onClick="return hapus
                            ('<?php echo $rs["id_sopir"]?>','<?php echo $rs["nama_sopir"]?>','Sopir','sopir<?php echo $rs["id_sopir"]?>')"
                       id='sopir<?php echo $rs['id_sopir']?>'>Hapus</a>
                </td>
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