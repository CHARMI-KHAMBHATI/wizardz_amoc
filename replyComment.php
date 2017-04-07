<?php
 date_default_timezone_set('Asia/Calcutta');
 include 'setcomment.inc.php';
 include 'connection.php';
 include_once 'gpConfig.php';
?>

<?php
	
	if(isset($_POST['submit'])){
			$uidr=$_POST['uidr'];
			$rdate=$_POST['rdate'];
			$rmessage=$_POST['rmessage'];
			$cid=$_POST['cid'];
			$sql="INSERT INTO replycomments(oauth_uid,rdate,rmessage,cid) VALUES ('$uidr','$rdate','$rmessage','$cid')";
			$result = $conn->query($sql);
			header("Location:commentpage.php");
		}
	
?>
