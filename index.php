<?php
// これはPHPの配列
$hoge_array = ['PHP', 'JS', 'Rust', 'COBOL'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<script language="JavaScript">
		function foc() { //テキストエリア内が初期文字列の場合　クリア
			if (document.form1.text1.value == document.form1.text1.defaultValue) {
				document.form1.text1.value = "";
			}
		}
	</script>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="sample.css" />
	<form action="create.php" method="POST">
		<img src="./image/back.jpeg" width = 300px;>
		<div>
			<label for="problem">カテゴリー: </label>
			<select class="form-control" name="deadline">
            <option value="農業系">農業系</option>
            <option value="家電系">家電系</option>
            <option value="教育系">教育系</option>
            <option value="etc">etc</option>
          </select>
		</div>

		<div>
			<textarea type="text" name="todo" id="" cols="30" rows="10" maxlength="128" onclick="this.value=''; return false">悩み事: </textarea>
		</div>
		<div>
			<button>submit</button>
		</div>
	</form>
</head>

</html>