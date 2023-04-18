<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare('SELECT u.nama_lengkap as nama_lengkap,u.foto_diri as foto_diri, k.isi as isi FROM komentar k join users u  where k.id_hilang=?  order by timestamp desc');
    $stmt->execute([$_POST['id_forum']]);
    $comments = $stmt->fetchAll();
    echo json_encode($comments);    
}

?>