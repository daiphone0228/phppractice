<?php
    // 工事現場は公園にただ一つだけあり、その位置は (a, b) です。
	// 工事現場から距離 R メートル未満は騒音が大きいので読書には適していません。
	// また、公園には読書にうってつけの木陰が N 箇所あり、i 番目の木陰の位置は (x_i, y_i) です。
	// 以上の情報が与えられたとき、各木陰が読書に適している(つまり、工事現場から R メートル以上離れている)かどうかを判定するプログラムを書いてください。
	// 「位置 (x, y) が工事現場から R メートル以上離れている」という条件は以下の式で表されます。
	// (x - a)**2 + (y - b)**2 >= R**2
	// 一行目に工事現場の座標x,y、工事の騒音の大きさRが与えられる
	// 2行目には木陰の数
	// 3行目以降には木陰の座標がx,yの順で与えられる
    $input = trim(fgets(STDIN)); // 工事現場の座標と騒音の大きさ取得
    $kouji = explode(" ", $input); // 配列に代入
    $noiseX = $kouji[0]; // x座標を代入
    $noiseY = $kouji[1]; // y座標を代入
    $noiseVolume = $kouji[2]; // 騒音の大きさ代入
    $num = trim(fgets(STDIN)); // 木陰の数代入
    // 木陰の数分だけループ処理を繰り返す
    for($i=0; $i<$num; $i++){
        $kokages = trim(fgets(STDIN)); // 木陰の座標取得
        $kokage = explode(" ", $kokages); // 配列に代入
        $kokageX = $kokage[0]; // x座標を代入
        $kokageY = $kokage[1]; // y座標を代入
        // 木陰の位置が何メートル離れているかを計算し変数に代入
        $result = ($kokageX - $noiseX) ** 2 + ($kokageY - $noiseY) ** 2;
        if ($result >= $noiseVolume ** 2){
            echo "silent" . "\n";
        } else {
            echo "noisy" . "\n";
        }
    }
?>
