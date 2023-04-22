<?php
include '../connect.php';
if(isset($_SESSION['filter'])){
    echo json_encode($_SESSION['filter']);
}else{
    echo json_encode(['kosong']);
}

?>