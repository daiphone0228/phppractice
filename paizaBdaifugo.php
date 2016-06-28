<?php
	// 大富豪をプログラミングで実行する問題
	// 通常の大富豪のルール通り、2が一番強く、3が一番弱い
	// 今回は一人一枚しか手札がないという想定で、与えられた数値がそれぞれ何番目に上がったかを出力する
	// 大富豪の手札取得
	$input = trim(fgets(STDIN));
	// 手札を配列に変換
	$array = explode(" ", $input);
	// var_dump($array);
	// 元々与えられた値には"J"や"K"など、数値として比較できないものが混ざっているので、それらの値を数値に変換する
	// foreach文で1つずつ取り出す
	// ※当初、最終的にこの時のkeyの番号が重要となると思い、key番号を+1することで最後の出力に関係してくると思っていたが、改めて精査し、この段階ではkey番号での比較は行うが出力などは行わないため、わざわざ入力する必要はないと判断し、"+1"という文言は削除した
	foreach ($array as $key => $value) {
		// 値が2~Jの場合、値を数値に変換する為、switch文でstr_replaceを実行
		switch ($value) {
			case '2':
				$replace = str_replace("2", "15", $value);
				$card[$key] = $replace;
				break;
			case 'A':
				$replace = str_replace("A", "14", $value);
				$card[$key] = $replace;
				break;
			case 'K':
				$replace = str_replace("K", "13", $value);
				$card[$key] = $replace;
				break;
			case 'Q':
				$replace = str_replace("Q", "12", $value);
				$card[$key] = $replace;
				break;
			case 'J':
				$replace = str_replace("J", "11", $value);
				$card[$key] = $replace;
				break;
			default:
				$card[$key] = $value;
				break;
		}
	}
	// ここまでで数値の強さをはっきりさせるための値の変更は完了
	// 場の初期値を"0"に設定する
	$field = 0;
	// 手札の配列がなくなるまで処理を繰り返す
	while(count($card) > 0){
		// ※2週目以降の条件分岐 → もしfieldの値が、手札配列の中のどの値よりも大きい場合に下記処理を実行
		if(max($card) <= $field){
			// $fieldの値を"0"にリセット
			$field = 0;
			// 1週目と同じように配列を回す
			foreach($card as $key => $value){
				// 各配列のkeyが最後に出した値のkeyより大きい場合のみ実行するようにする（※$keyNumとして後ほどでてくる）
				if($keyNum < $key){
					// 場の値より$valueが大きい場合は下記処理を実行
					if($field < $value){
						// 場の値変数に手札の値を代入
						$field = $value;
						// 場に出た値は上がったとみなすので、結果の配列にその値のkeyを代入
						$result[] = $key;
						// 同時に先ほど条件式にあった$keyNumに同じkeyを代入
						$keyNum = $key;
						// 最後に場に出した値は配列から削除する
						unset($card[$key]);
					} else {
						// 場の値より小さい場合は処理をせずスキップする
						continue;
					}
				} else {
					// 今回場の変数をリセットするということは、通常前回のループで最後に出せたkey番号の次の人からだすようにしなければならない
					// ※例えば1-10番まであって、最後に出した人が6番の場合、その次の人、つまり7番（まだ誰もあがっていないという前提で）から始まるようにする
					// それにより、最後に保存した$keyNumより小さい値はスキップする
					continue;
				}
			}
		} else {
			// 通常最初はこちらからスタート
			foreach($card as $key => $value){
				// 場の値より、手札の方が大きければ下記処理実行
				if($field < $value){
					// 場の値変数を手札の値で上書き
					$field = $value;
					// 場に出た値は上がったとみなすので、結果の配列にその値のkeyを代入
					$result[] = $key;
					// 同時に先ほど条件式にあった$keyNumに同じkeyを代入
					$keyNum = $key;
					// 最後に場に出した値は配列から削除する
					unset($card[$key]);
				} else {
					// 場の値より小さい場合は処理をせずスキップする
					continue;
				}
			}
		}
	}

	// var_dump($result);
	// 数値をわかりやすくするために、keyの数値を+1にする
	foreach ($result as $key => $value) {
		$result2[$key + 1] = $value;
	}
	// var_dump($result2);
	// 結果の配列には、上がった順にその値のkey（$card配列のkey）が入っている
	// つまり、$result2のそれぞれの値は$card配列のkeyであり、$result2のkeyは上がった順番を示している
	// それを利用して、$result2を値で昇順にソートすることで、最初の$card配列と同じ順序になる
	// そうなるとこの時のkeyはそれぞれ、最初の$card配列を基準にして、それぞれの値が何番目に場に出されたかをを示す値になる
	// ということで、$result2を値を基準に昇順にソート
	asort($result2);
	// var_dump($result2);
	// 最後に配列をforeach文で出力し、その時のkeyをechoで表示することで、この問題の期待される出力を行う
	foreach($result2 as $key => $value){
		echo $key . "\n";
	}
 ?>

<?php
	$input = trim(fgets(STDIN));
	$array = explode(" ", $input);
	foreach ($array as $key => $value) {
		switch ($value) {
			case '2':
				$replace = str_replace("2", "15", $value);
				$card[$key] = $replace;
				break;
			case 'A':
				$replace = str_replace("A", "14", $value);
				$card[$key] = $replace;
				break;
			case 'K':
				$replace = str_replace("K", "13", $value);
				$card[$key] = $replace;
				break;
			case 'Q':
				$replace = str_replace("Q", "12", $value);
				$card[$key] = $replace;
				break;
			case 'J':
				$replace = str_replace("J", "11", $value);
				$card[$key] = $replace;
				break;
			default:
				$card[$key] = $value;
				break;
		}
	}
	$field = 0;
	while(count($card) > 0){
		if(max($card) <= $field){
			$field = 0;
			foreach($card as $key => $value){
				if($keyNum < $key){
					if($field < $value){
						$field = $value;
						$result[] = $key;
						$keyNum = $key;
						unset($card[$key]);
					} else {
						continue;
					}
				} else {
					continue;
				}
			}
		} else {
			foreach($card as $key => $value){
				if($field < $value){
					$field = $value;
					$result[] = $key;
					$keyNum = $key;
					unset($card[$key]);
				} else {
					continue;
				}
			}
		}
	}
	foreach ($result as $key => $value) {
		$result2[$key + 1] = $value;
	}
	asort($result2);
	foreach($result2 as $key => $value){
		echo $key . "\n";
	}
 ?>