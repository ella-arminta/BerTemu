<?php
    require "connect.php";
    if(!isset($_GET['id'])){
        header('Location: explore.php');
        // echo 'gagal2';
    }
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM orang_hilang where id_hilang=?");
    $stmt->execute([$id]);
    if($stmt->rowCount() <= 0){
        // echo 'gagal';
        header('Location: explore.php');
    }
    $orang = $stmt->fetch();
    $namaKota = '';
    $stmt = $conn->prepare('SELECT * FROM regencies where id=?');
    $berhasil = $stmt->execute([$orang['id_kota']]);
    if($berhasil){
        $nama = $stmt->fetch();
        $namaKota = $nama['name'];  
    }
    function formatDate($mydate) {
        $date = new DateTime($mydate);
        $options = [
            'locale' => 'id-ID',
            'timezone' => 'Asia/Jakarta',
            'weekday' => 'long',
            'day' => 'numeric',
            'month' => 'long',
            'year' => 'numeric'
        ];
        $formatter = new IntlDateFormatter($options['locale'], NULL, NULL, $options['timezone'], NULL, $options['weekday'] . ', ' . $options['day'] . ' ' . $options['month'] . ' ' . $options['year']);
        $formattedDate = $formatter->format($date);
        return $formattedDate;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home User</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/e52db3bf8a.js" crossorigin="anonymous"></script>
    <!-- customer css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/explore.css">
</head>
<body>
    <div class="container-hp">
        <div style="height:60px;display:flex;align-items:center;margin-left:20px;">
        <button onclick="window.location.href='explore.php'" type="Button" class="button1 btn" style="background-color : #4566BA; color:white; font-family:'Gill Sans MT';border:none;">
        <i class="fa-solid fa-arrow-left"></i> Back </button>
        </div>
        <div class="card-container">
            <div class="mycard">
                <div></div>
                <div class="row">
                    <div class="col-5">
                        <img src="assets/img/orang_hilang/<?= $orang['foto'] ?>" alt="">
                    </div>
                    <div class="col-7">
                        <div><b><?= $orang['nama_lengkap']?></b></div>
                        <div><?= strtolower($namaKota) ?></div>
                        <div><?= $orang['umur_hilang'] ?> tahun</div>
                        <div style="display:flex;align-items:center;">
                            <div style="margin-right:15px;"><?= strtoupper($orang['jenis_kelamin']) === 'P' ? 'Perempuan' : 'Laki-laki'; ?></div>
                            <div><?= $orang['tinggi'] ?> cm</div>
                        </div>
                        <div style="cursor:pointer;"><?= $orang['nomor_telepon'] ?> <i class="fa-solid fa-copy"></i></div>
                        <?php
                        if($orang['status'] == 'pencarian'){
                            echo'
                            <div>
                            <button type="button" class="btn btn-outline-warning" style="float:right;width:100px;">Pencarian</button>
                            </div>
                            ';
                        }else if($orang['status'] == 'selesai'){
                           echo '
                            <div>
                            <button type="button" class="btn btn-outline-success" style="float:right;width:100px;">Selesai</button>
                            </div>
                            ';
                        }else{
                            echo '
                            <div>
                            <button type="button" class="btn btn-outline-danger" style="float:right;width:100px;">Hilang</button>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
                <div style="height:20px;width:100%;"></div>
                <div class="ket row">
                    <div>Keterangan Tambahan</div>
                    <div><?= $orang['keterangan'] ?></div>
                </div>
            </div>
        </div>
        <div style="height:30px;width:100%;"><span style="padding-left:calc(30px + 5%);padding-bottom:7px;">Kolom Diskusi</span></div>
        <div class="comment-container">
            <div class="comments">
                <?php 
                $stmt = $conn->prepare("SELECT * FROM komentar where status = 1");
                $stmt->execute();
                $count = 0;
                while($kom = $stmt->fetch()):
                    $count+=1;
                ?>
                <?php endwhile; ?>
                <?php if($count == 0): ?>
                    <div style="display:block;margin:auto;color:#425B7F;text-align:center;">Belum ada diskusi</div>
                <?php endif; ?>
            </div>
        </div>
        <div style="height:30px;width:100%;"></div>
        <div class="form-floating" style="width:90%;margin:auto;">
            <textarea class="form-control" placeholder="Ikut Berdiskusi" id="komentar" name="komentar" style="height: 90px"></textarea>
            <label for="floatingTextarea2Disabled">Ikut Berdiskusi</label>
        </div>
        <div style="height:22px;width:100%;"></div>
        <?php if(!isset($_SESSION['login'])):?>
        <button type="Button" class="button1 btn" onclick="window.location.href= 'login-user.php'" style="background-color : #4566BA; color:white; font-family:'Gill Sans MT';border:none;width:80px;display:block;float:right;margin-right:5%;margin-bottom:100px;">Log-in</button>
        <?php else: ?>
        <button type="Button" onclick="sendKomentar()" class="button1 btn" style="background-color : #4566BA; color:white; font-family:'Gill Sans MT';border:none;width:80px;display:block;float:right;margin-right:5%;margin-bottom:100px;">Send</button>
        <?php endif; ?>
        <div style="height:26px;width:100%;"></div>
        <div style="height:82px;width:100%;"></div>
        <!-- navbar top -->
        <?php include 'bottombar.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){

        })
        function sendKomentar(){
            $.ajax({
                type: "POST",
                url: "api/sendKomentar.php",
                data: {
                    isi : $('#komentar').val(),
                    id_forum : '<?= $_GET['id'] ?>',
                },
                success: function (response) {
                    if(response =='blm login'){
                        alert('Silahkan login terlebih dahulu untuk ikut berdiskusi')
                    }else if(response == 'isi kosong'){
                        alert('Silahkan mengisi kolom diskusi terlebih dahulu')
                    }else if(response == 'success'){
                        alert('Komentar berhasil dikirimkan')
                    }else{
                        alert("Terjadi kesalahan.")
                    }
                }
            });
        }
        function isJSON(str) {
            try {
                JSON.parse(str);
                return true;
            } catch (e) {
                return false;
            }
        }
        function getKomentar(){
            $.ajax({
                type: "POST",
                url: "api/getKomentar.php",
                data: {
                    id_forum : '<?= $_GET['id'] ?>',
                },
                success: function (response) {
                    if(isJSON(response)){
                        comments = JSON.parse(response);
                        divcomm = ``;
                        counter = 0;
                        for (var com of comments) {
                            counter+=1;
                            divcomm += `
                            <div class="comment">
                                <div class="pp"><img src="`+com.foto_diri+`" alt=""></div>
                                <div>
                                    <h1>`+com.nama_lengkap+`</h1>
                                    <p>`+com.isi+`</p>
                                </div>
                            </div>
                            `
                        }
                        $('.comments').html(divcomm);
                        if(counter == 0){
                            $('.comments').html(`<div style="display:block;margin:auto;color:#425B7F;text-align:center;">Belum ada diskusi</div>`);
                        }
                    }else{
                        console.log('error json komentar')
                    }   
                }
            });
        }
        setInterval(function() {
            getKomentar()
        }, 500);
        
    </script>
</body>
</html>