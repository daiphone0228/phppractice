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
// 	var_dump($card2);
	// まずは一番の人からだす
	// その後、それより強い値の人が出す
	// もしその値より強い値を持っているひとがいなかった場合、直前の値を出した人のところまでいき、場はリセットされる
	// 次の人は空の場に自分の値を出す
	// それを繰り返して、最後までやり
	// それぞれの人の順位を最初の与えられた値に対応する順番で出力する
	// 一枚ずつ出されていく値に対して、その値たちの最大値を求める

	// 場の値を"0"に設定する
	$field = 0;
	while(count($card2) > 0){

		// 基本的な構造として箇条書きしてみる
		// 1.card配列を出したらその値を削除するため、配列がなくなるまで作業を繰り返す
		// 2.1週目は、最初のfieldの値が"0"のため、foreachで順番に配列を取り出した時に、その値がfield値より大きかったら、field値にその値を代入し、配列から値を削除する
		// 3.field値より小さい場合は、スキップする
		// 4.2週目は、field値が最後に代入された値になっているため、その値で比較を行うが、もしその値が他のどの配列でも出せない場合、field値を”0”にリセットし、更に最後に残った値のあったkey番号の次の値からスタートする
		// 5.これを繰り返すことで、最終的に結果の配列にはカードが出された時のkey番号が保存されるようにする

		// 大枠として、カードの配列がなくなるまでwhile文で繰り返す
		// 中枠として、配列をforeach文で一周させた時に、最後までfieldに残ったカードのkeyに+1した値とkey番号が同じであるかどうかで条件分岐
		// 同じ場合、fieldの値を0にリセットし、判定を繰り返す
		// 小枠として、foreach文と、fieldの値と配列のカードの値を比較する条件分岐を作成

// 		array_values($card2);
	}
	var_dump($card2);
	var_dump($result);
 ?>

 <?php
 // 保留分
	if(isset($keyNum) && !empty($keyNum)){
			foreach($card2 as $key => $value){
				if($keyNum == $key+1){
					$field = 0;
					if($field < $value){
						// 出された値のキーを$resultに代入する
						$result[] = $key;
						// その時の値を$fieldに代入する
						$field = $value;
						// $keyの番号を保存する
						$keyNum = $key;
						$field2 = $value;
						// フィールドに出した値は配列から削除する
						unset($card2[$key]);
					} else {
						// 場の値より小さい場合、下記条件実行
						continue;
					}
				} else {
					if($field < $value){
						// 出された値のキーを$resultに代入する
						$result[] = $key;
						// その時の値を$fieldに代入する
						$field = $value;
						// $keyの番号を保存する
						$keyNum = $key;
						// フィールドに出した値は配列から削除する
						unset($card2[$key]);
					} else {
						// 場の値より小さい場合、下記条件実行
						continue;
					}

				}
			}
		} else {
			// 配列で1つずつ出す
			foreach($card2 as $key => $value){
				// 配列で出力された値が、場の値より大きかったら、下記条件実行
				if($field < $value){
					// 出された値のキーを$resultに代入する
					$result[] = $key;
					// その時の値を$fieldに代入する
					$field = $value;
					// $keyの番号を保存する
					$keyNum = $key;
					// フィールドに出した値は配列から削除する
					unset($card2[$key]);
				} else {
					// 場の値より小さい場合、下記条件実行
					continue;
				}
			}
		}
  ?>