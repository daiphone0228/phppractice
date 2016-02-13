<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>

	<?php
		//配列(同じ種類のデータを使用するとき)
		$fruits = array('mango','banana','orange','watermelon','ranbutan');

		echo $fruits[0];
		echo '<br />';
		echo $fruits[1];
		echo '<br />';
		echo $fruits[2];
		echo '<br />';
		echo $fruits[3];
		echo '<br />';


		//制御文(繰り返し)
		//for文
		//for (初期値; 繰り返し条件; 増加率 1増える)

		for ($i=0; $i < 10; $i++) { 
			echo $i;
			echo 'Hello!<br />';
		}

		//for文を使ってフルーツの名前を全部取り出そう

		for ($i=0; $i < count($fruits); $i++) { 
			//$countdown = count($fruits) - $i -1;
			echo $fruits[$i].'<br />';
		}

		//連想配列(異なる種類のデータを使用するとき)
		$seedkun_R = array('name' => 'seedkun',
							'address' => 'cebu',
							'gender' => 'male',
							'age' => 3,
							'language' => 'English');

		echo '<br />'.$seedkun_R['name'];
		echo '<br />';
		echo $seedkun_R['address'];
		echo '<br />';
		echo $seedkun_R['gender'];
		echo '<br />';
		echo $seedkun_R['age'];
		echo '<br />';
		echo '<br />';

		//foreach(配列専用繰り返し文)
		foreach ($seedkun_R as $key => $value) {
			echo $key.":".$value.'<br />';

			switch ($key) {
				case 'name':
					echo 'こんにちは<br />';
					break;
				case 'address':
					echo 'に住んでます<br />';
					break;
				case 'gender':
					echo 'です<br />';
						break;
				case 'age':
					echo '歳です。<br />';
					break;
				default:
					//caseが指定されていない時の処理
					echo 'ですね<br />';
					break;
			}
		}

		//foreachに配列を指定した時（連想配列ではない）
		foreach ($fruits as $value) {
			echo $value.'<br />';
		}

		//入力枠1つ、ボタン一つ、値を入力してボタンを押したら、新規ページに「Hello!!（値）」と表示される

		//別紙にて回答済み　→　homework0114.php		
		echo '<br />';

		//カウントダウン100→1
		for ($i=100; $i > 0; $i--) { 
			echo $i;
			echo '<br />';
		}
		

		//3の倍数で表示される
		

		//fizzbuzz問題、3の倍数の時に「fizz」、5の倍数の時に「buzz」と表示れる	





	?>
			
	</body>
</html>
