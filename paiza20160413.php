<?php
	// 与えられる文字列の中にあるアルファベットを使用して、"cat"という文字が何個作れるかを出力する
	// 与えられた文字列の中のアルファベットの各個数をsubstr_count()関数を使用して数える
	// それらを格納した配列の中で最も大きい値を引っ張りだし、それを最大値として変数に代入する($max)
	// for文を使用して、それぞれのアルファベットの数を引いていき、その時のループ回数を変数に代入する($catNum)
	// このfor文内で"c","a","t"のいづれかの値が0になった時に、if文を抜ける
		// つまり、catという単語が作れなくなった時に条件分岐から外れる
	// さらに、1つもcatが作れなかった場合は予め作っておいた変数($catNum)が空かどうかをチェックし、空の場合
	// $catNumに"0"を代入する
	// この時点で、配列$catには"cat"が作れた数が引かれた数の、それぞれのアルファベットの値が入っている
	// 最初にcatが作れた数 → つまり$catNumの値をechoで出力
	// その後、$maxから$catNumを引くことで、現状残っているアルファベットで作ることが出来る"cat"の数がでるのでそれを変数に代入($catNeed)
	// 先ほど作った配列をforeach文で回し、$catNeedからそれぞれの値を引き、出力する
	$input = trim(fgets(STDIN));
	// $input = "cccc";
	// echo substr_count($input, 'c') . "\n";
	// echo substr_count($input, 'a') . "\n";
	// echo substr_count($input, 't') . "\n";
	$cat['c'] = substr_count($input, 'c');
	$cat['a'] = substr_count($input, 'a');
	$cat['t'] = substr_count($input, 't');
	// var_dump($cat);
	$max = max($cat);
	// echo $max;
	$catNum = "";
	for ($i=1; $max>=$i; $i++) {
		if (!$cat['c'] == 0 && !$cat['a'] == 0 && !$cat['t'] == 0) {
			$cat['c'] = $cat['c'] - 1;
			$cat['a'] = $cat['a'] - 1;
			$cat['t'] = $cat['t'] - 1;
			$catNum = $i;
		} else if (empty($catNum)) {
			$catNum = 0;
		} else {
			break;
		}
	}
	echo $catNum . "\n";
	$catNeed = $max - $catNum;
	foreach ($cat as $cats){
		$cats = $catNeed - $cats;
		echo $cats . "\n";
	}
?>

<?php
	// 全探索による解法
	// この場合、計算回数が多いとエラーがでてしまう
	$input = trim(fgets(STDIN));
	$array = explode(" ", $input);
	$panelNum = $array[1];
	$attack = $array[0];
	for($panelNum; $panelNum>0; $panelNum--) {
		$panel = trim(fgets(STDIN));
		$panels[] = $panel;
	}
	$panelCount = count($panels);
	for ($i=0; $panelCount>$i; $i++) {
		$panelSet = array_slice($panels, $i, $attack);
		// if (count($panelSet) > 2) {
			$panelSum[] = array_sum($panelSet);
		// } else {
		//	 break;
		// }
	}
	// var_dump($panelSum);
	$result = max($panelSum);
	echo $result . "\n";
?>

<?php
	// 累積和による解法
	// この場合、計算回数がぐっと少なくなる
	// ex）3 7を$tと$nに代入する
	fscanf(STDIN, "%d %d", $t, $n);

	// （与えられた数字を一行ずつ$mの配列に代入、その際、配列キーは$iで指定する）
	// ex）4,5,1,10,3,4,1
	$m = array();
	$m_t = array();
	for($i = 0; $i < $n; $i++){
		fscanf(STDIN, "%d", $m[$i]);
	}

	// もう一つの配列$m_tに累積和を代入する
	// 最初は0のため、代入はキー番号1から始める
	// 配列$m_tの配列の値に与えられた値を足して、それを$m_tの配列に追加する
	// ex）0,4,9,10,20,23,27,28
	for($i = 0; $i < $n; $i++){
		$m_t[$i+1] = $m[$i] + $m_t[$i];
	}
	// 各地点の合計値は「知りたい区間の末尾の値」から「知りたい区間の先頭の一つ手前の値」を引いた値になる
	// ex）4,5,1の合計は10 → 配列$m_tの最初の値0を10から引くと値は10になる
	$ans = $m_t[$t] - $m_t[0];
	// それをキーを1つずつずらしていくことで、全ての値を求め、$tmpに代入していく
	// さらに前の値より大きい値は$ansに代入するようにする
	for($i = 0; $i < $n-$t; $i++){
		$tmp = $m_t[$i+1+$t] - $m_t[$i+1];
		if($ans < $tmp)
			$ans = $tmp;
	}

	echo $ans;

?>

<?php
	// しゃくとり法による解法
	// 加算と減算を繰り返して値を求める
	// 最初の指定区間は通常の加算処理を行う
	// 次の区間の先頭の1つ手前を減算、新たに加わる区間の末尾を加算し、合計値配列に格納
	// 区間合計を合計値配列に格納
	// 合計値配列の最大値を出力

	// ex）3,7を取得する
	fscanf(STDIN, "%d %d", $t, $n);
	// （与えられた数字を一行ずつ$mの配列に代入、その際、配列キーは$iで指定する）
	// ex）4,5,1,10,3,4,1
	$m = array();
	for($i = 0; $i < $n; $i++){
		fscanf(STDIN, "%d", $m[$i]);
	}
	// 最初の配列に最初の合計値を代入する
	// ex）4+5+1 = 10
	$ans = array_sum(array_slice($m, 0, $t));
	$tmp =  $ans;
	for($i = 0; $i < $n-$t; $i++){
		$tmp += $m[$t+$i]; 
		$tmp -= $m[$i];
		if($ans < $tmp)
			$ans = $tmp;
	}
	echo $ans;

?>


