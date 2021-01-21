<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login USER</title>
        <link rel="stylesheet" href="../asset/css/bootstrap.css">
        <style>
            body {
                margin-top: 40px;
                background-image:url(../asset/img/bac.jpg);
                background-size:cover;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center">USER</h3></div>
                    <div class="panel-body">

                     <form action="aksi_login.php?aksi=1" class="" name="" method="post">
                      <div class="form-group">
                      <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required="" placeholder="username">
                      </div>
                         <div class="form-group">
                        <label for="password">Password</label>
                             <input type="password" name="password" class="form-control" id="password" required="" placeholder="password">
                      </div>
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                      </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center">DAFTAR</h3></div>
                    <div class="panel-body">

            <form action="" class="" name="" method="post">
            <div class="inner-form" >

            <div>
                <input type="text" name="nama_penyewa" placeholder="Nama Lengkap" style=" width: 100%" required="">
            </div>
            <div class="select-vehicle">
                <select id="select-vehicle" style="width: 100%" name="gender" required="">
                    <option value="Vehicle class">Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div >
                <input type="text" name="alamat_penyewa" placeholder="Alamat" required="" style="width: 100%">
            </div>
            <div >
                <input type="text" name="notlp_penyewa" placeholder="No. Telepon" required="" style="width: 100%">
            </div>
            <div >
                <input type="text" name="username" placeholder="Username" required="" style="width: 100%">
            </div>
            <div >
                <input type="password" name="password" placeholder="Password" required="" style="width: 100%">
            </div>
            <br>
            <button type="submit" class="btn btn-info btn-block" name="daftar" value="Lanjut">Daftar</button>
        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    </body>
    </html>

<?php
include('../aksi/koneksi.php');
if (isset($_POST['daftar'])) {

    $nama	    	=$_POST['nama_penyewa'];
    $gender		    =$_POST['gender'];
    $alamat		    =$_POST['alamat_penyewa'];
    $tlp			=$_POST['notlp_penyewa'];
    $username		=$_POST['username'];
    $password		=$_POST['password'];

    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM penyewa WHERE username='".$username."'"));
    if ($cek > 0){
        echo "<script>alert('Username sudah ada !');window.location='index.php'</script>";
    }else{
        $querymasuk="INSERT INTO penyewa (nama_penyewa, gender, alamat_penyewa, notlp_penyewa, username, password) VALUE 
        ('$nama', '$gender', '$alamat', '$tlp', '$username', '$password')";
        $masuk=$koneksi->query($querymasuk);
        if($masuk){
            echo "<script>alert('Anda Berhasil Daftar !');
               window.location='index.php'</script>";
        }
    }
}
?>