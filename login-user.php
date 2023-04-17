<?php
require 'connect.php';

if (isset($_SESSION['login']))
{
    echo "tes";
    header('location: settings-user.php');
}
    
if (isset($_POST['login']) && $_POST['login'] == "1")
{
    $email= $_POST['email'];
    $password = $_POST['password'];

    $check_users = "SELECT * FROM `users` WHERE email = ?";
    $check_users = $conn->prepare($check_users);
    $check_users->execute([$email]);
    $fetch_users = $check_users->fetch();


    if ($check_users->rowCount() == 0)
        $msgEmail = 'Email tidak terdaftar!';

    else if ($password != $fetch_users['password'])
        $msgPass = 'Password yang Anda ketik salah!';

    else
    {
        $_SESSION['login'] = $fetch_users['id_user'];
        header('location: settings-user.php');
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

</style>
<body>
    <div class="container-hp">
        <div class="mx-auto" style="padding-right: 80px; padding-left: 80px; padding-top: 10px;">
            <div class="row d-flex justify-content-center">
                <img src="assets/logo-kotak.png" class="mt-5" style="width: 240px">
            </div>
            <div class="row d-flex justify-content-center">
                <!-- form -->
                <form method="post" style="width: 300px;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    <?=isset($msgEmail) ? '<div class="alert alert-danger">'.$msgEmail.'</div>' : ''?>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <?=isset($msgPass) ? '<div class="alert alert-danger">'.$msgPass.'</div>' : ''?>
                    <div class="d-grid gap-2 d-flex justify-content-center">
                        <button class="btn" name="login" value="1" style="width: 100%">Login</button>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-center">
                        <p>Belum punya akun? <a href="sign-up-user.php" style="color: #dc7357">Buat Akun</a></p>
                    </div>
                </form>
            </div>
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
                        <a class="nav-link" href="#"><img src="assets/setting-icon.png" class="icon"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>