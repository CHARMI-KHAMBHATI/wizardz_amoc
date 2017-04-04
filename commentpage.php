<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'setcomment.inc.php';
 include_once 'gpConfig.php';
include("connection.php");


?>

<!DOCTYPE html>
<html>
<head>
	<title>QuickBucket</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/style_home.css">
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<script src="./script/jquery-3.2.0.min.js"></script>
	<script src="./script/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="navigation">
	<div class="container">
	<div class="row">
	<ul>
	<li class="col-xs-3 col-md-2"><a href="./imageView.php">Home</a></li>
	<li class="col-xs-3 col-md-2"><a href="Upload_file.html">Upload</a></li>
	<li class="col-xs-3 col-md-2"><a href="myUploads.php">MyUploads</a></li>
	<li class="col-xs-3 col-md-2"><a href="commentpage.php">Discuss</a></li>
	<li class="col-xs-3 col-md-2" id="logout"><a href="./logout.php">Logout</a></li>
	</ul>
	</div>	

	</div>
</div>
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

