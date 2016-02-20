<?php 

// 標準入力で与えられる値について
// yes か no の数の多い方を出力して下さい。

while($input = fgets(STDIN)){
        $input = trim ($input);
        if($input == "yes"){
            $yes[] = $input;
        }elseif($input == "no"){
            $no[] = $input;
        }
    }

    if($yes>$no){
        echo "yes";
    }else{
        echo "no";
    }



// 正の整数が a, b が改行区切りで入力されます。
// a + b を計算し出力して下さい。


$input = trim(fgets(STDIN));
    // $inputの値が空で無ければループする
    while($input){
    // 配列に$inputの値を追加
    $array[] = $input;
    // 標準入力から1行データを取得
    $input = trim(fgets(STDIN));
    }
    
    echo $array[0]+$array[1];

 ?>