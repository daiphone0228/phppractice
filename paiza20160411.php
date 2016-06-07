<?php
	// 文字列の中に含まれている副文字列を検索して、その回数を表示する。
	$input = trim(fgets(STDIN));
	echo substr_count($input, "cat");
?>

<?php
	// 編み模様を作る
	// 最初の値が縦横のそれぞれの縞の本数
	// 二行目が全体の縞の長さがある
	// 後はfor文で繰り返す
	$input = trim(fgets(STDIN));
	while($input) {
		$a[] = $input;
		$input = trim(fgets(STDIN));
	}
	$result = array();
	for($num = $a[1]; $num>0; $num--){
		for($stripe=$a[0]; $stripe>0; $stripe--) {
			$result[] = "R";
		}
		for($stripe2=$a[0]; $stripe2>0; $stripe2--) {
			$result[] = "W";
		}
	}
	$word = implode($result);
	echo substr($word, 0,$a[1]);

?>

<?php
	// 指定の睡眠開始時間から、残業時間の1/3の時間を睡眠時間として追加し、その時刻を求める
	// date()関数とstrtotime()関数を使用
	// あらかじめ指定の時刻は変数に入れておく
	$baseTime = "01:00";
	$i = trim(fgets(STDIN));
	for($i; $i>0; $i--){
		$time = trim(fgets(STDIN));
		$result = $time / 3;
		$sleepTime = date("H:i",strtotime($baseTime. "-$result minute"));
		echo $sleepTime . "\n";
	}

?>

<?php
	// 購入したい本の巻数を表示する
	// 最初の行に全巻の巻数
	// 次の行から順に自分が所持している巻数、自分が所持している巻の詳細、お店で販売している巻数、お店で販売している巻数の詳細
	// 全巻の値を配列に入れ、全巻から自分が所持している巻を除いた、購入すべき巻の値を配列で引っ張る
	// その後、その値と本屋で販売している巻数を比較し、同じ値があったら、その値は買うべき巻数の本とみなし、その巻数の値を半角スペース感覚で出力する
	$i = trim(fgets(STDIN));
	// 全巻の値を配列$allBookに代入する
	for($a=1; $i>=$a; $a++) {
		$allBook[] = $a;
	}
	// print_r($allBook);
	// 自分が所持している巻数を変数$myBookNumに代入
	$myBookNum = trim(fgets(STDIN));
	// 自分が所持している巻数の詳細を配列$myBookに代入する
	$myBook = trim(fgets(STDIN));
	$myBooks = explode(" ", $myBook);
	// print_r($myBooks);
	// 配列$allBookと$myBookを比較し、購入する必要がある巻の値を配列$iWantBooksに代入
	$iWantBooks = array_diff($allBook, $myBooks);
	// print_r($iWantBooks);
	// お店で販売している巻数を変数$storeBookNumに代入する
	$storeBookNum = trim(fgets(STDIN));
	// お店で販売している巻の詳細の値を配列$sellBooksに代入する
	$sellBook = trim(fgets(STDIN));
	$sellBooks = explode(" ", $sellBook);
	// print_r($sellBooks);
	// array_intersect()関数を使用し、$iWantBooksと$sellBooksの共通する値を配列$resultに代入する
	$result = array_intersect($iWantBooks, $sellBooks);
	// var_dump($result);
	// $resultが空だった場合は"None"と出力し、存在した場合は半角スペース区切りで出力するためにimplode()関数を使用する
	if (empty($result)) {
		echo "None";
	} else if (isset($result)) {
		echo implode(" ", $result);
	}
?>

<?php
	// 必要在庫数に対してすくない製品を補充する
	// それぞれの必要発注数と価格を計算し、合計を出力する
	$i = trim(fgets(STDIN));
	for ($i; $i>0; $i--) {
		$supply = trim(fgets(STDIN));
		$price = explode(" ", $supply);
		if ($price[0] <= $price[1]) {
			$prices[] = 0;
		} else {
			$prices[] = ($price[0] - $price[1]) * $price[2];
		}
	}
	echo array_sum($prices);
?>

