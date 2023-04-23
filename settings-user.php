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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .pembatas-navbar {
            height: 5vh;
            width: 100%;
        }
        .content {
            width: 100%;
            height: auto;
            overflow-y: hidden !important;
            color: white;
            position: relative;
            background: #71CEEF;
            /* box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; */
        }
        .foto {
            border-radius: 15px;
            width: 100%;
            height: auto;
        }
        .btn, .status {
            background-color: #EC6C4F !important;
        }
    </style>
<body>
    <div class="container-hp">
        <nav class="pembatas-navbar"></nav>

        <div class="container justify-content-center mx-auto" style="max-width: 700px;">
            <div class="mx-2">
                <div class="row p-3 start-0">
                    <H2>Akun Anda</H2>
                </div>
                <div class="content row p-3 mb-2 mx-auto">
                    <div class="col-lg-4 col-12 p-2">
                        <img class="foto" src="<?php echo $session_login['foto_diri'] ?>" alt="">
                    </div>
                    <div class="col-lg-8 col-12">
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
                                echo '<div class="status p-2 px-3 mb-3 rounded bg-success text-light mt-3" style="display: inline-block;"><p><b>AKUN TER-VERIFIKASI</b></p></div>';
                            }
                            else {
                                echo '<div class="status p-2 px-3 mb-3 rounded bg-danger text-light mt-3" style="display: inline-block;"><b>AKUN BELUM TERVERIFIKASI</b></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row p-3 mb-3">
                    <a class="btn btn-danger m-2" href="logout-user.php"><b>LOG-OUT</b></a>
                </div>
            </div>
        </div>

        <nav class="pembatas-navbar"></nav>
        <nav class="pembatas-navbar"></nav>
        <!-- Menu -->
        <?php require_once 'bottombar.php'; ?>
    </div>
</body>
</html>