<?php
require 'connect.php';

if (empty($session_login))
{
    header('location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        /* css template */
        body{
            width: 100%;
            overflow: auto;
            margin:auto;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.712);
        }
        .container-hp{
            margin: auto;
            background-color: #eef9fc;
            max-width: 500px;
            min-width: 500px;
            min-height: 100vh;
            position: relative;
        }
        .content {
            border-radius: 20px;
        }
        
        /* css menu-user */
        .fixed-bottom {
            max-width: 500px;
            min-width: 500px;
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
    </style>
<body>
    <div class="container-hp">
        <div class="container justify-content-center">
            <a class="nav-link" href="logout-user.php">Logout</a>
        </div>
        <!-- Menu -->
        <nav class="navbar fixed-bottom navbar-expand-lg mx-auto">
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index-user.php"><img src="assets/home-icon.png" class="icon"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="assets/explore-icon.png" class="icon"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="assets/chat-icon.png" class="icon"></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="settings-user.php"><img src="assets/setting-icon.png" class="icon"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>