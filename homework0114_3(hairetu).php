<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>
	

	<?php
		//入力枠1つ、ボタン一つ、値を入力してボタンを押したら、新規ページに「Hello!!（値）」と表示される

		//別紙にて回答済み　→　homework0114.php		
			echo '<br />';

			//カウントダウン100→1
			echo '<div style="float:left;">';
			for ($i=100; $i > 0; $i--) { 
				echo $i;
				echo '<br />';
			}

			echo '</div>';

			echo '</div>';
			echo '<div style="float:left;">';
			echo "　　";
			echo '</div>';

			

			//3の倍数で表示される
			echo '<div style="float:left;">';
			for ($a=1; $a < 100; $a++) { 
				echo $a*3;
				echo '<br />';
			}
			
			echo '</div>';
			echo '<div style="float:left;">';
			echo "　　";
			echo '</div>';
			
			
			//fizzbuzz問題、3の倍数の時に「fizz」、5の倍数の時に「buzz」、3と5の倍数の時に「FizzBuzz」と表示される	
			echo '<div style="float:left;">';
			for ($a=1; $a < 100; $a++) { 
				if ($a%15==0) {
					echo 'FizzBuzz';
					echo '<br />';
				}elseif ($a%5==0){
					echo 'Buzz';
					echo '<br />';
				}elseif ($a%3==0){
					echo 'Fizz';
					echo '<br />';
				}
				else{
					echo $a;
					echo '<br />';

				}
			}

			echo '</div>';

			echo '</div>';
			echo '<div style="float:left;">';
			echo "　　";
			echo '</div>';

		
			echo '<div style="float:left;">';
			$a = 1;
			for ($a=1; $a < 100; $a++)
				switch ($a) {
						case $a%15==0:
							echo 'FizzBuzz<br />';
							break;
						case $a%3==0:
							echo 'Fizz<br />';
							break;
						case $a%5==0:
							echo 'Buzz<br />';
							break;
						default:
							//caseが指定されていない時の処理
							echo $a.'<br />';
							break;
				}
			echo '</div>';
	



	?>

			
	</body>
</html>
