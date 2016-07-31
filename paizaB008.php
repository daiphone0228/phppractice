<?php
	// ライブをした際のファンから得られる利益の最大値を求める問題

	// まずファンの人数とライブの回数を求める
	$input = trim(fgets(STDIN));
	// その数を分割
	$data = explode(" ", $input);
	$fanNum = $data[0];
	$liveNum = $data[1];
	// var_dump($data);
	// もしライブの回数またはファンの人数が0の時は処理をせず、
	// 0と出力するため、条件分岐を行う
	if($fanNum == 0 || $liveNum == 0){
		echo 0;
	} else {
		// ライブの回数分だけ、処理を繰り返す
		for($i=1; $i<=$liveNum; $i++){
			// そのライブにおいてファンがもたらす利益を取得
			$input = trim(fgets(STDIN));
			// 利益の値を1つずつ配列に入れる
			$data = explode(" ", $input);
			// 1つのライブの損益を取得するために、配列の合計を$liveValue配列に追加する
			$liveValue[$i] = array_sum($data);
		}

		// 配列をforeachで回す
		foreach($liveValue as $value){
			// もし配列の中の値が0より小さい、つまりマイナスの場合は利益がでないので、その回のライブは行わないものとする
			// つまり、利益が0以上のライブの値だけを取得する
			if($value >= 0){
				// 配列に追加
				$allValue[] = $value;
			}
		}

		// 利益が出るライブがない場合は、ライブを行わないため、損益は0と出力する
		if(isset($allValue) && !empty($allValue)){
			echo array_sum($allValue);
		} else {
			echo 0;
		}

	}

 ?>

 <?php
	$input = trim(fgets(STDIN));
	$data = explode(" ", $input);
	$fanNum = $data[0];
	$liveNum = $data[1];
	if($fanNum == 0 || $liveNum == 0){
		echo 0;
	} else {
		for($i=1; $i<=$liveNum; $i++){
			$input = trim(fgets(STDIN));
			$data = explode(" ", $input);
			$liveValue[$i] = array_sum($data);
		}

		foreach($liveValue as $value){
			if($value >= 0){
				$allValue[] = $value;
			}
		}

		if(isset($allValue) && !empty($allValue)){
			echo array_sum($allValue);
		} else {
			echo 0;
		}

	}

 ?>