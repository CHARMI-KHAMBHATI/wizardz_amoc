
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
	
	
	<?php
	include_once 'gpConfig.php';
	
	include("connection.php");
	
	echo $_SESSION['email']." its from me ".$_SESSION['id'];
	
	$sql= "select * from image_table order by img_id desc";
	$result=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result))
	{
	?>
	<br>
		<img src="uploads/<?php echo $row['img_name']?>" width="20%" height="auto">
	<?php
	}

	?>

</body>

</html>