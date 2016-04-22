<?php

    // 英単語の正誤判定
    // 単語が同じなら2点、異なる場合は0点
    // 長さが異なる場合は0点
    // 長さが同じでも、中のアルファベットの違いが1つなら1点
    // 2つ以上なら0点
    $input = trim(fgets(STDIN));
    while ($input){
        $array[] = $input;
        $input = trim(fgets(STDIN));
    }
    for ($y=1; $y<=$array[0]; $y++) {
        $english = explode(' ',$array[$y]);
        // var_dump($english);
        if($english[0]==$english[1]){
            $sum[]=2;
        }elseif(strlen($english[0]) !== strlen($english[1])) {
            $sum[]=0;
        }elseif(strlen($english[0]) == strlen($english[1])) {
            $en2 = str_split($english[0]);
            $en3 = str_split($english[1]);
            $diff = array_diff_assoc($en2, $en3);
            if (count($diff) >= 2){
                $sum[] = 0;
            }elseif(count($diff) == 1){
                $sum[] = 1;
            }
        } else {
            false;
        }
    }
        
    // var_dump($sum);
    echo array_sum($sum);

?>
