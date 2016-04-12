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
	// 次の行に
    $i = trim(fgets(STDIN));
    for($a=1; $i>=$a; $a++) {
        $allBook[] = $a;
    }
    // print_r($allBook);
    $myBookNum = trim(fgets(STDIN));
    $myBook = trim(fgets(STDIN));
    $myBooks = explode(" ", $myBook);
    // print_r($myBooks);
    $iWantBooks = array_diff($allBook, $myBooks);
    // print_r($iWantBooks);
    $storeBookNum = trim(fgets(STDIN));
    $sellBook = trim(fgets(STDIN));
    $sellBooks = explode(" ", $sellBook);
    // print_r($sellBooks);
    $result = array_intersect($iWantBooks, $sellBooks);
    // var_dump($result);
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

