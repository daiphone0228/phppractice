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

?>
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


    <?php
    // 単語問題復習
    // てこずり中
    $input = trim(fgets(STDIN));
    for($i = 0; $i<$input; $i++){
        $word = trim(fgets(STDIN));
        $words = explode(" ", $word);
        $word1 = $words[0];
        $word2 = $words[1];
        $wordNum1 = strlen($word1);
        $wordNum2 = strlen($word2);
        // echo $wordNum1 . "\n";
        // echo $wordNum2 . "\n";
        if ($words[0] == $words[1]){
            $result[] = 2;
        } else if ($wordNum1 == $wordNum2){
            $word1 = str_split($words[0]);
            $word2 = str_split($words[1]);
            $diff = array_diff($word1, $word2);
            var_dump($diff);
            if (count($diff) == 1){
                $result[] = 1;
            } else if (count($diff) >= 2){
                $result[] = 0;
            }
        } else {
            $result[] = 0;
        }
    }
    echo array_sum($result);
?>


<?php 
    
    //数字埋め、左を0で穴埋め、3桁仕様 98→098
    $input_lines = trim(fgets(STDIN));
    echo str_pad($input_lines,3,0,STR_PAD_LEFT);


 ?>