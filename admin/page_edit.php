<?php
require "../connect.php";


$id = $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM `orang_hilang` WHERE id_hilang = ?");
$stmt->execute([$id]);
$result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM `regencies`");
$stmt->execute();
$result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['delete_button'])) {
    $id_hilang =  $result1[0]['id_hilang'];;
    $stmt = $conn->prepare("DELETE FROM orang_hilang WHERE id_hilang = ?");
    $stmt->execute([$id_hilang]);
}

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
    if ($_FILES['foto']['error'] == 4 || ($_FILES['foto']['size'] == 0 && $_FILES['foto']['error'] == 0)) {
        $stmt = $conn->prepare("UPDATE orang_hilang SET id_kota = ?, tanggal_hilang = ?, nama_lengkap = ?, tinggi =?, jenis_kelamin = ?, umur_hilang = ?, nomor_telepon =? , keterangan = ?
        WHERE id_hilang = ?");
        $berhasil =  $stmt->execute([$id_kota, $tanggal_hilang, $nama_lengkap, $tinggi, $jenis_kelamin, $umur_hilang, $nomor_telepon, $keterangan, $id]);
        if ($berhasil) {
            header('Location: tabel_hilang.php');
        } else {

            echo '<script>alert("gagal 234")</script>';
        }
    } else {
        $rename = time() . '-' . basename($_FILES["foto"]["name"]);
        $target_dir = "../assets/img/orang_hilang/";
        $target_file = $target_dir . basename($rename);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($foto['tmp_name'], $target_file)) {
            $stmt = $conn->prepare("UPDATE orang_hilang SET id_kota = ?, tanggal_hilang = ?, nama_lengkap = ?, tinggi =?, jenis_kelamin = ?, umur_hilang = ?, nomor_telepon =? , keterangan = ?, foto = ? 
            WHERE id_hilang = ?");
            $berhasil =  $stmt->execute([$id_kota, $tanggal_hilang, $nama_lengkap, $tinggi, $jenis_kelamin, $umur_hilang, $nomor_telepon, $keterangan, $target_file, $id]);
            if ($berhasil) {
                header('Location: tabel_hilang.php');
            } else {

                echo '<script>alert("gagal")</script>';
            }
        }
    }
}
if (isset($_POST['submit_button'])) {
    header('Location: tabel_hilang.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../MDB5/css/mdb.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBp0M" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color: rgb(235, 250, 253);
        margin-left: 2%;
        margin-right: 2%;
    }

    .btn {
        background-color: rgb(57, 79, 110);
    }

    .btn:focus {
        background-color: rgb(236, 108, 79);
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
</style>

<body>
    <a href="tabel_hilang.php">
        <button type="Button" class="button1" style="background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'">
            < BACK </button>
    </a>
    <form method="post">
        <div class="container-fluid py-2">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="button_hilang" class="btn" style=" color:white; font-family:'Gill Sans MT'; margin-right:3%">Hilang</button>
                        <button type="button" id="button_pencarian" class="btn" style=" color:white; font-family:'Gill Sans MT';margin-right:3%">Pencarian</button>
                        <button type="button" id="button_selesai" class="btn" style=" color:white; font-family:'Gill Sans MT';margin-right:3%">Selesai</button>
                        <button type=" submit" class="btn" id="delete_button" name="delete_button" style=" background-color: rgb(236,108,79);color:white; font-family:'Gill Sans MT';margin-right:3%" value="<?php echo $id_hilang; ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto" onchange="previewImage(event)"> <br>
                    <img id="image-preview" src="<?= $result1[0]['foto'] ?>" alt="Preview Image" style="max-width: 100%; height: auto;">
                </div>
            </div>

            <div class="col mb-2">
                <label for="id_kota" style="font-family: 'Gill Sans MT';">Kota Hilang</label>
                <select name="id_kota" id="id_kota" class="form-control">
                    <?php foreach ($result2 as $row) {
                        if ($row["id"] == $result1[0]["id_kota"]) { ?>
                            <option value="<?= $row['id'] ?>" selected><?= $row['name'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php }
                    } ?>
                </select>

                <label for="tanggalHilang" style="font-family: 'Gill Sans MT';">Tanggal Hilang</label>
                <input type="date" id="tanggal_hilang" name="tanggal_hilang" class="form-control" value="<?= $result1[0]['tanggal_hilang'] ?>">

                <div class="form-group mb-3">
                    <label for="nama" style="font-family: 'Gill Sans MT';">Nama orang hilang</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $result1[0]['nama_lengkap'] ?>">

                    <div class="form-group">
                        <label for="tinggiBadan" style="font-family: 'Gill Sans MT';">Tinggi Badan</label>
                        <div class="input-group mb-3">
                            <input type="number" id="tinggi" name="tinggi" class="form-control" value="<?= $result1[0]['tinggi'] ?>">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" style="font-family: 'Gill Sans MT';">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <?php if ($result1[0]['jenis_kelamin'] === "P") { ?>
                                    <option selected>Perempuan</option>
                                    <option>Laki-laki</option>
                                <?php } else { ?>
                                    <option>Perempuan</option>
                                    <option selected>Laki-laki</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="umur" style="font-family: 'Gill Sans MT';">Umur</label>
                            <input type="text" class="form-control" name="umur_hilang" id="umur_hilang" value="<?= $result1[0]['umur_hilang'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nomor_telepon" style="font-family: 'Gill Sans MT';">Nomor Telepon yang bisa dihubungi</label>
                            <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $result1[0]['nomor_telepon'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <label for="keterangan" style="font-family: 'Gill Sans MT';">Keterangan tambahan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $result1[0]['keterangan'] ?></textarea>

        <button type="submit" name="submit_button" class="btn" style="background-color:rgb(57,79,110); color:white; font-family:'Gill Sans MT'" id="submit" value="submit">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        $(document).ready(function() {
            $("#button_hilang").click(function() {
                $.ajax({
                    type: "POST",
                    url: "setStatusHilang.php",
                    data: {
                        status: 'hilang',
                        id: '<?= $_GET['id']; ?>',
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#button_hilang').css('background-color', 'white');
                        }
                    }
                });
            });
            $("#button_pencarian").click(function() {
                $.ajax({
                    type: "POST",
                    url: "setStatusHilang.php",
                    data: {
                        status: 'pencarian',
                        id: '<?= $_GET['id']; ?>',
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#button_pencarian').css('background-color', 'white');
                        }
                    }
                });
            });
            $("#button_selesai").click(function() {
                $.ajax({
                    type: "POST",
                    url: "setStatusHilang.php",
                    id: '<?= $_GET['id']; ?>',
                    data: {
                        status: 'selesai',
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $('#button_selesai').css('background-color', 'white');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>