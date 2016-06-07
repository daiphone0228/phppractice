<?php 

	//変数の中の"at"を"@"に変換する
	$input_lines = fgets(STDIN);
	$at = str_replace('at', '@', $input_lines);
	echo $at;

	//変数の日付の半角スペースを"/"に変える
	$input_lines = trim(fgets(STDIN));
	$date = str_replace(' ', '/', $input_lines);
	echo $date;
	echo '2012/6/12';

	//ある数値の数を1から足して、全ての和を求める
	//例）5 の場合 5+4+3+2+1 = 15
	$input_lines = trim(fgets(STDIN));
	$i = $input_lines;
	$sum = array();
	for ($i; $i>0; $i--) {
		$sum[] = $i;
	}
	echo array_sum($sum);

	//数字埋め、左を0で穴埋め、3桁仕様 98→098
	$input_lines = trim(fgets(STDIN));
	echo str_pad($input_lines,3,0,STR_PAD_LEFT);


 ?>