<?php 

	//変数の中の"at"を"@"に変換する
	$input_lines = fgets(STDIN);
	$at = str_replace('at', '@', $input_lines);
	echo $at;

	//変数の日付の半角スペースを"/"に変える
	$input_lines = trim(fgets(STDIN));
    $date = str_replace(' ', '/', $input_lines);
    echo $date;
    echo '2012/6/12';

    //ある数値の数を1から足して、全ての和を求める
    //例）5 の場合 5+4+3+2+1 = 15
    $input_lines = trim(fgets(STDIN));
    $i = $input_lines;
    $sum = array();
    for ($i; $i>0; $i--) {
        $sum[] = $i;
    }
    echo array_sum($sum);


    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_lines = trim(fgets(STDIN));
    $i = $input_lines;
    while ($i){
        $array[] = $i;
        $i = trim(fgets(STDIN));
    }
    var_dump($array);
    
    for ($y=0; $y<count($array); $y++) {
        $english = explode(' ',$array[$y]);
        var_dump($english);
        if($english[0]==$english[1]){
            $sum[]=2;
        }elseif(mb_strlen($english[0]) !== mb_strlen($english[1])) {
            $sum[]=0;
        }elseif(mb_strlen($english[0])-mb_strlen($english[1]) == 1) {
            $sum[]=1;
        }elseif(mb_strlen($english[0])-mb_strlen($english[1]) == -1) {
            $sum[]=1;
        } else {
            false;
        }
    }
    var_dump($sum);
    
    //数字埋め、左を0で穴埋め、3桁仕様 98→098
    $input_lines = trim(fgets(STDIN));
    echo str_pad($input_lines,3,0,STR_PAD_LEFT);


 ?>