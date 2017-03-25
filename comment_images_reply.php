<?php

include("connection.php");
include_once 'gpConfig.php';

$reply=$_POST['reply_box'];
$uid=$_SESSION['id'];
$img_id=$_POST['imgid'];
$cid=$_POST['comment_id'];


{
	if(!empty($reply))
	 {
		$sql="insert into reply_comment_img ( reply_msg, oauth_uid, comment_id) values ('$reply','$uid','$cid')";

		$result=mysqli_query($conn, $sql);
				if($result)
				{
					
					header("location:description.php? img=$img_id");
				
				}
				else 
					echo "error";
	 }		
}
 
header("location:description.php? img=$img_id");

?>