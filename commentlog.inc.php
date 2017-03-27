<?php
	function setComment($conn){
		if(isset($_POST['commentSubmit'])){
			$uid=$_POST['uid'];
			$date=$_POST['date'];
			$message=$_POST['message'];
	
			$sql="INSERT INTO comments (uid,date,message) VALUES ('$uid','$date','$message')";
			$result = $conn->query($sql);
	
		}	
	}
	
	function getComment($conn){
		
		$sql="select comments.cid,comments.uid,comments.cdate,comments.message,
		replycomments.rid,replycomments.uidr,replycomments.rdate,replycomments.rmessage
		from comments left outer join replycomments on comments.cid=replycomments.cid order by comments.cid";
		$result = $conn->query($sql);
		while($row=$result->fetch_assoc()){
			$id = $row['uid'];
			$uidr = $row['uidr'];
			$cid = $row['cid'];
			$sql3 = "SELECT * FROM users WHERE id='$uidr'";
			$sql2 = "SELECT * FROM users WHERE id='$id'";
			$result2 = $conn->query($sql2);
			$result3 = $conn->query($sql3);
			if($row2 = $result2->fetch_assoc()){
				$row3 = $result3->fetch_assoc();
					echo "<div class='commentBox'><p>";
						echo $row2['uid']."<br>";
						echo $row['cdate']."<br>";
						
						echo nl2br($row['message']);
						echo "</p>";
						
						
					if(isset($_SESSION['id'])){
						if($_SESSION['id']== $row2['id']){
								echo 	"<form class='edit-form' method='POST' action='editComment.php'>
								<input type='hidden' name='cid' value='".$row['cid']."'>
								<input type='hidden' name='uid' value='".$row['uid']."'>
								<input type='hidden' name='cdate' value='".$row['cdate']."'>
								<input  type='hidden' name='message' value='".$row['message']."'>
								<button>Edit</button>
								</form> ";
							}else{
								echo 	"<form class='reply-form' method='POST' action='replyComment.php'>
								<input type='hidden' name='cid' value='".$row['cid']."'>
								<input type='hidden' name='uid' value='".$row2['uid']."'>
								<input type='hidden' name='rdate' value='".$row['rdate']."'>
								<input  type='hidden' name='rmessage' value='".$row['rmessage']."'>
								<button>Reply</button>
								</form>";
								}
					}else{
						echo "<p class='notlogged'>Log in to reply!</p>";
						}
						echo "</div>";
						$sql4="SELECT * FROM replycomments WHERE rmessage IS NULL ";
						$result4 = $conn->query($sql4);
						//if($row4 = $result->fetch_assoc()){
							
						//}else
						//{
							echo "<div class='commentrBox'><p>";
							echo $row3['uid']."<br>";
							echo $row['rdate']."<br>";
							echo nl2br($row['rmessage']);
							echo "</p></div>";
						//}
			}
		}
	}
	
	function editComment($conn){
		if(isset($_POST['commentSubmit'])){
			$cid=$_POST['cid'];
			$uid=$_POST['uid'];
			$cdate=$_POST['cdate'];
			$message=$_POST['message'];
			
			$sql="UPDATE comments SET message='$message' WHERE cid='$cid'";
			$result=$conn->query($sql);
			header("Location:commentpage.php");
		}
		
	}

	function getLogin($conn){
		if(isset($_POST['loginSubmit'])){
			$uid = $_POST['uid'];
			$pwd = $_POST['pwd'];
			$sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$pwd'";
			$result = $conn->query($sql);
			if(mysqli_num_rows($result) >0){
				if($row = $result->fetch_assoc()){
					$_SESSION['id'] = $row['id'];
					header("Location:commentpage.php?loginSuccess");
					exit();
				}
			}else{
					header("Location:commentpage.php?loginfailed");
					exit();
			}		
		}
	}
	
	function userLogout(){
		if(isset($_POST['logoutSubmit'])){
			session_start();
			session_destroy();
			header("Location:commentpage.php");
			exit();
		}
		
	}
	
	function replyComment($conn){
		if(isset($_POST['replySubmit'])){
			$uidr=$_POST['uidr'];
			$rdate=$_POST['rdate'];
			$rmessage=$_POST['rmessage'];
			$cid=$_POST['cid'];
			$sql="INSERT INTO replycomments(uidr,rdate,rmessage,cid) VALUES ('$uidr','$rdate','$rmessage','$cid')";
			$result = $conn->query($sql);
			header("Location:commentpage.php");
		}	
	}
	
	