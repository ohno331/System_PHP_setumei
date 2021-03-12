
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
	    session_start();
		$day = $_SESSION['day'];
		$cart = $_SESSION['cart'];
		$kazu = $_SESSION['kazu'];

		$_SESSION['cart'] = $cart;
		$_SESSION['kazu'] = $kazu;
		$_SESSION['day'] = $day;


		unset($_SESSION['day']);
		unset($_SESSION['cart']);
		unset($_SESSION['kazu']);

		print "削除しました。";
		header('Location:index.php');
?>
	
</body>
</html>