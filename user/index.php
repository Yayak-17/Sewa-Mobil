<?php
session_start();

if (!isset($_SESSION["nama_penyewa"])) {
    header("location: login_user.php");
} else {
    $nama = $_SESSION['nama_penyewa'];
}
include "../aksi/koneksi.php";
$jenis  = null;
$tab    = "mobil";
if (isset($_GET["tab"])) {
    $tab    = $_GET["tab"];
    if (isset($_GET['jenis'])) {
        $jenis  = $_GET["jenis"];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman User</title>

    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../asset/sweetalert/sweetalert.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
    <script src="../asset/sweetalert/sweetalert.min.js"></script>
    <style>
        body {
            background-image:url(../asset/img/bg.jpg);
            background-size:cover;
        }
    </style>

</head>

<body>

<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
            <a class="navbar-brand" href="index.php"><b> RENTAL MOBIL ,</b> Tlp :<b> 081234567765 </b>
                <img src="../asset/img/logo.png" width="30%" alt="" srcset=""></b></a>
        </li>
        <li role="presentation" <?php if ($tab == "mobil") echo "class='active'" ?>>
            <a href="#mobil" aria-controls="mobil" role="tab" data-toggle="tab">Mobil</a>
        </li>
        <li role="presentation" <?php if ($tab == "sewa") echo "class='active'" ?>>
            <a href="#sewaa" aria-controls="sewa" role="tab" data-toggle="tab">Sewa</a>
        </li>
        <li role="presentation" <?php if ($tab == "bayar") echo "class='active'" ?>>
            <a href="#bayar" aria-controls="bayar" role="tab" data-toggle="tab">Pembayaran</a>
        </li>
        <li role="presentation">
                <span align="left" class="navbar-brand">Nama : <?php echo $nama ?></b>
                    <a href="logout.php" class="btn btn-danger btn-xs">Logout</a></span>
        </li>

    </ul>

    <?php
    if ($jenis != null) {
        $pesan = "null";
        if ($tab == "sewa" and $jenis == "tbh")
            $pesan = "Data Sewa Berhasil Ditambahkan";
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p align="center"><?php echo $pesan ?></p>
        </div>
    <?php } ?>

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- mobil -->
        <div role="tabpanel" class="tab-pane <?php if ($tab == "mobil") echo "active" ?>" id="mobil">
            <h2 align="center">Daftar Mobil</h2>
            <?php include "viewmobil.php"; ?>
        </div>

        <!-- sewa -->
        <div role="tabpanel" class="tab-pane <?php if ($tab == "sewa") echo "active" ?>" id="sewaa">
            <h2 align="center">Daftar Sewa</h2>
            <?php include "viewsewa.php"; ?>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tbhSewa">
                Tambah Sewa
            </button>

        </div>
        <div role="tabpanel" class="tab-pane  <?php if ($tab == "bayar") echo "active" ?>" id="bayar">
            <h2 align="center">Pembayaran</h2>
            <?php include "viewbayar.php"; ?>

</div>

<!-- Isi Sewa -->
<div class="modal fade" id="tbhSewa" tabindex="-1" role="dialog" aria-labelledby="modalSewa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalSewa">Tambah Sewa</h4>
            </div>
            <div class="modal-body">
                <form name="tbhSewa" method="POST" action="sewa.php">
                    <table width="100%" style=" margin: 10px; padding-bottom: 20px; ">
                        <tr>
                            <td>Mobil</td>
                            <td>
                                <select class="form-control" name="id_mobil" required>
                                    <?php
                                    $resultMobil = mysqli_query($koneksi, "SELECT * FROM mobil WHERE 
                                                    status_mobil='Tidak Disewa'");
                                    while ($rs = $resultMobil->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value='" . $rs['id_mobil'] . "'>
                                        (" . $rs['no_polisi'] . ") " . $rs['merek'] . " - " . $rs['nama_mobil'] . " - " . $rs['jenis'];
                                    }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Sopir</td>
                            <td>
                                <select class="form-control" name="id_sopir">
                                    <?php
                                    $sopir = mysqli_query($koneksi, "SELECT * FROM sopir WHERE 
                                            status_sopir='Tidak Disewa' ORDER BY id_sopir ASC ");
                                    while ($rs = $sopir->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value='" . $rs['id_sopir'] . "'>" . $rs['nama_sopir'] . " "  ;
                                    }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Lama Sewa</td>
                            <td>
                                <input type="number" name="hari" value="1" required min="1"> Hari
                                <input type="number" name="jam" value="0" required min="0" max="24"> Jam
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3 align="center">Jaminan</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Jaminan</td>
                            <td>
                                <input type="radio" name="jenis_jaminan" value="STNK Motor" checked> STNK Motor
                                <input type="radio" name="jenis_jaminan" value="KTP"> KTP
                            </td>
                        </tr>
                        <tr>
                            <td>No Jaminan</td>
                            <td>
                                <input type="text" name="nomor_jaminan" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>
                                <input type="text" name="atas_nama" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3 align="center">Bayar</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Bayar DP </td>
                            <td>
                                <input type="number" name="bayar" class="form-control" value="100000" min="100000" required>
                            </td>
                        </tr>
                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" value="Tambah Sewa" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>