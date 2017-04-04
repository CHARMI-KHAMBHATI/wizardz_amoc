<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'setcomment.inc.php';
 include 'connection.php';
 include_once 'gpConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>ReplyComment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	$cid=$_POST['cid'];
	echo "<form method='POST' action='".replyComment($conn)."'>
		<input type='hidden' name='uidr' value='".$_SESSION['id']."'>
		<input type='hidden' name='cid' value='".$cid."'>
		<input type='hidden' name='rdate' value='".date('Y-m-d H:i:s')."'>
		<textarea name='rmessage' ></textarea>
		<button type='submit' name='replySubmit' >Replybtn</button>
	</form>";
?>
</body>
</html>
