<?php
require "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kota = $_POST['id_kota'];
    $tanggal_hilang = $_POST['tanggal_hilang'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tinggi = $_POST['tinggi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur_hilang = $_POST['umur_hilang'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $keterangan = $_POST['keterangan'];

    $foto = $_FILES['foto'];
    $rename = time() . '-' . basename($_FILES["foto"]["name"]);
    $target_dir = "../assets/img/orang_hilang/";
    $target_file = $target_dir . basename($rename);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($foto['tmp_name'], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO orang_hilang (id_kota, tanggal_hilang, nama_lengkap, tinggi, jenis_kelamin, umur_hilang, nomor_telepon, keterangan, foto) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$id_kota, $tanggal_hilang, $nama_lengkap, $tinggi, $jenis_kelamin, $umur_hilang, $nomor_telepon, $keterangan, $target_file]);
    }
}


$stmt = $conn->prepare("SELECT * FROM `regencies`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit_button'])){
    header('Location: tabel_hilang.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Workspace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="../MDB5/js/mdb.min.js"></script>

    <style>
        body {
            background-color: rgb(255, 255, 255);
            margin-left: 2%;
            margin-right: 2%;
        }

        .button1 {
            border: none;
            border-radius: 12%;
            margin-top: 2%;
            margin-bottom: 2%;
            padding: 7px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
        }

        .center {
            margin: auto;
            width: 100%;
            padding-left: 40%;
            margin-bottom: 3%;
        }
    </style>


</head>

<body>
    <a href="tabel_hilang.php">
        <button type="Button" class="button1" style="background-color : #4566BA; color:white; font-family:'Gill Sans MT'">
            < BACK </button>
    </a>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <h4 class="center" style="font-weight: bold; font-family:'Gill Sans MT'; color : #212427">Input form orang hilang </h4>
            <div class="col">
                <div class="form-group">
                    <label for="foto" style="font-family: 'Gill Sans MT'; color : #212427">Foto</label> <br>
                    <input type="file" style="margin-bottom: 2%" id="foto" name="foto" onchange="previewImage(event)">
                    <img id="image-preview" src="#" alt="Preview Image" style="max-width: 100%; height: auto;">
                </div>
            </div>

            <script>
                function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var output = document.getElementById('image-preview');
                        output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>
            <div class="col mb-2">
                <label for="id_kota" style="font-family: 'Gill Sans MT'; color : #212427"> Kota Hilang </label>
                <!-- <input type="text" class="form-control" id="id_kota" name="id_kota"> -->
                <select class="form-control" name="id_kota" id="id_kota">
                    <?php foreach ($result as $row) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php } ?>
                </select> <br>

                <label for="tanggalHilang" style="font-family: 'Gill Sans MT'; color : #212427"> Tanggal Hilang </label>
                <input type="date" id="tanggal_hilang" name="tanggal_hilang" class="form-control">
                <div class="form-group mb-3">
                    <label for="nama" style="font-family: 'Gill Sans MT'; color : #212427"> Nama orang hilang</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    <label for="tinggiBadan" style="font-family: 'Gill Sans MT'; color : #212427"> Tinggi Badan </label>
                    <div class="input-group mb-3">
                        <input type="number" id="tinggi" name="tinggi" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenis_kelamin" style="font-family: 'Gill Sans MT'; color : #212427">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option style="font-family: 'Gill Sans MT';">Perempuan</option>
                            <option style="font-family: 'Gill Sans MT';">laki-laki</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="umur" style="font-family: 'Gill Sans MT'; color : #212427"> Umur </label>
                        <input type="text" class="form-control" name="umur_hilang" id="umur_hilang">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" style="font-family: 'Gill Sans MT'; color : #212427">Nomor Telepon yang bisa dihubungi</label>
                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group mb-3">
                    <label for="keterangan" style="font-family: 'Gill Sans MT'; color : #212427">Keterangan tambahan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
        </div>
        <input type="submit" name="submit_button" class="button1" style="background-color : #4566BA; color:white; font-family:'Gill Sans MT'"  id="submit" value="Submit">
    </form>
</body>

</html>