<?php
	// 16桁の数値が与えられる
	// その偶数桁をそれぞれ2倍にした値の和（もし値が二桁になったら1の位と10の位を足す）と
	// 奇数桁の和が必ず10で割り切れる値が入力されてくる
	// それを踏まえて右端の1桁目の値が不明となっているためその値（X）を求める

	// 数値の行数取得
	$num = trim(fgets(STDIN));
	// 行数分繰り返す
	for($i=0; $i<$num; $i++){
		// 数値取得
		$data = trim(fgets(STDIN));
		// 数値を1桁ずつ分けて配列に入れる
		$array = str_split($data);
		// var_dump($array);
		// 配列のキーと値をforeach文で取り出す
		foreach($array as $key => $value){
			// $keyは0から始まるので、0もしくは偶数(2で割り切れる)の場合、$valueの2倍の値をを$even配列に代入
			// この時、2倍した値が二桁になった場合、1の位と10の位を分割して、その和を$even配列に代入するようにする
			if($key == 0 || $key % 2 == 0){
				$value2 = $value * 2;
				// 偶数桁の2倍の値が二桁の場合の処理
				if(strlen($value2) == 2){
					$array2 = str_split($value2);
					$even[] = array_sum($array2);
				} else {
					// 二桁じゃない場合
					$even[] = $value2;
				}
			} else if ($key % 2 !== 0){
				// 奇数桁の場合
				$odd[] = $value;
			}
		}
		// var_dump($even);
		// var_dump($odd);
		// それぞれの和を変数に代入
		$evenSum = array_sum($even);
		$oddSum = array_sum($odd);
		// var_dump($evenSum);
		// var_dump($oddSum);
		// 値Xに入る数値は0から9のどれかになるので、for文で確認する処理を行う
		for($a=0; $a<10; $a++){
			// 奇数桁に変数$aを足して代入
			$oddSum2 = $oddSum + $a;
			// その合計値を変数に代入
			$sum = $evenSum + $oddSum2;
			// 合計値が10で割り切れる場合はその時加えた変数$aを表示するようにする
			if($sum % 10 == 0){
				echo $a . "\n";
			}
		}
		// 最後にfor文の処理の中で配列が重ならないように、削除する
		unset($even);
		unset($odd);
	}
 ?>

<?php
	$num = trim(fgets(STDIN));
	for($i=0; $i<$num; $i++){
		$data = trim(fgets(STDIN));
		$array = str_split($data);
		foreach($array as $key => $value){
			if($key == 0 || $key % 2 == 0){
				$value2 = $value * 2;
				if(strlen($value2) == 2){
					$array2 = str_split($value2);
					$even[] = array_sum($array2);
				} else {
					$even[] = $value2;
				}
			} else if ($key % 2 !== 0){
				$odd[] = $value;
			}
		}
		$evenSum = array_sum($even);
		$oddSum = array_sum($odd);
		for($x=0; $x<10; $x++){
			$oddSum2 = $oddSum + $x;
			$sum = $evenSum + $oddSum2;
			if($sum % 10 == 0){
				echo $x . "\n";
			}
		}
		unset($even);
		unset($odd);
	}
 ?>
