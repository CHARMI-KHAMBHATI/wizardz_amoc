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
	while($row=mysqli_fetch_array($result))
	{
	?>
	<br>
		Uploaded by: 
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
?>
	
	<form method="post" action="comment_img.php">
	<input type="text" name="comment_txt" id="comment_txt">
	<input type="hidden" name="imgid" value="<?php echo $id; ?>">
		<input type="submit" name="comment" id="comment">
		
		<br>
	</form>	
	<script type="text/javascript">var i=0;</script>
		<?php
		$sql= "select * from comment_images natural join users where img_id='$id'";
		$result=mysqli_query($conn, $sql);
		
		while($row=mysqli_fetch_array($result))
		{
			?>
			<form>
			<?php echo $row['first_name']." ".$row['last_name'];?><br>
			
			<?php echo "\n".$row['description'];?>
			<form method="post" action="comment_imgages_reply.php">
				<input type="submit" name="reply" id="reply" text="Reply">
				
			</form>
			</form>
			<script type="text/javascript">
				var input_tag=(document.querySelectorAll("input"))[3];
				input_tag.addEventListener("click",function(event)
				{
					if(i=1)
					{
						var form_ele=document.createElement("FORM");
						form_ele.method="post";
						form_ele.className="reply";
						var input_box=document.createElement("input");
						input.type="text";
						input.name="reply";
						input.id="reply_box";
						form_ele.appendChild(input_box);
						var form_comment=document.querySelectorAll("form")[2];
						form_comment.appendChild(form_ele);
						i=0;
					}
					else
					{
						var to_remove=document.getElementsByClassName("reply");
						var form_parent=document.querySelectorAll("form")[2];
						form_parent.removeChild(to_remove);
						i=1;

					}
				})
			</script>
			
			<?php
		}
		
		?>
	</body>
</html>
