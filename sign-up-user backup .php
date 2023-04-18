<?php
require 'connect.php';

// upload image

if(isset($_FILES["submitFotoKTP"])){
    $target_fileKTP = $target_dir . basename($_FILES["submitFotoKTP"]["name"]);

    if(move_uploaded_file($_FILES["submitFotoKTP"]["tmp_name"], $target_fileKTP)){
        echo "sukses";
    }else{
        echo "failed";
    }
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
        $_SESSION['login'] = $fetch_users['id'];
        header('location: index-user.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

        /* upload foto */
        .uploadFoto label {
            width: 100%;
            border: 2px dashed #fff;
            border-radius: 20px;
            aspect-ratio: 3 / 2;
            cursor: pointer;
        }

        .uploadFoto img {
            width: 100%;
            aspect-ratio: 3 / 2;
            object-fit: cover;
            border-radius: 20px;
            display: none;
            cursor: pointer;
        }

        .deleteFotoKTP {
            display: block;
            width: 200px;
        }
    </style>
    <script>
       // display foto
        function read_file(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                var image = $(input).parent().find("img");

                reader.onload = function(){
                    image.attr("src", reader.result);
                    image.css("display", "block");
                    $(input).parent().find("label").addClass("hidden");
                }
                reader.readAsDataURL(input.files[0]);
                $(input).parent().next().css("opacity","1");
                // $(input).parent().next().find("input").removeAttr("disabled");
                // $(input).parent().next().css("height", "100%");
            }
        };

        $(document).ready(function() {
            // delete foto
            $(document.body).on("click", ".deleteFotoKTP", function(e) {
                e.preventDefault();
                $(this).parent().find('input').val("");
                $(this).parent().find("img").attr("src", "");
                $(this).parent().find("label").removeClass("hidden");
                $(this).parent().find("img").css("display","none");

                // $(this).parent().next().css("opacity","0");
                // $(this).parent().next().find("input").attr("disabled","true");
                // $(this).parent().next().css("height", "0");
                // read_file(this);
            });
        });
    </script>    </script>
</head>
<body>
    <div class="container-hp">
        <div class="mx-auto" style="padding-right: 80px; padding-left: 80px; padding-top: 50px;">
            <div class="row start-0">
                <H2>Buat Akun</H2>
            </div>
            <div class="row d-flex justify-content-center">
                <!-- form -->
                <form method="post" style="width: 100%;">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="nik">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kata Sandi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="password">
                    </div>
                    <div class="mb-3 uploadFoto">
                        <img src="" class="foto_ktp">
                        <label for="submitFotoKTP" class="d-flex align-items-center justify-content-center">Tambah Foto</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .jfif" class="form-control d-none" multiple="false" name="submitFotoKTP" id="submitFotoKTP" onchange="read_file(this)" value="assets/no-image.png">
                        <button type="button" class="btn deleteFotoKTP">Delete</button>
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