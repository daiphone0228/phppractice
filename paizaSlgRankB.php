<?php
	// 自分の得意な言語で
	// Let's チャレンジ！！
	$input = trim(fgets(STDIN)); // 10 10 10 2
	$zumen = explode(" ", $input);
	// var_dump($zumen);
	$x = $zumen[0]; // 10
	$y = $zumen[1]; // 10
	$z = $zumen[2]; // 10
	$num = $zumen[3]; // 2
	for($i=0; $i<$num; $i++){
		$input = trim(fgets(STDIN)); // 0 3, 0 8
		$cut = explode(" ", $input);
		$vector = $cut[0];
		$length = $cut[1];
		// var_dump($cut);
		if ($vector == 0){
			$result[] = $y * $z * $length;
			print_r($result);
		} else {
			echo 1;
		}
	}
	
?>