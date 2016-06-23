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
	$field = 0;
	// $result = array();
	$keyNum = 0;
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

	// var_dump($result);
	foreach ($result as $key => $value) {
		$result2[$key+1] = $value;
	}
	// var_dump($result2);
	$result3[] = array();
	asort($result2);
	// var_dump($result2);
	foreach($result2 as $key => $value){
		echo $key . "\n";
	}
 ?>
<?php

	// まずは一番の人からだす
	// その後、それより強い値の人が出す
	// もしその値より強い値を持っているひとがいなかった場合、直前の値を出した人のところまでいき、場はリセットされる
	// 次の人は空の場に自分の値を出す
	// それを繰り返して、最後までやり
	// それぞれの人の順位を最初の与えられた値に対応する順番で出力する
	// 一枚ずつ出されていく値に対して、その値たちの最大値を求める

	// 基本的な構造として箇条書きしてみる
	// 1.card配列を出したらその値を削除するため、配列がなくなるまで作業を繰り返す
	// 2.1週目は、最初のfieldの値が"0"のため、foreachで順番に配列を取り出した時に、その値がfield値より大きかったら、field値にその値を代入し、配列から値を削除する
	// 3.field値より小さい場合は、スキップする
	// 4.2週目は、field値が最後に代入された値になっているため、その値で比較を行うが、もしその値が他のどの配列でも出せない場合、field値を”0”にリセットし、更に最後に残った値のあったkey番号の次の値からスタートする
	// 5.これを繰り返すことで、最終的に結果の配列にはカードが出された時のkey番号が保存されるようにする
	// ・field値より小さい値を別の配列に代入した場合
	// 1.大きい値は削除し、key番号を$resultの配列にいれる（while文の繰り返しは$resultを配列の数が52個になるまで続けるようにする）
	// 2.小さい値は別の配列にkey番号と一緒にいれて、2つの配列で繰り返す
	// 3.例えば最初の配列は$cardに入っていて、その配列をforeah文で回した結果を$resultにいれて、弾かれた値を別の配列$card2にいれるとする
	// 4.あらかじめif文で$cardと$card2を別々に処理をするように分岐する
	// 5.各配列を処理した後に、その配列を削除する
	// 6.どの値も$fieldの値に勝てない場合は、$fieldの値をリセットするためにどうすべきか
	// ・2つの配列にした場合どうなるかを検証する
	// 1.最初の配列を判定し、場に出せるやつは出て配列から削除される
	// 2.出せなかった値達は別の配列に入れ、最後に最初の配列を削除する
	// 3.次にその配列があるかどうかをチェックする条件分岐で、2つ目の配列が有った場合はその配列での条件分岐をする
	// 4.動作は2と同じ
	// 5.また入らなかった値を一つ目の配列に代入し、最後に2つめに作った配列を削除する
	// 6.1-6を繰り返す
	// 7.このようにした場合、弾かれた値たちはkeyはそのままで順番は常に頭からにできる




	// 大枠として、カードの配列がなくなるまでwhile文で繰り返す
	// 中枠として、配列をforeach文で一周させた時に、最後までfieldに残ったカードのkeyに+1した値とkey番号が同じであるかどうかで条件分岐
	// 同じ場合、fieldの値を0にリセットし、判定を繰り返す
	// 小枠として、foreach文と、fieldの値と配列のカードの値を比較する条件分岐を作成


 ?>