<?php
include('../aksi/koneksi.php');
session_start();
$aksi = $_GET['aksi'];
$username= $_POST['username'];
$password= $_POST['password'];
if(isset($_GET['aksi'])){
    if($aksi == 1){
        $result = $koneksi->query("SELECT * FROM penyewa WHERE username = '$username' AND password = '$password'");
        $data=$result->num_rows;
        if ($data == 1) {
            $row = $result->fetch_object();
            $_SESSION['id_penyewa'] 		= $row->id_penyewa;
            $_SESSION['nama_penyewa'] 	    = $row->nama_penyewa;
            $_SESSION['alamat_penyewa'] 	= $row->alamat_penyewa;
            $_SESSION['notlp_penyewa']		= $row->notlp_penyewa;
            $_SESSION['username']		    = $row->username;
            $_SESSION['password']		    = $row->password;
            $_SESSION['gender'] 		    = $row->gender;

            echo"<script>alert ('Selamat datang ".$row->nama_penyewa."');
	                   window.location='index.php'</script>";

        }else{
            echo"<script>alert ('Anda Gagal Login');
	window.location='index.php'</script>";
        }
    }
}
?>