<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'comment.inc.php';
 include 'connect.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<img alt="Image" src="flower2.jpg ">
<?php
	echo "<form method='POST' action='".setComment($conn)."'>
		<input type='hidden' name='uid' value='Anonymous'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'><br>
		<textarea name='message' ></textarea><br>
		<button type='submit' name='commentSubmit' >comment</button>
	</form>";
	getComment($conn);
?>
</body>
</html>

