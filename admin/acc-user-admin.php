<?php
    require "../connect.php";

    if (empty($session_loginAdmin))
    {
        header('location: login-admin.php');
    }

    if (isset($_POST['ajax'])){
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        $arr = array();

        foreach($res as $hasil) {
            $temp = array();
            array_push($temp,$hasil['id_user']); 
            array_push($temp,$hasil['nama_lengkap']);
            array_push($temp,$hasil['email']);
            array_push($temp,$hasil['nik']);
            array_push($temp,$hasil['foto_diri']);
            array_push($temp,$hasil['ktp']);
            array_push($temp,$hasil['status']);
            array_push($arr,$temp);
        }

        $json = json_encode($arr);
        echo $json;
        exit();
    }

    if (isset($_POST['status']) && isset($_POST['id'])){
        $status = $_POST['status'] == 1 ? 0 : 1;

        $sql_upStatus = "UPDATE users SET status = :s WHERE id_user = :i";
        $stmt_upStatus = $conn->prepare($sql_upStatus);
        $stmt_upStatus->execute(array(
            ":s" => $status,
            ":i" => $_POST['id']
        ));
        echo "1";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acc User</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- DataTable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<style>
    body {
        background-color: #eef9fc;
        margin-left: 2%;
        margin-right: 2%;
    }
    
    /* css template */
    .fixed-top {
        position: fixed;
        background: #475a7c !important;
    }

    /* css menu-user */
    .fixed-bottom {
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

    .pembatas-navbar {
        height: 100px;
        width: 100%;
    }
</style>
<script>
    $(document).ready(function() {
            // tampilin tabel
            $("#table-users").DataTable({
                ajax : {
                    processing: true,
                    serverSide: true,
                    url : "acc-user-admin.php",
                    dataSrc : "",
                    type : "post",
                    data : {
                        ajax : 1
                    }
                },
                columns : [
                    {data : 0},
                    {data : 1},
                    {data : 2},
                    {data : 3},
                    {data : null,
                        "render" : function(data,type,row){
                             return '<a href="../'+row[4]+'" target="_blank"><button class="btn btn-primary">View</button></a>';
                        }
                    },
                    {data : null,
                        "render" : function(data,type,row){
                             return '<a href="../'+row[5]+'" target="_blank"><button class="btn btn-primary">View</button></a>';
                        }
                    },
                    {data : null,
                        "render" : function(data,type,row){
                            if(row[6] == 0){
                                return '<button class="btn btn-success" id="ubahStatus" value="'+row[6]+'">Aktifkan</button>';
                            }else if(row[6] == 1){
                                return '<button class="btn btn-warning" id="ubahStatus" value="'+row[6]+'">Nonaktifkan</button>';
                            }
                    }}
                ],
                columnDefs: [
                    { width : "5%" , targets : 0},
                    { width : "15%" , targets : 1},
                    { width : "15%" , targets : 2},
                    { width : "5%" , targets : 3},
                    { width : "20%" , targets : 4},
                    { width : "15%" , targets : 6},
                    { width : "25%" , targets : 5}
                ],
                    fixedColumns : true
            });

            $(document.body).on("click", "#ubahStatus", function(){
                let idUser = $(this).parent().parent().children().eq(0).text();
                let statusUser = $(this).val();

                console.log("test");

                $.ajax({
                    type: "post",
                    data: {
                        id: idUser,
                        status: statusUser
                    },
                    success: function(response) {
                        $(this).html(response);
                        $("#table-users").DataTable().ajax.reload(null,false);
                    }
                })
            });
        });
</script>
<body>
    <div class="pembatas-navbar"></div>

    <!-- navbar top -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-0 my-0 mx-auto">
        <div class="position-relative mx-auto">
            <img class= "mx-auto" src="../assets/logo-horizontal.png" style="height: 70px">
        </div>
    </nav>

    <div class="container justify-content-center">
        <div class="m-3 table-responsive">
            <table id="table-users">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>Foto Diri</th>
                        <th>Foto KTP</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <div class="pembatas-navbar"></div>

    <!-- Menu -->
    <nav class="navbar fixed-bottom navbar-expand-lg mx-auto">
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index-admin.php"><img src="../assets/home-icon.png" class="icon"></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><img src="../assets/acc-icon.png" class="icon"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabel_hilang.php"><img src="../assets/upload-icon.png" class="icon"></a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>