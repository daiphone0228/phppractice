<?php
	// 総当り戦の計算
	$input= fgets(STDIN);
	echo $input*($input-1) / 2;
?>

<?php
	// 旅行の計画（paizaのCランク）
	// 1行目に全日数と、旅行の日数が与えられる
	// 2行目以降に、その日数分の日にちと降水確率が与えられる
	// 行数は1行目の全日数分+1日
	$input = trim(fgets(STDIN));
	$trip = explode(" ", $input);
	for($trip[0]; $trip[0]>0; $trip[0]--) {
		$input = trim(fgets(STDIN));
		$weather = explode(" ", $input);
		$day[$weather[0]] = $weather[1];
	}
	var_dump($day);
?>

<?php
	// 一行で出力される文字列（英単語が半角スペースで区切られている	）
	// その文字列の値と出現回数を一行ずつ出力する
	// explodeで分解して、array_count_valuesで出現回数とその値を連想配列にいれる
	// それらを順に出力する
	$input = trim(fgets(STDIN));
	$eng = explode(" ", $input);
	$result = array_count_values($eng);
	foreach($result as $key => $value){
		echo $key . " " . $value . "\n";
	}
?>

<?php
	// 自分の得意な言語で
	// Let's チャレンジ！！
	$input = trim(fgets(STDIN));
	$trip = explode(" ", $input);
	for($trip[0]; $trip[0]>0; $trip[0]--) {
		$input = trim(fgets(STDIN));
		$weather = explode(" ", $input);
		$day[$weather[0]] = $weather[1];
	}
	// var_dump($trip[1]);
	// var_dump($day);
	foreach($day as $rain){
		$tripDuring[] = $rain;
		if(count($tripDuring) == $trip[1]){
			$rainAverage = floor(array_sum($tripDuring) / $trip[1]);
			$rainAverageSum[] = $rainAverage;
			unset($tripDuring[0]);
			$tripDuring = array_merge($tripDuring);
		}
	}
	$rainMin = min($rainAverageSum);
	// var_dump($day);
	$tripDate = array();
	foreach($day as $date => $rain){
		$tripAdd = array($date."日" => $rain);
		$tripDate = $tripDate + $tripAdd;
		if(count($tripDate) == $trip[1]){
			// var_dump($tripDate);
			$rainAverage = floor(array_sum($tripDate) / $trip[1]);
			if($rainAverage == $rainMin){
				// $firstAndEnd = array_keys($tripDate);
				reset($tripDate);
				$first = rtrim(key($tripDate), "日");
				end($tripDate);
				$end = rtrim(key($tripDate), "日");
			}
		   	array_shift($tripDate);
		}
	}

	echo $first . " " . $end;

	//var_dump($rain);
	// var_dump($tripDate);
	// var_dump($rainAverageSum);
	// var_dump($rainMin);
	// var_dump($first);
	// var_dump($end);
	// var_dump($firstAndEnd);

?>

