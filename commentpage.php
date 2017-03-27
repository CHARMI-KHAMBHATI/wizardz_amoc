<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'commentlog.inc.php';
 include 'connect.inc.php';
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Comment Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
	echo "<form method='POST' action='".getLogin($conn)."'>
		<input type='text' name='uid'>
		<input type='password' name='pwd'>
		<button type='submit' name='loginSubmit'>Login</button>
		</form>";
		
 	echo "<form method='POST' action='".userLogout()."'>
		<button type='submit' name='logoutSubmit'>Logout</button>
		</form>";
	if(isset($_SESSION['id'])){
		echo "You are logged in";
	}else{
		echo "You are not logged in!!";
	}
?>
<br><br>
<img alt="Image" src="flower2.jpg ">
<br>
<?php
	if(isset($_SESSION['id'])){
			echo "<form method='POST' action='".setComment($conn)."'>
		<input type='hidden' name='uid' value='".$_SESSION['id']."'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'><br>
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

