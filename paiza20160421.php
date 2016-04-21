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
