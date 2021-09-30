<?php
// データの受け取り
if (
    !isset($_POST['todo']) || $_POST['todo']=='' ||
    !isset($_POST['deadline']) || $_POST['deadline']==''
  ) {
    exit('ParamError');
  }

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

// 各種項目設定
$dbn ='mysql:dbname=gsacfs_d03_11;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO todo_table ( todo, deadline, created_at, updated_at) VALUES (:todo, :deadline, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

// SQL実行（実行に失敗すると$statusにfalseが返ってくる）
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
  } else {
    header('Location:read.php');
  }
  