<?php
    // にんじんの糖分で人参をわけてうさぎに与える
    // パラメータ取得
    $input = trim(fgets(STDIN));
    $param = explode(" ", $input); // 配列にいれる
    $num = $param[0]; // 人参の数
    $sugar = $param[1]; // 糖分の基準値
    $diff = $param[2]; // 誤差
    $min = $sugar - $diff; // 糖分の最小値
    $max = $sugar + $diff; // 糖分の最大値
    
    for($i = 1; $i <= $num; $i++){
        $ninjin = trim(fgets(STDIN)); //for文で順に取り出す
        $data = explode(" ", $ninjin); //配列に入れる
        $toubun[$i] = $data;
    }
    foreach($toubun as $tb){ //糖分の連想配列を順番に取りだす
        if($tb[1] <= $max && $tb[1] >= $min){
            $tbSum[] = $tb; //糖分の値が基準値内だったら配列に配列ごと格納
        }
    }
    // $tbSum には糖分が基準値内の人参の配列が入っている
    // $toubun には全ての人参のデータが入っている。これは人参の番号指定用
    // $tbSumに値がある場合、以下の処理を実行
    if(isset($tbSum)){
        // 糖分許容範囲の人参の中で最も質量($ts[0])が大きい値を変数に入れる
        foreach($tbSum as $ts){
            $carrots[] = $ts[0];
        }
        $carrotMax = max($carrots);
        // var_dump($carrotMax);
        // 糖分許容範囲の人参たちをforeach文でとりだす。
        foreach($tbSum as $ts){
            // さらにその中で質量がさきほど求めた値と同じ場合、以下の処理を実行
            if($ts[0] == $carrotMax){
                // 番号指定用で全ての人参の配列を作成しておいたので、それの値とキーを取り出す
                foreach($toubun as $key => $value){
                    // 値には配列が入っているので、その配列(つまりその人参の質量とキーの組み合わせ)が同じ人参の場合以下の処理を実行
                    if($ts == $value){
                        // キーを1から始まるようにしていたので、キーを出力することで、順番が判定できる
                        echo $key . "\n";
                        // ここで通常のbreakを行ってしまうとforeach文は1つしか抜けることが出来ない
                        // なので下記のように、"break 2"とする
                        break 2;
                    }
                }
            }
        }
    } else {
        // 見つからない場合は以下のようにnot foundと表示する
        echo "not found" . "\n";
    }
            
?>

