<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat diskusi</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <!-- customer css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/explore.css">
</head>
<body>
    <div class="container-hp">
        <div class="header" style="background-color:transparent">
            <h1 style="font-size:28px;">Riwayat Diskusi</h1>
        </div>
        <div style="height:100px;"></div>
        <?php
        if(!isset($_SESSION['login'])):
        ?>
        <div>
            <h1 style="padding:20px;font-size:20px;margin:auto;text-align:center;">Login untuk dapat melihat Riwayat Diskusi</h1>
        <button type="Button" class="button1 btn" onclick="window.location.href= 'login-user.php'" style="background-color : #4566BA; color:white; font-family:'Gill Sans MT';border:none;width:80px;display:block;margin:auto;">Log-in</button>
        </div>
        
        <?php else: ?>
        <div class="card-container">
            <div class="mycard" onclick="openForum()">
                <div>Jumat, 9 April 2024</div>
                <div class="row">
                    <div class="col-5">
                        <img src="assets/img/orang_hilang/dummy1.jpg" alt="">
                    </div>
                    <div class="col-7">
                        <div><b>Nicholas Suhendar</b></div>
                        <div>
                            chat terakhir orang hilang
                        </div>
                        <div>
                            <div style="float:right;width:100px;">08.09</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- navbar top -->
        <?php include 'bottombar.php' ?>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            // $('.left-bar .btn-close').click(function(){
            //     $('.left-bar').removeClass('show');
            //     $('.backdrop').removeClass('show');
            // })
            // $('.header .filter').click(function(){
            //     $('.left-bar').addClass('show');
            //     $('.backdrop').addClass('show');
            // })
        })
    </script>
</body>
</html>