<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input = trim(fgets(STDIN));
    $param = explode(" ", $input);
    $num = $param[0];
    $sugar = $param[1];
    $diff = $param[2];
    $min = $sugar - $diff;
    $max = $sugar + $diff;
    
    for($i = 1; $i <= $num; $i++){
       	$input = trim(fgets(STDIN));
    	$data = explode(" ", $input);
    	$carrots[$i] = $data[0];
    	$toubun[] = $data;
    }
    
    foreach($toubun as $tb){
        if($tb[1] <= $max && $tb[1] >= $min){
            $tbSum[] = $tb[0];
        }
    }
    if(isset($tbSum)){
        $biggest = max($tbSum);
        foreach($carrots as $key => $carrot){
            if($carrot == $biggest){
                echo $key;
                break;
            }
        }
    } else {
        echo "not found";
    }
            
?>
