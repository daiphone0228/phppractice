<?php
	// 値を取り出した時に、正しい値の場合、配列の数は4つになる。
	// それを踏まえて、さらに数字の条件を加えた条件分岐を作る
	$num = trim(fgets(STDIN));
	for($i=0; $i<$num; $i++){
		$input = trim(fgets(STDIN));
	// 	var_dump($input);
		$ip = explode(".", $input);
		// var_dump($ip);
		$result = count($ip);
	// 	var_dump($result);
		if($result == 4){
			foreach($ip as $address){
				if($address <= 255 && $address >= 0){
					$add[] = $address;
				}
			}
			if(isset($add) && !empty($add) && count($add) == 4){
					echo "True" . "\n";
				} else {
					echo "False" . "\n";
				}
				unset($add);
		} else {
			echo "False" . "\n";
		}
	}
?>
