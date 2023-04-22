<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home User</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    .content {
        width: 100%;
        height: auto;
        overflow-y: hidden !important;
        position: relative;
        background: white;
        border-top: 2px solid #1f2446;
        border-bottom: 2px solid #1f2446;
    }

    .img-content {
        max-width: 100%;
        max-height: 100%;
        display: absolute; /* remove extra space below image */
    }

    .pembatas-navbar {
        width: 100%;
        height: 120px;
    }
</style>
<body>
    <div class="container-hp">

        <div class="pembatas-navbar"></div>

        <!-- navbar top -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-0 my-0 mx-auto">
            <div>
            <ul class="navbar-nav mx-auto">
                    <a class="nav-link py-0 my-0" href="#"><img src="assets/logo-horizontal.png" style="height: 80px"></a>
                    <!-- gagal top right -->
                    <li class="nav-item">
                        <a class="nav-link py-0 my-0" href="#"><img src="assets/bell-icon.png" class="icon" style="height: 60px; width: auto;"></a>
                    </li>
                </ul>
                <!-- <ul class="navbar-nav position-absolute top-0 end-0"> 
                    
                </ul> -->
            </div>
                
        </nav>
        
        <div class="container justify-content-center" style="max-width: 700px;">
            <div class="mx-5">
                <div class="content content1 mb-5">
                    <img class="img-content" src="assets/content-01.jpg" alt="">
                </div>
                <div class="content conten2 mt-5">
                    <img class="img-content" src="assets/content-02.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="pembatas-navbar"></div>

        <?php require_once 'bottombar.php'; ?>
    </div>
</body>
</html>