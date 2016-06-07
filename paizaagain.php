<?php
	// 自分の得意な言語で
	// Let's チャレンジ！！
	$input = trim(fgets(STDIN));
	$param = explode(" ", $input);
	$data = $param[0]; // 4
	$num = $param[1]; // 10
	$top = $param[2]; // 3
	$value = trim(fgets(STDIN)); // パラメータ
	$value2 = explode(" ", $value);
	for($num; $num>0; $num--){
		$input = trim(fgets(STDIN));
		$user = explode(" ", $input);
		for($i=0; $i<$data; $i++){
			$result[] = $user[$i] * $value2[$i];
		}
		$resultsum[] = round(array_sum($result));
		unset($result);
	}
	// var_dump($resultsum);
	rsort($resultsum);
	// var_dump($resultsum)
	for($i=0; $i<$top; $i++){
		echo $resultsum[$i] . "\n";
	}
?>
