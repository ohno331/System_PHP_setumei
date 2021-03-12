
<!-- セッション -->
<div class="log">

<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	print '<h2 id="midasi">ようこそゲスト様</h2>';
	print '<h3 id="kanin"><a href="member_login.html">会員ログイン</a></h3><br />';
	print '<br />';
}
else
{
	print '<h3>ようこそ</h3>';
	print $_SESSION['member_name'];
	print ' 様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>

<!-- セッション -->

<?php 

// DB

// $day = $_SESSION['day'];



$setumei="説明会";
$mensetu1="1次面接";
$mensetu2="最終面接";
// DB
//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//表示させる年月を設定　↓これは現在の月
$year = date('Y');
$month = date('m');

//月末日を取得
$end_month = date('t', strtotime($year.$month.'01'));


// data
if(isset($_SESSION['syurui'])==true)
{
    $pro_syurui=$_SESSION['syurui'];
}
else
{
    $pro_syurui='o';
}


$arySchedule = [];


if($pro_syurui==$setumei){
    
$arySchedule[5] = '1次面接';
$arySchedule[10] = '1次面接';
$arySchedule[15] = '1次面接';
$arySchedule[20] = '1次面接';
$arySchedule[25] = '1次面接';
}else if($pro_syurui==$mensetu1){

$arySchedule[5] = '最終面接';
$arySchedule[10] = '最終面接';
$arySchedule[15] = '最終面接';
$arySchedule[20] = '最終面接';
$arySchedule[25] = '最終面接';
}else if($pro_syurui==$mensetu2){

$arySchedule[5] = '面談';
$arySchedule[10] = '面談';
$arySchedule[15] = '面談';
$arySchedule[20] = '面談';
$arySchedule[25] = '面談';
}else{ 
//スケジュール設定 日付をキーに

$arySchedule[5] = '説明会';
$arySchedule[10] = '説明会';
$arySchedule[15] = '説明会';
$arySchedule[20] = '説明会';
$arySchedule[25] = '説明会';
}

$aryCalendar = [];
$aryCalendar2 = [];

$a = 5;
$b = 10;
$c = 15;
$d = 20;
$e = 25;
//1日から月末日までループ
$arySchedul = [];
$arySchedul[5] = $a;
$arySchedul[10] = $b;
$arySchedul[15] = $c;
$arySchedul[20] = $d;
$arySchedul[25] = $e;

$aryCalendar = [];
$aryCalendar2 = [];


for ($i = 1; $i <= 15; $i++){
    $aryCalendar[$i]['day'] = $i;
    $aryCalendar[$i]['week'] = date('w', strtotime($year.$month.sprintf('%02d', $i)));
    if(isset($arySchedule[$i])){
        $aryCalendar[$i]['text'] = $arySchedule[$i];
    }else{
        $aryCalendar[$i]['text'] = '';
    }
    if(isset($arySchedul[$i])){
        $aryCalendar[$i]['te'] = $arySchedul[$i];
    }else{
        $aryCalendar[$i]['te'] = '';
    }

}

for ($n = 16; $n <= 30; $n++){
    $aryCalendar2[$n]['day'] = $n;
    $aryCalendar2[$n]['week'] = date('w', strtotime($year.$month.sprintf('%02d', $n)));
    if(isset($arySchedule[$n])){
        $aryCalendar2[$n]['text'] = $arySchedule[$n];
    }else{
        $aryCalendar2[$n]['text'] = '';
    }
    if(isset($arySchedul[$n])){
        $aryCalendar2[$n]['te'] = $arySchedul[$n];
    }else{
        $aryCalendar2[$n]['te'] = '';
    }

}


// $aryCalenda[$i]['te'] = $arySchedul[$i];

$aryWeek = ['日', '月', '火', '水', '木', '金', '土'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>

<!-- 履歴 -->
<?php



?>
<!-- 履歴 -->

<nav id="nav">
    <ul>
        <li><a href="check.php">確認</a></li>
        <li><a href="rireki.php">予約確定リスト</a></li>
        <li><a href="riseto.php">リセット</a></li>
    </ul>
</nav><br>
<p><h2>3月</h2></p>    

<table border="0" class="cale" height="100%">
    
<tr>
<td>
<table  border="1" class="cale1">
    
    <?php foreach($aryCalendar as $value){ ?>
        
        <?php if($value['day'] != date('j')){ ?>
            <tr class="week<?php echo $value['week'] ?>">
                <?php }else{ ?>
                    <tr class="today">
                        <?php } ?>
                        <td>
                            <?php echo $value['day'] ?>(<?php echo $aryWeek[$value['week']] ?>)
                        </td>
                        <td>

                            <?php 
                                if($pro_syurui==$setumei){
                                    print '<a href="shosai2.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }else if($pro_syurui==$mensetu1){
                                    print '<a href="shousai3.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }else if($pro_syurui==$mensetu2){
                                    print '<a href="shousai4.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }else{
                                    print '<a href="shosai1.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }
                                ?>
                            
                    
        </td>
    </tr>
<?php } ?>


</table>
</td>
<td>
<table  border="1" class="cale2">
    
    <?php foreach($aryCalendar2 as $value){ ?>
        
        <?php if($value['day'] != date('j')){ ?>
            <tr class="week<?php echo $value['week'] ?>">
                <?php }else{ ?>
                    <tr class="today">
                        <?php } ?>
                        <td>
                            <?php echo $value['day'] ?>(<?php echo $aryWeek[$value['week']] ?>)
                        </td>
                        <td>

                            <?php 
                                if($pro_syurui==$setumei){
                                    print '<a href="shosai2.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }else if($pro_syurui==$mensetu1){
                                    print '<a href="shousai3.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }else if($pro_syurui==$mensetu2){
                                    print '<a href="shousai4.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }else{
                                    print '<a href="shosai1.php?aaa=' . $value['te'] . '">'.$value['text'].'</a>';
                                }
                                ?>
                            
                    
        </td>
    </tr>
<?php } ?>


</table>
</td>
</tr>
</table>
    
</body>
</html>