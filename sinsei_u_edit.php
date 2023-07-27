<?php
include("functions.php");
session_start();
check_session_id();

$name = $_SESSION['name']; 

$pdo = connect_to_db();

$sql = 'SELECT * FROM basic_data1 WHERE name=:name';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>申請フォーム編集画面</title>
</head>
<body>
<form action="sinsei_u_update.php" method="POST">
    <fieldset>
      <h1>申請フォーム編集画面</h1>
      <a href="sinsei_u_read.php">入力確認画面</a>
      <a href="sinsei_logout.php">ログアウト</a>
      <div>
        名前: <input type="text" name="name" value="<?= $record["name"] ?>">
      </div>
      <div>
        電話番号: <input type="text" name="tel" value="<?= $record["tel"] ?>">
      </div>
      <div>
        性別: <input name="sex" value="<?= $record["sex"] ?>">
      </div>
      <div>
        年齢: <input type="number" name="age" value="<?= $record["age"] ?>">
      </div>
      <div>
        郵便番号: <input type="number" name="postn" value="<?= $record["postn"] ?>">
      </div>
      <div>
        住所:<input type="text" name="address" value="<?= $record["address"] ?>">
      </div>
      <div>
        銀行名: <input type="text" name="bank" value="<?= $record["bank"] ?>">
      </div>
      <div>
        <button>登録</button>
      </div>
      <input type="hidden" name="id" value="<?= $record["id"] ?>">
    </fieldset>
  </form>
  <script>
  </script>

</body>
</html>
