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
