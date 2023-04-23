<?php
    require "../connect.php";

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
	<link rel="stylesheet" type="text/css" href="../style.css">
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
        background: #4566BA !important;
    }

    /* css menu-user */
    .fixed-bottom {
        position: fixed;
        background: #4566BA !important;
    }
    .icon {
        width: 40px;
        height: auto;
        margin-left: 20px;
        margin-right: 20px;
    }
    .active {
        background: #5275CD;
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
        <div class="position-relative mx-auto">
            <img class= "mx-auto" src="../assets/logo-horizontal.png" style="height: 70px">
        </div>
        <a class="btn btn-danger position-absolute start-0 ml-5" href="logout-admin.php"><b>LOG-OUT</b></a>
    </nav>

    <div class="pembatas-navbar"></div>
    <div class="d-flex justify-content-center align-items-center mx-auto">
        <p style="font-size: 100px; color: #475a7c;">Welcome, <?php echo $session_loginAdmin['username'] ?>!</p>
    </div>

    <div class="pembatas-navbar"></div>

    <!-- Menu -->
    <nav class="navbar fixed-bottom navbar-expand">
        <div class="d-flex justify-content-center align-items-center mx-auto">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index-admin.php"><img src="../assets/home-icon.png" class="icon"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="acc-user-admin.php"><img src="../assets/acc-icon.png" class="icon"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabel_hilang.php"><img src="../assets/upload-icon.png" class="icon"></a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>