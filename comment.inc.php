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
		$sql="SELECT * FROM comments";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		while($row = $result->fetch_assoc()){
			echo "<div class='commentBox'><p>";
				echo $row['uid']."<br>";
				echo $row['date']."<br>";
				echo nl2br($row['message']);
			echo "</p>
				<form class='edit-form' method='POST' action='editcomment.php'>
					<input type='hidden' name='cid' value='".$row['cid']."'>
					<input type='hidden' name='uid' value='".$row['uid']."'>
					<input type='hidden' name='date' value='".$row['date']."'>
					<input  type='hidden' name='message' value='".$row['message']."'>
					<button>Edit</button>
					</form>
					</div>";
		}
	}
	
	function editComment($conn){
		if(isset($_POST['commentSubmit'])){
			$cid=$_POST['cid'];
			$uid=$_POST['uid'];
			$date=$_POST['date'];
			$message=$_POST['message'];
			
			$sql="UPDATE comments SET message='$message' WHERE cid='$cid'";
			$result=$conn->query($sql);
			header("Location:index.php");
		}
		
	}
