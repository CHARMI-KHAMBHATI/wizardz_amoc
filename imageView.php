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
	include_once 'gpConfig.php';
	
	include("connection.php");
	
	
	$sql= "select * from image_table order by img_id desc";
	$result=mysqli_query($conn, $sql);
	$result=mysqli_query($conn, $sql);
	
	while($row=mysqli_fetch_array($result))
	{
	?>
	
	<div class="col-xs-6 col-md-4" id="contents">
		
		<a href="./description.php?img=<?php echo $row['img_id']?>"><img src="uploads/<?php echo $row['img_name'] ?>"> </a>
		 <div id="contents_description">
		 <p>Name: <span class="description"><?php echo $row['name']; ?></span> </p>
		 <p>Useful for: <span class="description"><?php echo $row['used_for']; ?></span> </p>
		 <p>Price: Rs.<span class="description"><?php echo $row['price']; ?></span> </p>
		 </div>
	</div>

	<?php
	}
	?>
</body>

</html>
