<?php
    // 三角形の残りの一角の角度を求める
    $input_lines = trim(fgets(STDIN));
    while($input_lines) {
        $a[] = $input_lines;
        $input_lines = trim(fgets(STDIN));
    }
    echo 180 - array_sum($a);

?>

<?php
    // 正方形の表面積を求める
	// 公式 = 1辺の長さの2乗 * 6
	$input_lines = fgets(STDIN);
    echo 6 * pow($input_lines, 2);
?>

<?php
    // 変数の中の部分文字列の出現回数を数える
    $input_lines = fgets(STDIN);
    echo mb_substr_count($input_lines, A);
?>

<?php
    // 1行目と2行目の割った値を切り上げる関数使用
    $input_lines = trim(fgets(STDIN));
    $i = $input_lines;
    while($i){
        $w[] = $i;
        $i = trim(fgets(STDIN));
    }
    echo ceil($w[1]/$w[0]);
?>

<?php
    // 変数の中の値を配列にいれて、その2つの値を条件分岐させる
    $input_lines = trim(fgets(STDIN));
    while($input_lines){
        $i[] = $input_lines;
        $input_lines = trim(fgets(STDIN));
    }
    if ($i[0] == $i[1]){
        echo 'Yes';
    } else {
        echo 'No';
    }
    
?>

