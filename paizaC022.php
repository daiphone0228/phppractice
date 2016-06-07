<?php
	// 自分の得意な言語で
	// Let's チャレンジ！！
	$input = trim(fgets(STDIN));
	for($i=0; $i<$input; $i++){
		$data = trim(fgets(STDIN));
		$kabu = explode(" ", $data);
	// 	var_dump($kabu);
		$st[] = $kabu[0];
		$fin[] = $kabu[1];
		$high[] = $kabu[2];
		$low[] = $kabu[3];
	}
	// $result = array();
	$result[] = $st[0];
	$result[] = $fin[$input-1];
	$result[] = max($high);
	$result[] = min($low);
	// var_dump($result);
	$result2 = implode(" ", $result);
	echo $result2;
 ?>
