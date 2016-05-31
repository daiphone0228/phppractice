<?php
    // 時差を求める
	// 24時間表記の特性を理解する
    $input = trim(fgets(STDIN));
    for($i=0; $i<$input; $i++){
    	$data = trim(fgets(STDIN));
    	$data2 = explode(" ", $data);
    	$countries[$data2[0]] = $data2[1];
    }
    // var_dump($countries);
    $base = trim(fgets(STDIN));
    $baseTime = explode(" ", $base); // singapore 19:38
    // var_dump($baseTime);
    foreach($countries as $key => $value){
    	if($key == $baseTime[0]){
    		$baseLag = $value;
    	}
    }
    // var_dump($baseLag); // 7
    foreach($countries as $country){
    	$country2[] = $country - $baseLag; // ここに時差の表が入ってる
    }
    // var_dump($country2);
    $timeDivide = explode(":", $baseTime[1]);
    // var_dump($timeDivide);
    $hour = $timeDivide[0];
    $min = $timeDivide[1];
    foreach ($country2 as $value) {
    	$hours = $hour + $value;
    	if($hours >= 24){
    	    $hours -= 24;
    	} else if($hours < 0){
    	    $hours += 24;
    	}
    	$result[] = str_pad($hours, 2, 0, STR_PAD_LEFT);
    }
    // var_dump($result);
    foreach($result as $value){
        $final[] = $value . ":" . $min;
    }
    // var_dump($final);
    foreach($final as $timeResult){
        echo $timeResult . "\n";
    }
        


?>
