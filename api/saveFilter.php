<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kota = $_POST['kota'];
    $kelamin = $_POST['kelamin'];
    $min_umur = intval($_POST['min-umur']);
    $max_umur = intval($_POST['max-umur']);
    $max_tinggi = intval($_POST['max-tinggi']);
    $min_tinggi = intval($_POST['min-tinggi']);
    $min_tgl = $_POST['min-tgl'];
    $max_tgl = $_POST['max-tgl'];

    if(empty($kota)){
        $kota = '';
    }
    if(empty($kelamin)){
        $kelamin = '';
    }
    if(empty($min_umur)){
        $min_umur = null;
    }
    if(empty($max_umur)){
        $max_umur = null;
    }
    if(empty($max_tinggi)){
        $max_tinggi = null;
    }
    if(empty($min_tinggi)){
        $min_tinggi = null;
    }
    if(empty($max_tgl)){
        $max_tgl = '';
    }
    if(empty($min_tgl)){
        $min_tgl = '';
    }
    $_SESSION['filter'] = [
        'kota' => $kota,
        'kelamin' => $kelamin,
        'min_umur' => $min_umur,
        'max_umur' => $max_umur,
        'max_tinggi' => $max_tinggi,
        'min_tinggi' => $min_tinggi,
        'max_tgl' => $max_tgl,
        'min_tgl' => $min_tgl,
    ];
    echo 'success';
}
?>