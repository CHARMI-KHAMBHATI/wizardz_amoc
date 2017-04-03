<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'setcomment.inc.php';
 include_once 'gpConfig.php';
include("connection.php");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Comment Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	if(isset($_SESSION['id'])){
		echo "<h3 align='centre'>Welcome to Discussion Forum!!</h3>";
		echo "<h4>You are logged in</h4>";
	}else{
		echo "<h4>You are not logged in!!</h4>";
	}
?>
<br><br>
<img alt="Image" src="flower2.jpg ">
<br>
<?php
	if(isset($_SESSION['id'])){
			echo "<form method='POST' action='".setComment($conn)."'>
		<input type='hidden' name='uid' value='".$_SESSION['id']."'>
		<input type='hidden' name='cdate' value='".date('Y-m-d H:i:s')."'><br>
		<textarea name='message' ></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
		</form>";
	}else{
		echo "You need to be logged in to join discussion!!<br><br>";
	}
	getComment($conn);
?>
</body>
</html>

