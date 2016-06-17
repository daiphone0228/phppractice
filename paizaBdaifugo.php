<?php
	$input = trim(fgets(STDIN));
	$array = explode(" ", $input);
	// var_dump($array);
	foreach ($array as $key => $value) {
		switch ($value) {
			case '2':
				$replace = str_replace("2", "15", $value);
				$card[$key+1] = $replace;
				break;
			case 'A':
				$replace = str_replace("A", "14", $value);
				$card[$key+1] = $replace;
				break;
			case 'K':
				$replace = str_replace("K", "13", $value);
				$card[$key+1] = $replace;
				break;
			case 'Q':
				$replace = str_replace("Q", "12", $value);
				$card[$key+1] = $replace;
				break;
			case 'J':
				$replace = str_replace("J", "11", $value);
				$card[$key+1] = $replace;
				break;
			default:
				$card[$key+1] = $value;
				break;
		}
	}
	// ここまでで数値の強さをはっきりさせるための値の変更は完了

	// 	var_dump($card);
	foreach($card as $key => $value){
	    $card2[$key . "番"] = $value;
	}
	var_dump($card2);
	// まずは一番の人からだす
	// その後、それより強い値の人が出す
	// もしその値より強い値を持っているひとがいなかった場合、直前の値を出した人のところまでいき、場はリセットされる
	// 次の人は空の場に自分の値を出す
	// それを繰り返して、最後までやり
	// それぞれの人の順位を最初の与えられた値に対応する順番で出力する
	// 重要なのは、戻した時に


	while(count($card2) > 0){
		$field = 0;
		if($field = )
		foreach($card2 as $key => $value){
		   // var_dump($key);
			if($field < $value){
			  //  var_dump($value);
				$result[] = $key;
				$field = $value;
				unset($card2[$key]);
			} else {
				unset($card2[$key]);
				$card2[$key] = $value;
			}
		}
	}
	// var_dump($card);
	var_dump($result);
 ?>