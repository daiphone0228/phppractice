<?php
// 配列の並び替え
$item = array("イージスシールド", "ウィンドスピア", "アースブレイカー");
print_r($item);
sort($item);
print_r($item);
// 基本は一文字目で判定、同じ文字の場合は2文字目で判定
rsort($item);
print_r($item);
// 日本語のソートはひらがな→カタカナ→漢字→全角数字の順で並び替えられる
// 文字コード順なので気をつける
// 連想配列に対してソートを行ってしまうと、只の配列になってしまうので気をつける
?>

<?php
// 連想配列などは、一度に作業を完了させようとせず
// 細かい作業を繰り返すイメージでやる
// keyとvalueを分ける場合などもそう
while($i = trim(fgets(STDIN))){
    $key_value = explode(",", $i);
    $key = $key_value[0];
    $value = $key_value[1];
    $item[$key] = $value;
}
arsort($item);
print_r($item);

?>

<?php
// 標準入力から値をループで取得
while($input = trim(fgets(STDIN))){
	// カンマで分割
	$key_value = explode(",", $input);
	$key = $key_value[0];
	$value = $key_value[1];
	// 連想配列として$itemに代入
	$item[$key] = $value;
}
// ここから下に記述
// 2000円以下の商品を価格が高い方から順に並べ替えて
// print_rで出力するプログラムを書いてみましょう。
foreach($item as $key => $value){
    if($value <= 2000){
        $item2[$key] = $value;
    }else{
        false;
    }
}
arsort($item2);
print_r($item2);

?>

<?php
// 標準入力から値をループで取得
while($input = trim(fgets(STDIN))){
	// カンマで分割
	$key_value = explode(",", $input);
	$key = $key_value[0];
	$value = $key_value[1];
	// 連想配列として$itemに代入
	$result[$key] = $value;
}
// ここから下に記述
// 得点が高い順番に並び替え、print_rで出力後、
// 勇者が何位なのか数字で出力してみましょう。
arsort($result);
print_r($result);

foreach($result as $key => $value){
    $i = $i + 1;
    if ($key == "勇者"){
        echo $i;
    }
}

?>

<?php
$item_img = array(
    "剣" => "http://paiza.jp/learning/images/sword.png",
    "盾" => "http://paiza.jp/learning/images/shield.png",
    "回復薬" => "http://paiza.jp/learning/images/potion.png",
    "クリスタル" => "http://paiza.jp/learning/images/crystal.png"
);
// ここから下に記述
// 画像URLの配列を1つずつimgタグで合わせて表示
foreach ($item_img as $item_imag2){
    echo "<img src=".$item_imag2."><br>\n";
}

?>