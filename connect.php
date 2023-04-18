<?php
// localhost
$host = "localhost";
$db = "bertemu";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Data dikembalikan dalam bentuk object bukan array
    PDO::ATTR_EMULATE_PREPARES   => false,
];


try {
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error Connect to Database Msg: ".$e->getMessage();
}

session_start();
$session_login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

$session_loginAdmin = isset($_SESSION['loginAdmin']) ? $_SESSION['loginAdmin'] : '';

// if (isset($session_login))
// {
//     $fetch_user = "SELECT * FROM `users` WHERE email = ?";
//     $fetch_user = $connect->prepare($fetch_user);
//     $fetch_user->execute([ $session_login ]);
//     $fetch_user = $fetch_admin->fetch();
// }
?>