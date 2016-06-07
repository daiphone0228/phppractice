<?php
	// 指定された文字列の○番目を取得
	// 例: dai 2 → aと表示
	$input_lines = trim(fgets(STDIN));
	$term = explode(" ", $input_lines);
	echo mb_substr($term[0], $term[1]-1, 1);
	// 数字の順番は０から始まることを忘れない

?>

<?php
	// 配列の中の数値の最大値と最小値を取り出して表示
	// 配列内を昇順に並び替える
	// 最大値は配列の数-1の配列に入っているのでcount関数で数を表示させる
	// 最小値は0
	$input_lines = trim(fgets(STDIN));
	while($input_lines){
		$num[] = $input_lines;
		$input_lines = trim(fgets(STDIN));
	}
	sort($num);
	echo $num[count($num)-1];
	echo "\n";
	echo $num[0];
?>

<?php
	// 文字列の先頭から指定された文字数分だけ抜き出す
	// 抜き出す開始位置は0
	$input_lines = trim(fgets(STDIN));
	while($input_lines){
		$term[] = $input_lines;
		$input_lines = trim(fgets(STDIN));
	}
	echo mb_substr($term[0], 0, $term[1]);
?>

<?php
	// 与えられた値から、カウントダウン開始
	$input_lines = trim(fgets(STDIN));
	for ($input_lines; $input_lines > 0; $input_lines--){
		echo $input_lines;
		echo "\n";
	}
?>

<?php
	// 文字列を大文字にする
	$input_lines = trim(fgets(STDIN));
	$str = strtoupper($input_lines);
	echo $str;
?>

<?php
	// 指定された文字列の割り算の商と余りを求める
	// 半角スペースで区切って配列に入れる
	// 0番目を1番目で割る（ちなみにgmp_div_qが除算、gmp_div_rが余りを求める関数）
	$input_lines = trim(fgets(STDIN));
	$waru = explode(" ", $input_lines);
	$result = gmp_div_qr($waru[0],$waru[1]);
	echo $result[0]." ".$result[1];
?>

<?php
	// 絶対値を求める
	$input_lines = trim(fgets(STDIN));
	echo abs($input_lines);
?>

<?php
	// 指定された数値分だけ「*」を表示する
	$input_lines = trim(fgets(STDIN));
	for($input_lines; $input_lines>0; $input_lines--){
		echo "*";
	}
?>

<?php
	// 与えられたアルファベットがアルファベット順で何番目かを回答する
	// 最初に全てのアルファベットを配列にいれて、その文字と同じ配列の中の文字の番号を取得
	// 0から始まってるので、+1する
	$i = trim(fgets(STDIN));
	for($s=0; $s<26; $s++){
		$a[] = chr(65+$s);
	}
	$key = array_search($i, $a);
	echo $key+1;
?>

<?php
	// 与えられた値で@でつなげる
	$input = trim(fgets(STDIN));
	while($input){
		$mail[] = $input;
		$input = trim(fgets(STDIN));
	}
	echo $mail[0]."@".$mail[1];
?>

<?php
	// 半角スペースで句切られた2つの年の間に何年間あるかを出力する
	// 配列に分けていれて、それらを引く
	$input = trim(fgets(STDIN));
	$year = explode(" ", $input);
	echo $year[1] - $year[0];

?>

<?php
	// 与えられた値が奇数か偶数かによって出力する表示を変える
	$input = trim(fgets(STDIN));
	if ($input % 2 == 0){
		echo "even";
	}else{
		echo "odd";
	}
?>

<?php
	// 与えられた数値と単位をもとに全てmmで表示する（数値のみ）
	$input = trim(fgets(STDIN));
	$fast = explode(" ", $input);
	if ($fast[1] == "km"){
		echo $fast[0] * 1000*100*10;
	}else if($fast[1] == "m"){
		echo $fast[0] * 100*10;
	}else if($fast[1] == "cm"){
		echo $fast[0] * 10;
	}

?>

<?php
	// 等差数列を10回繰り返す
	// 最後のスペースがあるとエラーになるため、条件分岐でそこだけ指定
	$input = fgets(STDIN);
	$num = explode(" ", $input);
	$a = $num[0];
	$b = $num[1];

	for ($i=0; $i<10; $i++){
		if ($i == 9){
			echo $a + ($b*$i);
		}else{
			echo $a + ($b*$i);
			echo " ";
		}
	}

?>

<?php
	// 与えられた文字列に対して、「Hello」のあとにつなげる
	// Helloのあとは半角スペース、値ごとにカンマで区切り、最後はピリオドで終わらせる
	$input = trim(fgets(STDIN));
	while($input){
		$hello[] = $input;
		$input = trim(fgets(STDIN));
	}
	echo "Hello ";
	for ($i=1; $i<=$hello[0]; $i++){
		if ($i == $hello[0]){
			echo $hello[$i].".";
		}else{
		echo $hello[$i].",";
		}
	}
?>

<?php
	// 与えられた整数を1から9で順にかけていく
	$input = trim(fgets(STDIN));
	for($i=1; $i<=9; $i++){
		if ($i == 9){
			echo $input*$i;
		}else{
			echo $input*$i." ";
		}
	}
?>

<?php
	// 2つの整数が半角スペース区切りで与えられるので、値が大きい方を表示
	// 同じ場合は「eq」と表示
	$input = trim(fgets(STDIN));
	$num = explode(" ", $input);
	if ($num[0] < $num[1]) {
		echo $num[1];
	} else if ($num[0] == $num[1]) {
		echo "eq";
	} else if ($num[0] > $num[1]) {
		echo $num[0];
	}
?>

<?php
	// 与えられた文字列の頭文字をピリオドで区切って表示
	$input = trim(fgets(STDIN));
	$initial = explode(" ", $input);
	echo $initial[0][0].".".$initial[1][0];
?>