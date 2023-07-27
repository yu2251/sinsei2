<?php
include("functions.php");
session_start();
check_session_id();

$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table ORDER BY id ASC';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["name"]}</td>
      <td>{$record["tel"]}</td>
      <td>{$record["sex"]}</td>
      <td>{$record["age"]}</td>
      <td>{$record["postn"]}</td>
      <td>{$record["address"]}</td>
      <td>{$record["bank"]}銀行</td>
      <td>{$record["updated_at"]}</td>";
      if($_SESSION['is_admin'] === 1){
        $output .= "<td><a href='sinsei_edit.php?id={$record["id"]}'>edit</a></td>
      <td><a href='sinsei_delete.php?id={$record["id"]}'>delete</a></td>";
}
$output .= "
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認画面</title>
</head>
<body>
<fieldset>
  <h1>【管理者画面】<?= $_SESSION['name'] ?>さん</h1>
    <a href="sinsei_input.php">入力画面</a>
    <a href="sinsei_logout.php">ログアウト</a>
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>tel</th>
          <th>sex</th>
          <th>age</th>
          <th>postn</th>
          <th>address</th>
          <th>bank</th>
          <th>updated_at</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>
</html>