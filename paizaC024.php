<?php
    // 最初に2つの変数を定義する
	$a = 0;
	$b = 0;
	// でてくる計算指示の回数を取得
    $i = trim(fgets(STDIN));
    // for文で回す
    for($i; $i>0; $i--){
    	$input = trim(fgets(STDIN));
    	// var_dump($input);
    	// 半角スペース毎に与えられた値を配列にいれる
    	$data = explode(" ", $input);
    	// var_dump($data);
    	// 条件分岐を行う ※最初の文字列で3パターン、SETの場合2パターンに分ける、ADDとSUBは1パターン
    	if($data[0] == "SET"){
    		if($data[1] == 1){
    			$a = $data[2];
    		} else if($data[1] == 2){
    			$b = $data[2];
    		}
    	} else if($data[0] == "ADD"){
    		$b = $a + $data[1];
    	} else if($data[0] == "SUB"){
    		$b = $a - $data[1];
    	}
    }
    echo $a . " " . $b;
 ?>
