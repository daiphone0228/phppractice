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
	// 未解決！！
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input = trim(fgets(STDIN));
    $trip = explode(" ", $input);
    for($trip[0]; $trip[0]>0; $trip[0]--) {
        $input = trim(fgets(STDIN));
        $weather = explode(" ", $input);
        $day[] = $weather[0];
        $rain[] = $weather[1];
    }
    $max = count($rain);
    for($i=0; $i<$max; $i++){
        if(count($tripDuring) == $trip[1]){
            $tripDuring[] = $rain[$i];
            $tripDuring = array_slice($rain, 0 , $trip[1]);
            $rainAverage = array_sum($tripDuring) / $trip[1];
            $rainAverageSum[] = $rainAverage;
            unset($tripDuring[0]);
        } else {
            $tripDuring[] = $rain[$i];
        }
    }


    var_dump($rain);
    var_dump($tripDuring);
    var_dump($rainAverage);

    // 配列を最初から順に3つずつ降水確率を足していき
    // その平均を求めて、それらが一番低いものの日程を出力する
    // array_sliceを使用し、配列のなかの値を日程分だけ取得
?>



