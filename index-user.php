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
<body>
    <div class="container-hp">
        <!-- navbar top -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-0 my-0 mx-auto">
            <div class="collapse navbar-collapse position-relative">
                <ul class="navbar-nav mx-auto">
                    <a class="nav-link py-0 my-0" href="#"><img src="assets/logo-horizontal.png" style="height: 70px"></a>
                </ul>
                <ul class="navbar-nav position-absolute top-0 end-0"> 
                    <!-- gagal top right -->
                    <li class="nav-item">
                        <a class="nav-link py-0 my-0" href="#"><img src="assets/bell-icon.png" class="icon" style="height: 45px; width: auto;"></a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container justify-content-center">
            <div class="content row bg-secondary p-3 m-3 pt-5" style="height: 400px;">
            </div>
            <div class="content row bg-secondary p-3 m-3 pt-5" style="height: 400px;">
            </div>
            <div class="content row bg-secondary p-3 m-3 pt-5" style="height: 400px;">
            </div>
        </div>

        <?php require_once 'bottombar.php'; ?>
    </div>
</body>
</html>