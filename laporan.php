<?php
session_start();

if(!isset($_SESSION["nama_admin"])){
    header("location: login.php");
}else{
    $nama = $_SESSION['nama_admin'];

}
include 'aksi/koneksi.php';

$sql = "SELECT * FROM laporan";
$rsLaporan = mysqli_query($koneksi, $sql) OR DIE ("error");

$bln = date("F");
$thn = date("Y");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <script type="text/javascript" src="asset/js/jquery.css"></script>
    <script type="text/javascript" src="asset/js/bootstrap.css"></script>
    <style>
        body {
            background-image:url(asset/img/bg.jpg);
            background-size:cover;
        }
    </style>
</head>
<body>

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
            <a class="navbar-brand" href="index.php">Rental Mobil
                <img src="asset/img/logo.png" width="30%" alt="" srcset=""></b></a>
        </li>
        <li role="presentation">
            <a href="index.php?tab=mobil">Mobil</a>
        </li>
        <li role="presentation">
            <a href="index.php?tab=sopir">Sopir</a>
        </li>
        <li role="presentation">
            <a href="index.php?tab=penyewa">Penyewa</a>
        </li>
        <li role="presentation">
            <a href="index.php?tab=sewa">Sewa</a>
        </li>
        <li role="presentation">
            <a href="index.php?tab=bayar">Pembayaran</a>
        </li>
        <li role="presentation">
            <a href="index.php?tab=kembali">Pengembalian</a>
        </li>
        <li role="presentation">
            <a href="#">Laporan</a>
        </li>
        <li role="presentation">
            <span align="left" class="navbar-brand">Nama : <i><?php echo $nama?></i></b>  <a href="logout.php" class="btn btn-danger btn-xs">Logout</a></span>
        </li>
    </ul>
</div>

<h1 align="center">RENTAL MOBIL</h1>
<h5 align="center">Alamat : Talun , Blitar, Jawa Timur</h5>
<hr/>
<h4 align="center">Periode : <?php echo $bln?> - <?php echo $thn?></h4>

<div class="col-md-10 col-md-offset-1">
    <table class='table table-striped table-hover'>
        <thead bgcolor='#d9edf7'>
        <tr>
            <th>No</th>
            <th>Nama Penyewa</th>
            <th>Merek</th>
            <th>Nama Mobil</th>
            <th>Warna</th>
            <th>Nama Sopir</th>
            <th>Jenis Jaminan</th>
            <th>Tanggal Sewa</th>
            <th>Lama Sewa</th>
            <th>Harga Sewa</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
        </tr>
        </thead>
        <tbody bgcolor='#fff'>
        <?php
        $no = 1;
        while($rs = $rsLaporan->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $rs["nama_penyewa"]?></td>
                <td><?php echo $rs['merek']?></td>
                <td><?php echo $rs['nama_mobil']?></td>
                <td><?php echo $rs['warna']?></td>
                <td><?php echo $rs["nama_sopir"]?></td>
                <td><?php echo $rs["jenis_jaminan"]?></td>
                <td><?php echo $rs["tgl_sewa"]?></td>
                <td><?php echo $rs["lama_sewa"]?> Jam</td>
                <td><?php echo $rs["harga_sewa"]?></td>
                <td><?php echo $rs["tgl_kembali"]?></td>
                <td><?php echo $rs["denda"]?></td>
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