<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input = trim(fgets(STDIN));
    $zumen = explode(" ", $input);
    var_dump($zumen);
    $x = $zumen[0];
    $y = $zumen[1];
    $z = $zumen[2];
    $num = $zumen[3];
    for($i=0; $i<$num; $i++){
        $input = trim(fgets(STDIN));
        $cut = explode(" ", $input);
        var_dump($cut);
        
    }
    
?>