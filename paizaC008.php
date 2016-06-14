<?php
	// タグの間の文字列を取得する場合、基本的に正規表現を用いる
	// 関数preg_match_allを使用した場合、対象の文字列の中で
	// 指定した開始文字列と終了文字列に挟まれる部分文字列が取得され、配列に代入される
	// 配列は多次元配列になっていて、現れた回数分だけ1次元目の配列が増える
	// また、2次元目の配列は[0]に開始文字列と終了文字列が含まれた文字列が取得され
	// [1]に部分文字列のみが取得されている
	$input = trim(fgets(STDIN));
	$tag = explode(" ", $input);
	$sta = $tag[0];
	$fin = $tag[1];
	// 	var_dump($tag);
	$str = trim(fgets(STDIN));
	$pattern = "/$sta(.*?)$fin/";
	$num = preg_match_all($pattern, $str, $result,PREG_SET_ORDER);
	// var_dump($num);
	// var_dump($result);
	if(isset($num)){
		foreach($result as $ans){
			if(empty($ans[1])){
				echo "<blank>\n";
			} else {
				echo $ans[1] . "\n";
			}
		}
	}
 ?>
