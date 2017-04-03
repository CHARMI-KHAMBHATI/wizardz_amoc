<?php
	function setComment($conn){
		if(isset($_POST['commentSubmit'])){
			$uid=$_POST['uid'];
			$cdate=$_POST['cdate'];
			$message=$_POST['message'];
	
			$sql="INSERT INTO commentsection (oauth_uid,cdate,message) VALUES ('$uid','$cdate','$message')";
			$result = $conn->query($sql);
	
		}	
	}
	
	function getComment($conn){
		$sql="select * from commentsection natural join users";
		$result = $conn->query($sql);
		while($row=$result->fetch_assoc()){
			$cid = $row['cid'];
			$uid=$row['id'];
			
			
				$sql2="select * from users where id='$uid'";
				$result2=$conn->query($sql2);
				if($row2 = $result2->fetch_assoc()){
					$oauth_uid=$row2['oauth_uid'];
					echo "<div class='commentBox'><p>";
					echo "<img src=".$row['picture']." width='5%' height='auto'>"; 
						echo $row['first_name'];echo $row['last_name']."<br>";
						echo $row['cdate']."<br>";
						echo nl2br($row['message']);
						//echo $uid."<br>";
						//echo $_SESSION['id']."<br>";
						//echo $row2['id'];
						echo "</p>";
						//echo "</div>";						
					if(isset($_SESSION['id'])){
						if($_SESSION['id'] == $oauth_uid){
								echo 	"<form class='edit-form' method='POST' action='editComment.php'>
								<input type='hidden' name='cid' value='".$row['cid']."'>
								<input type='hidden' name='uid' value='".$uid."'>
								<input type='hidden' name='cdate' value='".$row['cdate']."'>
								<input  type='hidden' name='message' value='".$row['message']."'>
								<button>Edit</button>
								</form> ";
						}else{
								echo 	"<form class='reply-form' method='POST' action='replyComment.php'>
								<input type='hidden' name='cid' value='".$row['cid']."'>
								<input type='hidden' name='uidr' value='".$uid."'>
								<input type='hidden' name='rdate' value='".$row['cdate']."'>
								<input  type='hidden' name='rmessage' value='".$row['message']."'>
								<button>Reply</button>
								</form>";
							}
								
					}else{
						
						}
						echo "</div>";
						$sql4="SELECT * from replycomments natural join users WHERE cid='$cid'";
						$result4 = $conn->query($sql4);
						while($row4 = $result4->fetch_assoc()){
						echo "<div class='commentrBox'><p>";
						echo "<img src=".$row4['picture']." width='5%' height='auto'>";
							echo $row4['first_name'];echo $row4['last_name']."<br>";
							echo $row4['rdate']."<br>";
							echo nl2br($row4['rmessage']);
							echo "</p>";
							echo "</div>";
						}
						//{
								
						//}
			}
		}
	}
	
	function editComment($conn){
		if(isset($_POST['commentSubmit'])){
			$cid=$_POST['cid'];
			$cdate=$_POST['cdate'];
			$message=$_POST['message'];
			
			$sql="UPDATE commentsection SET message='$message' WHERE cid='$cid'";
			$result=$conn->query($sql);
			header("Location:commentpage.php");
		}
		
	}

	
	function replyComment($conn){
		if(isset($_POST['replySubmit'])){
			$uidr=$_POST['uidr'];
			$rdate=$_POST['rdate'];
			$rmessage=$_POST['rmessage'];
			$cid=$_POST['cid'];
			$sql="INSERT INTO replycomments(oauth_uid,rdate,rmessage,cid) VALUES ('$uidr','$rdate','$rmessage','$cid')";
			$result = $conn->query($sql);
			header("Location:commentpage.php");
		}	
	}
	
	