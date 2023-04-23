<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $otp = $_POST['myotp'];
    if(!isset($_SESSION['otp'])){
     echo 'tidak ada otp';   
    }
    if($otp == $_SESSION['otp']){
        echo 'verified';
    }else{
        echo 'salah';
    }
}
?>