<?php
session_start();
include("functions.php");
// check_session_id();

// $user['user_id']=  $_SESSION['id'];
// $user_id = $_POST['user_id'];
// $user_id = $_POST['id'];
$user_id = $_SESSION['id'];
$higaisya_compensation = isset($_POST['higaisya_compensation']) ? $_POST['higaisya_compensation'] : 0;
$higaisya_treatment_cost = isset($_POST['higaisya_treatment_cost']) ? $_POST['higaisya_treatment_cost'] : 0;
$higaisya_kouisyougai = isset($_POST['higaisya_kouisyougai']) ? $_POST['higaisya_kouisyougai'] : 0;
$higaisya_sibou = isset($_POST['higaisya_sibou']) ? $_POST['higaisya_sibou'] : 0;
$kagaisya_compensation = isset($_POST['kagaisya_compensation']) ? $_POST['kagaisya_compensation'] : 0;
$kagaisya_sibou = isset($_POST['kagaisya_sibou']) ? $_POST['kagaisya_sibou'] : 0;


$pdo = connect_to_db();

$sql = 'INSERT INTO zibai_application_table (user_id, higaisya_compensation, 
higaisya_sibou,higaisya_treatment_cost,higaisya_kouisyougai,kagaisya_compensation,kagaisya_sibou) 
VALUES (:user_id, :higaisya_compensation, :higaisya_sibou,:higaisya_treatment_cost,:higaisya_kouisyougai,
:kagaisya_compensation,:kagaisya_sibou)';

$stmt = $pdo->prepare($sql);
try {
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':higaisya_compensation', $higaisya_compensation, PDO::PARAM_INT);
$stmt->bindValue(':higaisya_sibou', $higaisya_sibou, PDO::PARAM_INT);
$stmt->bindValue(':higaisya_treatment_cost', $higaisya_treatment_cost, PDO::PARAM_INT);
$stmt->bindValue(':higaisya_kouisyougai', $higaisya_kouisyougai, PDO::PARAM_INT);
$stmt->bindValue(':kagaisya_compensation', $kagaisya_compensation, PDO::PARAM_INT);
$stmt->bindValue(':kagaisya_sibou', $kagaisya_sibou, PDO::PARAM_INT);
$stmt->execute();
// 他のチェックボックス情報も同様に挿入

// 成功時の処理
echo 'データの登録に成功しました。';
} catch (PDOException $e) {
// エラー時の処理
exit('データの登録に失敗しました。'.$e->getMessage());
}

  $_SESSION = array();
  $_SESSION['id'] = $user['id'];
  $_SESSION['session_id'] = session_id();
  $_SESSION['user_name'] =  $user_name;
header("Location: treatment_input.php");
exit();

