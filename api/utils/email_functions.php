<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../connect.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
function sendEmail($nama,$subject,$email,$isi){
    //EMAIL
    $mail= new PHPMailer();
    $name = $nama; //nama email send
    $subject = $subject; //subject
    // $email = "c14210109@john.petra.ac.id";
    // $email = $emailPengurus;

    //SMTP Setting 
    // supaya bisa dijalanin di local / xampp
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    // $mail->SMTPDebug = 4;  //untuk debugging
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'brigittaella15@gmail.com';
    $mail->Password = 'ksdtsldehevjiznh'; //app password gmail
    $mail->Port = 587; //465->SSL 587->TLS
    $mail->SMTPSecure = 'tls'; // 'tls'

    //Email Setting
    $mail->isHTML(true);
    $mail->setFrom($mail->Username,$name);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $body = $isi;
    $mail->Body = $body;
   
   
    if(!$mail->send()) { //error di emailnya gk kekirim
        return 'gagal';
    }else{
        return 'success';
    }
}
?>