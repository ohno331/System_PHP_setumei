
<!-- セッション -->
<div class="log">
<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	print 'ようこそゲスト様　';
	print '<a href="member_login.html">会員ログイン</a><br />';
	print '<br />';
}
else
{
	print 'ようこそ　';
	print $_SESSION['member_name'];
	print ' 様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>
<!-- セッション -->
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



<?php

try
{

$dsn='mysql:dbname=yoyaku;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,kaijou,motimono,shousai FROM setumeikai limit 1 offset 2';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;


$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$path1= $_GET['aaa'];
$pro_code=$rec['code'];
$pro_kaijou=$rec['kaijou'];
$pro_motimono=$rec['motimono'];
$pro_shousai=$rec['shousai'];


print '<a href="in.php?procode='.$pro_code.'&day='.$path1.'">登録する</a><br /><br />';
}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>






    <h2>最終面接</h2>
    <table>
        <tr>
            <th>日付</th>
            <td>
                3月
                <?php 
                    $path1= $_GET['aaa'];
                    print "${path1}日"; 
                ?>
            </td>
</tr>
<tr>
    <th>会場</th>
    <td>
        <?php 
            print $pro_kaijou;
        ?>
    </td>
</tr>
<tr>
    <th>持ち物</th>
    <td>
        <?php 
        print $pro_motimono;
        ?>
    </td>
</tr>
<tr>
    <th>詳細</th>
    <td>
    <?php 
        print $pro_shousai;
    ?>
    </td>
</tr>

        
    </table>
    <form>
    <input type="button" class="btn-square" onclick="history.back()" value="戻る">
    </form>


    
</body>
</html>
