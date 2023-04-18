<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // cek session
    if(!isset($_SESSION['login'])){
        echo 'blm login';
        exit;
    }
    // cek isi kosong
    if($_POST['isi'] == ''){
        echo 'isi kosong';
        exit;
    }
    $isi = $_POST['isi'];
    $id_user = $_SESSION['login'];
    $id_hilang = $_POST['id_forum'];
    $stmt = $conn->prepare("INSERT INTO komentar (id_hilang,id_user,isi) values (?,?,?)");
    $berhasil = $stmt->execute([$id_hilang,$id_user,$isi]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'error';
    }
}?>