
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
	
	echo $_SESSION['email']." its from me ".$_SESSION['id']."\n";
	
	$sql= "select * from image_table,users order by img_id desc";
	$result=mysqli_query($conn, $sql);
	$result=mysqli_query($conn, $sql);
	echo "\n";
	while($row=mysqli_fetch_array($result))
	{
	?>
	<table style="width:100%">
		
		<tr><td><img src="uploads/<?php echo $row['img_name']?>" width="20%" height="auto"></td></tr>
		 <tr><td><?php echo $row['first_name']." ".$row['last_name'];?> </td></tr>
		 <tr><td><?php 		  echo $row['name'];?> </td></tr>
		 <tr><td><?php 		  echo $row['type'];?></td></tr>
		 <tr><td><?php 		echo $row['used_for'];?> </td></tr>
		 <tr><td><?php 	  echo $row['price'];?> </td></tr>
		 <tr><td><?php 	  echo $row['description'];?> </td></tr>
		 
		 </table>
		
	<?php
	}

	?>

</body>

</html>
