<?php

include 'aksi/koneksi.php';

session_start();
$aksi = $_GET['login'];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_GET['login'])) {
    if ($aksi == 1) {
        $result = $koneksi->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $data = $result->num_rows;
        if ($data == 1) {
            $row = $result->fetch_object();
            $_SESSION['id_admin'] = $row->id_admin;
            $_SESSION['nama_admin'] = $row->nama_admin;
            $_SESSION['username'] = $row->username;
            $_SESSION['password'] = $row->password;
            echo "<script>alert ('Selamat datang " . $row->nama_admin . "');
    window.location='index.php'</script>";

        } else {
            echo "<script>alert ('Anda Gagal Login');
    window.location='index.php'</script>";
        }
    }
}
?>

