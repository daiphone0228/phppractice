<?php
    // ハッカソンCランク問題
    $input = trim(fgets(STDIN));
    $num = explode(" ", $input);
    $beforeNum = $num[0];
    $afterNum = $num[1];
    $data = trim(fgets(STDIN));
    $before = str_split($data);
    // var_dump($before);
    $data = trim(fgets(STDIN));
    $after = str_split($data);
    // var_dump($after);
    $before2 = array_count_values($before);
    // var_dump($before2);
    $after2 = array_count_values($after);
    // var_dump($after2);
    // $result = array_diff_assoc($before2, $after2);
    // var_dump($result);
    foreach($before2 as $key => $value){
        foreach($after2 as $key2 => $value2){
            if($key == $key2){
                $value3 = $value - $value2;
                if($value3 > 0){
                    $result[] = $value3;
                }
            }
        }
    }
    // var_dump($result);
    $value4 = array_diff_key($after2, $before2);
    // var_dump($value4);
    if(isset($value4)){
        $result2 = array_sum($result) + array_sum($value4);
        echo $result2;
    } else {
        echo array_sum($result);
    }
?>
