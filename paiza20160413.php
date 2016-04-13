<?php
    // 与えられる文字列の中にあるアルファベットを使用して、"cat"という文字が何個作れるかを出力する
    // 与えられた文字列の中のアルファベットの各個数をsubstr_count()関数を使用して数える
    // それらを格納した配列の中で最も大きい値を引っ張りだし、それを最大値として変数に代入する($max)
    // for文を使用して、それぞれのアルファベットの数を引いていき、その時のループ回数を変数に代入する($catNum)
    // このfor文内で"c","a","t"のいづれかの値が0になった時に、if文を抜ける
        // つまり、catという単語が作れなくなった時に条件分岐から外れる
    // さらに、1つもcatが作れなかった場合は予め作っておいた変数($catNum)が空かどうかをチェックし、空の場合
    // $catNumに"0"を代入する
    // この時点で、配列$catには"cat"が作れた数が引かれた数の、それぞれのアルファベットの値が入っている
    // 最初にcatが作れた数 → つまり$catNumの値をechoで出力
    // その後、$maxから$catNumを引くことで、現状残っているアルファベットで作ることが出来る"cat"の数がでるのでそれを変数に代入($catNeed)
    // 先ほど作った配列をforeach文で回し、$catNeedからそれぞれの値を引き、出力する
    $input = trim(fgets(STDIN));
    // $input = "cccc";
    // echo substr_count($input, 'c') . "\n";
    // echo substr_count($input, 'a') . "\n";
    // echo substr_count($input, 't') . "\n";
    $cat['c'] = substr_count($input, 'c');
    $cat['a'] = substr_count($input, 'a');
    $cat['t'] = substr_count($input, 't');
    // var_dump($cat);
    $max = max($cat);
    // echo $max;
    $catNum = "";
    for ($i=1; $max>=$i; $i++) {
        if (!$cat['c'] == 0 && !$cat['a'] == 0 && !$cat['t'] == 0) {
            $cat['c'] = $cat['c'] - 1;
            $cat['a'] = $cat['a'] - 1;
            $cat['t'] = $cat['t'] - 1;
            $catNum = $i;
        } else if (empty($catNum)) {
            $catNum = 0;
        } else {
            break;
        }
    }
    echo $catNum . "\n";
    $catNeed = $max - $catNum;
    foreach ($cat as $cats){
        $cats = $catNeed - $cats;
        echo $cats . "\n";
    }
?>

