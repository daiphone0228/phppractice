<?php
	// ヒント①：配列に配列を代入し、多次元配列を作成。
	// ヒント②：その配列を1つずつforeach文で取り出す。
	// ヒント③：取り出した配列をさらにforeach文で取り出す。（この際、値のみではなく、keyも同時に取りだす。）
	// ヒント④：可変変数を使用するとスマートな式になる。 ex) ${"name".$i}
	// →こうすると、for文などで回した際、動的に$iの値が変化する。$hour0, $hour1, $hour2...
	$carry = trim(fgets(STDIN)); // 50
	$deliv = trim(fgets(STDIN)); // 5
	for($i=0; $i<$deliv; $i++){
		$input = trim(fgets(STDIN));
		$data = explode(" ", $input);
		$hour[] = array("$data[0]" => "$data[2]");
	}
	// var_dump($hour); // (3 70),(3 170),(3 90),(4 55),(4 40)
	foreach($hour as $h){
		// var_dump($h);
		foreach($h as $key => $value){
			for($i=0; $i<24; $i++){
				if($key == $i){
					${"hour".$i}[] = $value;
				}
			}
		}
	}
	// var_dump($hour3);
	// var_dump($hour4);
	for($i=0; $i<24; $i++){
		if(isset(${"hour".$i}) && !empty(${"hour".$i})){
			// 1時間毎の合計枚数をだし、一度に運べる枚数で除算し、切り上げる ※この場合、(7 2)
			$oneTime = ceil(array_sum(${"hour".$i}) / $carry);
			// var_dump($oneTime);
			$result[] = $oneTime;
		}
	}

	echo array_sum($result);

?>
