<?php
	// ハイスコアTOPランキングを表示する問題
	// 一行目にはパラメータの数・userの数・表示する上位userの数が表示されている
	// 2行目にはパラメータごとの係数が与えられている
	// 3行目以降にuserごとのパラメータが与えられる
	// まず最初に与えられる値をそれぞれ別々の変数に入れておく
	$input = trim(fgets(STDIN));
	$param = explode(" ", $input);
	$paramNum = $param[0]; // 4
	$userNum = $param[1]; // 10
	$topNum = $param[2]; // 3
	// 次にパラメータに掛け合わせる係数を取得する取得し、配列に代入
	$input = trim(fgets(STDIN));
	$keisuu = explode(" ", $input); // 1.5 1.2 2 0.4
	// userの数だけパラメータと係数の計算を繰り返すので、そのためのfor文を作る
	for ($i=0; $i<$userNum; $i++){
		$input = trim(fgets(STDIN)); // userのパラメータを一人取得
		$user = explode(" ", $input); // パラメータを分解し、配列に代入
		// パラメータと係数を掛け合わせる為、最初に取得したパラメータの数分だけ、ループ処理を行い、同時に計算するfor文を作成する
		for ($a=0; $a<$paramNum; $a++){
			// $userに入っている配列の数と$keisuuに入っている配列の数は同じになるはずなので、以下の様に変数$aを配列のキーとして出力する
			// それらを$userSumの配列に代入する
			$userSum[] = $user[$a] * $keisuu[$a];
		}
		$result[] = round(array_sum($userSum)); // 配列を合計し、round関数で四捨五入する
		// 最後に、ここでそのままループを繰り返すと$userSumの配列に値が入ったままになってしまうので、配列自体を削除する
		unset($userSum);
	}
	// 配列を降順に並び替え（arsortに()にするとキーが保持されてしまい、表示が面倒なので、rsortでキーをリセットする）
	rsort($result);
	// 表示する数を$topNumにいれてあるので、それを使ってfor文でループ処理をする
	for ($i=0; $i<$topNum; $i++){
		echo $result[$i] . "\n";
	}

 ?>
