<?php
require 'connect.php';

if (isset($_SESSION['loginAdmin']))
{
    echo "tes";
    header('location: index-admin.php');
}
    
if (isset($_POST['loginAdmin']) && $_POST['loginAdmin'] == "1")
{
    $username= $_POST['username'];
    $password = $_POST['password'];

    $check_admins = "SELECT * FROM `admins` WHERE username = ?";
    $check_admins = $conn->prepare($check_admins);
    $check_admins->execute([$username]);
    $fetch_admins = $check_admins->fetch();


    if ($check_admins->rowCount() == 0)
        $msgUsername = 'username tidak terdaftar!';

    else if ($password != $fetch_admins['password'])
        $msgPass = 'Password yang Anda ketik salah!';

    else
    {
        $_SESSION['loginAdmin'] = $fetch_admins;
        header('location: index-admin.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
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

    .form-control {
        background: white !important;
        color: #141414;
        border-radius: 12px;
    }
    .btn {
        background: #475a7c !important;
        color: white;
    }

    .pembatas-navbar {
        height: 100px;
        width: 100%;
    }

</style>
<body>
    <div class="pembatas-navbar"></div>
    
    <div class="mx-auto" style="padding-right: 80px; padding-left: 80px;">
        <div class="row d-flex justify-content-center">
            <img src="assets/logo-kotak.png" class="mt-5" style="width: 240px">
        </div>
        <div class="row d-flex justify-content-center">
            <h2 style="color: #475a7c;"><b>ADMIN</b></h2>
        </div>
        <div class="row d-flex justify-content-center">
            <!-- form -->
            <form method="post" style="width: 300px;">
                <div class="mb-3">
                    <label for="exampleInputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" name="username">
                </div>
                <?=isset($msgUsername) ? '<div class="alert alert-danger">'.$msgUsername.'</div>' : ''?>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <?=isset($msgPass) ? '<div class="alert alert-danger">'.$msgPass.'</div>' : ''?>
                <div class="d-grid gap-2 d-flex justify-content-center">
                    <button class="btn" name="loginAdmin" value="1" style="width: 100%"><b>LOG-IN</b></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>