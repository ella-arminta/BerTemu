<?php
    include "connection.php";
    include "uploadItem.php";

    // utk tambah barang
    if(isset($_POST['nama']) && isset($_POST['lokasi']) && isset($_POST['kodeBarang']) && isset($_POST['keterangan'])){
        $sql = 'INSERT INTO item (id,nama_barang,deskripsi,status,location)
                VALUES (:id,:nama,:deskripsi,1,:location)';
        $stmt= $conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $_POST['kodeBarang'],
            ':nama' => $_POST['nama'],
            ':deskripsi' => $_POST['keterangan'],
            ':location' => $_POST['lokasi']
        ));
        if(isset($_FILES["submitFotoKTP"])){
            $sql2 = "UPDATE `item` SET `image` = :image
                        WHERE `id` = :id";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute(array(
                ':image' => $target_file1,
                ':id' => $_POST['kodeBarang']
            ));
        }
        header("Location: sign-up-user.php");
    }
?>