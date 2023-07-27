<?php
include("functions.php");
session_start();
check_session_id();

if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['tel']) || $_POST['tel'] === ''||
    !isset($_POST['sex']) || $_POST['sex'] === '' ||
    !isset($_POST['age']) || $_POST['age'] === '' ||
    !isset($_POST['postn']) || $_POST['postn'] === '' ||
    !isset($_POST['address']) || $_POST['address'] === '' ||
    !isset($_POST['bank']) || $_POST['bank'] === ''
) {
  exit('paramError');
}

$name = $_POST['name'];
$tel = $_POST['tel'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$postn = $_POST['postn'];
$address = $_POST['address'];
$bank = $_POST['bank'];
$id = $_POST['id']; // idを取得する

$pdo = connect_to_db();


$sql = "UPDATE basic_data1 SET name=:name, tel=:tel, sex=:sex, age=:age, postn=:postn, address=:address, bank=:bank, updated_at=now() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':postn', $postn, PDO::PARAM_INT);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':bank', $bank, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:sinsei_read.php");
exit();
