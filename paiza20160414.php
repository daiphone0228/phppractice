<?php
	// 画像座標検索
	$n = trim(fgets(STDIN));
	for($i = 0; $i<$n; $i++){
		$n_s = trim(fgets(STDIN));
		$pic[$i] = explode(" ", $n_s);
		$picSum[$i] = $pic[$i];
	}
	print_r($picSum);

	$m = trim(fgets(STDIN));
	for($i = 0; $i<$m; $i++){
		$m_s = trim(fgets(STDIN));
		$pat[$i] = explode(" ", $m_s);
		$patSum[$i] = $pat[$i];
	}

	print_r($patSum);

 ?>

 Array
(
    [0] => Array
        (
            [0] => 0
            [1] => 0
            [2] => 1
            [3] => 0
        )

    [1] => Array
        (
            [0] => 0
            [1] => 1
            [2] => 1
            [3] => 0
        )

    [2] => Array
        (
            [0] => 0
            [1] => 1
            [2] => 0
            [3] => 1
        )

    [3] => Array
        (
            [0] => 1
            [1] => 1
            [2] => 1
            [3] => 0
        )

)
Array
(
    [0] => Array
        (
            [0] => 0
            [1] => 1
            [2] => 1
        )

    [1] => Array
        (
            [0] => 0
            [1] => 1
            [2] => 0
        )

    [2] => Array
        (
            [0] => 1
            [1] => 1
            [2] => 1
        )

)