<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>

	<?php

	//変数

	$hello = 'Hello,World!';

	echo $hello;

	$hello = 'Hello,Cebu!';

	echo $hello;

	echo '<br />';

	$number = 15;

	$boolean = true;

	var_dump($hello);
	var_dump($number);
	var_dump($boolean);

	echo '<br />';

	$return = hantei(100);

	var_dump($return);

	//関数
	function hantei($no){

		if ($no > 10){
			echo '10より大きい数字です';
			return 1;
		}else{
			echo '10以下の数字です';
			return 2;
		}

	}
	
	echo '<br />';
	echo '<br />';

	// 関数を使って、入力された文字の頭に常にHello!がつく文字を表示しましょう

	hello('new!');

	function hello($moji){
			echo 'Hello!'.$moji;
	}

	//関数を使って、入力された文字の頭には、「おはよう」、
	//末尾には「君」がつく文字を表示しましょう
	//配列についての予習もしてくる

	echo '<br />';
	echo '<br />';
	
	ohayo('大');

	function ohayo($name){
		echo 'おはよう';
		echo $name;
		echo '君';
		echo '<br />';
		echo 'おはよう'. $name . '君';
	}
	echo '<br />';
	ohayo('だい');




	?>
			
	</body>
</html>
