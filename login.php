<?php
include 'aksi/koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <style>
        body {
            margin-top: 40px;
            background-image:url(asset/img/bac.jpg);
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
                <div class="panel-heading"><h3 class="text-center">ADMIN</h3></div>
                <div class="panel-body">

                <form action="aksi_login.php?login=1" class="" name="" method="post">
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

</body>

</html>