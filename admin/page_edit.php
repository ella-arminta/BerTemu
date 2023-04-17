<?php
require "../connect.php";

$id = $_GET["id"];
$stmt = $conn->prepare("SELECT * FROM `orang_hilang` WHERE id_hilang = ?");
$stmt->execute([$id]);
$result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM `regencies`");
$stmt->execute();
$result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
</style>

<div class="container-fluid py-2">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn" style=" color:white; font-family:'Gill Sans MT'; margin-right:3%">Hilang</button>
                <button type="button" class="btn" style=" color:white; font-family:'Gill Sans MT';margin-right:3%">Pencarian</button>
                <button type="button" class="btn" style=" color:white; font-family:'Gill Sans MT';margin-right:3%">Selesai</button>
                <button type="button" class="btn" style=" background-color: rgb(236,108,79);color:white; font-family:'Gill Sans MT';margin-right:3%">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<form method="post">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="image-input" onchange="previewImage(event)">
                <img id="image-preview" src="#" alt="Preview Image" style="max-width: 100%; height: auto;">
            </div>
        </div>
        <div class="form-group">
            <div class="col">
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
            </div>
            <div class="form-group">
                <label for="tanggalHilang" style="font-family: 'Gill Sans MT';">Tanggal Hilang</label>
                <input type="date" id="tanggal_hilang" name="tanggal_hilang" class="form-control" value="<?= $result1[0]['tanggal_hilang'] ?>">
            </div>
            <div class="form-group">
                <label for="nama" style="font-family: 'Gill Sans MT';">Nama orang hilang</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $result1[0]['nama_lengkap'] ?>">
            </div>
            <div class="form-group">
                <label for="tinggiBadan" style="font-family: 'Gill Sans MT';">Tinggi Badan</label>
                <div class="input-group">
                    <input type="number" id="tinggi" name="tinggi" class="form-control" value="<?= $result1[0]['tinggi'] ?>">
                    <div class="input-group-append">
                        <span class="input-group-text">cm</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="umur" style="font-family: 'Gill Sans MT';">Umur</label>
                <input type="text" class="form-control" name="umur_hilang" id="umur_hilang" value="<?= $result1[0]['umur_hilang'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="nomor_telepon" style="font-family: 'Gill Sans MT';">Nomor Telepon yang bisa dihubungi</label>
                <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon">
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="keterangan" style="font-family: 'Gill Sans MT';">Keterangan tambahan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $result1[0]['keterangan'] ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn" style="background-color:rgb(57,79,110); color:white; font-family:'Gill Sans MT'">Submit</button>
</form>
</body>

</html>