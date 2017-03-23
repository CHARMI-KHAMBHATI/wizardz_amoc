<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'comment.inc.php';
 include 'connect.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>EditComment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	$uid=$_POST['uid'];
	$cid=$_POST['cid'];
	$date=$_POST['date'];
	$message=$_POST['message'];
	
	echo "<form method='POST' action='".editComment($conn)."'>
		<input type='hidden' name='cid' value='".$cid."'>
		<input type='hidden' name='uid' value='".$uid."'>
		<input type='hidden' name='date' value='".$date."'>
		<textarea name='message' >".$message."</textarea>
		<button type='submit' name='commentSubmit' >Edit</button>
	</form>";
?>
</body>
</html>
