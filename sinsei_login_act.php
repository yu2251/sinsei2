<?php
// var_dump($_POST);
session_start();
include('functions.php');

// データ受け取り
$user_name = $_POST['user_name'];
$password = $_POST['password'];

// DBに接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM users_table WHERE user_name=:user_name AND password=:password AND deleted_at IS NULL';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザが存在する場合の処理


if (!$user) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=sinsei_login.php>ログイン</a>";
  exit();
}else {
  $_SESSION = array();
  $_SESSION['id'] = $user['id'];
  $_SESSION['session_id'] = session_id();
  // $_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['user_name'] = $user['user_name'];
  $_SESSION['user_mail'] = $user['user_mail'];
  header("Location:zibai_application_input.php");
  exit();
}

