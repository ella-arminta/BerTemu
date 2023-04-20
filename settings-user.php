<?php
require 'connect.php';

if (empty($session_login))
{
    header('location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .pembatas-navbar {
            height: 70px;
            width: 100%;
        }
        .white {
            background: white;
            width: 100%;
            border-radius: 15px;
            border-top: 2px solid #1f2446;
            border-bottom: 2px solid #1f2446;
        }
        .foto {
            border-radius: 15px;
            width: 100%;
            height: auto;
        }
        .alert {
            width: 80%;
        }
    </style>
<body>
    <div class="container-hp">
        <nav class="pembatas-navbar"></nav>
        <div class="container justify-content-center px-5 m-2">
            <div class="white p-3 mb-3">
                <div class="row mx-1">
                    <div class="col-lg-4 col-12 p-2">
                        <img class="foto" src="<?php echo $session_login['foto_diri'] ?>" alt="">
                    </div>
                    <div class="col-lg-8 col-12 p-2">
                        <div class="data">
                            <div style="font-size: 30px;"><b><?php echo $session_login['nama_lengkap'] ?></b></div>
                            <div style="font-size: 20px;"><?php echo $session_login['email'] ?></div>
                            <div style="font-size: 20px;"><?php echo $session_login['nik'] ?></div>
                            <?php
                            $sql = 'SELECT status FROM users WHERE id_user = :i';
                            $stmt =  $conn->prepare($sql);
                            $stmt->execute(array(
                                ":i" => $session_login['id_user']
                            ));
                            $status = $stmt->fetchAll();

                            if ($status[0]['status'] == 1) {
                                echo '<div class="alert bg-success text-light mt-3 justify-content-center"><b>AKUN TER-VERIFIKASI</b></div>';
                            }
                            else {
                                echo '<div class="alert bg-danger text-light mt-3 justify-content-center"><b>AKUN BELUM TERVERIFIKASI</b></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-danger" href="logout-user.php"><b>LOG-OUT</b></a>
        </div>
        <!-- Menu -->
        <?php require_once 'bottombar.php'; ?>
    </div>
</body>
</html>