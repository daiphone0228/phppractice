<?php
    // にんじんの糖分で人参をわけてうさぎに与える
    // パラメータ取得
    $input = trim(fgets(STDIN)); // 3 64 10
    $param = explode(" ", $input); // 配列にいれる
    $num = $param[0]; // 人参の数3
    $sugar = $param[1]; // 糖分の基準値64
    $diff = $param[2]; // 誤差10
    $min = $sugar - $diff; // 糖分の最小値54
    $max = $sugar + $diff; // 糖分の最大値74
    
    for($i = 1; $i <= $num; $i++){
        $ninjin = trim(fgets(STDIN)); //for文で順に取り出す (84 75)(73 53)(56 34)
        $data = explode(" ", $ninjin); //配列に入れる
        $carrots[$i] = $data[0]; // 質量([1]=>84, [2]=>73, [3]=>56)
        $toubun[] = $data; // ([0]=>([0]=>84,[1]=>75), [1]=>([0]=>73,[1]=>53), [2]=>([0]=>56,[1]=>34))
    }
    
    foreach($toubun as $tb){ //糖分の連想配列を順番に取りだす
        if($tb[1] <= $max && $tb[1] >= $min){
            $tbSum[] = $tb[0]; //糖分の値が基準値内だったら配列に格納
        }
    }
    if(isset($tbSum)){
        $biggest = max($tbSum);
        foreach($carrots as $key => $carrot){
            if($carrot == $biggest){
                echo $key . "\n";
                break;
            }
        }
    } else {
        echo "not found" . "\n";
    }
            
?>

