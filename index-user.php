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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- custom css -->
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
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-0 my-0 mx-auto">
            <div>
            <ul class="navbar-nav mx-auto">
                    <a class="nav-link py-0 my-0" href="#"><img src="assets/logo-horizontal.png" style="height: 80px"></a>
                    <!-- gagal top right -->
                    <li class="nav-item" data-bs-toggle="modal" data-bs-target="#subscribeModal">
                        <a class="nav-link py-0 my-0" href="#"><img src="assets/bell-icon.png" class="icon" style="height: 60px; width: auto;"></a>
                    </li>
                </ul>
                <!-- <ul class="navbar-nav position-absolute top-0 end-0"> 
                    
                </ul> -->
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
        
        <!-- Modal subscriber -->
        <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="subscribeModalLabel">Notifikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p>Ijinkan kami mengirimkan notifikasi email berisi pemberitahuan kondisi terbaru orang yang hilang.</p>
                    <div class="inputan">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="example@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-submit btn-primary" onclick="submitEmail()">Submit</button>
                </div>
                </div>
            </div>
            </div>
    </div>
    <div class="myloader">
        <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/notifikasi.js"></script>
</body>
</html>