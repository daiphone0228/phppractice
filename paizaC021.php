<?php
	// 自分の得意な言語で
	// Let's チャレンジ！！
	$input = trim(fgets(STDIN));
	$taihu = explode(" ", $input);
	$minR = $taihu[2] ** 2;
	$maxR = $taihu[3] ** 2;
	// var_dump($minR);
	// var_dump($maxR);
	$xc = $taihu[0];
	$yc = $taihu[1];
	$pp = trim(fgets(STDIN));
	for($i=0; $i<$pp; $i++){
		$input = trim(fgets(STDIN));
		$position = explode(" ", $input);
		$x = $position[0];
		$y = $position[1];
		$result = ($x-$xc) ** 2 + ($y-$yc) ** 2;
		// var_dump($result);
		if($result >= $minR && $result <= $maxR){
			echo "yes" . "\n";
		} else {
			echo "no" . "\n";
		}

	}

?>
