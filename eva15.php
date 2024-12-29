<?php
// 新世紀エヴァンゲリオン〜未来への咆哮〜

// 当選の数値は1にする。適当
$winning = 1;
$count=0;
do {
    $rand = rand(1,319);
    $count++;
} while($rand!=$winning);

echo("初当たり回転数：".$count."\n");

// 1000円 18回ボーダーで回った場合の金額算出
$money = ($count/18) * 1000;
echo("初当たり金額：".$money."円\n");

// ST突入率70%とする
$st = rand(1,100);
$isSt = false;
if($st <= 70 ) {
    echo("ST突入\n");
    $isSt = true;
} else {
   echo("時短100回：".$st."\n"); 
}

// 163回中に抽選するので少し方法が違うがめんどうなので
$stCount = 0;
$stMoney = 0;
if($isSt) {
    $roop = 163;
    do {
        $roop --;
        $isWin = stRand();
        if($isWin){
            $stCount++;
            $stMoney += 6000; // 獲得1500玉の円換算(表記と違うがめんどうなので)
            $roop = 163; // 当選したのでループ数を回復
        }
    } while($roop!=0);
    echo("ST回数：".$stCount."\n"); 
    echo("ST獲得金額：".$stMoney."\n"); 
    
    $diff =$stMoney - $money;
    echo("結果：".$diff."円\n");
}

// st抽選
// 81%ループする(引き戻し云々はあるがめんどうなので)
function stRand() {
    $isWin = false;
    $stRand = rand(1,99);
    if ($stRand == 1) {
        $isWin = true;   
    }
    return $isWin;
}


?>
