<?php
	// 与えられる値の総数を取得
	$num = trim(fgets(STDIN));
	// その数分繰り返す
	for($i=0; $i<$num; $i++){
		// 買い物品の種類と金額を取得
		$input = trim(fgets(STDIN));
		// 種類の数値と金額に分けて配列に入れる
		$data = explode(" ", $input);
		// 種類の数値毎に条件分岐する
		switch ($data[0]){
			case '0':
				// 食料品は$foods配列に入れる
				$foods[] = $data[1];
				break;
			case '1':
				// 書籍は$books配列
				$books[] = $data[1];
				break;
			case '2':
				// 衣料品は$clothes配列
				$clothes[] = $data[1];
				break;
			case '3':
				// その他は$others配列
				$others[] = $data[1];
				break;
				// 念のためdefaultも作っておく
			default:
				break;
		}
	}

	// 値が1つもなく、各配列のどれかが存在しない場合を考慮して、issetと!emptyで条件分岐する
	// 同時に配列の合計値を出し、それを100で除算し、少数点を切り捨てた値にポイント還元率を乗算する
	// その値を$points配列に入れることで、全ての商品のポイントを1つの配列にまとめる
    if(isset($foods) && !empty($foods)){
    	$foodPrice = array_sum($foods);
    	$points[] = floor($foodPrice / 100) * 5;
    }
    if(isset($books) && !empty($books)){
    	$bookPrice = array_sum($books);
    	$points[] = floor($bookPrice / 100) * 3;
    }
    if(isset($clothes) && !empty($clothes)){
    	$clothePrice = array_sum($clothes);
    	$points[] = floor($clothePrice / 100) * 2;
    }
    if(isset($others) && !empty($others)){
    	$otherPrice = array_sum($others);
    	$points[] = floor($otherPrice / 100);
    }
	
	// 最終的に$pointsに入っている値の合計を出力する
	echo array_sum($points);
 ?>

 <?php
	$num = trim(fgets(STDIN));
	for($i=0; $i<$num; $i++){
		$input = trim(fgets(STDIN));
		$data = explode(" ", $input);
		switch ($data[0]){
			case '0':
				$foods[] = $data[1];
				break;
			case '1':
				$books[] = $data[1];
				break;
			case '2':
				$clothes[] = $data[1];
				break;
			case '3':
				$others[] = $data[1];
				break;
			default:
				break;
		}
	}

    if(isset($foods) && !empty($foods)){
    	$foodPrice = array_sum($foods);
    	$points[] = floor($foodPrice / 100) * 5;
    }
    if(isset($books) && !empty($books)){
    	$bookPrice = array_sum($books);
    	$points[] = floor($bookPrice / 100) * 3;
    }
    if(isset($clothes) && !empty($clothes)){
    	$clothePrice = array_sum($clothes);
    	$points[] = floor($clothePrice / 100) * 2;
    }
    if(isset($others) && !empty($others)){
    	$otherPrice = array_sum($others);
    	$points[] = floor($otherPrice / 100);
    }
	
	echo array_sum($points);
 ?>