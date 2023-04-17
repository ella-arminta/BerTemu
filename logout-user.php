<?php

include 'connect.php';

unset($_SESSION['login']);
header('location: login-user.php');

?>