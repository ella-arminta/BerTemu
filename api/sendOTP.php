<?php 
include '../connect.php';
include 'utils/email_functions.php';
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';
require_once '../PHPMailer/Exception.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $_SESSION['otp'] = rand(100000, 999999);
    $_SESSION['emailotp'] = $email;
    if(empty($email)){
        echo 'kosong';
        exit;
    }
    $isi = '
        <div>
        Halo Keluarga Bertemu berikut OTP : '.$_SESSION['otp'].'
        </div>
    ';
    $hasil = sendEmail('Bertemu | Bersama Temukan','OTP Email Notifikasi Aktivasi',$email,$isi);
    if($hasil == 'success'){
        echo 'success';
    }else{
        echo 'gagal email';
    }
}
?>