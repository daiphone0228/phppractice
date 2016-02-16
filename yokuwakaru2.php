<?php 
if(isset($_COOKIES['my_id'])) {
	$myId = $_COOKIES['my_id'];
} else {
	$myId = '';
}

if (isset($_COOKIES['my_id'])){
$myId = $_POST['my_id'];
$password = $_POST['password'];
$save = $_POST['save'];
}

// cookieに保存
if (isset($_POST['save']) && $save == 'on') {
	setcookie('my_id', $myId, time() + 60 * 60 * 24 * 14);
	$message = 'ログイン情報を記録しました';
} else {
	setcookie('my_id', '');
	$message = '記録しませんでした';
}
 ?>

<!DOCTYPE html>
 <html lang="ja">
 <head>
 	<title>勉強用でござんす</title>
 </head>
 <body>
 <form action="" method="post">
 	<dl>
 		<dt>ID</dt>
 		<dd><input type="text" name="my_id" id="my_id" value="<?php echo $myId; ?>" /></dd>
 		<dt>パスワード</dt>
 		<dd><input type="password" name="password" id="password" /></dd>
 		<dt>IDの保存</dt>
 	</dl>
 	<p><input type="checkbox" name="save" id="save" value="on"/><label for="save">IDを保存する</label></p>
 	<input type="submit" value="送信する" />
 </form>
 <p><?php echo $message; ?></p>
 <p><a href="yokuwakaru.php">戻る</a></p>
 </body>
 </html>