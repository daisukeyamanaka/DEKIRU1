<?php
include('functions.php');
$pdo = connect_to_db();

$sql = 'SELECT * FROM todo_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "
          <tr>
            <td>{$record["deadline"]}</td>
            <td>{$record["todo"]}</td>
            <td>
              <a href='Answer.php?id={$record["id"]}'>edit</a>
            </td>

          </tr>
        ";
      }
}
?>

<!DOCTYPE html>
<head>
</head>

<body>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <table>
      <thead>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
          
      </tbody>
    </table>
  </fieldset>
</body>

</html>