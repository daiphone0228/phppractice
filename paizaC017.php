<?php
	// 自分の得意な言語で
	// Let's チャレンジ！！
	$input = trim(fgets(STDIN));
	$boss = explode(" ", $input); // 7 2
	$cardNum = trim(fgets(STDIN)); // 8
	for($i=0; $i<$cardNum; $i++){
		$input = trim(fgets(STDIN));
		$card = explode(" ", $input);
		// var_dump($card);
		if($card[0] < $boss[0]){
			echo "High" . "\n";
		} else if($card[0] > $boss[0]){
			echo "Low" . "\n";
		} else if($card[0] == $boss[0]){
			if($card[1] < $boss[1]){
				echo "Low" . "\n";
			} else if($card[1] > $boss[1]){
				echo "High" . "\n";
			} else{
				false;
			}
		} else {
			false;
		}
	}
?>
