<?php
require "connect.php";
$stmt = $conn->prepare("SELECT * FROM `orang_hilang`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <script type="text/javascript" src="../MDB5/js/mdb.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Document</title>
</head>
<style>
    body {
        background-color: rgb(235, 250, 253);
        margin-left: 2%;
        margin-right: 2%;
        margin-top: 2%;
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
        margin-left: 90%;
    }

    .button2{
        border: none;
        border-radius: 12%;
        padding: 7px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
    }
</style>
<body>
<a href="input_hilang.php">
    <button type="Button" class="button1" style = "background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'">
    + ADD
    </button>
</a>
<table class="table table-responsive table-light table-striped table-bordered table-hover" id="table">
  <thead>
    <tr>
        <th scope="col" style="font-family: 'Gill Sans MT';">No.</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Nama Lengkap</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Kota</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Jenis Kelamin</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Umur Hilang</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Tinggi</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Keterangan umum</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Tanggal Hilang</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Nomor Telepon</th>
        <th scope="col" style="font-family: 'Gill Sans MT';">Action</th>
    </tr>
  </thead>
  <tbody id="tabel_hilang">
    <?php foreach ($result as $row) { ?>
      <tr>
        <td><?= $row['id_hilang'] ?></td>
        <td><?= $row['nama_lengkap'] ?></td>
        <td><?= $row['id_kota'] ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= $row['umur_hilang'] ?></td>
        <td><?= $row['tinggi'] ?></td>
        <td><?= $row['keterangan'] ?></td>
        <td><?= $row['tanggal_hilang'] ?></td>
        <td><?= $row['nomor_telepon'] ?></td>
        <td>
        <button type="Button" class="button2" style = "background-color : rgb(57,79,110); color:white; font-family:'Gill Sans MT'">
        <i class="fas fa-edit" style="font-size: 24px;"></i>
        </button>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php $conn = null; ?>
</body>
</html>