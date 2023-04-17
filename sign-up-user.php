<?php
require "connect.php";

if (isset($_POST['signup']) && $_POST['signup'] == "1")
{
    if (isset($_POST['name']))
    {
        $name = $_POST['name'];
        if (isset($_POST['email']))
        {
            $email = $_POST['email'];
            if (isset($_POST['nik']))
            {
                $nik = $_POST['nik'];
                if (isset($_POST['password']))
                {
                    $password = $_POST['password'];
                    if (isset($_FILES['imageDiri']))
                    {
                        if (isset($_FILES['imageKTP']))
                        {
                            // nama file foto-foto
                            $foto_diri = 'foto-diri-'.$email;
                            $foto_KTP = 'foto-KTP-'.$email;

                            // get extension
                            $file_extension_diri = pathinfo($_FILES['imageDiri']['name'], PATHINFO_EXTENSION);
                            $file_extension_KTP = pathinfo($_FILES['imageKTP']['name'], PATHINFO_EXTENSION);

                            // path
                            $target_diri = 'assets/foto_diri/'.$foto_diri.'.'.$file_extension_diri;
                            $target_KTP = 'assets/KTP/'.$foto_KTP.'.'.$file_extension_KTP;

                            // move files
                            move_uploaded_file($_FILES['imageDiri']['tmp_name'], $target_diri);
                            move_uploaded_file($_FILES['imageKTP']['tmp_name'], $target_KTP);
                            
                            // $stmt = $conn->prepare(
                            //     "INSERT INTO 'users' ('nama_lengkap', 'password', 'ktp', 'nik', 'foto_diri', 'status') 
                            //     VALUES ('$name, '$password', '$target_KTP', '$nik', '$target_diri', '1')"
                            // );

                            $stmt = "INSERT INTO `users` SET nama_lengkap = ?, password = ?, ktp = ?, nik = ?, foto_diri = ?, email = ?, status = ?";
                            $stmt = $conn->prepare($stmt);
                            $stmt->execute([
                                $name,
                                $password,
                                $target_KTP,
                                $nik,
                                $target_diri,
                                $email,
                                '0'
                            ]);

                            echo  "<script>alert('User Berhasil Dibuat, Silahkan Log-in')</script>";

                            header('location: login-user.php');
                        }
                        else 
                        {
                            $msgKTP = 'KTP belum dimasukkan!';
                        }
                    }
                    else 
                    {
                        $msgDiri = 'Foto diri belum dimasukkan!';
                    }
                }        
                else 
                {
                    $msgPassword = 'Password belum dimasukkan!';
                }
            }
            else 
            {
                $msgNIK = 'NIK belum dimasukkan!';
            }
        }
        else
        {
            $msgEmail = 'Email belum dimasukkan!';
        }
    }
    else {
        $msgName = 'Nama belum dimasukkan';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

        /* css input image */
        .image-input-container {
            border-radius: 15px;
            padding:20px;
            background: white;
            width: 100%;
            position: relative;
        }
        .image-preview {
            border: 1px solid grey;
            border-radius: 15px;
            width: 100%;
            height: 100%;
            position: relative;
            padding-bottom: 66%;
            background-size: cover;
            background-image: url('assets/no-image.png');
            cursor: pointer;
        }
        .image-previewKTP {
            border: 1px solid grey;
            border-radius: 15px;
            width: 100%;
            height: 100%;
            position: relative;
            padding-bottom: 66%;
            background-size: cover;
            background-image: url('assets/no-image.png');
            cursor: pointer;
        }
        .custom-file-label::after {
            content: "Browse";
        }
        .custom-file-label[for="image"]::after {
            content: "Browse";
            margin-left: 5px;
        }
        .custom-file-label[for="image"].selected::after {
            content: "Change";
            margin-left: 5px;
        }

        /* lain-lain */
        .pembatas-navbar {
            height: 200px;
            width: 100%;
        }
        .btn {
            background: #475a7c !important;
            color: white;
        }
    </style>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image-preview');
                if (event.target.files.length === 0) {
                output.style.backgroundImage = "url('assets/no-image.png')";
                document.getElementById('image').classList.remove('selected');
                } else {
                output.style.backgroundImage = "url('" + reader.result + "')";
                output.style.backgroundColor = "transparent";
                document.getElementById('image').classList.add('selected');
                }
            };
            if (event.target.files.length === 0) {
                output.style.backgroundImage = "url('assets/no-image.png')";
                document.getElementById('image').classList.remove('selected');
            } else {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
        function previewImageKTP(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image-previewKTP');
                if (event.target.files.length === 0) {
                output.style.backgroundImage = "url('assets/no-image.png')";
                document.getElementById('imageKTP').classList.remove('selected');
                } else {
                output.style.backgroundImage = "url('" + reader.result + "')";
                output.style.backgroundColor = "transparent";
                document.getElementById('imageKTP').classList.add('selected');
                }
            };
            if (event.target.files.length === 0) {
                output.style.backgroundImage = "url('assets/no-image.png')";
                document.getElementById('imageKTP').classList.remove('selected');
            } else {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
</head>
<body>
    <div class="container-hp">
        <div class="mx-auto" style="padding-right: 80px; padding-left: 80px; padding-top: 50px;">
            <div class="row start-0">
                <H2>Buat Akun</H2>
            </div>
            <div class="row d-flex justify-content-center">
                <!-- form -->
                <form method="post" style="width: 100%;" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label for="image">Foto Diri:</label>
                        <div class="image-input-container" onclick="document.getElementById('image').click()">
                            <div class="image-preview" id="image-preview">

                            </div>
                            <div class="custom-file d-none">
                            <input type="file" class="custom-file-input" id="image" name="imageDiri" accept="image/*" onchange="previewImage(event)">
                            <label class="custom-file-label d-none" for="image"></label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="imageKTP">Foto KTP:</label>
                        <div class="image-input-container" onclick="document.getElementById('imageKTP').click()">
                            <div class="image-previewKTP" id="image-previewKTP">
                                
                            </div>
                            <div class="custom-file d-none">
                            <input type="file" class="custom-file-input" id="imageKTP" name="imageKTP" accept="imageKTP/*" onchange="previewImageKTP(event)">
                            <label class="custom-file-label d-none" for="imageKTP"></label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn" name="signup" value="1" style="width: 100%"><h5>Daftar</h3></button>
                    </div>
                    <?=isset($msgSukses) ? '<div class="alert alert-danger">'.$msgSukses.'</div>' : ''?>
                </form>
            </div>
        </div>

        <div class="pembatas-navbar"></div>

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