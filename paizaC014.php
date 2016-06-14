<?php
	// 複数の箱が与えられて、その箱に指定されたボールが入るかを調べる
	$input = trim(fgets(STDIN));
	$data = explode(" ", $input);
	$num = $data[0];
	$ball = $data[1] * 2;
	for($i=1; $i<=$num; $i++){
		$input = trim(fgets(STDIN));
		$box = explode(" ", $input);
		if($box[0] >= $ball && $box[1] >= $ball && $box[2] >= $ball){
				$result[] = $i;
		}
	}
	// var_dump($result);
	foreach($result as $re){
		echo $re . "\n";
	}
 ?>