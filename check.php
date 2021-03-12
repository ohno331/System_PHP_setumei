<div class="log"><?php
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
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>
</div>
<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
    <title>レンタルショップ</title>
  </head>
  <body class="shop_home">
  <div class="text">
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
	// if(isset($_SESSION['day'])==true){
    //     $day=$_SESSION['day'];
    // }
	if($max==0)
	{
		print '予約するものがありません<br />';
		print '<br />';
		print '<a href="index.php">予約一覧へ戻る</a>';
		exit();
	}
	
	$dsn='mysql:dbname=yoyaku;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	foreach($cart as $key=>$val)
	{
		$sql='SELECT code,kaijou,motimono,shousai FROM setumeikai WHERE code=?';
		$stmt=$dbh->prepare($sql);
		$data[0]=$val;
		$stmt->execute($data);
		
		$rec=$stmt->fetch(PDO::FETCH_ASSOC);
		// $day=$_SESSION['day'];
		$pro_kaijou[]=$rec['kaijou'];
		$pro_motimono[]=$rec['motimono'];

	}
	$dbh=null;
	
}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>
</div>
<div class="">
登録中<br />
<br />
<form method="post" action="delete.php">
<table class="table text">
	<?php for($i=0;$i<$max;$i++){ ?>
        <tr>
            <th>日付</th>
            <td>    
            <?php
                    
                    print "3月${day}日";
            ?>   
            </td>
        </tr>
	<tr class="text">
		<th>会場</th>
		<td><?php print $pro_kaijou[$i]; ?></td>
	</tr>
<tr>
	<th>持ち物</th>
	<td><?php print $pro_motimono[$i]; ?></td>
</tr>
<tr>
<th style="height: 100px;">削除</th>
<td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
</tr>

<?php } ?>
</table>
<input type="hidden" name="max" value="<?php print $max; ?>">
<input type="submit" class="btn-square" value="変更"><br />
<input type="button" class="btn-square" onclick="history.back()" value="戻る">
</form>


<?php 
	if(isset($_SESSION["member_login"])==true){
		print'<a href="kakutei.php">予約する</a><br />';
        

	}
	?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</div>
</body>
</html>