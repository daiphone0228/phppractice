
<?php
	// 宝くじの当選番号を確認する
	// 1行目に与えられるのは当選番号
	// 2行目にはチケットの枚数
	// 3行目以降にチケットのそれぞれの番号が与えられている
	$input = trim(fgets(STDIN)); // "1 2 3 4 5 6"
	$ans = explode(" ", $input); // 配列に代入
	$num = trim(fgets(STDIN)); // チケットの枚数を取得
	// チケットの枚数分だけループ処理を繰り返す
	for($i=0; $i<$num; $i++){
		$input = trim(fgets(STDIN)); // チケットの番号を取得 ex)"2 4 12 5 8 1"
		$ticket = explode(" ", $input); // それを配列に代入
		// 当選番号の配列と取得したチケットの配列を比較し、共通項のみを取得
		// 同時にその値の数をcount()関数で取得し、変数に代入する
		$result = count(array_intersect($ans, $ticket));
		echo $result . "\n";
	}
?>
