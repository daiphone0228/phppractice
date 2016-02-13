<?php 
echo '宮原大';
echo '<br>';
echo '今日は'.date('G時 i分 s秒').'です<br>';


// for ($i=2; $i=<100; $i+2){
// 	echo '<option value='.$i.'歳</option>';
// }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>行色変更</title>
</head>
<body>
	<table>
		<?php 
		for($i=1; $i<=10; $i++){
			if ($i % 2) {
				echo '<tr style="background-color: #bce0f2">';
			} else {
				echo '<tr>';
			}
			echo '<td>'.$i.'</td>';
			echo '<td>'.$i.'行目の情報です</td>';
			echo '</tr>';
		} ?>
	</table>
	<form action="" method="get">
		<table>
			<tr><input id="num" type="checkbox" name="number[]" value="one"/>1</tr>
			<tr><input id="num" type="checkbox" name="number[]" value="two"/>2</tr>
			<tr><input id="num" type="checkbox" name="number[]" value="three"/>3</tr>
			<tr><input id="num" type="checkbox" name="number[]" value="four"/>4</tr>
			<tr><input id="num" type="checkbox" name="number[]" value="five"/>5</tr>
		</table>
	<input type="submit" value="数値送信"/>
	</form>
		<table>
		<select name="month" id="month">
			<?php for($month=1;$month<=12;$month++){
				echo '<option value="'.$month.'">'.$month.'月</option>';
			} ?>
		</select>
		</table>
	<form action="" method="post">
		<table>
			<input id="gender_male" type="radio" name="gender" value="male"/>男性
			<input id="gender_female" type="radio" name="gender" value="female"/>女性
			<input id="gender_gay" type="radio" name="gender" value="gay"/>ゲイ
			<input id="gender_by" type="radio" name="gender" value="by"/>バイ
		</table>
	<input type="submit" value="送信する"/>
	</form>

	
</body>
</html>

<?php 

if(isset($_POST['gender']) && !empty($_POST['gender'])){
	echo 'Your gender is '.htmlspecialchars($_POST['gender'],ENT_QUOTES).'.<br><br>';
	}

if(isset($_GET['number']) && !empty($_GET['number'])){
	foreach($_GET['number'] as $number){
	echo 'You selected the number of '.htmlspecialchars($number, ENT_QUOTES).'.<br>';
	}
}

?>