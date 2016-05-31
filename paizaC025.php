<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $carry = trim(fgets(STDIN));
    $deliv = trim(fgets(STDIN));
    // var_dump($carry);
    // var_dump($deliv);
    for($i=0; $i<$deliv; $i++){
    	$input = trim(fgets(STDIN));
    	$data = explode(" ", $input);
    	$hour[] = array("$data[0]" => "$data[2]");
    }
    // var_dump($hour); // (3 70),(3 170),(3 90),(4 55),(4 40)
    foreach($hour as $h){
    	// var_dump($h);
    	foreach($h as $key => $value){
    		for($i=0; $i<23; $i++){
    			if($key == $i){
    				$
    			}
    		}
    	}
    }

?>
