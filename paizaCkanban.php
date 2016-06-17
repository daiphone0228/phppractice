<?php
    // アルファベットを変更する場合、何個のアルファベットを変更すればいいか数を出力する
    // 例）pizza => paiza の場合、3と出力する
    $input = trim(fgets(STDIN));
    $num = explode(" ", $input);
    // 最初の文字列の文字数
    $beforeNum = $num[0]; // 4
    // 変更後の文字列の文字数
    $afterNum = $num[1]; // 5
    // 最初の文字列取得
    $data = trim(fgets(STDIN)); // ttaa
    // 文字列を1文字ずつ分割し配列に入れる
    $before = str_split($data);
    // 変更後の文字列取得
    $data = trim(fgets(STDIN)); // marven
    // 文字鉄を1文字ずつ分割し配列に入れる
    $after = str_split($data);
    // 配列に入ってる文字列の出現回数を取得、この際キーに半角英字が入る
    // t=>2, a=>2
    $before2 = array_count_values($before);
    // m=>1, a=>1, r=>1, v=>1, e=>1, n=>1
    $after2 = array_count_values($after);
    
    
    foreach($before2 as $key => $value){
        foreach($after2 as $key2 => $value2){
            if($key == $key2){
                $value3 = $value2 - $value;
                if($value3 > 0){
                    $result[] = $value3;
                }
            }
        }
    }
    $value4 = array_diff_key($after2, $before2);
    if(isset($value4) && !empty($value4) && isset($result) && !empty($result)){
        $result2 = array_sum($result) + array_sum($value4);
        echo $result2;
    } else if(isset($value4) && !empty($value4)){
        echo array_sum($value4);
    } else {
        echo array_sum($result);
    }
?>


<?php
    $input = trim(fgets(STDIN));
    $num = explode(" ", $input);
    $beforeNum = $num[0];
    $afterNum = $num[1];
    $data = trim(fgets(STDIN));
    $before = str_split($data);
    $data = trim(fgets(STDIN));
    $after = str_split($data);
    $before2 = array_count_values($before);
    $after2 = array_count_values($after);
    foreach($before2 as $key => $value){
        foreach($after2 as $key2 => $value2){
            if($key == $key2){
                $value3 = $value2 - $value;
                if($value3 > 0){
                    $result[] = $value3;
                }
            }
        }
    }
    $value4 = array_diff_key($after2, $before2);
    if(isset($value4) && !empty($value4) && isset($result) && !empty($result)){
        $result2 = array_sum($result) + array_sum($value4);
        echo $result2;
    } else if(isset($value4) && !empty($value4)){
        echo array_sum($value4);
    } else if(isset($result) && !empty($result)){
        echo array_sum($result);
    } else {
        echo 0;
    }
?>

