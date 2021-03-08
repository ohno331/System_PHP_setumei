<?php
 

$year = date('Y');
$month = date('n');
 

$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
 
$calendar = array();
$j = 0;
 

for ($i = 1; $i < $last_day + 1; $i++) {
 
    
    $week = date('w', mktime(0, 0, 0, $month, $i, $year));
 
    
    if ($i == 1) {
 
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
 
            // 前半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
    
    $calendar[$j]['day'] = $i;
    $j++;
 
    
    if ($i == $last_day) {
 
        
        for ($e = 1; $e <= 6 - $week; $e++) {
 
            
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<br>
<br>
<table>
<caption><?php echo $year; ?>年<?php echo $month; ?>月のカレンダー</caption>

    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>
 
    <tr>
    <?php $cnt = 0; ?>
    <?php foreach ($calendar as $key => $value): ?>
 
        <td>
        <?php $cnt++; ?>
        <?php echo $value['day']; ?>
        </td>
 
    <?php if ($cnt == 7): ?>
    </tr>
    <tr>
    <?php $cnt = 0; ?>
    <?php endif; ?>
 
    <?php endforeach; ?>
    </tr>
</table>
</body>
</html>