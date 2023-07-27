<?php
// var_dump($_POST);
// session_start();
include('functions.php');


if (
  !isset($_POST['user_name']) || $_POST['user_name'] === '' ||
  !isset($_POST['password']) || $_POST['password'] === '' ||
  !isset($_POST['user_mail']) || $_POST['user_mail'] === '' ||
  !isset($_POST['user_birthday']) || $_POST['user_birthday'] === ''
) {
  echo '<p>必要事項が入力されていません</p>';
  echo '<a href="sinsei_register.php">新規登録</a>';
  exit('paramError');
}

$user_name = $_POST["user_name"];
$password = $_POST["password"];
$user_mail = $_POST["user_mail"];
$user_birthday = $_POST["user_birthday"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM users_table WHERE user_name=:user_name';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo '<p>すでに登録されているユーザです．</p>';
  echo '<a href="sinsei_login.php">login</a>';
  exit();
}

$sql = 'INSERT INTO users_table(id, user_name, password, user_mail, user_birthday, is_admin, created_at_, updated_at, deleted_at) VALUES(NULL, :user_name, :password, :user_mail, :user_birthday, 0, now(), now(), NULL)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':user_mail', $user_mail, PDO::PARAM_STR);
$stmt->bindValue(':user_birthday', $user_birthday, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
  // var_dump($status);
  // exit();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}
// if
if($status){
$_SESSION = array();
$_SESSION['session_id'] = session_id();
$_SESSION['user_name'] =  $user_name;
header("Location:zibai_application_input.php");
exit();
}
