<?php
include("functions.php");
session_start();
check_session_id();

$user_id = $_GET['user_id'];
$higaisya_compensation = $_POST['higaisya_compensation'];
$higaisya_sibou = $_POST['higaisya_sibou'];
$higaisya_treatment_cost = $_POST['higaisya_treatment_cost'];
$higaisya_kouisyougai = $_POST['higaisya_kouisyougai'];
$kagaisya_compensation = $_POST['kagaisya_compensation'];
$kagaisya_sibou = $_POST['kagaisya_sibou'];

$pdo = connect_to_db();

$sql = 'INSERT INTO zibai_application_table (user_id, higaisya_compensation, higaisya_sibou,higaisya_treatment_cost,kagaisya_compensation,kagaisya_sibou) VALUES (:user_id, :higaisya_compensation, :higaisya_sibou,:higaisya_treatment_cost,:kagaisya_compensation,:kagaisya_sibou)';

// if (
//   !isset($_POST['user_id']) || $_POST['user_id'] === '' ||
//   !isset($_POST['higaisya_compensation']) || $_POST['higaisya_compensation'] === ''||
//   !isset($_POST['higaisya_sibou']) || $_POST['higaisya_sibou'] === '' ||
//   !isset($_POST['higaisya_treatment_cost']) || $_POST['higaisya_treatment_cost'] === '' ||
//   !isset($_POST['higaisya_kouisyougai']) || $_POST['higaisya_kouisyougai'] === '' ||
//   !isset($_POST['kagaisya_compensation']) || $_POST['kagaisya_compensation'] === '' ||
//   !isset($_POST['kagaisya_sibou']) || $_POST['kagaisya_sibou'] === ''
// ) {
//   echo json_encode(["error_msg" => "no input"]);
//   exit();
// }

// $user_id = $_POST['user_id'];
// $higaisya_compensation = $_POST['higaisya_compensation'];
// $higaisya_sibou = $_POST['higaisya_sibou'];
// $higaisya_treatment_cost = $_POST['higaisya_treatment_cost'];
// $higaisya_kouisyougai = $_POST['higaisya_kouisyougai'];
// $kagaisya_compensation = $_POST['kagaisya_compensation'];
// $kagaisya_sibou = $_POST['kagaisya_sibou'];

// $pdo = connect_to_db();

// $sql = 'INSERT INTO zibai_application_table(user_id, higaisya_compensation, higaisya_sibou, higaisya_treatment_cost, higaisya_kouisyougai, kagaisya_compensation, kagaisya_sibou) VALUES (:user_id, :higaisya_compensation, :higaisya_sibou, :higaisya_treatment_cost, :higaisya_kouisyougai, :kagaisya_compensation, :kagaisya_sibou)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':higaisya_compensation', $higaisya_compensation, PDO::PARAM_STR);
$stmt->bindValue(':higaisya_sibou', $higaisya_sibou, PDO::PARAM_STR);
$stmt->bindValue(':higaisya_treatment_cost', $higaisya_treatment_cost, PDO::PARAM_INT);
$stmt->bindValue(':higaisya_kouisyougai', $higaisya_kouisyougai, PDO::PARAM_STR);
$stmt->bindValue(':kagaisya_compensation', $kagaisya_compensation, PDO::PARAM_STR);
$stmt->bindValue(':kagaisya_sibou', $kagaisya_sibou, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:sinsei_u_read.php");
exit();
