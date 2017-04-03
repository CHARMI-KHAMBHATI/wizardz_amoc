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
	</head>
	
	<body>
	<div class="navigation">
	<div class="container">
	<div class="row">
	<ul>
	<li class="col-xs-4 col-md-2"><a href="./imageView.php">Home</a></li>
	<li class="col-xs-4 col-md-2"><a href="Upload_file.html">Upload</a></li>
	<li class="col-xs-4 col-md-2"><a href="myUploads.php">MyUploads</a></li>
	<li class="col-xs-4 col-md-2"><a href="commentpage.php">Discuss</a></li>
	<li class="col-xs-4 col-md-2" id="logout"><a href="./logout.php">Logout</a></li>
	</ul>
	</div>	

	</div>
	</div>
	<?php
	
	
	include("connection.php");
	$id=$_GET['img'];
	$sql= "select * from image_table natural join users where img_id='$id'";
	$result=mysqli_query($conn, $sql);
	
	// start printing details of the clicked img
	while($row=mysqli_fetch_array($result))
	{
	?>
	<br>
		Uploaded by:
		<img src="<?php echo $row['picture']?>" width="5%" height="auto">		
		<?php echo $row['first_name']." ".$row['last_name'];?>
		<br>
		<img src="uploads/<?php echo $row['img_name']?>" width="20%" height="auto">
		<br>Name:
		<?php echo $row['name']; ?>
		
		<br>Used for:
		<?php echo $row['used_for']; ?>
		
		<br>Type:
		<?php echo $row['type'];?>
		
		<br>Price
		<?php echo $row['price']; ?>
		
		<br>Description:
		<?php echo $row['description'];
	}
	// end printing details of the clicked img
?>

	<!-- Take user input for a comment -->
	<form method="post" action="comment_img.php">
	
	<input type="text" name="comment_txt" id="comment_txt">
	<input type="hidden" name="imgid" value="<?php echo $id; ?>">
		<input type="submit" name="comment" id="comment">
		
		<br>
	</form>	
	
		<?php
		$sql= "select * from comment_images NATURAL join users where img_id='$id' order by comment_id DESC ";
		$result=mysqli_query($conn, $sql);
		
		
		// start printing all the comments
		while($row=mysqli_fetch_array($result))
		{	echo "\n";
			$cid=$row['comment_id'];
			?>
			<form method="post" action="comment_images_reply.php">
			<img src="<?php echo $row['picture']?>" width="5%" height="auto">
			<?php echo $row['first_name']." ".$row['last_name'];?><br>
			
			<?php echo "\n".$row['description'];?>
			
			
			<form >
			<input type="hidden" name="imgid" value="<?php echo $id; ?>">
			<input type="hidden" name="comment_id" value="<?php echo $cid; ?>">
			<input type="text" id="reply_box" style="display:none;" name="reply_box" >
			<input type="submit" name="reply" id="reply1" text="Reply" value="Reply">
			<input type="submit" name="reply" id="reply2" text="Reply" value="Reply" style="display:none;">
			
			</form>
			</form>
			
			
			<?php
			
			// start printing replies
			$sql_reply= "select * from reply_comment_img  NATURAL JOIN users where comment_id='$cid' order by reply_id DESC  ";
			$result_reply=mysqli_query($conn, $sql_reply);
			while($row=mysqli_fetch_array($result_reply))
				{	?><img src="<?php echo $row['picture']?>" width="5%" height="auto">
			<?php
			
					echo $row['first_name']." ".$row['last_name'];?><br>
			
					<?php echo "\n".$row['reply_msg'];?><br>
					<?php
				}// end printing replies
				
				?>
				<br>
				<?php
				
		}
		// end printing all the comments
		?>
		
		
		
		<script type="text/javascript">
			
			
				function show_hide(x){
					
					var y=x.previousSibling;
					y=y.previousSibling;
					var z=x.nextSibling;
					z=z.nextSibling;
					
						if(y.style.display==="none")
						{
							y.style.display="block";
						}
						else
							y.style.display="none";
						if(x.style.display==="none")
						{
							x.style.display="block";
						}
						else
							x.style.display="none";
				
				if(z.style.display==="none")
						{
							z.style.display="block";
						}
						else
							z.style.display="none";
				
				
					
				};
				var submit_btn=document.querySelectorAll("#reply1");
				for(var j=0;j<submit_btn.length;j++)
				{
				submit_btn[j].addEventListener("click",function(event)
				{
					show_hide(event.target);
					console.log(event.target);
					event.preventDefault();
					event.stopPropagation();
				});
				}
					
			
			</script>
		
		
	</body>
</html>
