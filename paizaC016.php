 <?php
	// Leet文字列という規定に沿って、文字列を数字に変換して出力する
	$input = trim(fgets(STDIN)); // 文字列取得
	$moji = str_split($input, 1); //文字列を1文字ずつ分割して、配列にする
	// 配列の値の数を数え、その数分だけループするfor文を作る
	// そのfor分の中で、文字を順番に変換していく
	$num = count($moji);
	for ($i=0; $i<$num; $i++){
		if($moji[$i] == "A"){
			$moji[$i] = str_replace("A", 4, $moji[$i]);
		} else if ($moji[$i] == "E"){
			$moji[$i] = str_replace("E", 3, $moji[$i]);
		} else if ($moji[$i] == "G"){
			$moji[$i] = str_replace("G", 6, $moji[$i]);
		} else if ($moji[$i] == "I"){
			$moji[$i] = str_replace("I", 1, $moji[$i]);
		} else if ($moji[$i] == "O"){
			$moji[$i] = str_replace("O", 0, $moji[$i]);
		} else if ($moji[$i] == "S"){
			$moji[$i] = str_replace("S", 5, $moji[$i]);
		} else if ($moji[$i] == "Z"){
			$moji[$i] = str_replace("Z", 2, $moji[$i]);
		}
	}
	// 最後にimplode()関数で文字列を連結する
	echo implode($moji);

?>
