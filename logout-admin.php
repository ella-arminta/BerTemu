<?php

include 'connect.php';

unset($_SESSION['loginAdmin']);
header('location: login-admin.php');

?>