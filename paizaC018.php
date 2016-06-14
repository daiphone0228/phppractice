<?php
	// レシピに必要な材料の種類と個数、自分が持っている材料の種類と個数が与えられる
	// 合計で何人前作れるかを出力する
	// 材料の個数を取得する
	$num1 = trim(fgets(STDIN));
	// その個数分、for文で繰り返す
	for($i=0; $i<$num1; $i++){
		$data = trim(fgets(STDIN));
		$array = explode(" ", $data);
		// この時、材料の名前はキーに、数を値として配列に格納する
		$recipes[$array[0]] = $array[1];
	}
	// var_dump($recipes);
	// 自分の持っている材料の数取得
	$num = trim(fgets(STDIN));
	// for文で繰り返す
	for($i=0; $i<$num; $i++){
		$data = trim(fgets(STDIN));
		$array = explode(" ", $data);
		// 同じように名前をキー、数を値として格納
		$vegetables[$array[0]] = $array[1];
	}
	// var_dump($vegetables);
	// レシピの配列をforeach文で出力する
	foreach($recipes as $recipeFood => $recipeNum){
		// 自分の持っている材料をforeach文で出力する
		foreach($vegetables as $vegeFood => $vegeNum){
			// レシピ材料キーと自分の材料キーが等しい場合、下記の処理を実行
			if($recipeFood == $vegeFood){
				// 自分の材料の値をレシピの値で割り、その値を配列に格納
				// ※この際、小数点になる場合を考慮して、floor()関数で小数点以下を切り捨てる
				// 小数点以下はレシピとして使えないため、切り捨てて置かないと、出力にエラーが生じる
				$times[] = floor($vegeNum / $recipeNum);
			}
		}
	}
	// var_dump($times);
	// 計算結果の配列が存在する場合かつ、レシピで取得した材料の合計数と計算結果の値の合計数が合ってる場合に下記処理を実行
	// 材料が種類が足りなかった場合、足りないまま最小の値が出力されてしまうのを防ぐため
	if(isset($times) && count($times) == $num1){
		// もちろん最も少ない値に合わせるので、min()関数で取得
		echo min($times);
	} else {
		echo 0;
	}
 ?>

 <?php
	$num1 = trim(fgets(STDIN));
	for($i=0; $i<$num1; $i++){
		$data = trim(fgets(STDIN));
		$array = explode(" ", $data);
		$recipes[$array[0]] = $array[1];
	}
	$num = trim(fgets(STDIN));
	for($i=0; $i<$num; $i++){
		$data = trim(fgets(STDIN));
		$array = explode(" ", $data);
		$vegetables[$array[0]] = $array[1];
	}
	foreach($recipes as $recipeFood => $recipeNum){
		foreach($vegetables as $vegeFood => $vegeNum){
			if($recipeFood == $vegeFood){
				$times[] = floor($vegeNum / $recipeNum);
			}
		}
	}
	if(isset($times) && count($times) == $num1){
		echo min($times);
	} else {
		echo 0;
	}
 ?>