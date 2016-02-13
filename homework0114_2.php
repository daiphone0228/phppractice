<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>1/14 Answer</title>
	</head>
	<body>
	<?php
		$nickname = $_POST['nickname'];
		$nickname = htmlspecialchars($nickname);

		if($nickname=='')
			{
				echo 'ニックネームが入力されていません。<br />';
				echo '<form>';
				echo '<br />';
				echo '<input type="button" onclick="history.back()" value="戻る">';
				echo '</form>';
			}
			else
			{
				echo 'Hello!!';
				echo $nickname;
				echo '<br />';
			}


	?>

			
	</body>
</html>