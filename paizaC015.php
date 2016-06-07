<?php
	// 日付を分解した時に、数字を一桁ずつ確認しながらポイントを入れていくと
	// 通常より多くポイントがつくため、先に日付における倍率を決めておく
	$input = trim(fgets(STDIN));
	for($i=0; $i<$input; $i++){
		$data = trim(fgets(STDIN));
		$recipt = explode(" ", $data);
		$date = str_split($recipt[0]);
		$money = $recipt[1];
		foreach($date as $num){
			if($num == 3){
				$result = 3;
				break;
			} else if($num == 5){
				$result = 5;
				break;
			} else {
				$result = 1;
			}
		}
		if($result == 3){
			$point[] = floor($money * 0.03);
		} else if($result == 5){
			$point[] = floor($money * 0.05);
		} else {
			$point[] = floor($money * 0.01);
		}
	}
	echo array_sum($point);
?>

<?php
	// 日付を分解した時に、数字を一桁ずつ確認しながらポイントを入れていくと
	// 通常より多くポイントがつくため、先に日付における倍率を決めておく
	// 別解:ポイント還元率を変数に代入して、コードを短くする
	$input = trim(fgets(STDIN));
	for($i=0; $i<$input; $i++){
		$data = trim(fgets(STDIN));
		$recipt = explode(" ", $data);
		$date = str_split($recipt[0]);
		$money = $recipt[1];
		foreach($date as $num){
			if($num == 3){
				$result = 3;
				break;
			} else if($num == 5){
				$result = 5;
				break;
			} else {
				$result = 1;
			}
		}
		if($result == 3){
			$rate = 0.03;
		} else if($result == 5){
			$rate = 0.05;
		} else {
			$rate = 0.01;
		}
		$point[] = floor($money * $rate);

	}
	echo array_sum($point);
?>

