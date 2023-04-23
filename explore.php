<?php
    require "connect.php";
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
        <div class="backdrop"></div>
        <div class="left-bar">
            
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <div style="font-size:18px;margin-left:10px;cursor:pointer;">Filter</div>
                <button type="button" class="btn-close" aria-label="Close"  onclick="removeLeftBar()" style="float:right;margin-right:10px;margin-top:8px;"></button>
            </div>
            <div class="container">
                <form id="filterForm">
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <select class="form-select" id="kota" name="kota" aria-label="Default select example">
                            <option selected value="">-- Pilih --</option>
                            <?php
                                $stmt = $conn->prepare("SELECT * FROM regencies order by name");
                                $stmt->execute();
                                while($regen = $stmt->fetch()):
                            ?>
                            <option value="<?=$regen['id']?>"><?= $regen['name']?></option>
                            <?php endwhile; ?>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="kelamin" name="kelamin" aria-label="Default select example">
                            <option selected value="">-- Pilih --</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur (tahun)</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" name="min-umur" id="min-umur" aria-describedby="min" placeholder="min">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="max-umur" name="max-umur" aria-describedby="max" placeholder="max">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Tinggi</label>
                        <div class="row" >
                            <div class="col" style="display:flex;justify-content:center;align-items:center">
                                <input type="number" class="form-control" id="min-tinggi"  name="min-tinggi" aria-describedby="min" placeholder="min">
                                 <div>cm</div>
                            </div>
                            <div class="col" style="display:flex;justify-content:center;align-items:center">
                                <input type="number" class="form-control" id="max-tinggi" name="max-tinggi" aria-describedby="max" placeholder="max">
                                <div>cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Minimal Tanggal Hilang</label>
                        <input type="date" id="min-tgl" name="min-tgl">
                    </div>
                    <div class="mb-3">
                        <label for="tinggi" class="form-label">Maksimal Tanggal Hilang</label>
                        <input type="date" id="max-tgl" name="max-tgl">
                    </div>
                    <button class="btn btn-primary saveFilter" onclick="saveFilter()" type="button" style="float:right;">Save Filter</button>
                </form>
            </div>
        </div>
        <div class="header">
            <div class="filter"  onclick="showLeftBar()"><i class="fa-solid fa-filter fa-2xl" style="color:white;"></i></div>
            <div class="outer-input">
                <input type="text" id="carinama" placeholder="Cari Nama">
                <div onclick="searchByName()"><i class="fa-solid fa-paper-plane fa-xl" ></i></div>
            </div>
        </div>
        <div style="height:90px;width:100%"></div>
        <div class="card-container">
            <div class="mycard" onclick="openForum()">
                <div>Jumat, 9 April 2024</div>
                <div class="row">
                    <div class="col-5">
                        <img src="assets/img/orang_hilang/dummy1.jpg" alt="">
                    </div>
                    <div class="col-7">
                        <div><b>Nicholas Suhendar</b></div>
                        <div>Surabaya</div>
                        <div style="display:flex;align-items:center;">
                            <div style="margin-right:15px;">Laki-Laki</div>
                            <div>162 cm</div>
                        </div>
                        <div style="cursor:pointer;">082141942965 <i class="fa-solid fa-copy"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width:100%;height:72px;"></div>
        <!-- navbar top -->
        <?php include 'bottombar.php' ?>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            // $('.left-bar .btn-close').click(function(){
            //     $('.left-bar').removeClass('show');
            //     $('.backdrop').removeClass('show');
            // })
            // $('.header .filter').click(function(){
            //     $('.left-bar').addClass('show');
            //     $('.backdrop').addClass('show');
            // })
        })
        function removeLeftBar(){
            $('.left-bar').removeClass('show');
            $('.backdrop').removeClass('show');
        }
        function showLeftBar(){
            $.ajax({
                type: "POST",
                url: "api/fetchFilter.php",
                success: function (response) {
                    if(isJSON(response)){
                        data = JSON.parse(response);
                        if(response[0] == 'kosong'){

                        }else{
                            console.log('HAII'+data.kota)
                            $('#kota').val(data.kota);
                            $('#kelamin').val(data.kelamin.toUpperCase());
                            $('#min-umur').val(data.min_umur);
                            $('#max-umur').val(data.max_umur);
                            $('#min-tinggi').val(data.min_tinggi);
                            $('#max-tinggi').val(data.max_tinggi);
                            $('#min-tgl').val(data.min_tgl);
                            $('#max-tgl').val(data.max_tgl);
                        }
                    }else{
                        alert("Something went wrong")
                    }
                }
            });
            $('.left-bar').addClass('show');
            $('.backdrop').addClass('show');
        }
        function isJSON(str) {
            try {
                JSON.parse(str);
                return true;
            } catch (e) {
                return false;
            }
        }
        function openForum(id_hilang){
            id_hilang = id_hilang || '';
            window.location.href = 'detail-hilang.php?id='+id_hilang;
        }
        function saveFilter(){
            console.log($('#filterForm').serialize())
            $.ajax({
                type: "POST",
                url: 'api/saveFilter.php',
                data: $('#filterForm').serialize(),
                success: function (response) {
                    if(response == 'success'){
                        searchHilang();
                        removeLeftBar();
                    }else{
                        alert('Something went wrong.');
                    }
                }
            });
        }
        function formatDate(mydate){
            const dateString =mydate;
            const date = new Date(dateString);
            const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const formatter = new Intl.DateTimeFormat('id-ID', options);
            const formattedDate = formatter.format(date);
            return formattedDate;
        }
        function searchHilang(nama){
            nama = nama || '';
            $.ajax({
                type: "POST",
                url: "api/searchHilang.php",
                data: {
                    nama_hilang:nama,
                },
                success: function (response) {
                    if(isJSON(response)){
                        data = JSON.parse(response);
                        console.log(data)
                        cards = ``;
                        for (var thisrow of data) {
                            mykota = '';
                            mycard = ``;
                            // fetch Nama Kota
                            $.ajax({
                                type: "POST",
                                url: "api/fetchNamaKota.php",
                                data: {
                                    id:thisrow.id_kota,
                                    id_hilang : thisrow.id_hilang,
                                },
                                success: function (response) {
                                    if(isJSON(response)){
                                        hai = JSON.parse(response)
                                        id_hilang_ini = hai[1]
                                        mykota = hai[0];

                                        $('.mycard#card-'+id_hilang_ini+' .kotaVal').text(mykota);
                                        document.querySelector('.mycard#card-'+id_hilang_ini+' .kotaVal').text = mykota;
                                    }else{
                                        alert('error')
                                    }
                                   
                                    
                                }
                            });
                            if(thisrow.jenis_kelamin.toUpperCase() == 'P'){
                                thisrow.jenis_kelamin = 'Perempuan';
                            }else{
                                thisrow.jenis_kelamin = 'Laki-laki';
                            }
                            mycard = `
                            <div class="mycard" id="card-`+thisrow.id_hilang+`" onclick="openForum(`+thisrow.id_hilang+`)">
                                <div>`+formatDate(thisrow.tanggal_hilang)+`</div>
                                <div class="row">
                                    <div class="col-5">
                                        <img src="assets/img/orang_hilang/`+thisrow.foto+`" alt="">
                                    </div>
                                    <div class="col-7">
                                        <div><b>`+thisrow.nama_lengkap+`</b></div>
                                        <div class='kotaVal'>`+mykota+`</div>
                                        <div>`+thisrow.umur_hilang+` tahun</div>
                                        <div style="display:flex;align-items:center;">
                                            <div style="margin-right:15px;">`+thisrow.jenis_kelamin+`</div>
                                            <div>`+thisrow.tinggi+` cm</div>
                                        </div>
                                        <div style="cursor:pointer;">`+thisrow.nomor_telepon+` <i class="fa-solid fa-copy"></i></div>
                                        <div></div>
                            `;
                            if(thisrow.status == 'pencarian'){
                                mycard += `
                                <div>
                                <button type="button" class="btn btn-outline-warning" style="float:right;width:100px;">Pencarian</button>
                                </div>
                                `
                            }else if(thisrow.status == 'selesai'){
                                mycard += `
                                <div>
                                <button type="button" class="btn btn-outline-success" style="float:right;width:100px;">Selesai</button>
                                </div>
                                `
                            }else{
                                mycard += `
                                <div>
                                <button type="button" class="btn btn-outline-danger" style="float:right;width:100px;">Hilang</button>
                                </div>
                                `;
                            }
                            mycard += `
                                    </div>
                                </div>
                            </div>
                            `;
                            cards += mycard;
                        }
                        $('.card-container').html(cards);
                    }else{
                        alert("Something went wrong");
                    }
                }
            });
        }
        function searchByName(){
            nama = $('#carinama').val()
            console.log(nama)
            searchHilang(nama)
        }
        searchHilang();
    </script>
</body>
</html>