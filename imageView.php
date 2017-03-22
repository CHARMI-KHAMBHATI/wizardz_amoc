
<!DOCTYPE html>

<html>
	<head>
		
		<title>
		My upload
		</title>
	</head>
	
	<body>
	
	Logout from <a href="logout.php">Google</a>
	<br>
	  <a href="Upload_file.html">upload</a>
	
	<br>
	<table>
	
	<?php
	include_once 'gpConfig.php';
	
	include("connection.php");
	
	echo $_SESSION['email']." its from me ".$_SESSION['id']."\n";
	
	$sql= "select * from image_table,users order by img_id desc";
	$result=mysqli_query($conn, $sql);
	$result=mysqli_query($conn, $sql);
	echo "\n";
	
	echo '<script> var i=0;</script>';
	
	while($row=mysqli_fetch_array($result))
	{
	?>
	<div class="contents">
	<img src="uploads/<?php echo $row['img_name'] ?>" width="20%" height="auto" >
	
	<p> <?php echo $row['name']; ?> </p>
	<p><?php echo $row['used_for']; ?> </p>
	<p><?php echo $row['price']; ?> </p>
	</div>
	<?php echo '<script>
	ele.className=i.toString();
	i++;</script>' ?>
	<?php
	}
		
	?>
</table>
</body>

</html>

