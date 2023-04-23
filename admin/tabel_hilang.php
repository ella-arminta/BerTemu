<?php
require "../connect.php";
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
  <script type="text/javascript" src="../MDB5/js/mdb.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSBp0M" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <title>Document</title>
</head>
<style>
  body {
    background-color: rgb(255, 255, 255);
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

  .button2 {
    border: none;
    border-radius: 12%;
    padding: 7px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
  }

  /* css template */
  .fixed-top {
    position: fixed;
    background: #4566BA !important;
  }

  /* css menu-user */
  .fixed-bottom {
    position: fixed;
    background: #4566BA !important;
  }

  .icon {
    width: 40px;
    height: auto;
    margin-left: 20px;
    margin-right: 20px;
  }

  .active {
    background: #5275CD;
  }

  .pembatas-navbar {
    height: 100px;
    width: 100%;
  }
</style>

<body>
    <!-- navbar top -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-0 my-0 mx-auto">
      <div class="position-relative mx-auto">
          <img class= "mx-auto" src="../assets/logo-horizontal.png" style="height: 70px">
      </div>
    </nav>
    <br>

  <a href="input_hilang.php">
    <button type="Button" class="button1" style="background-color : #4566BA ; color:white; font-family:'Gill Sans MT'">
      + ADD
    </button>
  </a>
  <table class="table table-light table-striped table-bordered table-hover" style="color: #212427" id="table">
    <thead>
      <tr>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">No.</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Nama Lengkap</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Kota</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Jenis Kelamin</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Umur Hilang</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Tinggi</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Keterangan umum</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Tanggal Hilang</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Nomor Telepon</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Status</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Foto</th>
        <th scope="col" style="font-family: 'Gill Sans MT'; color: #212427">Action</th>
      </tr>
    </thead>
    <tbody id="tabel_hilang">
      <?php
      $i = 1;
      foreach ($result as $row) { ?>
        <tr id="wkwkw">
          <td> <?php
                echo $i;
                $i++;
                ?>
          </td>
          <td><?= $row['nama_lengkap'] ?></td>
          <td><?= $row['id_kota'] ?></td>
          <td><?= $row['jenis_kelamin'] ?></td>
          <td><?= $row['umur_hilang'] ?></td>
          <td><?= $row['tinggi'] ?></td>
          <td><?= $row['keterangan'] ?></td>
          <td><?= $row['tanggal_hilang'] ?></td>
          <td><?= $row['nomor_telepon'] ?></td>
          <td><?= $row['status'] ?></td>
          <td><?= $row['foto'] ?></td>

          <td>
            <a href="page_edit.php?id=<?= $row['id_hilang'] ?>">
              <button type="button" class="btn" id="<?= $row['id_hilang'] ?>" style="background-color: #4566BA ; color: white; font-family: 'Gill Sans MT';">
                <i class="fas fa-edit" style="font-size: 24px;"></i>
              </button>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php $conn = null; ?>
  <nav class="navbar fixed-bottom navbar-expand-lg mx-auto">
    <div class="collapse navbar-collapse justify-content-center">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index-admin.php"><img src="../assets/home-icon.png" class="icon"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="acc-user-admin.php#"><img src="../assets/acc-icon.png" class="icon"></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="input_hilang.php"><img src="../assets/upload-icon.png" class="icon"></a>
        </li>
      </ul>
    </div>
  </nav>
</body>
<script>
  $("button").click(function() {

  });

  function getData(elm) {
    var id = elm.parentNode.id;
    $.ajax({
      url: "getData.php",
      method: "POST",
      data: {
        id_hilang: id
      },
      success: function(result) {
        $("#div1").html(result);
        $("#div1").css('color','#212427');
      }
    });
  }
</script>

</html>