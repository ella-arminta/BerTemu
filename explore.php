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
        <div class="backdrop"></div>
        <div class="left-bar">
            
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <div style="font-size:18px;margin-left:10px;cursor:pointer;">Filter</div>
                <button type="button" class="btn-close" aria-label="Close" style="float:right;margin-right:10px;margin-top:8px;"></button>
            </div>
            <div class="container">
                <form>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <select class="form-select" id="kota" name="kota" aria-label="Default select example">
                            <option selected>-- Pilih --</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="kelamin" name="kelamin" aria-label="Default select example">
                            <option selected>-- Pilih --</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur (tahun)</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" id="min-umur" aria-describedby="min" placeholder="min">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="max-umur" aria-describedby="min" placeholder="min">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Tinggi</label>
                        <div class="row" >
                            <div class="col" style="display:flex;justify-content:center;align-items:center">
                                <input type="number" class="form-control" id="min-tinggi" aria-describedby="min" placeholder="min">
                                 <div>cm</div>
                            </div>
                            <div class="col" style="display:flex;justify-content:center;align-items:center">
                                <input type="number" class="form-control" id="max-tinggi" aria-describedby="min" placeholder="min">
                                <div>cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Minimal Tanggal Hilang</label>
                        <input type="date" id="min-tgl" name="min-tgl">
                    </div>
                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Maksimal Tanggal Hilang</label>
                        <input type="date" id="max-tgl" name="max-tg">
                    </div>
                    <button class="btn btn-primary" type="button" style="float:right;">Save Filter</button>
                </form>
            </div>
        </div>
        <div class="header">
            <div class="filter"><i class="fa-solid fa-filter fa-2xl" style="color:white;"></i></div>
            <div class="outer-input">
                <input type="text" placeholder="Cari Nama">
                <i class="fa-solid fa-paper-plane fa-xl" ></i>
            </div>
        </div>
        <div style="height:90px;width:100%"></div>
        <div class="card-container">
            <div class="mycard" onclick="openForum()">
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
            </div>
        </div>
        <!-- navbar top -->
        <?php include 'bottombar.php' ?>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.left-bar .btn-close').click(function(){
                $('.left-bar').removeClass('show');
                $('.backdrop').removeClass('show');
            })
            $('.header .filter').click(function(){
                $('.left-bar').addClass('show');
                $('.backdrop').addClass('show');
            })
        })
        function openForum(){
            window.location.href = 'detail-hilang.php';
        }
    </script>
</body>
</html>