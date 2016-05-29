<?php
    // 嫌いな数字が入っている部屋以外の部屋を出力
    $hateNum = trim(fgets(STDIN));
    // var_dump($hateNum);
    $rooms = trim(fgets(STDIN));
    // var_dump($rooms);
    for($i = 0; $i<$rooms; $i++){
        $room = trim(fgets(STDIN)); // 203
        $roomNum = str_split($room); //2 0 3
        // var_dump($roomNum);
        if(!in_array("$hateNum", $roomNum)){
            $result[] = $room;
        }
    }
    // unset($result);
    // var_dump($result);
    if(isset($result) && !empty($result)){
        foreach($result as $likeRoom){
            echo $likeRoom . "\n";
        }
    } else {
        echo "none" . "\n";
    }
        
?>
