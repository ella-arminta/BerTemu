<?php
    require "connect.php";

    if (empty($session_loginAdmin))
    {
        header('location: login-admin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home User</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        background-color: #eef9fc;
        margin-left: 2%;
        margin-right: 2%;
    }
    
    /* css template */
    .fixed-top {
        position: fixed;
        background: #475a7c !important;
    }

    /* css menu-user */
    .fixed-bottom {
        position: fixed;
        background: #475a7c !important;
    }
    .icon {
        width: 40px;
        height: auto;
        margin-left: 20px;
        margin-right: 20px;
    }
    .active {
        background: #546F96;
    }

    .pembatas-navbar {
        height: 100px;
        width: 100%;
    }
</style>
<body>
    <div class="pembatas-navbar"></div>

    <!-- navbar top -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-0 my-0 mx-auto">
        <div class="collapse navbar-collapse position-relative">
            <ul class="navbar-nav mx-auto">
                <a class="nav-link py-0 my-0" href="#"><img src="assets/logo-horizontal.png" style="height: 70px"></a>
            </ul>
            <ul class="navbar-nav position-absolute top-0 end-0"> 
                <!-- gagal top right -->
                <li class="nav-item">
                    <a class="btn btn-danger" href="logout-admin.php"><b>LOG-OUT</b></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container justify-content-center">
        <div class="mx-3">
            <div class="mb-3 d-flex justify-content-center align-items-center" style="height: 500px;">
                <p style="font-size: 100px; color: #475a7c;">Welcome, <?php echo $session_loginAdmin['username'] ?>!</p>
            </div>
        </div>
    </div>

    <div class="pembatas-navbar"></div>

    <!-- Menu -->
    <nav class="navbar fixed-bottom navbar-expand-lg mx-auto">
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index-admin.php"><img src="assets/home-icon.png" class="icon"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="assets/acc-icon.png" class="icon"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabel_hilang.php"><img src="assets/upload-icon.png" class="icon"></a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>