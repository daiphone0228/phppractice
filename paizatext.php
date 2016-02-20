1/24

<?php
//データを取得する
$input = trim(fgets(STDIN));
// 値がからでなければループして値を取得し続ける。
while($input){
    $array[] = $input;
    $input = trim(fgets(STDIN));
}
print_r($array);

?>
<?php

//演習問題

// 標準入力から1行データを取得
$input = trim(fgets(STDIN));
// $inputの値が空で無ければループする
while($input){
    // 配列に$inputの値を追加
    $array[] = $input;
    // 標準入力から1行データを取得
    $input = trim(fgets(STDIN));
}
print_r($array);
?>

<?php

$input = fgets(STDIN);
while($input){
    $array[] = trim($input);
    $input = fgets(STDIN);
}
print_r($array);

// 万が一標準入力の値に空行が入っているとループ処理の際
// 処理が途中で終わってしまうのでそれを防ぐために
// trimをループ分の配列に代入するときに行うようにする

?>

<?php

// 標準入力の値を省略する方法もある。
// 下記のようにwhile文に標準入力の取り込みコードをいれてしまう。

while($input = fgets(STDIN)){
    $array[] = trim($input);
}
print_r($array);

// 万が一標準入力の値に空行が入っているとループ処理の際
// 処理が途中で終わってしまうのでそれを防ぐために
// trimをループ分の配列に代入するときに行うようにする

?>

<?php
// 標準入力から1行取得し値があればループ
while($input = fgets(STDIN)){
    // if文の前にtrimしておくのがポイント
    $input = trim($input);
    if($input == "勇者"){
        $array[] = $input;
    }
}
echo count($array);

?>

<?php
//配列を使ったランダムくじ引き
//人数が増えた場合でも一行で対応できる

//標準入力取り込み
$input = trim(fgets(STDIN));
//「,」で区切って配列に代入
$member = explode(",",$input);
//配列内容表示
print_r($member);
//0からはじまるためカウント用の最大値を計算式に代入
$max = count($member)-1;
//ランダム関数に$maxを挿入し、関数定義する
$key = rand(0,$max);
//数字表示
echo $key."\n";
//数字の値を表示
echo $member[$key];
?>

<?php

//演習問題

// 標準入力で行数不明の複数行のおみくじ結果データが入力されます。
// 標準入力の空行も含む全ての行の値を配列に代入し、
// その内容をランダムで出力するプログラムを作成してください。
// 出力は配列尾内容をprint_rで出力し、その次の行でおみくじの結果を表示してください。

// 入力される値
// 大吉
// 吉
// 凶

// 今回は自力で全部書いてみよう！
while($input=fgets(STDIN)){
    $array[] = trim($input);
}
print_r($array);
$max = count($array) - 1;
$key = rand(0,$max);
echo $array[$key];

?>

<?php

//配列を使ったランダムくじ引き 補足
//rand関数で0〜3を出力
//echo $member[ランダムで出た数字]

//人数を数えるのはcount($member)関数でカウント可能
//基本0から始まるので「カウントした数-1」になる

?>

1/24fin


