<?php
require('connect.php');
$data = ("SELECT * FROM orang_hilang");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Workspace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script type="text/javascript" src="../MDB5/js/mdb.min.js"></script>

    <style>
        body{
            background-color: rgb(235,250,253);
            margin-left: 2%;
            margin-right: 2%;
        }
        .button1{
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
<button type="Button" class="button1" style = "background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'">
< BACK
</button>

<form>
<div class="row">
<h4 class="center" style="font-weight: bold; font-family:'Gill Sans MT'">Input form orang hilang </h4>
    <div class="col">
        <div class="form-group">
            <label for="foto" style="font-family: 'Gill Sans MT';">Foto</label> <br>
            <input type="file" id="image-input">
            <img id="image-preview" src="#" alt="Preview Image">
        </div>
    </div>
    <div class = "col mb-3">
        <label for="kotaHilang" style="font-family: 'Gill Sans MT';"> Kota Hilang </label>
        <input type="text" class="form-control">
        <label for="tanggalHilang" style="font-family: 'Gill Sans MT';"> Tanggal Hilang </label>
        <input type="date" id="date-input" name="date-input" class="form-control">
    </div>

    <div class = "row">
    <div class="form-group mb-3">
        <label for="nama" style="font-family: 'Gill Sans MT';"> Nama orang hilang</label>
        <input type="text" class="form-control">
    </div>
        <label for="tinggiBadan" style="font-family: 'Gill Sans MT';"> Tinggi Badan </label>
        <div class="input-group mb-3">
            <input type="number" id="height-input" name="height-input" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text">cm</span>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="kota" style="font-family: 'Gill Sans MT';"> Kota </label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="jenisKelamin" style="font-family: 'Gill Sans MT';">Jenis Kelamin</label>
            <select class="form-control" id="jenisKelamin">
            <option style="font-family: 'Gill Sans MT';">Perempuan</option>
            <option style="font-family: 'Gill Sans MT';">laki-laki</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="umur" style="font-family: 'Gill Sans MT';"> Umur </label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="phone" style="font-family: 'Gill Sans MT';">Nomor Telepon yang bisa dihubungi</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group mb-3">
            <label for="keterangan" style="font-family: 'Gill Sans MT';">Keterangan tambahan</label>
            <textarea class="form-control" id="keterangan" rows="3"></textarea>
        </div>
    </div>
</div>
</form>

<button type="Button" class="button1" style = "background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'">
SUBMIT
</button>
</body>

</html>

<script>
$(document).ready(function() {
  $('#image-input').on('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function() {
      $('#image-preview').attr('src', reader.result);
    }
    reader.readAsDataURL(file);
  });
});
</script>