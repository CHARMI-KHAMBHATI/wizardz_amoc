<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'setcomment.inc.php';
 include 'connection.php';
include_once 'gpConfig.php';
?>


<?php
	if(isset($_POST['submit'])){
			$cid=$_POST['cid'];
			$cdate=$_POST['cdate'];
			$message=$_POST['message'];
			
			$sql="UPDATE commentsection SET message='$message' WHERE cid='$cid'";
			$result=$conn->query($sql);
			header("Location:commentpage.php");
		}
?>
