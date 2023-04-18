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
        $_SESSION['login'] = $fetch_users;
        header('location: settings-user.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
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
        width: 100%;
        height: 20%;
    }
</style>
<body>
    <div class="container-hp">
        <div class="pembatas-navbar"></div>
        <div class="mx-auto" style="padding-right: 80px; padding-left: 80px; padding-top: 10px;">
            <div class="row d-flex justify-content-center">
                <img src="assets/logo-kotak.png" class="mt-5" style="width: 40%">
            </div>
            <div class="row d-flex justify-content-center">
                <!-- form -->
                <form method="post" style="width: 60%;">
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
        <?php require_once 'bottombar.php'; ?>
    </div>
</body>
</html>