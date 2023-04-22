<?php
include '../connect.php';

$stmt = $conn->prepare("SELECT * FROM `regencies`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($row as $result): ?>
    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
<?php endforeach; ?>