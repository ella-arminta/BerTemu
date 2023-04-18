<?php
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filter = null;
    $nama_hilang = null;
    // cek filter
    if(isset($_SESSION['filter'])){
        $filter = $_SESSION['filter'];
    }
    $query = 'SELECT * FROM orang_hilang';
    $where = false;
    $and = false;
    $hasilFilter = [];
    // filter
    if(!empty($filter)){
        if(!empty($filter['kota']) && $filter['kota'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            $query .= ' id_kota = ?';
            $and = true;
            array_push($hasilFilter,$filter['kota']);
        }
        if(!empty($filter['kelamin']) && $filter['kelamin'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' jenis_kelamin = ?';
            $and = true;
            array_push($hasilFilter,$filter['kelamin']);
        }
        if(!empty($filter['min_umur']) && $filter['min_umur'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' umur_hilang >= ?';
            $and = true;
            array_push($hasilFilter,$filter['min_umur']);
        }
        if(!empty($filter['max_umur']) && $filter['max_umur'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' umur_hilang <= ?';
            $and = true;
            array_push($hasilFilter,$filter['max_umur']);
        }
        if(!empty($filter['max_tinggi']) && $filter['max_tinggi'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' tinggi <= ?';
            $and = true;
            array_push($hasilFilter,$filter['max_tinggi']);
        }
        if(!empty($filter['min_tinggi']) && $filter['min_tinggi'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' tinggi >= ?';
            $and = true;
            array_push($hasilFilter,$filter['min_tinggi']);
        }
        if(!empty($filter['max_tgl']) && $filter['max_tgl'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' tanggal_hilang <= ?';
            $and = true;
            $max_tgl = new DateTime();
            $max_tgl = DateTime::createFromFormat('Y-m-d', $filter['max_tgl']);
            array_push($hasilFilter,$max_tgl);
        }
        if(!empty($filter['min_tgl']) && $filter['min_tgl'] != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' tanggal_hilang >= ?';
            $and = true;
            $min_tgl = new DateTime();
            $min_tgl = DateTime::createFromFormat('Y-m-d', $filter['min_tgl']);
            array_push($hasilFilter,$min_tgl);
        }
    }
    
    if(isset($_POST['nama_hilang'])){
        $nama_hilang = $_POST['nama_hilang'];
        if(!empty($nama_hilang) || $nama_hilang != ''){
            if(!$where){
                $query .= ' WHERE';
                $where = true;
            }
            if($and){
                $query .= ' AND';
            }
            $query .= ' nama_lengkap like ?';
            $and = true;
            array_push($hasilFilter,'%'.$nama_hilang.'%');
        }
    }
    $stmt = $conn->prepare($query);
    $stmt->execute($hasilFilter);
    $rows = $stmt->fetchAll();
    echo json_encode($rows);
}
?>