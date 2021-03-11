<?php
	session_start();
	session_regenerate_id(true);
	$_SESSION['syurui'] = 1;
	$syurui=$_SESSION['syurui'];
	$_SESSION['syurui'] = $syurui;
	unset($_SESSION['syurui']);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

try
{


if(isset($_SESSION['cart'])==true)
{
	$cart=$_SESSION['cart'];
	$kazu=$_SESSION['kazu'];
	$day = $_SESSION['day'];
	$max=count($cart);
}
else
{
	$max=0;
}
if($max==0)
{
	print '予約するものがありません<br />';
	print '<br />';
	print '<a href="index02.php">予約一覧へ戻る</a>';
	exit();
}

$dsn='mysql:dbname=yoyaku;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

foreach($cart as $key=>$val)
{
	$sql='SELECT code,kaijou,motimono,shousai,syurui FROM setumeikai WHERE code=?';
	$stmt=$dbh->prepare($sql);
	$data[0]=$val;
	$stmt->execute($data);
}


$rec=$stmt->fetch(PDO::FETCH_ASSOC);

$pro_code=$rec['code'];
$pro_kaijou=$rec['kaijou'];
$pro_motimono=$rec['motimono'];
$pro_shousai=$rec['shousai'];
$pro_syurui=$rec['syurui'];



$sql='LOCK TABLES rireki WRITE';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$day = $_SESSION['day'];

	$sql='INSERT INTO rireki (kaijou,motimono,shousai,syurui,hizuke) VALUES (?,?,?,?,?)';
	$stmt=$dbh->prepare($sql);
	$data=array();
	$data[]=$pro_kaijou;
	$data[]=$pro_motimono;
	$data[]=$pro_shousai;
	$data[]=$pro_syurui;
	$data[]=$day;
	$stmt->execute($data);
	
	require_once('../common/common.php');
	
	$post=sanitize($_POST);
	
	$onamae=$post['onamae'];
	$email=$post['email'];
	$postal1=$post['postal1'];
	$postal2=$post['postal2'];
	$address=$post['address'];
	$tel=$post['tel'];
	
	print $onamae.'様<br />';
	print 'ご予約ありがとうございます<br />';
	print $email.'にメールを送りましたのでご確認ください。<br />';
	print $postal1.'-'.$postal2.'<br />';
	print $address.'<br />';
	print $tel.'<br />';
	
	$honbun='';
	$honbun.=$onamae."様\n\nこのたびはご予約ありがとうございました。\n";
	$honbun.="\n";
	$honbun.="\n";
	$honbun.="--------------------\n";
	
	$title='予約';
	$header='From:'.$email;
	$honbun=html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
	mb_language('Japanese');
	mb_internal_encoding('UTF-8');
	mb_send_mail('info@ohara.co.jp',$title,$honbun,$header);
	
	
	
	
	
}
	catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}

$_SESSION['syurui'] = $pro_syurui;

?>
<p>完了しました。</p>
   <a href="delete.php">予約画面へ</a> 
</body>
</html>