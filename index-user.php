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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">	<!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/5f49f15255.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<style>
    .content {
        width: 100%;
        height: auto;
        overflow-y: hidden !important;
        position: relative;
        background: white;
        /* border-top: 2px solid #1f2446;
        border-bottom: 2px solid #1f2446; */
        /* box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; */
    }

    .img-content {
        max-width: 100%;
        max-height: 100%;
        display: absolute; /* remove extra space below image */
    }

    .pembatas-navbar {
        height: 5vh;
        width: 100%;
    }

    .navbar-brand {
        margin-left:40px;
    }

    @media (max-width: 488px) {
        .navbar-brand {
            margin-left: 10px;;
        }
    }
</style>
<body>
    <div class="container-hp">

        <div class="pembatas-navbar"></div>
        <div class="pembatas-navbar"></div>
        <div class="pembatas-navbar"></div>

        <!-- navbar top -->
        <nav class="navbar fixed-top justify-content-center py-0 my-0 mx-auto">
            <div class="container-fluid">
                <!-- gagal top right -->
                <a class="navbar-brand py-0 my-0 position-absolute" id="bell" href="#"><i class="fa-solid fa-bell fa-2xl" style="color: #ffffff;"></i></a>

                <a class="nav-link py-0 my-0 mx-auto" href="#"><img src="assets/logo-horizontal.png" style="height: 80px"></a>
            </div>
                
        </nav>
        
        <div class="container justify-content-center" style="max-width: 700px;">
            <div class="mx-2">
                <div class="content content1 mb-4">
                    <img class="img-content" src="assets/content-01.jpg" alt="">
                </div>
                <div class="content content2">
                    <img class="img-content" src="assets/content-02.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="pembatas-navbar"></div>
        <div class="pembatas-navbar"></div>
        <div class="pembatas-navbar"></div>

        <?php require_once 'bottombar.php'; ?>
    </div>
</body>
</html>