<?php
	// 最初の列にある連休の日数と旅行の日数を配列にいれる
	// その日数分日付と降水確率の列を取り出すために、for文で繰り返す
	// その際、日付は連想配列の"キー"に、降水確率は"値"に代入する
	// 連想配列を以下の内容でforeachで回し、まず降水確率の平均値を求める
		// if文で配列の値の数と旅行の日数が同じ場合という条件分岐文を作る
		// その際、配列にある値の合計を旅行日数で割り、さらに小数点以下を切り捨てて変数に代入する
		// その変数の値を配列にいれる
		// 最初の日付のみを削除するために、配列の先頭、つまりキーが[0]の値を削除する
		// このままだとキーがずれてしまうのでarray_mergeで配列を一旦整理する
	// それらを全て繰り返しすと、$rainAverageSumに平均値が配列として入る
	// その平均値の最も小さい値を求めるために、min()関数を使用し、それを変数$rainMinに代入
	// 次の段階として、最小の平均値が求められた日付を取り出すforeach文を作成
	// 同じようにforeach文で回すが、今回は平均値を配列に代入はしない
	// さらに今回は日付が必要なので、値だけでなくキーも連想配列から取り出す
		// 最初のforeach文と同じように、旅行日数分で平均を求める条件分岐文を入れる
		// 今回はその平均値が、先ほど求めた、最小の平均値と同じ場合にのみ発生するイベントを記述する
		// 最小の平均値の場合、その時の連想配列の最初と最後のキーを取り出すために、reset()関数とend()関数を使用する
		// 連想配列の場合、unsetでキーを指定して削除することができないため（変数のため）、array_shift()を使用し自動的に先頭の値が取り出されるようにする
		// 通常、連想配列をarray_shift()するとキーはそのまま残るのだが、数字のみに場合、通常の配列と認識されてしまうため、あえて最初にキーとして代入するときに、"日"という文字を追加する
		// もちろん取り出すときは"日"は必要ないため、rtrim()関数で指定の文字列のみ削除するようにする
	// 最後に取り出した旅行の日程の最初と最後の日付を半角スペースで間を空け表示する
	$input = trim(fgets(STDIN));
	$trip = explode(" ", $input);
	for($trip[0]; $trip[0]>0; $trip[0]--) {
		$input = trim(fgets(STDIN));
		$weather = explode(" ", $input);
		$day[$weather[0]] = $weather[1];
	}
	foreach($day as $rain){
		$tripDuring[] = $rain;
		if(count($tripDuring) == $trip[1]){
			$rainAverage = floor(array_sum($tripDuring) / $trip[1]);
			$rainAverageSum[] = $rainAverage;
			unset($tripDuring[0]);
			$tripDuring = array_merge($tripDuring);
		}
	}
	$rainMin = min($rainAverageSum);
	$tripDate = array();
	foreach($day as $date => $rain){
		$tripAdd = array($date."日" => $rain);
		$tripDate = $tripDate + $tripAdd;
		if(count($tripDate) == $trip[1]){
			$rainAverage = floor(array_sum($tripDate) / $trip[1]);
			if($rainAverage == $rainMin){
				reset($tripDate);
				$first = rtrim(key($tripDate), "日");
				end($tripDate);
				$end = rtrim(key($tripDate), "日");
			}
		   	array_shift($tripDate);
		}
	}
	
	echo $first . " " . $end;


?>

<?php
	// C029:旅行の計画の復習
	// 連休日数と旅行日数を取得
	$input = trim(fgets(STDIN));
	$param = explode(" ", $input);
	$allDay = $param[0];
	$trip = $param[1];
	$dayArray = array();
	// echo $day;
	// echo $trip;
	// 全日数の日付と降水確率を配列にいれる
	// 日付はキーとして
	for($i=0; $i<$allDay; $i++){
		$l = trim(fgets(STDIN));
		$param2 = explode(" ", $l);
		$rain = $param2[1];
		$day = $param2[0];
		$dayArray[$day."日"] = $rain; // この際日付として"日"を入れておかないと、切り取った時にキーの値がリセットされてしまう
	}
	// var_dump($dayArray);
	// 旅行日数分の降水確率を引っ張る際にその必要回数を取得
	$roop = $allDay - $trip + 1; // 全体の日数 - 旅行日数 + 1で求められる
	// その回数分for文をまわす
	for($i=0; $i<$roop; $i++){
		$rainSum = array_slice($dayArray, $i, $trip); // 切り取り
		$rainAverage[] = intval(array_sum($rainSum) / $trip); // 平均の整数を配列にいれる
	}
	// var_dump($rainAverage);
	// その中の最小の値を変数に代入
	$min = min($rainAverage);
	// echo $min;
	for($i=0; $i<$roop; $i++){
		$rainSum = array_slice($dayArray, $i, $trip);
		$rainAve2 = intval(array_sum($rainSum) / $trip);
		if($rainAve2 == $min){
			// var_dump($rainSum);
			// 最小の値のときの切り取った配列を別の配列に代入
			$bestDays = $rainSum;
		}
	}
	// キーを取得する
	foreach($bestDays as $key => $value){
		$result[] = str_replace("日", "",$key);
	}
	// var_dump($result);
	$first = $result[0];
	$end = $result[$trip-1];
	
	echo $first. " ". $end;
		
?>





