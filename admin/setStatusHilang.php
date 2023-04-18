<?
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_hilang = $_POST['id'];
    $status = $_POST['status'];
    if($status != 'hilang' && $status != 'pencarian' && $status != 'selesai' ){
        echo 'error';
        exit;
    }
    $stmt = $conn->prepare("SELECT * FROM orang_hilang where id_hilang = ?");
    $stmt->execute([$id_hilang]);
    if($stmt->rowCount() <= 0){
        echo 'error';
        exit;
    }
    $stmt = $conn->prepare("UPDATE orang_hilang set status =? where id_hilang=?");
    $berhasil = $stmt->execute([$status,$id_hilang]);
    if($berhasil){
        echo 'success';
    }else{
        echo 'gagal';
    }
}
?>