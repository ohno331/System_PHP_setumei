
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


        $syurui=$_SESSION['syurui'];
        $_SESSION['syurui'] = $syurui;
        unset($_SESSION['syurui']);


		header('Location:index.php');
?>
	
</body>
</html>