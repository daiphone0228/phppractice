<?php
	// 抑えるべき点
	// ・テーブル全体の座席はn個、座席は時計回りに1,2,...nとなる
	// ・円卓なので座席nと1は隣接している
	// ・グループの数はm組
	// ・i番目のグループの人数はa_i人
	// ・連続する座席に座る
	// ・もし座ろうとした座席が1つでも座られていたら、帰っちゃう
	// ・座ろうとする座席の位置は整数b_iで指定される
	// ・基本的にその位置を始点に時計回りに座る（26席のテーブルに3人で25番にすわると、25,26,1となる）
	// ・全体で何人座れているかを求める
	$input = trim(fgets(STDIN));
	// var_dump($input);
	$data = explode(" ", $input);
	$seat = $data[0]; // 座席数
	$set = $data[1]; // グループ数
	// グループごとにfor文で回す
	for($a=0; $a<$set; $a++){
		$input = trim(fgets(STDIN));
		// var_dump($input);
		$data = explode(" ", $input);
		$customer = $data[0]; // 客数
		$startSeat = $data[1]; // 席が始まる順番
		// 2回目以降は重複チェックが必要なため、下記条件分岐を行う
		// 重複した時点でforeach文とfor文を抜けるように"break 2"をいれる
		// その際重複した場合、変数に値をいれておく
		if(isset($table)){
			for($i=0; $i<$customer; $i++){
				if($i+$startSeat > $seat){
					$sit = $startSeat + $i - $seat;
					foreach($table as $t){
						if($t == $sit){
							$check = "false";
							break 2;
						}
					}
				} else {
					$sit = $startSeat + $i;
					foreach($table as $t){
						if($t == $sit){
							$check = "false";
							break 2;
						}
					}
				}
			}
		}
		// 重複がない場合は下記条件式を適用
		// 重複がない場合は下記からはじかれるので、次のグループの処理に移る
		if(empty($check)){
			for($i=0; $i<$customer; $i++){
				// 全体の座席数を考慮して、座席番号が1に戻るように条件分岐
				// たとえば26席で、25番から3人座るがそのままだと25,26,27となってしまうので
				// 座席の最大値を超えた場合のみ、値から座席数を引く、そうすると25,26,1になる。
				if($i+$startSeat > $seat){
					$sit = $startSeat + $i - $seat;
					$table[] = $sit;
				} else {
					$sit = $startSeat + $i;
					$table[] = $sit;
				}
			}
		}
		// 最後に重複チェックで作成した変数を削除することで、処理を正常にする
		unset($check);
	}
	// var_dump($table);
	echo count($table);
?>

<?php
	$input = trim(fgets(STDIN));
	$data = explode(" ", $input);
	$seat = $data[0]; // 座席数
	$set = $data[1]; // グループ数
	for($a=0; $a<$set; $a++){
		// 1組ずつ取り出す
		$input = trim(fgets(STDIN));
		$data = explode(" ", $input);
		$customer = $data[0]; // 3
		$startSeat = $data[1]; // 2
		if(isset($table)){
			for($i=0; $i<$customer; $i++){
				if($i+$startSeat > $seat){
					$sit = $startSeat + $i - $seat;
					foreach($table as $t){
						if($t == $sit){
							$check = "false";
							break 2;
						}
					}
				} else {
					$sit = $startSeat + $i;
					foreach($table as $t){
						if($t == $sit){
							$check = "false";
							break 2;
						}
					}
				}
			}
		}
		if(empty($check)){
			for($i=0; $i<$customer; $i++){
				if($i+$startSeat > $seat){
					$sit = $startSeat + $i - $seat;
					$table[] = $sit;
				} else {
					$sit = $startSeat + $i;
					$table[] = $sit;
				}
			}
		}
		unset($check);
	}
	echo count($table);
?>

