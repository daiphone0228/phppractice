<?php
    // 配列を最後に削除し、前の値を消すようにする
    $input = trim(fgets(STDIN));
    for($i=0; $i<$input; $i++){
    	$data = trim(fgets(STDIN)); //約数を計算する値
    	for($y=1; $y<$data; $y++){
			$result = $data / $y;
			if(is_int($result) == true){
				$group[] = $y;
			}
    	}
    	$result2 = array_sum($group);
    	if($result2 == $data){
    		echo "perfect" . "\n";
    	} else if($data - $result2 == 1){
    		echo "nearly" . "\n";
    	} else {
    		echo "neither" . "\n";
    	}
    	unset($group);
    }
?>
