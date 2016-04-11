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