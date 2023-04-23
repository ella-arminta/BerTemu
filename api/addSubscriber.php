<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_SESSION['emailotp'];
    // cek sebelumnya ada gak
    $stmt = $conn->prepare("SELECT * FROM subscribers where email_sub = ?");
    $stmt->execute([$email]);
    if($stmt->rowCount() > 0){
        echo 'success';
        exit;
    }
    
    $stmt = $conn->prepare("INSERT INTO subscribers (email_sub) values (?)");
    $berhasil = $stmt->execute([$email]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'gagal';
    }
}
?>