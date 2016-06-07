<?php
	// 与えられた値の数字を条件分岐で別の数字に変換する
	// 128~255なら1,0~127なら0にする
	$input = trim(fgets(STDIN)); // 値の行数と列数を取得
	$param = explode(" ", $input); // それを配列に代入
	// 配列の1つ目に行数が代入されているので、その行数分だけfor分を回す
	for($i=0; $i<$param[0]; $i++){
		$input = trim(fgets(STDIN)); // 1行分の値を取得
		$result = explode(" ", $input); // 配列に代入
		// 与えられた列分の数値を比較する必要があるので、その列分だけfor文を回す
		for($a=0; $a<$param[1]; $a++){
			if($result[$a] <= 127){ // 配列の数値を$aとすることで、与えられた数値がどんな値でも確認することが出来る
				$ans[] = 0;
			} else {
				$ans[] = 1;
			}
		}
		echo implode(" ", $ans) . "\n"; // 半角スペースで連結、さらに改行
		unset($ans); // 配列を削除
	}
?>
