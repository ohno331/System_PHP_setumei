<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
    print'ログインされていません。<br />';
    print'<a href="./member_login.html">ログイン画面へ</a>';
    exit();
}else{
    print $_SESSION['member_name'];
    print 'さんログイン中<br />';
    print '<br />';
}
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>予約</title>
  </head>
  <body>



<?php

try
{


  $pro_day=$_GET['day'];

  

  $_SESSION['day'] = $pro_day;
  $day = $_SESSION['day'];
  
  
  $pro_code=$_GET['procode'];
if(isset($_SESSION['cart'])==true)
{
  $cart=$_SESSION['cart'];
  $kazu=$_SESSION['kazu'];

	if(in_array($pro_code,$cart)==true)
	{
		print '既に登録されています<br />';
    print '<a href="index.php">予約一覧に戻る</a>';

		exit();
	}
}
$cart[]=$pro_code;
$kazu[]=1;
// $day[]=$pro_day;
$_SESSION['cart']=$cart;
$_SESSION['kazu']=$kazu;
// $_SESSION['day']=$day;
}


catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

追加しました<br />
<br />
<a href="index.php">予約一覧に戻る</a>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>