<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $stmt = $conn->prepare('SELECT * FROM regencies where id=?');
    $berhasil = $stmt->execute([$id]);
    if($berhasil){
        $nama = $stmt->fetch();
        $nama = $nama['name'];
        echo json_encode([$nama,$_POST['id_hilang']]);
    }else{
        echo 'error';
    }


}
?>