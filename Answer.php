<?php
include("functions.php");

$id = $_GET['id'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM todo_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<form action="completion.php" method="POST">
<script language="JavaScript">
    
    function foc() {    //テキストエリア内が初期文字列の場合　クリア
        if(document.form1.text1.value == document.form1.text1.defaultValue) {
            document.form1.text1.value = "";
        }
    }
    </script>
	<meta charset="UTF-8" />
	<link
      rel="stylesheet"
      href="sample.css"
    />
  <fieldset>
    <legend>回答画面</legend>
    <a href="read.php">一覧画面</a>
    <div>
    カテゴリー: <input type="text" name="deadline" value="<?= $record['deadline'] ?>">
    </div>
    <div>
    悩み事: 
    <textarea type="text" name="todo" id="" cols="30" rows="10" maxlength="128" onclick="this.value=''; return false"><?= $record['todo'] ?> </textarea>
    </div>
    <div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <textarea type="text" name="Ans" id="" cols="30" rows="10" maxlength="128" onclick="this.value=''; return false">回答： </textarea>
    </div>
    <div>
      <button>submit</button>
    </div>
  </fieldset>
</form>