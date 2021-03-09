
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
    <title>Document</title>
</head>
<body>

<h3>履歴</h3>

<?php

try
{


$dsn='mysql:dbname=yoyaku;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,kaijou,motimono,shousai,syurui,hizuke FROM rireki WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
    print '<table>';
    print "<tr><th>日付<th><td>3月{$rec['hizuke']}日</td></tr>";
    print "<tr><th>会場</th><td>{$rec['kaijou']}</td><tr>";
    print "<tr><th>持ち物</th><td>{$rec['motimono']}</td><tr>";
    print "<tr><th>詳細</th><td>{$rec['shousai']}</td><tr>";
    print '</table>';

	print '<br />';
}



}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

?>
    <form>
    <input type="button" class="btn-square" onclick="history.back()" value="戻る">
    </form>


    
</body>
</html>
