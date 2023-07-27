<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['id'];
// var_dump();
// $user['id'] =$_SESSION['id'];
// $user['user_name']= $_SESSION['user_name']; // ログインユーザの名前

if (
    !isset($_POST['user_name']) || $_POST['user_name'] === '' ||
    !isset($_POST['user_name_kana']) || $_POST['user_name_kana'] === ''||
    !isset($_POST['user_birthday']) || $_POST['user_birthday'] === '' ||
    !isset($_POST['user_gender']) || $_POST['user_gender'] === '' ||
    !isset($_POST['user_postcode']) || $_POST['user_postcode'] === '' ||
    !isset($_POST['user_address']) || $_POST['user_address'] === '' ||
    !isset($_POST['user_phonenumber']) || $_POST['user_phonenumber'] === '' ||
    !isset($_POST['user_mail']) || $_POST['user_mail'] === ''
) {
  exit('paramError');
}

$user_name = $_POST['user_name'];
$user_name_kana = $_POST['user_name_kana'];
$user_birthday = $_POST['user_birthday'];
$user_gender = $_POST['user_gender'];
$user_postcode= $_POST['user_postcode'];
$user_address = $_POST['user_address'];
$user_phonenumber = $_POST['user_phonenumber'];
$user_mail = $_POST['user_mail']; // idを取得する

$pdo = connect_to_db();


$sql = "UPDATE users_table SET id=:id, user_name=:user_name, user_name_kana=:user_name_kana,
 user_birthday=:user_birthday, user_gender=:user_gender, user_postcode=:user_postcode,
 user_address=:user_address,user_phonenumber=:user_phonenumber,user_mail=:user_mail, 
updated_at=now() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':user_name_kana', $user_name_kana, PDO::PARAM_STR);
$stmt->bindValue(':user_birthday', $user_birthday, PDO::PARAM_STR);
$stmt->bindValue(':user_gender', $user_gender, PDO::PARAM_STR);
$stmt->bindValue(':user_postcode', $user_postcode, PDO::PARAM_STR);
$stmt->bindValue(':user_address', $user_address, PDO::PARAM_STR);
$stmt->bindValue(':user_phonenumber', $user_phonenumber, PDO::PARAM_STR);
$stmt->bindValue(':user_mail', $user_mail, PDO::PARAM_STR);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);

if (!$status) {
  print_r($stmt->errorInfo()); // エラーメッセージを表示
  exit('データの更新に失敗しました。');
}else{
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
$_SESSION = array();
$_SESSION['id'] = $user['id'];
$_SESSION['user_name'] = $user['user_name'];
header("Location: zibai_application_input.php");
exit();
}
