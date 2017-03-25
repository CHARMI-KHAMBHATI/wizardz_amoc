<?php


include("connection.php");
include_once 'gpConfig.php';

$comment=$_POST['comment_txt'];
$uid=$_SESSION['id'];

$img_id=$_POST['imgid'];
 if(!empty($comment))
 {
	$sql="insert into comment_images ( description, oauth_uid, img_id) values ('$comment','$uid','$img_id')";

	$result=mysqli_query($conn, $sql);
			if($result)
			{
				
				header("location:description.php? img=$img_id");
			
			}
			else 
				echo "error";
 }		

 header("location:description.php? img=$img_id");
 
 ?>