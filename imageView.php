
<!DOCTYPE html>

<html>
	<head>
	<title>QuickBucket</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device.width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./styles/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style_home.css">
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
	<li class="col-xs-4 col-md-2" id="logout"><a href="./logout.php">Logout</a></li>
	</ul>
	</div>	

	</div>
	</div>
	
	
	
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
