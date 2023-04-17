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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <!-- customer css -->
    <link rel="stylesheet" href="css/explore.css">
</head>
<body>
    <div class="container-hp">
        <div style="height:60px;display:flex;align-items:center;margin-left:20px;">
        <button onclick="window.location.href='explore.php'" type="Button" class="button1" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT';border:none;border-radius:20px;">
        <i class="fa-solid fa-arrow-left"></i> BACK </button>
        </div>
        <div class="card-container">
            <div class="mycard">
                <div>Jumat, 9 April 2024</div>
                <div class="row">
                    <div class="col-5">
                        <img src="assets/img/orang_hilang/dummy1.jpg" alt="">
                    </div>
                    <div class="col-7">
                        <h1>Nicholas Suhendar</h1>
                        <div>Surabaya</div>
                        <div style="display:flex;align-items:center;">
                            <div style="margin-right:15px;">Laki-Laki</div>
                            <div>162 cm</div>
                        </div>
                        <div style="cursor:pointer;">082141942965 <i class="fa-solid fa-copy"></i></div>
                    </div>
                </div>
                <div style="height:20px;width:100%;"></div>
                <div class="ket row">
                    <div>Keterangan Tambahan</div>
                    <div>Berambut hitam. Mamanya bla bal. Punya tahi lalat. ksdfsdkf</div>
                </div>
            </div>
        </div>
        <div style="height:30px;width:100%;"></div>
        <div class="comment-container">
            <div class="comments">
                <div class="comment">
                    <div class="pp"><img src="assets/img/orang_hilang/dummy1.jpg" alt=""></div>
                    <div>
                        <h1>Januar Putera</h1>
                        <p>Tadi siang, aku lihat di jembatan merah</p>
                    </div>
                </div>
                <div class="comment">
                    <div class="pp"><img src="assets/img/orang_hilang/dummy1.jpg" alt=""></div>
                    <div>
                        <h1>Januar Putera</h1>
                        <p>Tadi siang, aku lihat di jembatan merah</p>
                    </div>
                </div>
                <div class="comment">
                    <div class="pp"><img src="assets/img/orang_hilang/dummy1.jpg" alt=""></div>
                    <div>
                        <h1>Januar Putera</h1>
                        <p>Tadi siang, aku lihat di jembatan merah</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:30px;width:100%;"></div>
        <div class="form-floating" style="width:90%;margin:auto;">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 90px"></textarea>
            <label for="floatingTextarea2Disabled">Ikut Berdiskusi</label>
        </div>
        <div style="height:22px;width:100%;"></div>
        <button type="Button" class="button1" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT';border:none;border-radius:20px;width:80px;display:block;float:right;margin-right:5%;">Log-in</button>
        <!-- <button type="Button" class="button1" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT';border:none;border-radius:20px;width:80px;display:block;float:right;margin-right:5%;">Send</button> -->
        <div style="height:26px;width:100%;"></div>
        <div style="height:82px;width:100%;"></div>
        <!-- navbar top -->
        <?php include 'bottombar.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>