<?php
    // ひたすら計算した。もっと効率の良い方法もあると思う。
    $input = trim(fgets(STDIN));
    $data = explode(" ", $input);
    $first = $data[0]; // 最初に販売する全体の食品の量
    $sold = $data[1]; // 生鮮食品として売れた量
    $sold2 = $data[2]; // 惣菜として売れた量
    // var_dump($sold);
    $seisen = $first - $first * ($sold/100);
    // var_dump($seisen);
    $souzai = $seisen - $seisen * ($sold2/100);
    // var_dump($souzai);
    echo $souzai;
?>
