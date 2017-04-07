<!DOCTYPE html>

<html>
	<head>
	<title>QuickBucket</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/style_home.css">
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Prociono" rel="stylesheet"> 
	<script src="./script/jquery-3.2.0.min.js"></script>
	<script src="./script/bootstrap.min.js"></script>
	</head>
	
	<body 
	color: white;" >
	<div class="navigation">
	<div class="container">
	<div class="row">
	<ul>
	<li class="col-xs-3 col-md-2 "><a href="./imageView.php">Home</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs"><a href="Upload_file.html">Upload</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs"><a href="myUploads.php">MyUploads</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs"><a href="commentpage.php">Discuss</a></li>
	<li class="col-xs-3 col-md-2 hidden-xs" id="logout"><a href="./logout.php">Logout</a></li>
	 <div class="dropdown visible-xs" style="display: block;
	color: #ffffff;
	font-size:1.35em;
	margin-top:1.25em;
	padding-top: 17.5px;
	margin-bottom: 1.25em;position: relative;">
  		<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:  #ffcc5c;float: right;" >
          <span class="glyphicon glyphicon-menu-hamburger col-xs-3"></span>
         </button>
      
  <ul class="dropdown-menu" style="position: absolute;top: 100%; 
  right: 0;
  margin-left: -5px;
  margin-top: 33px;" >
    <li><a  style="color: #ffd600;" href="Upload_file.html">Upload</a></li>
    <li><a  style="color: #ffd600;" href="myUploads.php">MyUploads</a></li>

	<li ><a  style="color: #ffd600;" href="commentpage.php">Discuss</a></li>
    <li><a   style="color: #ffd600;" href="./logout.php">Logout</a></li>
  </ul>

</div> 
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
	<div class="container" >
	<div class="row">
		
		<img src="uploads/<?php echo $row['img_name']?>"  class="col-xs-12 col-md-4" width="20%" height="auto">
		<div id="picDescription" class="col-xs-12 col-md-8" style="color:#55552b;background-color: 
	  

	 #efeff5;">
		<p class="descriptionName">
		<?php echo $row['name']; ?>
		</p>
		<hr>
		Uploaded by:
		<img src="<?php echo $row['picture']?>" width="5%" height="auto">		
		<?php echo $row['first_name']." ".$row['last_name'];?>
		<br>
		
		<br>Used for:
		<?php echo $row['used_for']; ?>
		
		<br>Type:
		<?php echo $row['type'];?>
		
		<br>Price
		<?php echo $row['price']; ?>
		
		<br>Description:
		<?php echo $row['description'];
		?>
		</div>
		</div>
		</div>
		<?php
	}
	// end printing details of the clicked img
?>

	<!-- Take user input for a comment -->
	<form method="post" action="comment_img.php">
	<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form>
									<div class="container">
									<div class="row">
										<textarea class="col-xs-12 col-md-6" rows=" 3" name="comment_txt" id="comment_txt" style="margin-left: 10px;"></textarea>

										<input type="hidden" name="imgid" value="<?php echo $id; ?>">
										<input type="submit" name="comment" id="comment" text="comment" value="Comment" class="btn btn-default " style="background-color: #009999; color: white;">
										</div>
										</div>
									</form>
								</div>
							</div>
		<br>
	</form>	
	
		<br>
		<br>

	<p style="font-size: 1.5em; padding-left: 20px; background-color:#ffeead;">Comments:</p>
		<?php
		$sql= "select * from comment_images NATURAL join users where img_id='$id' order by comment_id DESC ";
		$result=mysqli_query($conn, $sql);
		
		
		// start printing all the comments
		while($row=mysqli_fetch_array($result))
		{	echo "\n";
			$cid=$row['comment_id'];
			?>
			
			<div class="block" style="  margin-left: 7px; margin-right: 7px;">
			<form method="post" action="comment_images_reply.php" >
			<div class="container-fluid" style="background-color:#a3c2af;border-color:#e0ebe4;border-style: solid; border-width: 3px; ">
			<div class="row" >
			<div class="col-xs-3 col-md-1"  >
			<img class="img-circle " src="<?php echo $row['picture']?>" width="100%" height="auto">
			</div>
			<div class="comment col-xs-9 col-md-11">
			<div style="font-weight: bold;">
			<?php echo $row['first_name']." ".$row['last_name'];?><br>
			</div>
			<?php echo "\n".$row['description'];?>
			
			</div>
			</div>
			</div>
			
			
			
			<form role="form" id="file-form">
			<input type="hidden" name="imgid" value="<?php echo $id; ?>">
			<input type="hidden" name="comment_id" value="<?php echo $cid; ?>">
			<div class="container" style="display: none;">
    		<div class="row">
	    	<div class="col-md-6 col-xs-12">
    						<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form>
										<textarea cols="35" name="reply_box" id="reply_box"></textarea>
										<input type="submit" name="reply" id="reply2" text="Reply" value="Reply" class="btn " style="background-color: #009999; color:white;">
										<br>
									</form>
								</div>
							</div>
			</div>
        
    	</div>
		</div>
		<input type="submit" name="reply" id="reply1" text="Reply" value="Reply" class="btn " style="display:block;background-color: #009999; color:white;">
			
			<br>
			</form>

			</form>
			

		
			
			<?php
			
			// start printing replies
			$sql_reply= "select * from reply_comment_img  NATURAL JOIN users where comment_id='$cid' order by reply_id DESC  ";
			$result_reply=mysqli_query($conn, $sql_reply);
			while($row=mysqli_fetch_array($result_reply))
				{	?>
			<div class="container" style="background-color: #e0ebe4;border-color:#a3c2af;border-style: solid; border-width: 1.5px;">
			<div class="row">
			<div class="col-xs-3 col-md-1">
			<img class=" img-circle " src="<?php echo $row['picture']?>" width="65%" height="auto">
			</div>
			<div class="col-xs-9 col-md-11">
			<div style="font-weight: bold;">
			<?php echo $row['first_name']." ".$row['last_name'];?><br>
			</div>
			<?php echo "\n".$row['reply_msg'];?>
			</div>
			</div>
			</div><br>
					<?php
				}// end printing replies
				
				?>
				
				<br>
				</div>

				<?php
				
		}
		// end printing all the comments
		?>
		
		
		
		<script type="text/javascript">
			
			
				function show_hide(x){
					
					var y=x.previousElementSibling[3];
					y=((((y.parentElement).parentElement).parentElement).parentElement).parentElement;
					
					
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
				
				
				
					
				};
				var submit_btn=document.querySelectorAll("#reply1");
				for(var j=0;j<submit_btn.length;j++)
				{
				submit_btn[j].addEventListener("click",function(event)
				{
					show_hide(event.target);
					event.preventDefault();
					event.stopPropagation();
				});
				}
					
			
			</script>
		
		
	</body>
</html>
